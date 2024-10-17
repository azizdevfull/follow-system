<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>

<body>

    <form action="{{ route('registerForm') }}" method="post">
        @csrf
        <h1>Register</h1>
        @error('name')
            {{ $message }}
        @enderror
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter your name">
        @error('email')
            {{ $message }}
        @enderror
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter your email">
        @error('password')
            {{ $message }}
        @enderror
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password">
        <input type="submit" value="Register">
    </form>

</body>

</html>
