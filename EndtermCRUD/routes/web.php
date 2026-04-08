<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

// resources/routes/web.php

Route::get('/', function () {
    return view('login');
}); // Redirect root to login

Route::view('/login', 'login')->name('login');
Route::view('/register', 'register');

Route::post('/register-student', [StudentController::class, 'register']);
Route::post('/login-student', [StudentController::class, 'login']);

// Protected Profile Routes
Route::get('/profile', [StudentController::class, 'showProfile'])->name('profile');
Route::get('/profile/edit', [StudentController::class, 'editProfile'])->name('profile.edit');
Route::post('/update-student', [StudentController::class, 'update']);
Route::post('/logout-student', [StudentController::class, 'logout']);
