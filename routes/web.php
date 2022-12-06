<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SalaryController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\CollectionController;
use App\Http\Controllers\Admin\SalaryCategoryController;
use App\Http\Controllers\Admin\ShopNHouseRentController;
use App\Http\Controllers\Admin\MiscellaneousCostCategoiesController;
use App\Http\Controllers\Admin\GovmentNNonGovmentCollectionController;
use App\Http\Controllers\Admin\MiscellaneousCostController;

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
    Route::get('bank-edit/{id}', [BankController::class, 'edit'])->name('admin.bank.edit');
    Route::get('bank-delete/{id}', [BankController::class, 'delete'])->name('admin.bank.delete');
    Route::post('bank-add', [BankController::class, 'store'])->name('admin.bank.store');
    Route::post('bank-edit/{id}', [BankController::class, 'update'])->name('admin.bank.update');

    // COLLECTION ROUTE
    Route::get('collection-all-debit', [CollectionController::class, 'indexDebit'])->name('admin.collection.all.debit');
    Route::get('collection-all-credit', [CollectionController::class, 'indexCredit'])->name('admin.collection.all.credit');
    Route::get('collection-add/{id}', [CollectionController::class, 'create'])->name('admin.collection.create');
    Route::post('collection-store', [CollectionController::class, 'store'])->name('admin.collection.store');
    Route::post('collection-update/{id}', [CollectionController::class, 'update'])->name('admin.collection.update');
    Route::get('collection-edit/{id}/{cost_status}', [CollectionController::class, 'edit'])->name('admin.collection.edit');
    Route::get('collection-delete/{id}/{cost_status}', [CollectionController::class, 'delete'])->name('admin.collection.delete');

    // DONATION ROUTE
    Route::get('donation-all-debit', [DonationController::class, 'indexDebit'])->name('admin.donation.all.debit');
    Route::get('donation-all-credit', [DonationController::class, 'indexCredit'])->name('admin.donation.all.credit');
    Route::get('donation-add/{id}', [DonationController::class, 'create'])->name('admin.donation.create');
    Route::post('donation-store', [DonationController::class, 'store'])->name('admin.donation.store');
    Route::post('donation-update/{id}', [DonationController::class, 'update'])->name('admin.donation.update');
    Route::get('donation-edit/{id}/{cost_status}', [DonationController::class, 'edit'])->name('admin.donation.edit');
    Route::get('donation-delete/{id}/{cost_status}', [DonationController::class, 'delete'])->name('admin.donation.delete');

    // SHOP & HOUSE RENT ROUTE
    Route::get('snhrent-all-debit', [ShopNHouseRentController::class, 'indexDebit'])->name('admin.snhrent.all.debit');
    Route::get('snhrent-all-credit', [ShopNHouseRentController::class, 'indexCredit'])->name('admin.snhrent.all.credit');
    Route::get('snhrent-add/{id}', [ShopNHouseRentController::class, 'create'])->name('admin.snhrent.create');
    Route::post('snhrent-store', [ShopNHouseRentController::class, 'store'])->name('admin.snhrent.store');
    Route::post('snhrent-update/{id}', [ShopNHouseRentController::class, 'update'])->name('admin.snhrent.update');
    Route::get('snhrent-edit/{id}/{cost_status}', [ShopNHouseRentController::class, 'edit'])->name('admin.snhrent.edit');
    Route::get('snhrent-delete/{id}/{cost_status}', [ShopNHouseRentController::class, 'delete'])->name('admin.snhrent.delete');

    // GOV. NON-GOV ROUTE
    Route::get('gov-nongov-all', [GovmentNNonGovmentCollectionController::class, 'all'])->name('admin.gngc.all');
    Route::get('gov-nongov-add', [GovmentNNonGovmentCollectionController::class, 'create'])->name('admin.gngc.create');
    Route::get('gov-nongov-edit/{id}', [GovmentNNonGovmentCollectionController::class, 'edit'])->name('admin.gngc.edit');
    Route::get('gov-nongov-delete/{id}', [GovmentNNonGovmentCollectionController::class, 'delete'])->name('admin.gngc.delete');
    Route::post('gov-nongov-store', [GovmentNNonGovmentCollectionController::class, 'store'])->name('admin.gngc.store');
    Route::post('gov-nongov-update/{id}', [GovmentNNonGovmentCollectionController::class, 'update'])->name('admin.gngc.update');

    // SALARY CATEGORY ROUTE
    Route::get('salary-cat-all', [SalaryCategoryController::class, 'all'])->name('admin.salcat.all');
    Route::get('salary-cat-add', [SalaryCategoryController::class, 'create'])->name('admin.salcat.create');
    Route::get('salary-cat-edit/{id}', [SalaryCategoryController::class, 'edit'])->name('admin.salcat.edit');
    Route::get('salary-cat-delete/{id}', [SalaryCategoryController::class, 'delete'])->name('admin.salcat.delete');
    Route::post('salary-cat-store', [SalaryCategoryController::class, 'store'])->name('admin.salcat.store');
    Route::post('salary-cat-update/{id}', [SalaryCategoryController::class, 'update'])->name('admin.salcat.update');

    // SALARY ROUTE
    Route::get('salary-all-debit', [SalaryController::class, 'indexDebit'])->name('admin.salary.all.debit');
    Route::get('salary-all-credit', [SalaryController::class, 'indexCredit'])->name('admin.salary.all.credit');
    Route::get('salary-add/{id}', [SalaryController::class, 'create'])->name('admin.salary.create');
    Route::post('salary-store', [SalaryController::class, 'store'])->name('admin.salary.store');
    Route::post('salary-update/{id}', [SalaryController::class, 'update'])->name('admin.salary.update');
    Route::get('salary-edit/{id}/{cost_status}', [SalaryController::class, 'edit'])->name('admin.salary.edit');
    Route::get('salary-delete/{id}/{cost_status}', [SalaryController::class, 'delete'])->name('admin.salary.delete');

    // MISCELLANEOUS COSTS CATEGORY ROUTE
    Route::get('miscost-cat-all', [MiscellaneousCostCategoiesController::class, 'all'])->name('admin.miscat.all');
    Route::get('miscost-cat-add', [MiscellaneousCostCategoiesController::class, 'create'])->name('admin.miscat.create');
    Route::get('miscost-cat-edit/{id}', [MiscellaneousCostCategoiesController::class, 'edit'])->name('admin.miscat.edit');
    Route::get('miscost-cat-delete/{id}', [MiscellaneousCostCategoiesController::class, 'delete'])->name('admin.miscat.delete');
    Route::post('miscost-cat-store', [MiscellaneousCostCategoiesController::class, 'store'])->name('admin.miscat.store');
    Route::post('miscost-cat-update/{id}', [MiscellaneousCostCategoiesController::class, 'update'])->name('admin.miscat.update');

    // MISCELLANEOUS COSTS ROUTE
    Route::get('miscost-all-debit', [MiscellaneousCostController::class, 'indexDebit'])->name('admin.miscost.all.debit');
    Route::get('miscost-all-owbm', [MiscellaneousCostController::class, 'indexOwbm'])->name('admin.miscost.all.owbm');
    Route::get('miscost-all-bill', [MiscellaneousCostController::class, 'indexBill'])->name('admin.miscost.all.bill');
    Route::get('miscost-all-debtpay', [MiscellaneousCostController::class, 'indexDebtpay'])->name('admin.miscost.all.debtpay');
    Route::get('miscost-add/{id}', [MiscellaneousCostController::class, 'create'])->name('admin.miscost.create');
    Route::post('miscost-store', [MiscellaneousCostController::class, 'store'])->name('admin.miscost.store');
    Route::post('miscost-update/{id}', [MiscellaneousCostController::class, 'update'])->name('admin.miscost.update');
    Route::get('miscost-edit/{id}/{cost_status}', [MiscellaneousCostController::class, 'edit'])->name('admin.miscost.edit');
    Route::get('miscost-delete/{id}/{cost_status}', [MiscellaneousCostController::class, 'delete'])->name('admin.miscost.delete');
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


Route::get('/home',function () {
  return redirect(route('admin.dashboard'));
})->name('home');
