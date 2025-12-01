<?php

namespace App\Http\Controllers;

use App\Models\Clarify;
use App\Models\Usability;
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

    public function GetUsability(){
        $usability = Usability::find(1);
        return view('admin.backend.usability.get_usability', compact('usability'));
    }

    // update the usability
    public function UpdateUsability(Request $request, $id)
    {
        $usability = Usability::findOrFail($id);
        if ($request->file('image')) {
            // Delete old image if exists
            if ($usability->image && file_exists(public_path($usability->image))) {
                unlink(public_path($usability->image));
            }

            // Process new image
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image)->resize(560, 400);
            $img->save(public_path('upload/usability/' . $name_gen));

            $usability->image = 'upload/usability/' . $name_gen;
        }   

        $usability->title = $request->title;
        $usability->link = $request->link;
        $usability->youtube = $request->youtube;
        $usability->description = $request->description;
        $usability->save();

        return redirect()->back()->with([
            'message' => 'Usability updated successfully',
            'alert' => 'success'
        ]);
    }
    // end method
}
