<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Member</title>
</head>
<body>
    <h1>Add New Member</h1>
    
        @if (session('user'))
          <h4 style="color: green">{{ session('user') }} user has been added</h4>
        @endif
    <form action="/save-member" method="POST">
        @csrf
        <input type="text" name="user" placeholder="Enter user name" value="{{ old('user') }}"><br><br>
        <span style="color: red">@error('user'){{ $message }}@enderror</span><br>
        <input type="email" name="email" placeholder="Enter user email" value="{{ old('email') }}"><br><br>
        <span style="color: red">@error('email'){{ $message }}@enderror</span><br>
        <textarea name="address" rows="5" placeholder="Enter your address">{{ old('address') }}</textarea><br><br>
        <span style="color: red">@error('address'){{ $message }}@enderror</span><br>
        <input type="password" name="password" placeholder="Enter user password" ><br><br>
        <span style="color: red">@error('password'){{ $message }}@enderror</span><br>
        <button type="submit">Add</button>
        
    </form>
</body>
</html>