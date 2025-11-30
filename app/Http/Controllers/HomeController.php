<?php

namespace App\Http\Controllers;

use App\Models\Clarify;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function GetClarifies(){
        $clarifies = Clarify::find(1);
        return view('admin.backend.clarify.get_clarify', compact('clarifies'));
    }
// End of the method

   // update the slider
    public function UpdateClarifies(Request $request, $id)
    {
        $clarify = Clarify::findOrFail($id);

        if ($request->file('image')) {
            // Delete old image if exists
            if ($clarify->image && file_exists(public_path($clarify->image))) {
                unlink(public_path($clarify->image));
            }

            // Process new image
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image)->resize(302, 618);
            $img->save(public_path('upload/slider/' . $name_gen));

            $clarify->image = 'upload/slider/' . $name_gen;
        }

        $clarify->title = $request->title;
        $clarify->description = $request->description;
        $clarify->save();

        return redirect()->back()->with([
            'message' => 'Slider updated successfully',
            'alert' => 'success'
        ]);
    }

    // end method


}
