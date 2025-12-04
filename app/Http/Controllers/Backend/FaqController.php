<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
        // to show all reviews
    public function AllFaq()
    {
        $faqs = Faq::all();
        return view('admin.backend.faq.all_faq', compact('faqs'));
    }
    // End method

    // to add the review
    public function AddFaqForm()
    {
        return view('admin.backend.faq.add_faq');
    }
    // End method


    public function AddFaq(Request $request)
    {
        // Validate required fields but NOT image
        $request->validate([
            'title'     => 'required|string|max:255',
            'description'  => 'required|string',
        ]);

        // Insert into DB
        Faq::create([
            'title'     => $request->title,
            'description'  => $request->description
        ]);

        return redirect()->route('all.faq')->with([
            'message' => 'FAQ added successfully',
            'alert'   => 'success'
        ]);
    }


    // to update review
    public function UpdateFaq(Request $request, $id)
    {

        $faqs = Faq::findOrFail($id);
        $faqs->title = $request->title;
        $faqs->description = $request->description;
        $faqs->save();

        return redirect()->route('all.faq')->with([
            'message' => 'FAQ updated successfully',
            'alert' => 'success'
        ]);
    }
    // end method

    public function EditFaq($id)
    {
        $faqs = Faq::find($id);
        return view('admin.backend.faq.edit_faq', compact('faqs'));
    }
    // end method

    public function DeleteFaq($id)
    {
        $faqs = Faq::findOrFail($id);
        $faqs->delete();
        return redirect()->back()->with('message', 'Faq Deleted Successfully');
    }
}
