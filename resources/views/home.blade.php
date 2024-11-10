<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
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
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            margin: 0 10px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #575757;
        }

        nav .btn-logout {
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        nav .btn-logout:hover {
            background-color: #c0392b;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .content {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }

        .content p {
            font-size: 16px;
            color: #555;
        }

        .features, .stats, .recent-updates {
            margin-top: 30px;
        }

        .features ul, .stats ul, .recent-updates ul {
            list-style: none;
            padding: 0;
            text-align: left;
        }

        .features ul li, .stats ul li, .recent-updates ul li {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .features h3, .stats h3, .recent-updates h3 {
            color: #007BFF;
        }
    </style>
</head>
<body>

    <nav>
        <div>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('viewStudents') }}">View Students</a>
            <a href="{{ route('addStudent') }}">Add Student</a>
            <a href="{{ route('editStudent', ['id' => 1]) }}">Update Student</a> <!-- Replace 1 with the actual student ID when needed -->
            <!-- <a href="{{ route('deleteStudent', ['id' => 1]) }}">Delete Student</a> Replace 1 with the actual student ID when needed -->
        </div>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </nav>
    
    <div class="container">
        <h2>Welcome to the Student Management System</h2>
        <div class="content">
            <p>Manage student data with ease. View and update student details, add new students, and ensure your records are always up-to-date.</p>
        </div>

        <div class="features">
            <h3>Features</h3>
            <ul>
                <li>Easy addition and deletion of student records</li>
                <li>Simple and quick student information updates</li>
                <li>Customizable data fields for detailed student profiles</li>
                <li>Secure login and logout functionality</li>
                <li>Efficient navigation with dedicated links for each action</li>
            </ul>
        </div>

        <div class="stats">
            <h3>System Statistics</h3>
            <ul>
                <li>Total Students: <strong>{{ $totalStudents ?? 'N/A' }}</strong></li>
                <li>Recent Additions: <strong>{{ $recentAdditions ?? 'N/A' }}</strong></li>
                <li>Average Age of Students: <strong>{{ $averageAge ?? 'N/A' }} years</strong></li>
                <li>Most Popular Course: <strong>{{ $popularCourse ?? 'N/A' }}</strong></li>
            </ul>
        </div>

        <div class="recent-updates">
            <h3>Recent Updates</h3>
            <ul>
                <li>New student registrations</li>
                <li>Updated student records</li>
                <li>Data cleanup and duplicate removal</li>
                <li>Enhanced security features for safer access</li>
            </ul>
        </div>
    </div>

</body>
</html>
