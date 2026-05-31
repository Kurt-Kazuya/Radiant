<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Hotel Reservation</title>
</head>
<body>
    <h2>Hotel Reservation System - Login</h2>

    @if($errors->any())
        <p style="color:red;">{{ $errors->first() }}</p>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <br>
    <a href="{{ route('register') }}">Don't have an account? Register</a>
</body>
</html>