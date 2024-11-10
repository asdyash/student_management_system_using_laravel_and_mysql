<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        /* Navigation Bar */
        nav {
            background-color: #333;
            padding: 15px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            font-size: 16px;
        }

        nav a:hover {
            background-color: #575757;
        }

        /* Main Content */
        .container {
            max-width: 1000px;
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

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: white;
        }

        /* Button Styles */
        .btn {
            padding: 8px 15px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-edit {
            background-color: #007BFF;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #FF4136;
        }

        .btn-delete:hover {
            background-color: #c0392b;
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


        /* Notification Styles */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert-close {
            background: none;
            border: none;
            font-size: 18px;
            color: inherit;
            cursor: pointer;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            nav {
                padding: 10px;
            }

            nav a {
                padding: 8px 15px;
                font-size: 14px;
            }

            table {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('viewStudents') }}">View Students</a>
        <a href="{{ route('addStudent') }}">Add Student</a>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
    </nav>

    <div class="container">
        <!-- Display Notifications -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <button class="alert-close" onclick="this.parentElement.style.display='none'">&times;</button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
                <button class="alert-close" onclick="this.parentElement.style.display='none'">&times;</button>
            </div>
        @endif

        <h2>Students</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Course</th>
                    <th>Batch</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->course }}</td>
                        <td>{{ $student->batch }}</td>
                        <td>
                            <a href="{{ route('editStudent', $student->id) }}" class="btn btn-edit">Edit</a>
                            <a href="{{ route('deleteStudent', $student->id) }}" class="btn btn-delete">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>