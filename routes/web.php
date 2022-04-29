<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::middleware(
    ['middleware' => 'preventBackHistroy']
)->group(
    function () {
        // Auth::routes();
        Route::get('login', [LoginController::class, 'loginForm'])->name('login')->middleware('guest');
        Route::post('login', [LoginController::class, 'login'])->name('login.attempt')->middleware('guest');
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('forget-password', [LoginController::class, 'showForgetPasswordForm'])->name('forget.password.get')->middleware('guest');
        Route::post('forget-password', [LoginController::class, 'submitForgetPasswordForm'])->name('forget.password.post')->middleware('guest');
        Route::get('reset-password', function () {
            return view('resetPasswordForm');
        })->name('reset.password.get')->middleware('guest');
    }
);

// admin route
Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ['isAdmin', 'auth', 'preventBackHistroy']
    ],
    function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    }
);

// user route
Route::group(
    [
        'prefix' => 'user',
        'middleware' => ['isUser', 'auth', 'preventBackHistroy']
    ],
    function () {
        Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    }
);


Route::get('/home', [HomeController::class, 'index'])->name('home');
