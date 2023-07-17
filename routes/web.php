<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\FormateurController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('formateur')->group(function () {
    Route::get('/', [FormateurController::class, 'index']);
    Route::get('/register-formateur', [FormateurController::class, 'registerForm'])->name('register-formater-form');
    // Route::post('/register-formateur', [FormateurController::class, 'register'])->name('register-formater');
    // Define more routes here
});
Auth::routes();

Route::get('/home/note/{user}', [App\Http\Controllers\HomeController::class, 'note'])->name('student-notes');
Route::put('/home/note/{user}', [App\Http\Controllers\HomeController::class, 'update'])->name('update-notes');
Route::get('/home/notes', [App\Http\Controllers\HomeController::class, 'getNotes'])->name('my-notes');
Route::get('/home/absence', [App\Http\Controllers\HomeController::class, 'absence'])->name('absence');
Route::post('/home/absence/{user}', [App\Http\Controllers\HomeController::class, 'assignAbsence'])->name('absent');

Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('student-search');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::middleware('auth:student')->group(function () {
//     // Protected routes for authenticated students

//     // Route::get('/dashboard', [DashboardController::class, 'index'])->name('student.dashboard');
// });


// Route::get('/student/login', [StudentController::class, 'showLoginForm'])->name('student.login');
// Route::post('/student/login', [StudentController::class, 'login'])->name('student.login.submit');
// Route::post('/student/logout', [StudentController::class, 'logout'])->name('student.logout');

// Route::get('/student/register', [StudentAuthController::class, 'showRegistrationForm'])->name('student.register');
// Route::post('/student/register', [StudentAuthController::class, 'register'])->name('student.register.submit');
