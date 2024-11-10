<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            width: calc(100% - 20px); /* Adds 20px space on the right */
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            text-align: center;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>

        @if(session('error'))
            <p class="error-message">{{ session('error') }}</p>
        @endif

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf

            <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
            @error('name')<p class="error-message">{{ $message }}</p>@enderror

            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            @error('email')<p class="error-message">{{ $message }}</p>@enderror

            <input type="text" name="mobilenumber" placeholder="Mobile Number" value="{{ old('mobilenumber') }}" required>
            @error('mobilenumber')<p class="error-message">{{ $message }}</p>@enderror

            <input type="number" name="age" placeholder="Age" value="{{ old('age') }}" required>
            @error('age')<p class="error-message">{{ $message }}</p>@enderror

            <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
            @error('username')<p class="error-message">{{ $message }}</p>@enderror

            <input type="password" name="password" placeholder="Password" required>
            @error('password')<p class="error-message">{{ $message }}</p>@enderror

            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            @error('password_confirmation')<p class="error-message">{{ $message }}</p>@enderror

            <button type="submit">Register</button>
        </form>

        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
    </div>
</body>
</html>
