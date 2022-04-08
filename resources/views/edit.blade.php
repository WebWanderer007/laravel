<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Member</title>
</head>
<body>
    <h1>Update Member</h1>
    
        @if (session('user'))
          <h4 style="color: green">{{ session('user') }} user has been updated</h4>
        @endif
    <form action="/update-user" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $user['id'] }}">
        <input type="text" name="user" placeholder="Enter user name" value="{{ $user['name'] }}"><br><br>
        <span style="color: red">@error('user'){{ $message }}@enderror</span><br>
        <input type="email" name="email" placeholder="Enter user email" value="{{ $user['email'] }}"><br><br>
        <span style="color: red">@error('email'){{ $message }}@enderror</span><br>
        <textarea name="address" rows="5" placeholder="Enter your address">{{ $user['address'] }}</textarea><br><br>
        <span style="color: red">@error('address'){{ $message }}@enderror</span><br>
        <input type="text" name="password" placeholder="Enter user password" value="{{ $user['password'] }}"><br><br>
        <span style="color: red">@error('password'){{ $message }}@enderror</span><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>

