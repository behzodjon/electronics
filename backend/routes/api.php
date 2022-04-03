<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\ProductPriceController;
use App\Http\Controllers\ProductStorageController;
use App\Http\Controllers\RestorePasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

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
    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}/products', [CategoryController::class, 'show']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/conditions', [ConditionController::class, 'index']);
Route::get('/product/{product}/storages', [ProductStorageController::class, 'index']);
Route::get('/products/{product}/{storage}/{condition}/price', [ProductPriceController::class, 'show']);
Route::get('/cart/{sessionId}', [CartController::class, 'showBySession']);
Route::post('/cart/store', [CartController::class, 'store']);
Route::post('/cartItems/store', [CartItemController::class, 'store']);
Route::post('/cartItems/{cartItem:id}', [CartItemController::class, 'destroy']);
Route::get('/countries', [CountryController::class, 'index']);
