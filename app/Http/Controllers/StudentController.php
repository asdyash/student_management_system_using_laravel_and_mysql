<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Student;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    // Show login page
    public function showLogin()
    {
        return view('login');
    }

    // Handle login logic with admins table verification
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        
        // Find the admin by username
        $admin = Admin::where('username', $credentials['username'])->first();
    
        // Verify the password and check if admin exists
        if ($admin && $admin->password === $credentials['password']) {
            // Store user session data
            Session::put('user', $admin->username);
            return redirect()->route('home')->with('success', 'Login successful');
        }
    
        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    // Show home page (only if logged in)
    public function home()
    {
        if (!Session::has('user')) {
            return redirect()->route('login')->with('error', 'Please log in first');
        }
        
        return view('home');
    }

    // Show add student page
    public function showAddStudent()
    {
        if (!Session::has('user')) {
            return redirect()->route('login')->with('error', 'Please log in first');
        }

        return view('addStudent');
    }

    // Store new student
    public function addStudent(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'age' => 'required|integer|min:1',
            'course' => 'required|string|max:255',
            'batch' => 'required|integer|min:1',
        ]);

        // Create a new student record in the database
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'course' => $request->course,
            'batch' => $request->batch,
        ]);

        return redirect()->route('addStudent')->with('success', 'Student added successfully!');
    }

    // Show all students
    public function viewStudents()
    {
        if (!Session::has('user')) {
            return redirect()->route('login')->with('error', 'Please log in first');
        }

        $students = Student::all();
        return view('viewStudent', compact('students'));
    }

    // Show edit student page
    public function showEditStudent($id)
    {
        if (!Session::has('user')) {
            return redirect()->route('login')->with('error', 'Please log in first');
        }

        $student = Student::find($id);
        if (!$student) {
            return redirect()->route('viewStudents');
        }

        return view('editStudent', compact('student'));
    }

    // Update student information
    public function updateStudent(Request $request, $id)
{
    if (!Session::has('user')) {
        return redirect()->route('login')->with('error', 'Please log in first');
    }

    $student = Student::find($id);
    if (!$student) {
        return redirect()->route('viewStudents');
    }

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $id,
        'age' => 'required|integer|min:1',
        'course' => 'required|string|max:255',
        'batch' => 'required|integer|min:1',
    ]);

    $student->update([
        'name' => $request->name,
        'email' => $request->email,
        'age' => $request->age,
        'course' => $request->course,
        'batch' => $request->batch,
    ]);

    return redirect()->route('viewStudents')->with('success', 'Student updated successfully');
}


    // Delete student
    public function deleteStudent($id)
{
    $student = Student::find($id);
    if (!$student) {
        return redirect()->route('viewStudents')->with('error', 'Student not found');
    }

    $student->delete();

    return redirect()->route('viewStudents')->with('success', 'Student deleted successfully');
}


    // Handle logout
    public function logout()
    {
        Session::flush();
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }

    // // Search for student by ID or name
    // public function searchStudent(Request $request)
    // {
    //     $search = $request->input('search');

    //     // Search by ID or name
    //     $student = Student::where('id', $search)
    //                 ->orWhere('name', 'like', '%' . $search . '%')
    //                 ->first();

    //     if ($student) {
    //         // Store student data as array in session
    //         Session::flash('student', $student->toArray());
    //         Session::flash('searchPerformed', true);
    //     } else {
    //         Session::flash('searchPerformed', true);
    //         Session::flash('message', 'Student not found.');
    //     }

    //     return redirect()->route('deleteStudent');
    // }

    // // Confirm and delete searched student
    // public function deleteStudentConfirm($id)
    // {
    //     $student = Student::find($id);

    //     if ($student) {
    //         $student->delete();
    //         return redirect()->route('deleteStudent')->with('message', 'Student deleted successfully.');
    //     }

    //     return redirect()->route('deleteStudent')->with('message', 'Student could not be deleted.');
    // }
}
