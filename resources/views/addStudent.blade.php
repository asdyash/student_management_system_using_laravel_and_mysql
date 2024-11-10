<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #333;
            padding: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            margin: 0 15px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #575757;
        }

        nav form {
            display: inline-block;
        }

        .btn-logout {
            padding: 10px 20px;
            background-color: #ff4d4d;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-logout:hover {
            background-color: #e60000;
        }

        .container {
            max-width: 700px;
            margin: 30px auto;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        input {
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
            margin-bottom: 10px;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #007BFF;
            outline: none;
        }

        button {
            padding: 12px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin: 20px;
            }

            nav a {
                padding: 10px 15px;
            }

            input,
            button {
                font-size: 14px;
            }

            label {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('viewStudents') }}">View Students</a>
        <a href="{{ route('addStudent') }}">Add Student</a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </nav>

    <!-- Add Student Form -->
    <div class="container">
        <h2>Add Student</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('addStudent.submit') }}" method="POST">
            @csrf

            <!-- Student Name -->
            <div class="form-group">
                <input type="text" name="name" placeholder="Student Name" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <!-- Age -->
            <div class="form-group">
                <input type="number" name="age" placeholder="Age" required>
            </div>

            <!-- Course -->
            <div class="form-group">
                <input type="text" name="course" placeholder="Course" required>
            </div>

            <!-- Batch -->
            <div class="form-group">
                <input type="number" name="batch" placeholder="Batch" required>
            </div>

            <!-- Submit Button -->
            <button type="submit">Add Student</button>
        </form>
    </div>

</body>

</html>