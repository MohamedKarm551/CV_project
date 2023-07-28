<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function create(){
        return view('register');
    }
    public function store(Request $request){
        // return view('register');
        $request->merge(['password'=>Hash::make($request->password)]); //نسيت هذا السطر وكان في ايرور لاااازم الباسورد يدخل متهيش 
        // dd($request);
        $request->validate([
            "name"=>"min:3|max:40|required",
            "email"=>"min:3|max:40|required|unique:users,email"
        ]);
        DB::table("users")->insert($request->except("_token"));
        return view('login');


    }
}
