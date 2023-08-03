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
        $cv = new CV(); //from model
        $cv->user_id = $user->id;
        $cv->name = $request->name;
        $cv->email = $request->email;
        $cv->job_title = $request->job_title;
        $cv->phone = $request->phone;
        // save image 
            // if ($request->hasFile('image')) {
            // $image = $request->file('image');
            //     // Get the uploaded image file
            // // Generate a unique file name for the image
            // $fileName = time() . '_' . $image->getClientOriginalName();
            // // Store the image file in the public disk
            // $path=$image->storeAs('images', $fileName ,'images');
            // $cv->image = $path;        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
             // Get the uploaded image file
            $extension = $image->getClientOriginalExtension();
            $allowedExtensions = array("jpg", "jpeg", "png", "gif");
            // I asked a friend in the field of security, and he said that it is necessary to check whether the uploaded image is or not, so as not to upload virus files or codes
            if (in_array($extension, $allowedExtensions)) {
                $fileName = time() . '_' . $image->getClientOriginalName();
                $path=$image->storeAs('images', $fileName ,'images');
                $cv->image = $path;
            } else {
                // The uploaded file is not an image file
                return response()->json(['error' => 'Invalid file type. Only image files are allowed.'], 400);
            }
        }
        // end save image
        $cv->address = $request->address;
        $cv->about_me = $request->about_me;
        $cv->education = $request->education;
        $cv->experience = $request->experience;
        $cv->skills = $request->skills;
        $cv->facebook = $request->facebook;
        $cv->youtube = $request->youtube;
        $cv->twitter = $request->twitter;
        $cv->linkedin = $request->linkedin;
        $cv->github = $request->github;
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
    $user=$request->user();
    $cv->user_id = $user->id;// to update with user_id
    $cv->name = $request->name;
    $cv->job_title = $request->job_title;
    $cv->email = $request->email;
    $cv->phone = $request->phone;
    // 
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     // $imagePath = $image->store('public/images');
        //     $fileName = time() . '_' . $image->getClientOriginalName();
        //     $path=$image->storeAs('images', $fileName ,'images');
        //     $cv->image = $path; 
        //     // dd($imagePath); die;
        // }
    // ارفع الصورة الجديدة وتأكد انها صورة 
    if ($request->hasFile('image')) {
        $image = $request->file('image');
         // Get the uploaded image file
        $extension = $image->getClientOriginalExtension(); //get Extension
        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        // I asked a friend in the field of security, and he said that it is necessary to check whether the uploaded image is or not, so as not to upload virus files or codes
        if (in_array($extension, $allowedExtensions)) {
            $fileName = time() . '_' . $image->getClientOriginalName();
            $path=$image->storeAs('images', $fileName ,'images');
            $cv->image = $path;
        } else {
            // The uploaded file is not an image file
            return response()->json(['error' => 'Invalid file type. Only image files are allowed.'], 400);
        }
    }
    // 
    $cv->address = $request->address;
    $cv->about_me = $request->about_me;
    $cv->education = $request->education;
    $cv->experience = $request->experience;
    $cv->skills = $request->skills;
    $cv->facebook = $request->facebook;
    $cv->youtube = $request->youtube;
    $cv->twitter = $request->twitter;
    $cv->linkedin = $request->linkedin;
    $cv->github = $request->github;
    $cv->save();
    // $cv->update();

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
