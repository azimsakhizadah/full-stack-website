<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class SliderController extends Controller
{
    // Get slider
    public function GetSlider()
    {
        $slider = Slider::find(1);
        return view('admin.backend.slider.get_slider', compact('slider'));
    }
    // End method

    // update the slider
    public function UpdateSlider(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        if ($request->file('image')) {
            // Delete old image if exists
            if ($slider->image && file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image));
            }

            // Process new image
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image)->resize(306, 618);
            $img->save(public_path('upload/slider/' . $name_gen));

            $slider->image = 'upload/slider/' . $name_gen;
        }

        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->link = $request->link;
        $slider->save();

        return redirect()->back()->with([
            'message' => 'Slider updated successfully',
            'alert' => 'success'
        ]);
    }

    // end method


    // edit slider via ajax
    public function EditSlider(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);  
        if($request->has('title')){
            $slider->title = $request->title;
        }
        if($request->has('description')){
            $slider->description = $request->description;
        }

        $slider->save();
        return response()->json(['success' => 'Slider updated successfully']);
    }
    // end method
}
