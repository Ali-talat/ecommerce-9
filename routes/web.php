<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\About;
use App\Http\Livewire\Admin\AdminLogin;
use App\Http\Livewire\Admin\AdminRegister;
use App\Http\Livewire\Admin\Category\AddCategory;
use App\Http\Livewire\Admin\Category\AllCategory;
use App\Http\Livewire\Admin\Category\EditCategory;
use App\Http\Livewire\Admin\Category\UpdateCategory;
use App\Http\Livewire\Admin\Product\AddProduct;
use App\Http\Livewire\Admin\Product\AllProducts;
use App\Http\Livewire\Admin\Product\EditProduct;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\HomePage;
use App\Http\Livewire\Shop;
use App\Http\Livewire\Test;
use App\Http\Livewire\Wishlist;
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

Route::get('admin/register',AdminRegister::class)->name('admin.register');
Route::get('admin/login',AdminLogin::class)->name('admin.login');
Route::get('home',HomePage::class)->name('home');
Route::get('about',About::class)->name('about');
Route::get('shop',Shop::class)->name('shop');
Route::get('cart',Cart::class)->name('cart');
Route::get('checkout',Checkout::class)->name('checkout');
Route::get('wishlists',Wishlist::class)->name('wishlists');
// Route::get('test',Test::class)  /*route for just test something*/ ;

Route::middleware('admin')->group(function () {
    Route::get('/categories', AllCategory::class)->name('categories');
    Route::get('/add', AddCategory::class)->name('add.category');
    Route::get('/edit/{id}', EditCategory::class)->name('edit.category');
    ################

    Route::get('/products', AllProducts::class)->name('products');
    Route::get('/add/product', AddProduct::class)->name('add.product');
    Route::get('/edit/product/{id}', EditProduct::class)->name('edit.product');



    
});

require __DIR__.'/auth.php';
