<?php

use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/add-to-cart', 'App\Http\Controllers\CartController@addToCart');
Route::post('/update-qty-cart', 'App\Http\Controllers\CartController@updateQtyCart');
Route::post('/count-qty-cart', 'App\Http\Controllers\CartController@countItemCart');


Route::post('/checkout', 'App\Http\Controllers\CartController@checkoutorder');


Route::post('/my-order', 'App\Http\Controllers\CartController@getcheckoutItem');
Route::get('/showcategorylist', 'App\Http\Controllers\CartController@showcategorylist');