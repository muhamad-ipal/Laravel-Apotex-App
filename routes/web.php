<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MedicineController;

// -----------------Globval -----------------
Route::name('medicine.')->prefix('medicine')->group(function () {
  Route::get('/', [MedicineController::class, 'index'])->name('index');
  Route::get('/{slug}', [MedicineController::class, 'show'])->name('show');
});

Route::get('/', [HomePageController::class, 'index'])->name('home');



// -----------------isGuest -----------------
Route::middleware('isGuest')->group(function () {
  Route::post('/register', [AuthController::class, 'register'])->name('register');
  Route::post('/login', [AuthController::class, 'login'])->name('login');
});



// -----------------isLogin -----------------

Route::middleware('isLogin')->group(function () {
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});



// -----------------isAdmin -----------------
Route::middleware('isAdmin')->name('admin.')->group(function () {
  Route::prefix('manage-medicine')->group(function () {
    Route::resource('medicine', MedicineController::class)
      ->only(['store', 'update', 'destroy']);
    Route::get('/', [MedicineController::class, 'manageMedicines'])->name('medicine.index');
    Route::post('medicine/update-stock/{id}', [MedicineController::class, 'updateStock'])
      ->name('medicine.update-stock');
  });
});


