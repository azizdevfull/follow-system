<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $user->name }}</title>
</head>

<body>

    <h1>{{ $user->name }}</h1>
    <h2>
        {{ $user->followers()->count() }}
    </h2>
    <!-- Profil sahifasi -->

    <!-- Profil sahifasi -->

    @if (auth()->user()->isFollowing($user))
        <form action="{{ route('unfollow', $user->id) }}" method="POST">
            @csrf
            <button type="submit">Unfollow</button>
        </form>
    @else
        <form action="{{ route('follow', $user->id) }}" method="POST">
            @csrf
            <button type="submit">Follow</button>
        </form>
    @endif




</body>

</html>
