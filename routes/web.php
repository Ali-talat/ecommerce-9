<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\About;
use App\Http\Livewire\Admin\Category\AddCategory;
use App\Http\Livewire\Admin\Category\AllCategory;
use App\Http\Livewire\Admin\Category\EditCategory;
use App\Http\Livewire\Admin\Category\UpdateCategory;
use App\Http\Livewire\Admin\Product\AddProduct;
use App\Http\Livewire\Admin\Product\AllProducts;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\HomePage;
use App\Http\Livewire\Shop;
use App\Http\Livewire\Test;
use Illuminate\Routing\RouteGroup;
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
Route::get('about',About::class)->name('about');
Route::get('shop',Shop::class)->name('shop');
Route::get('cart',Cart::class)->name('cart');
Route::get('checkout',Checkout::class)->name('checkout');
// Route::get('test',Test::class)  /*route for just test something*/ ;

// Route::middleware('admin')->group(function () {
    Route::get('/categories', AllCategory::class)->name('categories');
    Route::get('/add', AddCategory::class)->name('add.category');
    Route::get('/edit/{id}', EditCategory::class)->name('edit.category');
    ################

    Route::get('/products', AllProducts::class)->name('products');
    Route::get('/add/products', AddProduct::class)->name('add.products');


    
// });

require __DIR__.'/auth.php';
