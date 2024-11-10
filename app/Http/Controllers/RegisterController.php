<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Show the registration form
    public function showRegisterForm()
    {
        return view('register');  // This should correspond to resources/views/register.blade.php
    }

    // Handle registration logic
    public function register(Request $request)
    {
        // Validate the input data
        $request->validate([
            'username' => 'required|unique:admins,username|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create a new admin user
        $admin = new Admin();
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->save();

        // Redirect to login page with a success message
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
}
