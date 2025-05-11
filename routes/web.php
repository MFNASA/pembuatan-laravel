<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\HomepageController; 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\categoriesController;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', [HomepageController::class, 'index'])->name("home");

Route::get('/product', [HomepageController::class, 'products']);

// Route::get('/', [HomepageController::class, 'index']); 
Route::get('products', [HomepageController::class, 'products']); 
Route::get('product/{slug}', [HomepageController::class, 'product']); 
Route::get('categories',[HomepageController::class, 'categories']); 
Route::get('category/{slug}', [HomepageController::class, 'category']); 
Route::get('cart', [HomepageController::class, 'cart']); 
Route::get('checkout', [HomepageController::class, 'checkout']); 



Route::get('/products', function(){
    return view('web.produk');
    });

    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->middleware(['auth']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth']);

    Route::middleware(['auth'])->group(function () {
    Route::get('/categories', [categoriesController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [categoriesController::class, 'create'])->name('categories.create');
    Route::post('/categories', [categoriesController::class, 'store'])->name('categories.store');
});


Route::group(['prefix'=>'dashboard'], function(){ 
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('categories', ProductCategoryController::class)->names('categories'); 
    Route::resource('products',ProductController::class);
})->middleware(['auth', 'verified']); 

Route::group(['prefix'=>'dashboard'],function(){
    Route::resource('posts', PostsController::class);
})->middleware(['auth', 'verified']);

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
