<?php 
use Illuminate\Support\Str;
   $txt = "hi, let's learn laravel";
   $data = Str::of($txt)->ucfirst($txt)->camel($txt);
    die($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>
    <h1>User List</h1>
    @if ($message = Session::get('success'))
    <div>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <a href="/add-member">Add New User</a>
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @if (!empty($users))
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['address'] }}</td>
                        <td>{{ $user['password'] }}</td>
                        <td>
                            <a href="{{ "/delete-user/".$user['id'] }}">Delete</a>&nbsp;
                            <a href="{{ "/edit-user/".$user['id'] }}">Edit</a>
                        </td>
                    </tr>
                @endforeach 
            @endif
        </tbody>
    </table>
    <span>{{ $users->links() }}</span>
    <style>
        .w-5{
            display: none;
        }
    </style>
</body>
</html>