<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail;

class AdminController extends Controller
{
    public function AdminLogin(Request $request)
    {
        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Generate 6-digit code
            $verificationCode = random_int(100000, 999999);

            // Store code in session
            session([
                'verification_code' => $verificationCode,
                'user_id' => $user->id
            ]);

            // Send verification email
            Mail::to($user->email)->send(new VerificationCodeMail($verificationCode));

            // Logout until verified
            Auth::logout();

            return redirect()
                ->route('custom.verification.form')
                ->with('status', 'Verification code sent to your email');
        }

        return redirect()->back()->withErrors([
            'email' => 'Invalid credentials provided'
        ]);
    }

    // show the verification form
    public function showVerification()
    {
        return view('auth.verify');
    }

    public function verificationVerify(Request $request)
    {
        $request->validate(['code' => 'required|numeric']);

        if ($request->code == session('verification_code')) {

            Auth::loginUsingId(session('user_id'));

            session()->forget(['verification_code', 'user_id']);

            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors([
            'code' => 'Invalid verification code'
        ]);
    }
}
