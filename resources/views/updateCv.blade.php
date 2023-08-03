<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/editCv.css') }}" />
    <!-- <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" /> -->


    <title>update Cv</title>
</head>
<body>
  <div class="container">
  <form method="POST" action="{{ url('/update/' . $cv->id) }}" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ $cv->name }}">
  </div>
  <div class="form-group">
    <label for="name">job title:</label>
    <input type="text" class="form-control" id="job_title" name="job_title" value="{{ $cv->job_title }}">
  </div>
  <div class="form-group">
    <label for="image">Image:</label>
    <input type="file" class="form-control-file" id="image" name="image">
    <input type="hidden" class="form-control-file" value="{{ $cv->image }}">

  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ $cv->email }}">
  </div>
  <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="tel" class="form-control" id="phone" name="phone" value="{{ $cv->phone }}">
  </div>
  <div class="form-group">
    <label for="address">Address:</label>
    <input type="text" class="form-control" id="address" name="address" value="{{ $cv->address }}">
  </div>
  <div class="form-group">
    <label for="about_me">About Me:</label>
    <textarea class="form-control" id="about_me" name="about_me">{{ $cv->about_me }}</textarea>
  </div>

  <div class="form-group">
    <label for="education">Education:</label>
    <textarea class="form-control" id="education" name="education">{{ $cv->education }}</textarea>
    <small class="form-text text-muted">Enter comma-separated list of education as (education one, education two  )</small>
  </div>
  <div class="form-group">
    <label for="experience">experience:</label>
    <textarea class="form-control" id="experience" name="experience">{{ $cv->experience }}</textarea>
    <small class="form-text text-muted">Enter comma-separated list of experience as (experience one, experience two  )</small>

  </div>
  <div class="form-group">
    <label for="skills">skills:</label>
    <textarea class="form-control" id="skills" name="skills">{{ $cv->skills }}</textarea>
    <small class="form-text text-muted">Enter comma-separated list of skills as (skill one, skill two , skill three)</small>

  </div>
    <!-- social -->
    <div class="form-group">
    <label for="facebook">facebook:</label>
    <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $cv->facebook }}" >
  </div>
  <div class="form-group">
    <label for="twitter">twitter :</label>
    <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $cv->twitter}}"  >
  </div>
  <div class="form-group">
    <label for="linkedin">linkedin:</label>
    <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ $cv->linkedin}}"  >
  </div>
  <div class="form-group">
    <label for="youtube ">youtube:</label>
    <input type="text" class="form-control" id="youtube" name="youtube" value="{{ $cv->youtube }}"  >
  </div>
  <div class="form-group">
    <label for="github">github :</label>
    <input type="text" class="form-control" id="github" name="github" value="{{ $cv->github}}"  >
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
  </div>  

</body>
</html>