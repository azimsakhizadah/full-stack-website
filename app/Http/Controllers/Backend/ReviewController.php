<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ReviewController extends Controller
{
    // to show all reviews
    public function AllReview()
    {
        $reviews = Review::all();
        return view('admin.backend.review.all_review', compact('reviews'));
    }
    // End method

    // to add the review
    public function AddReviewForm()
    {
        return view('admin.backend.review.add_review');
    }
    // End method


   public function AddReview(Request $request)
{
    // Validate required fields but NOT image
    $request->validate([
        'name'     => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'message'  => 'required|string',
        'image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $save_url = null; // default if no image uploaded

    // If image uploaded → process it
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $manager = new ImageManager(new Driver());

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        $img = $manager->read($image);
        $img->resize(60, 60)->save(public_path('upload/review/') . $name_gen);

        $save_url = 'upload/review/' . $name_gen;
    }

    // Insert into DB
    Review::create([
        'name'     => $request->name,
        'position' => $request->position,
        'message'  => $request->message,
        'image'    => $save_url, // null if no image
    ]);

    return redirect()->route('all.review')->with([
        'message' => 'Review added successfully',
        'alert'   => 'success'
    ]);
}


    // to update review
    public function UpdateReview(Request $request, $id)
    {

        $review = Review::findOrFail($id);

        if ($request->file('image')) {
            $image = $request->file('image');

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image)->resize(60, 60);
            $img->save(public_path('upload/review/' . $name_gen));

            $save_url = 'upload/review/' . $name_gen;

            $review->image = $save_url;
        }

        $review->name = $request->name;
        $review->position = $request->position;
        $review->message = $request->message;
        $review->save();

        return redirect()->route('all.review')->with([
            'message' => 'Review updated successfully',
            'alert' => 'success'
        ]);
    }
    // end method

    public function EditReview($id)
    {
        $review = Review::find($id);
        return view('admin.backend.review.edit_review', compact('review'));
    }
    // end method

    public function DeleteReview($id)
    {
        $review = Review::findOrFail($id);

        // Delete file safely
        $path = public_path('upload/review/' . $review->image);

        if ($review->image && file_exists($path)) {
            unlink($path);
        }

        $review->delete();

        return redirect()->back()->with('message', 'Review Deleted Successfully');
    }
}
