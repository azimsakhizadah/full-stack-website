<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function ContactPage()
    {
        return view('home.contact.contact');
    }
    // end method

    public function SendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'message' => 'required|min:5',
        ]);

        Contact::create($validated);

        return response()->json([
            'message' => 'Your message successfully submitted',
            'status' => 'success'
        ]);
    }
    // end method

    public function AllMessages()
    {
        $messages = Contact::all();
        return view('admin.backend.messages.all_messages', compact('messages'));
    }

    // end method

    public function DeleteMessages($id)
{
    $message = Contact::findOrFail($id);
    $message->delete();

    // Return JSON for AJAX
    return back()->with('message','message was deleted');
}

}
