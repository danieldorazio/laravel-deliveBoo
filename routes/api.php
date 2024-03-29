<?php

use App\Http\Controllers\Api\BraintreeController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\MealController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/restaurant/show/{id}', [RestaurantController::class, 'show']);
Route::get('/meals/{id}', [MealController::class, 'index']);

Route::get('/braintree/token', [BraintreeController::class, 'generateToken']);

Route::post('/order', [OrderController::class, 'store']);