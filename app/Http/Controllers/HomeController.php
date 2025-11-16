<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        // $result = DB::table('users')->insert([
        //     'name'=>'Mohammad',
        //     'email'=>'ali@gmil.com',
        //     'password'=> '1234'
        // ]);

        $data = DB::table('users')->find(1);

        dd($data);
    }
}
