<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderManager;
use App\Http\Controllers\ProductManager;
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

Route::get('/dashboard', function () {
    Route::get('dashboard', [OrderManager::class,"newOrders"])->name('dashboard');
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('products', [ProductManager::class, "listProducts"])->name("products");
    Route::post('products', [ProductManager::class, "addProducts"])->name("product.add");
    Route::get('product/delete', [ProductManager::class, "deleteProducts"])->name("product.delete");
    Route::get('orders', [OrderManager::class, 'listOrders'])->name('orders');
    Route::get('order/list', [OrderManager::class, 'listOrders'])->name('orders');
});

require __DIR__.'/auth.php';
