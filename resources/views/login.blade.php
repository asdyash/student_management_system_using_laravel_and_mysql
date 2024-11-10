<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Container for the Login Form */
        .login-container {
            width: 360px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        /* Error Message */
        .error-message {
            color: #ff4136;
            font-size: 14px;
            margin-bottom: 15px;
            text-align: left;
            padding: 5px;
            background-color: #f8d7da;
            border-radius: 5px;
            display: none;
        }

        /* Form Input Styling */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007BFF;
            outline: none;
        }

        /* Login Button Styling */
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Registration Link */
        .register-link {
            color: #007BFF;
            font-size: 14px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .register-link:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        
        <!-- Error Message Display -->
        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif
        
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
        
        <p>Don’t have an account? <a href="{{ route('register') }}" class="register-link">Register New User</a></p>
    </div>
</body>
</html>
