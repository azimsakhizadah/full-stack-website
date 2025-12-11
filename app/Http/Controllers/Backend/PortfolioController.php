<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PortfolioController extends Controller
{
    public function AllPortfolios()
    {
        $portfolios = Portfolio::latest()->paginate(10);
        return view('admin.backend.portfolio.all_portfolios', compact('portfolios'));
    }

    public function AddPortfolioForm() {
    $categories = PortfolioCategory::all();  // <-- Add this line
    return view('admin.backend.portfolio.add_portfolio', compact('categories'));
}


    public function AddPortfolio(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:5048',
            'client' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'categories' => 'nullable|array',
        ]);

        $save_url = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());

            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image)->resize(60, 60);
            $img->save(public_path('upload/portfolio/' . $name_gen));

            $save_url = 'upload/portfolio/' . $name_gen;
        }

        Portfolio::create([
            'title'     => $request->title,
            'description' => $request->description,
            'image'    => $save_url,
            'client' => $request->client,
            'website' => $request->website,
            'duration' => $request->duration,
            'categories' => $request->categories,
        ]);

        return redirect()->route('all.portfolios')->with([
            'message' => 'Portfolio added successfully',
            'alert'   => 'success'
        ]);
    }

    // ===========================
    // ✅ FIXED UPDATE FUNCTION
    // ===========================

    public function UpdatePortfolio(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $save_url = $portfolio->image;

        if ($request->hasFile('image')) {

            // delete old image
            if ($portfolio->image && file_exists(public_path($portfolio->image))) {
                unlink(public_path($portfolio->image));
            }

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());

            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image)->resize(60, 60);
            $img->save(public_path('upload/portfolio/' . $name_gen));

            $save_url = 'upload/portfolio/' . $name_gen;
        }

        $portfolio->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $save_url,
            'client' => $request->client,
            'website' => $request->website,
            'duration' => $request->duration,
            'categories' => $request->categories,
        ]);

        return redirect()->route('all.portfolios')->with([
            'message' => 'Portfolio updated successfully',
            'alert' => 'success'
        ]);
    }

    // Edit
    public function EditPortfolio($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.backend.portfolio.edit_portfolio', compact('portfolio'));
    }

    // Delete
    public function DeletePortfolio($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        if ($portfolio->image && file_exists(public_path($portfolio->image))) {
            unlink(public_path($portfolio->image));
        }

        $portfolio->delete();

        return redirect()->back()->with('message', 'Portfolio Deleted Successfully');
    }
}
