<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Title;
use Illuminate\Http\Request;

class TitleContoller extends Controller
{
        // edit features via ajax
    public function EditFeatures(Request $request, $id)
    {
        $title = Title::findOrFail($id);
        if ($request->has('features')) {
            $title->features = $request->features;
            $title->save();
        }

        return response()->json(['success' => 'Features updated successfully']);
    }
    // end method


    // edit answers via ajax
    public function EditAnswers(Request $request, $id)
    {
        $title = Title::findOrFail($id);
        if ($request->has('answers')) {
            $title->answers = $request->answers;
            $title->save();
        }
        return response()->json(['success' => 'Answers updated successfully']);
    }

    // end method

    public function EditReviews(Request $request, $id)
    {
        $title = Title::findOrFail($id);
        if ($request->has('reviews')) {
            $title->reviews = $request->reviews;
            $title->save();
        }
        return response()->json(['success' => 'Reviews updated successfully']);
    }

    // end method

}
