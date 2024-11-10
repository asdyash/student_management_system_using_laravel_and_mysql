<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form, .result, .delete-section {
            margin-top: 20px;
            text-align: center;
        }

        input {
            padding: 10px;
            width: 80%;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        button {
            padding: 10px 20px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background-color: #c0392b;
        }

        .error-message, .success-message {
            font-size: 14px;
            color: red;
        }

        .success-message {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Delete Student</h2>

        <!-- Search Form -->
        <form action="{{ route('searchStudent') }}" method="GET">
            @csrf
            <input type="text" name="search" placeholder="Enter Student ID or Name" required>
            <button type="submit">Search</button>
        </form>

        <!-- Display Student Information if Found -->
        @if(session('student'))
            <div class="result">
                <h3>Student Details</h3>
                <p><strong>Name:</strong> {{ session('student')['name'] }}</p>
                <p><strong>Email:</strong> {{ session('student')['email'] }}</p>
                <p><strong>Age:</strong> {{ session('student')['age'] }}</p>
                <p><strong>Course:</strong> {{ session('student')['course'] }}</p>
                <p><strong>Batch:</strong> {{ session('student')['batch'] }}</p>

                <!-- Delete Confirmation Form -->
                <form action="{{ route('deleteStudent.confirm', ['id' => session('student')['id']]) }}" method="POST" class="delete-section">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this student?')">Delete Student</button>
                </form>
            </div>
        @elseif(session('searchPerformed'))
            <p class="error-message">Student not found. Please try again.</p>
        @endif

        @if(session('message'))
            <p class="success-message">{{ session('message') }}</p>
        @endif
    </div>
</body>
</html>
