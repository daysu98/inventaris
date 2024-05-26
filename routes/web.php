<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Users
    Route::resource('users', UserController::class)->middleware('role:1');

    // Suppliers
    Route::resource('suppliers', SupplierController::class);

    // Items
    Route::resource('items', ItemController::class);
    Route::patch('items/{item}/publish', [ItemController::class, 'publish'])->name('items.publish');
});

Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'loginView'])->name('loginView');
    Route::post('login', [AuthController::class, 'loginProcess'])->name('loginProcess');
    Route::get('register', [AuthController::class, 'registerView'])->name('registerView');
    Route::post('register', [AuthController::class, 'registerProcess'])->name('registerProcess');
});