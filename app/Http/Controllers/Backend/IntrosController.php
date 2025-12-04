<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Intro;
use App\Models\Introvalue;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class IntrosController extends Controller
{
      // to show all introvalue
    public function AllIntrovalue()
    {
        $introvalue = Introvalue::all();
        return view('admin.backend.intro.all_introvalue', compact('introvalue'));
    }

    // getting the introduction
    public function GetIntro()
    {
        $intro = Intro::find(1);
        return view('admin.backend.intro.get_intro', compact('intro'));
    }
    // End of the method

    // update the introduction
    public function UpdateIntro(Request $request, $id)
    {
        $intro = Intro::findOrFail($id);

        if ($request->file('image')) {
            // Delete old image if exists
            if ($intro->image && file_exists(public_path($intro->image))) {
                unlink(public_path($intro->image));
            }

            // Process new image
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image)->resize(302, 618);
            $img->save(public_path('upload/slider/' . $name_gen));

            $intro->image = 'upload/slider/' . $name_gen;
        }

        $intro->title = $request->title;
        $intro->description = $request->description;
        $intro->save();

        return redirect()->back()->with([
            'message' => 'Slider updated successfully',
            'alert' => 'success'
        ]);
    }

    // Add Introvalue
    public function addIntrovalueForm()
    {
        $introvalue = Introvalue::find(1);
        return view('admin.backend.intro.add_introvalue');
    }


    public function AddIntrovalue(Request $request)
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
                $image->move(public_path('upload/intro/'), $name_gen);
            } else {
                // Process normal images (jpg, png, webp, etc.)
                $manager = new ImageManager(new Driver());
                $img = $manager->read($image);
                $img->resize(60, 60)->save(public_path('upload/intro/') . $name_gen);
            }

            $save_url = 'upload/intro/' . $name_gen;
        }

        // Insert into DB
        Introvalue::create([
            'title'        => $request->title,
            'description'  => $request->description,
            'image'        => $save_url,
        ]);

        return redirect()->route('all.introvalue')->with([
            'message' => 'Introvalue added successfully',
            'alert'   => 'success'
        ]);
    }


    // delete introvalue
    public function deleteIntrovalue($id)
    {
        $introvlaue = Introvalue::findOrFail($id);

        // Delete file safely
        $path = public_path('upload/intro/' . $introvlaue->image);

        if ($introvlaue->image && file_exists($path)) {
            unlink($path);
        }

        $introvlaue->delete();

        return redirect()->back()->with('message', 'Introvlaue Deleted Successfully');
    }

    // end method
}
