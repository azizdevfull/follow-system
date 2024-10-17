<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>

    <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password">
        <input type="submit" value="Login">
    </form>

</body>

</html>
