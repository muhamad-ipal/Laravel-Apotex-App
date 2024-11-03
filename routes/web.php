<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MedicineController;

// -----------------Global -----------------
Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::name('medicine.')->prefix('medicine')->group(function () {
  Route::get('/', [MedicineController::class, 'index'])->name('index');
  Route::get('/{slug}', [MedicineController::class, 'show'])->name('show');
});



// -----------------isGuest -----------------
Route::middleware('isGuest')->group(function () {
  Route::post('/register', [AuthController::class, 'register'])->name('register');
  Route::post('/login', [AuthController::class, 'login'])->name('login');
});



// -----------------isLogin -----------------
Route::middleware('isLogin')->group(function () {
  // cart
  Route::resource('cart', CartController::class)->only(['index', 'store', 'destroy']);
  Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
  // logout
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});



// -----------------isAdmin -----------------
Route::middleware('isAdmin')->name('admin.')->group(function () {
  //  user
  Route::resource('user', UserController::class)->except(['edit', 'show', 'create']);

  // prefix medicine
  Route::prefix('manage-medicine')->group(function () {
    Route::resource('medicine', MedicineController::class)
      ->only(['store', 'update', 'destroy']);
    Route::get('/', [MedicineController::class, 'manageMedicines'])->name('medicine.index');
    Route::post('medicine/update-stock/{id}', [MedicineController::class, 'updateStock'])
      ->name('medicine.update-stock');
  });
});


// ----------------- isCashier -----------------
Route::middleware('isCashier')->name('cashier.')->group(function () {
  Route::resource('order', OrderController::class)->only(['index', 'update', 'create', 'store', 'destroy']);
  Route::get('/order/struk/{id}', [OrderController::class, 'struk'])->name('order.struk');
});
