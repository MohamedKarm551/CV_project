<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
    public function login(){
        return view('login');
    }
    public function loginRequest(Request $request){
        //test the request with database and next 
        $credentials =  $request->only('email', 'password'); //only this from request

    if (Auth::attempt($credentials)) { // test with database 
    $userHasCV = DB::table('users')
    ->join('cv', 'users.id', '=', 'cv.user_id')
    ->where('users.id', Auth::user()->id)
    ->exists();   //هل اليوزر ده له سي في مستجل من قبل ؟ 
    if ($userHasCV) {
        // If a CV exists for the user, redirect them to view it.
        $cvId = DB::table('cv')
            ->where('user_id', Auth::user()->id)
            ->value('id');
        return redirect('/view/' . $cvId);
            }
            return view('createCv');
    }
        // return redirect("login");
        else {
            echo 'error in Auth::attempt("$credentials")';   
            //   dd($request);   
            return redirect("login");
            }
            //or : 
                // var_dump( $credentials);
                // $user = User::where('email', $request->email)->first();
                //  //dd( $user);
                // if ($user->password == $request->password && $user->email == $request->email ) { // test with database 
                //      return view('createCv');
                // }
                // // return redirect("login");
                // else {
                //     // dd($request);   
                //     return redirect("login");
                //     }
    }
    public function logout(){
        Auth::logout();
        return redirect("login");
    }
}
