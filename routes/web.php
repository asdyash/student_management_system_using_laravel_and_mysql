<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::get('/login', [StudentController::class, 'showLogin'])->name('login');
Route::post('/login', [StudentController::class, 'login'])->name('login.submit');

// Home Route - No Middleware for session check, it's handled in the controller
Route::get('/home', [StudentController::class, 'home'])->name('home');

// Students Pages - No Middleware for session check, it's handled in the controller
Route::get('/students', [StudentController::class, 'viewStudents'])->name('viewStudents');
Route::get('/addStudent', [StudentController::class, 'showAddStudent'])->name('addStudent');
Route::post('/addStudent', [StudentController::class, 'addStudent'])->name('addStudent.submit');
Route::get('/editStudent/{id}', [StudentController::class, 'showEditStudent'])->name('editStudent');
Route::put('/editStudent/{id}', [StudentController::class, 'updateStudent'])->name('updateStudent');
Route::get('/deleteStudent/{id}', [StudentController::class, 'deleteStudent'])->name('deleteStudent');
// Route::get('/delete-student', [StudentController::class, 'searchStudent'])->name('deleteStudent');
// Route::get('/delete-student/search', [StudentController::class, 'searchStudent'])->name('searchStudent');
// Route::delete('/delete-student/{id}', [StudentController::class, 'deleteStudentConfirm'])->name('deleteStudent.confirm');

// Logout Route - Handled directly in the controller
Route::post('/logout', [StudentController::class, 'logout'])->name('logout');

// Registration Route
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');


// // Registration Routes
// Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');