<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\GovmentNNonGovmentCollectionController;
use App\Http\Controllers\Admin\ShopNHouseRentController;
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
  // // Path to the project's root folder
  // echo base_path();
  // echo '<br>';
  // // Path to the 'app' folder
  // echo app_path();
  // echo '<br>';
  // // Path to the 'public' folder
  // echo public_path();
  // echo '<br>';
  // // Path to the 'storage' folder
  // echo storage_path();
  // echo '<br>';
  // // Path to the 'storage/app' folder
  // echo storage_path('app');
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
    Route::get('reset-password/{token}', function () {
      return view('resetPasswordForm');
    })->name('reset.password.get')->middleware('guest');
    Route::get('templete', function () {
      return view('password-template');
    })->name('templete.get')->middleware('guest');
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
    // BANK ROUTE
    Route::get('bank-all', [BankController::class, 'all'])->name('admin.bank.all');
    Route::get('bank-add', [BankController::class, 'create'])->name('admin.bank.create');
    Route::post('bank-add', [BankController::class, 'store'])->name('admin.bank.store');
    Route::get('bank-edit/{id}', [BankController::class, 'edit'])->name('admin.bank.edit');
    Route::post('bank-edit/{id}', [BankController::class, 'update'])->name('admin.bank.update');
    Route::get('bank-delete/{id}', [BankController::class, 'delete'])->name('admin.bank.delete');

    // SHOP & HOUSE RENT ROUTE
    Route::get('snhrent-all', [ShopNHouseRentController::class, 'all'])->name('admin.snhrent.all');
    Route::get('snhrent-add', [ShopNHouseRentController::class, 'create'])->name('admin.snhrent.create');
    Route::post('snhrent-store', [ShopNHouseRentController::class, 'store'])->name('admin.snhrent.store');
    Route::get('snhrent-edit/{id}', [ShopNHouseRentController::class, 'edit'])->name('admin.snhrent.edit');
    Route::get('snhrent-delete/{id}', [ShopNHouseRentController::class, 'delete'])->name('admin.snhrent.delete');
    Route::post('snhrent-update/{id}', [ShopNHouseRentController::class, 'update'])->name('admin.snhrent.update');

    // GOV. NON-GOV ROUTE
    Route::get('gov-nongov-all', [GovmentNNonGovmentCollectionController::class, 'all'])->name('admin.gngc.all');
    Route::get('gov-nongov-add', [GovmentNNonGovmentCollectionController::class, 'create'])->name('admin.gngc.create');
    Route::post('gov-nongov-store', [GovmentNNonGovmentCollectionController::class, 'store'])->name('admin.gngc.store');
    Route::get('gov-nongov-edit/{id}', [GovmentNNonGovmentCollectionController::class, 'edit'])->name('admin.gngc.edit');
    Route::get('gov-nongov-delete/{id}', [GovmentNNonGovmentCollectionController::class, 'delete'])->name('admin.gngc.delete');
    Route::post('gov-nongov-update/{id}', [GovmentNNonGovmentCollectionController::class, 'update'])->name('admin.gngc.update');
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
