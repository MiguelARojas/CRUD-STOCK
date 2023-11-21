<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\productsController;


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
Route::view('/addProduct', 'addProduct')->name('addProduct');

Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/products/{product}', [productsController::class, 'show'])->name('products.show');
Route::get('/home', [productsController::class, 'create'])->name('home');
Route::post('/products', [productsController::class, 'store'])->name('products.store');
Route::get('/products/modify/{product}', [productsController::class, 'modify'])->name('products.modify');
Route::post('/products/modify', [productsController::class, 'update'])->name('products.update');
Route::post('/products/disable', [productsController::class, 'destroy'])->name('products.destroy');
