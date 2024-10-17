<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>

<body>

    <h1>{{ auth()->user()->name }}</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Followers</th>
            <th>Following</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->followers()->count() }}</td>
                <td>{{ $user->following()->count() }}</td>
                <td><a href="{{ route('userShow', $user->id) }}">Show</a></td>
            </tr>
        @endforeach
    </table>
</body>

</html>
