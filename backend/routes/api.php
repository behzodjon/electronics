<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProductController;
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
Route::get('/google/callback/{token}', [AuthController::class, 'googleRedirect']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}/products', [CategoryController::class, 'show']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/conditions', [ConditionController::class, 'index']);
Route::get('/product/{product}/storages', [ProductStorageController::class, 'index']);
Route::get('/products/{product}/{storage}/{condition}/price', [ProductPriceController::class, 'show']);
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/store', [CartController::class, 'store']);
