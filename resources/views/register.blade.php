<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/registerAndLogin.css')}}">
    <title>Register</title>
</head>
<body>
<h1 class="center">Register</h1>

<form method="POST" action="/storeUser">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name"  required autofocus>
        @error('name')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        @error('email')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        @error('password')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <!-- <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
    </div> -->

    <button type="submit">Register</button>
</form>
<a href="{{url('login')}}" class="btn primary center">login</a>

</body>
</html>