<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientProductController;
use App\Http\Controllers\ClientSaleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaleController;
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

// All routes untuk client side
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/tentang-kami', [LandingController::class, 'about'])->name('about');

Route::get('/products', [ClientProductController::class, 'index'])->name('client.product.index');
Route::get('/products/{product}', [ClientProductController::class, 'show'])->name('client.product.show');


Route::get('keranjang-saya/', [ClientSaleController::class, 'cart'])->name('client.product.cart');
Route::post('keranjang-saya/{product}', [ClientSaleController::class, 'addToCart'])->name('client.product.add_to_cart');
Route::delete('keranjang-saya/{cart}/destroy', [ClientSaleController::class, 'destroy'])->name('client.product.destroy');
Route::post('/checkout', [ClientSaleController::class, 'checkout'])->name('client.checkout');
Route::get('/checkout', [ClientSaleController::class, 'pembayaran'])->name('client.checkout.pembayaran');

Auth::routes();

// All routes untuk dashboard admin
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::controller(ProfileController::class)->group(function(){
    Route::get('/dashboard/profiles', 'index')->name('profiles.index');
    Route::get('/dashboard/profiles/{profile}/edit', 'edit')->name('profiles.edit');
    Route::put('/dashboard/profiles/{profile}', 'update')->name('profiles.update');
})->middleware('auth');

Route::controller(CategoryController::class)->group(function(){
    Route::get('/dashboard/categories', 'index')->name('categories.index');
    Route::get('/dashboard/categories/create', 'create')->name('categories.create');
    Route::post('/dashboard/categories/store', 'store')->name('categories.store');
    Route::get('/dashboard/categories/{category}/edit', 'edit')->name('categories.edit');
    Route::put('/dashboard/categories/{category}', 'update')->name('categories.update');
    Route::delete('/dashboard/categories/{category}/destroy', 'destroy')->name('categories.destroy');
})->middleware('admin');

Route::controller(ProductController::class)->group(function(){
    Route::get('/dashboard/products', 'index')->name('products.index');
    Route::get('/dashboard/products/create', 'create')->name('products.create');
    Route::post('/dashboard/products/store', 'store')->name('products.store');
    Route::get('/dashboard/products/{product}/edit', 'edit')->name('products.edit');
    Route::put('/dashboard/products/{product}', 'update')->name('products.update');
    Route::delete('/dashboard/products/{product}/destroy', 'destroy')->name('products.destroy');
})->middleware('auth');

Route::controller(DiscountController::class)->group(function(){
    Route::get('dashboard/discounts', 'index')->name('discounts.index');
    Route::get('dashboard/discounts/create', 'create')->name('discounts.create');
    Route::post('dashboard/discounts/store', 'store')->name('discounts.store');
    Route::get('/dashboard/discounts/{discount}/edit', 'edit')->name('discounts.edit');
    Route::put('/dashboard/discounts/{discount}', 'update')->name('discounts.update');
    Route::delete('/dashboard/discounts/{discount}/destroy', 'destroy')->name('discounts.destroy');
});

Route::controller(SaleController::class)->group(function(){
    Route::get('/dashboard/sales', 'index')->name('sales.index');
    Route::get('/dashboard/sales/{sale}/edit', 'edit')->name('sales.edit');
    Route::put('/dashboard/sales/{sale}', 'update')->name('sales.update');
});

Route::controller(PaymentController::class)->group(function(){
    Route::get('/dashboard/payments', 'index')->name('payments.index');
    Route::get('dashboard/payments/create', 'create')->name('payments.create');
    Route::post('dashboard/payments/store', 'store')->name('payments.store');
    Route::get('/dashboard/payments/{payment}/edit', 'edit')->name('payments.edit');
    Route::put('/dashboard/payments/{payment}', 'update')->name('payments.update');
    Route::delete('/dashboard/payments/{payment}/destroy', 'destroy')->name('payments.destroy');
})->middleware('admin');

Route::controller(ContactController::class)->group(function(){
    Route::get('/dashboard/contacts', 'index')->name('contacts.index');
    Route::get('dashboard/contacts/create', 'create')->name('contacts.create');
    Route::post('dashboard/contacts/store', 'store')->name('contacts.store');
    Route::get('/dashboard/contacts/{contact}/edit', 'edit')->name('contacts.edit');
    Route::put('/dashboard/contacts/{contact}', 'update')->name('contacts.update');
    Route::delete('/dashboard/contacts/{contact}/destroy', 'destroy')->name('contacts.destroy');
})->middleware('admin');

Route::controller(DeliveryController::class)->group(function(){
    Route::get('/dashboard/deliveries', 'index')->name('deliveries.index');
    Route::get('dashboard/deliveries/create', 'create')->name('deliveries.create');
    Route::post('dashboard/deliveries/store', 'store')->name('deliveries.store');
    Route::get('/dashboard/deliveries/{delivery}/edit', 'edit')->name('deliveries.edit');
    Route::put('/dashboard/deliveries/{delivery}', 'update')->name('deliveries.update');
    Route::delete('/dashboard/deliveries/{delivery}/destroy', 'destroy')->name('deliveries.destroy');
})->middleware('admin');