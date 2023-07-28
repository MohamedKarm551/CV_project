<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/registerAndLogin.css')}}">
    <title>Login</title>
</head>
<body>
<h1 class="center">Login</h1>

<form method="POST" action="{{ url('loginRequest') }}">
    @csrf
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email"   required autofocus>
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

    <button type="submit">Login</button>
</form>
<a href="{{url('register')}}" class="btn primary center">register</a>

</body>
</html>