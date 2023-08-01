<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\CustomerManager;
use App\Http\Controllers\DeliveryBoyManager;
use App\Http\Controllers\OrderManager;
use App\Http\Controllers\ProductManager;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::any("/users/delivery", [DeliveryBoyManager::class, "getDelivery"]);
Route::any("/users/delivery/success", [DeliveryBoyManager::class, "markStatusSuccess"]);
Route::any("/users/delivery/failed", [DeliveryBoyManager::class, "markStatusFailed"]);

Route::any("/product/list", [ProductManager::class, "getProducts"]);

Route::any("/users/cart/add", [OrderManager::class, "addToCart"]);
Route::any("/users/cart/remove", [OrderManager::class, "removeFromCart"]);
Route::any("/users/cart/list", [OrderManager::class, "getCart"]);
Route::any("/users/cart/confirm", [OrderManager::class, "confirmCart"]);
Route::any("/users/cart/clear", [OrderManager::class, "clearCart"]);
Route::any("/users/orders/list", [OrderManager::class, "getOrders"]);

Route::any("/users/address/update", [CustomerManager::class, "updateAddress"]);
