<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Show Registration Form
    public function showRegisterForm()
    {
        return view('register'); // Return the registration view
    }

    // Handle Registration
    public function register(Request $request)
{
    // Validate the input data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:admins,email',
        'mobilenumber' => 'required|numeric',
        'age' => 'required|integer',
        'username' => 'required|unique:admins,username',
        'password' => 'required|min:6|confirmed', // password confirmation validation
    ]);

    // Create a new Admin user
    $admin = new Admin();
    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->mobilenumber = $request->mobilenumber;
    $admin->age = $request->age;
    $admin->username = $request->username;
    $admin->password = $request->password; // Store password as plain text (not hashed)
    $admin->save();

    // Redirect to login with success message
    return redirect()->route('login')->with('success', 'Registration successful! You can now log in.');
}


    // Handle Login (Uncommented the login method)
    public function login(Request $request)
    {
        // Validate the login data
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        // Find the admin by username
        $admin = Admin::where('username', $request->username)->first();
    
        // Check if admin exists and password matches (no hashing)
        if ($admin && $admin->password === $request->password) {
            // Store user session data
            Session::put('user', $admin->username);
            return redirect()->route('home')->with('success', 'Login successful');
        }
    
        // If credentials don't match, show error
        return back()->with('error', 'Invalid username or password');
    }
    

    // Handle Logout (Uncommented the logout method)
    public function logout(Request $request)
    {
        // Flush the session to log out
        Session::flush();
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
