<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\ProductPriceController;
use App\Http\Controllers\ProductStorageController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\RestorePasswordController;


Route::get('/test', [TestController::class, 'index']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('send-code', [RestorePasswordController::class, 'sendActivationCode']);
Route::post('set-new-password', [RestorePasswordController::class, 'setNewPassword']);
Route::post('/google/callback', [AuthController::class, 'googleRedirect']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/cart/show', [CartController::class, 'showByUser']);
    Route::post('/address/store', [AddressController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

//categories
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);
Route::put('/categories/{category}/update', [CategoryController::class, 'update']);
Route::delete('/categories/{category}/delete', [CategoryController::class, 'delete']);
Route::get('/categories/{category}/products', [CategoryProductController::class, 'index']);
Route::post('/categories/create', [CategoryController::class, 'store']);

//products
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::post('/products/create', [ProductController::class, 'store']);
Route::delete('/products/{product}/delete', [ProductController::class, 'delete']);
Route::get('/product/{product}/storages', [ProductStorageController::class, 'index']);
Route::get('/products/{product}/{storage}/{condition}/price', [ProductPriceController::class, 'show']);

//conditions
Route::get('/conditions', [ConditionController::class, 'index']);

//storages
Route::get('/storages', [StorageController::class, 'index']);


//cart
Route::get('/cart/{sessionId}', [CartController::class, 'showBySession']);
Route::post('/cart/store', [CartController::class, 'store']);
Route::post('/cartItems/store', [CartItemController::class, 'store']);
Route::post('/cartItems/{cartItem:id}', [CartItemController::class, 'destroy']);
Route::get('/countries', [CountryController::class, 'index']);
