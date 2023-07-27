<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/editCv.css') }}" />
    <!-- <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" /> -->


    <title>create Cv</title>
</head>
<body>
  <div class="container">
  <form method="post" action="{{ url('/storeCv/') }}" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name"  >
  </div>
  <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
    </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name="email"  >
  </div>
  <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="tel" class="form-control" id="phone" name="phone"  >
  </div>
  <div class="form-group">
    <label for="address">Address:</label>
    <input type="text" class="form-control" id="address" name="address"  >
  </div>
  <div class="form-group">
    <label for="about_me">About Me:</label>
    <textarea class="form-control" id="about_me" name="about_me"></textarea>
  </div>
  <div class="form-group">
    <label for="education">Education:</label>
    <textarea class="form-control" id="education" name="education"> </textarea>
  </div>

  <div class="form-group">
    <label for="experience">experience:</label>
    <textarea class="form-control" id="experience" name="experience"> </textarea>
  </div>
  <div class="form-group">
    <label for="skills">skills:</label>
    <textarea class="form-control" id="skills" name="skills"> </textarea>
  </div>
  <!-- social -->
  <div class="form-group">
    <label for="facebook">facebook:</label>
    <input type="text" class="form-control" id="facebook" name="facebook"  >
  </div>
  <div class="form-group">
    <label for="twitter">twitter :</label>
    <input type="text" class="form-control" id="twitter" name="twitter"  >
  </div>
  <div class="form-group">
    <label for="linkedin">linkedin:</label>
    <input type="text" class="form-control" id="linkedin" name="linkedin"  >
  </div>
  <div class="form-group">
    <label for="youtube ">youtube:</label>
    <input type="text" class="form-control" id="youtube" name="youtube"  >
  </div>
  <div class="form-group">
    <label for="github">github :</label>
    <input type="text" class="form-control" id="github" name="github"  >
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
</form>
  </div>  

</body>
</html>