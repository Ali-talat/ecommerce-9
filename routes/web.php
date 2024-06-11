<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\HomePage;
use App\Http\Livewire\Shop;
use App\Http\Livewire\Test;
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





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/',HomePage::class)->name('home');
Route::get('shop',Shop::class)->name('shop');
Route::get('cart',Cart::class)->name('cart');
Route::get('checkout',Checkout::class)->name('checkout');
// Route::get('test',Test::class)  /*route for just test something*/ ;

require __DIR__.'/auth.php';
