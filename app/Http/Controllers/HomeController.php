<?php

namespace App\Http\Controllers;

use App\Models\Cta;
use App\Models\Intro;
use App\Models\Introvalue;
use App\Models\Usability;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class HomeController extends Controller
{
    public function GetUsability()
    {
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

    // CTA controller

    public function getCta() {
        $ctas = Cta::find(1);
        return view('admin.backend.cta.get_cta', compact('ctas'));
    }

    // update the cta

    public function updateCta(Request $request, $id) {
        $ctas = Cta::findOrFail($id);
        if ($request->file('image')) {
            // Delete old image if exists
            if ($ctas->image && file_exists(public_path($ctas->image))) {
                unlink(public_path($ctas->image));
            }

            // Process new image
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image)->resize(306, 481);
            $img->save(public_path('upload/cta/' . $name_gen));

            $ctas->image = 'upload/cta/' . $name_gen;
        }

        $ctas->title = $request->title;
        $ctas->link = $request->link;
        $ctas->description = $request->description;
        $ctas->save();

        return redirect()->back()->with([
            'message' => 'CTA updated successfully',
            'alert' => 'success'
        ]);
    }

    // end method

    // about page
    public function AboutPage() {
        return view('home.about.about');
    }

    // team page
    public function TeamPage(){
        return view('home.team.team');
    }

    // portfolio page
    public function PortfolioPage(){
        return view('home.portfolio.portfolio');
    }

    // portfolio details 
    public function PortfolioDetails() {
        return view('home.portfolio.portfolio_details');
    }

}
