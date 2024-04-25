<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::controller(ProfileController::class)->group(function(){
    Route::get('/dashboard/profiles', 'index')->name('profiles.index');
    Route::get('/dashboard/profiles/{profile}/edit', 'edit')->name('profiles.edit');
    Route::put('/dashboard/profiles/{profile}', 'update')->name('profiles.update');
});

Route::controller(CategoryController::class)->group(function(){
    Route::get('/dashboard/categories', 'index')->name('categories.index');
    Route::get('/dashboard/categories/create', 'create')->name('categories.create');
    Route::post('/dashboard/categories/store', 'store')->name('categories.store');
    Route::get('/dashboard/categories/{category}/edit', 'edit')->name('categories.edit');
    Route::put('/dashboard/categories/{category}', 'update')->name('categories.update');
    Route::delete('/dashboard/categories/{category}/destroy', 'destroy')->name('categories.destroy');
});

Route::controller(ProductController::class)->group(function(){
    Route::get('/dashboard/products', 'index')->name('products.index');
    Route::get('/dashboard/products/create', 'create')->name('products.create');
    Route::post('/dashboard/products/store', 'store')->name('products.store');
    Route::get('/dashboard/products/{product}/edit', 'edit')->name('products.edit');
    Route::put('/dashboard/products/{product}', 'update')->name('products.update');
    Route::delete('/dashboard/products/{product}/destroy', 'destroy')->name('products.destroy');
});