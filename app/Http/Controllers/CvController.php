<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;

class CvController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->except("view");
    }
    //
    public function view($id){
        $cv = CV::findOrFail($id); // with model get from database 
        return view('viewCv', compact('cv'));

    }
    public function create(){
         return view('createCv');
    }
    public function storeCv(Request $request ){
        $user=$request->user();
        // dd($user);
        $cv = new CV();
        $cv->user_id = $user->id;
        $cv->name = $request->name;
        $cv->email = $request->email;
        $cv->phone = $request->phone;
        // save image 
        if ($request->hasFile('image')) {
        $image = $request->file('image');
            // Get the uploaded image file
        // Generate a unique file name for the image
        $fileName = time() . '_' . $image->getClientOriginalName();
        // Store the image file in the public disk
        $image->storeAs('public/images', $fileName);
        $cv->image = $fileName;        }
        // end save image
        $cv->address = $request->address;
        $cv->about_me = $request->about_me;
        $cv->education = $request->education;
        $cv->experience = $request->experience;
        $cv->skills = $request->skills;
        $cv->save();
        return redirect('/view/'.$cv->id);

    }
//     public function storeCv(Request $request)
// {
//     $cv = Cv::create([
//         'name' => $request->input('name'),
//         'email' => $request->input('email'),
//         'phone' => $request->input('phone'),
//         'address' => $request->input('address'),
//         'about_me' => $request->input('about_me'),
//         'education' => $request->input('education'),
//         'experience' => $request->input('experience'),
//         'skills' => $request->input('skills'),
//     ]);

//     // Save image
//     if ($request->hasFile('image')) {
//         $cv->image = $request->file('image');
//         $cv->save();
//     }

//     return redirect()->route('cv.view', $cv);
// }
    public function edit($id){
        $cv = CV::findOrFail($id);
        return view('updateCv', compact('cv'));
    }
    public function update(Request $request , $id){
    // $cv = Cv ::first();
    $cv = CV::find($id);
    $cv->name = $request->input('name');
    $cv->email = $request->input('email');
    $cv->phone = $request->input('phone');
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('public/images');
        // dd($imagePath); die;
        $cv->image = $imagePath;
    }
    $cv->address = $request->input('address');
    $cv->about_me = $request->input('about_me');
    $cv->education = $request->input('education');
    $cv->experience = $request->input('experience');
    $cv->skills = $request->input('skills');
    // $cv->save();
    $cv->update();

     return redirect("/view/{$id}");
    //  echo "res"; 
    }
    

    public function destroy($id){
        // echo "ddd";
        $cv = CV::find($id);
        $cv->delete();
        return redirect("/createCv");
    }
    
    
    }
