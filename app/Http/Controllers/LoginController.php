<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
{
    return view('login');
}
    public function login(Request $request)
    {
        $request->validate([
            'name'=>'required | alpha',
            'email'=>'required',
            'password'=>'required'
        ],[
            'name.required'=>'نام خود را وارد کنید.',
            'email.required'=> 'ایمیل خود را وارد کنید',
            'password.required'=>'رمز خود را وارد کنید'
        ]);
    }
}
