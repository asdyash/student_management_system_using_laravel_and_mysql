<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #333;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

        .alert {
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
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

        label {
            font-size: 16px;
            color: #555;
            margin-bottom: 5px;
        }

        input {
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
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
          /* Logout Button Styles */
          .btn-logout {
            padding: 8px 15px;
            color: white;
            background-color: #FF5733;
            /* A distinct color for logout */
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-logout:hover {
            background-color: #C0392B;
            /* Darker shade for hover */
            transform: scale(1.05);
            /* Slightly enlarge on hover for effect */
        }

        .btn-logout:focus {
            outline: none;
            /* Remove the default focus outline */
            box-shadow: 0 0 0 2px rgba(255, 87, 51, 0.5);
            /* Custom outline for focus state */
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
        <a href="{{ route('editStudent', ['id' => $student->id]) }}">Update Student</a>
        <a href="{{ route('deleteStudent', ['id' => $student->id]) }}">Delete Student</a>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </nav>

    <!-- Edit Student Form -->
    <div class="container">
        <h2>Edit Student</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('updateStudent', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Student Name -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $student->name }}" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ $student->email }}" required>
            </div>

            <!-- Age -->
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" value="{{ $student->age }}" required>
            </div>

            <!-- Course -->
            <div class="form-group">
                <label for="course">Course</label>
                <input type="text" id="course" name="course" value="{{ $student->course }}" required>
            </div>

            <!-- Batch -->
            <div class="form-group">
                <label for="batch">Batch</label>
                <input type="number" id="batch" name="batch" value="{{ $student->batch }}" required>
            </div>

            <!-- Submit Button -->
            <button type="submit">Update Student</button>
        </form>
    </div>

</body>

</html>