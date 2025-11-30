<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class FeaturesController extends Controller
{
        // to show all reviews
    public function AllFeature()
    {
        $features = Feature::all();
        return view('admin.backend.features.all_features', compact('features'));
    }
    // End method

    // to add the review
    public function AddFeatureForm()
    {
        return view('admin.backend.features.add_features');
    }
    // End method


   public function AddFeature(Request $request)
{
    // Validate required fields including svg
    $request->validate([
        'title'        => 'required|string|max:255',
        'description'  => 'required|string',
        'image'        => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
    ]);

    $save_url = null;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $name_gen = hexdec(uniqid()) . '.' . $extension;

        // If the image is an SVG → move without processing
        if ($extension === 'svg') {
            $image->move(public_path('upload/features/'), $name_gen);
        } else {
            // Process normal images (jpg, png, webp, etc.)
            $manager = new ImageManager(new Driver());
            $img = $manager->read($image);
            $img->resize(60, 60)->save(public_path('upload/features/') . $name_gen);
        }

        $save_url = 'upload/features/' . $name_gen;
    }

    // Insert into DB
    Feature::create([
        'title'        => $request->title,
        'description'  => $request->description,
        'image'        => $save_url,
    ]);

    return redirect()->route('all.features')->with([
        'message' => 'Feature added successfully',
        'alert'   => 'success'
    ]);
}

public function UpdateFeature(Request $request, $id)
{
    $features = Feature::findOrFail($id);

    if ($request->file('image')) {
        $image = $request->file('image');
        $ext = strtolower($image->getClientOriginalExtension());

        // If SVG → just move file (no resize)
        if ($ext === 'svg') {
            $name_gen = hexdec(uniqid()) . '.svg';
            $image->move(public_path('upload/features/'), $name_gen);

            $features->image = 'upload/features/' . $name_gen;
        } else {
            // Normal image → resize with Intervention
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $ext;
            $img = $manager->read($image)->resize(60, 60);
            $img->save(public_path('upload/features/' . $name_gen));

            $features->image = 'upload/features/' . $name_gen;
        }
    }

    $features->title = $request->title;
    $features->description = $request->description;
    $features->save();

    return redirect()->route('all.features')->with([
        'message' => 'Features updated successfully',
        'alert' => 'success'
    ]);
}
    public function EditFeature($id)
    {
        $features = Feature::find($id);
        return view('admin.backend.features.edit_features', compact('features'));
    }
    // end method

    public function DeleteFeature($id)
    {
        $features = Feature::findOrFail($id);

        // Delete file safely
        $path = public_path('upload/features/' . $features->image);

        if ($features->image && file_exists($path)) {
            unlink($path);
        }

        $features->delete();

        return redirect()->back()->with('message', 'Feature Deleted Successfully');
    }
}

