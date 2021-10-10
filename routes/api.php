<?php

use App\Http\Controllers\useContrller;
use App\Http\Controllers\productController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [useContrller::class, 'register']);
Route::post('login', [useContrller::class, 'Login']);
Route::post('addproduct', [productController::class, 'AddProduct']);
Route::get('productlist', [productController::class, 'List']);
Route::delete('delete/{id}', [productController::class, 'Delete']);
Route::get('singleproduct/{id}', [productController::class, 'singleProduct']);
Route::put('updateproduct/{id}', [productController::class, 'ProductUpdate']);
Route::get('search/{key}', [productController::class, 'Search']);