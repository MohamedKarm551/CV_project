<?php

use App\Http\Controllers\CvController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    // return view('welcome');
    echo "<h1>test</h1>"; 
        });
// register
Route::get ('/register',   [RegisterController::class,'create']);
Route::post('/storeUser',  [RegisterController::class, 'store']);
// login
Route::get ('/login',        [LoginController::class,'login'])->name("login");
Route::post('/loginRequest', [LoginController::class,'loginRequest']);
Route::get('/logout',        [LoginController::class,'logout']);
// CRUD
Route::get   ('/createCv',      [CvController::class,   'create']);
Route::post  ('/storeCv',       [CvController::class,   'storeCv']);
Route::get   ('/view/{id}',     [CvController::class,   'view']);
Route::get   ('/editCv/{id}',   [CvController::class,   'edit']);
Route::post  ('/update/{id}',   [CvController::class,   'update']);
Route::get   ('/deleteCv/{id}', [CvController::class,   'destroy']); //كانت معمولة بدل جيت ديليت كان عامل ايرور 
// 


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
