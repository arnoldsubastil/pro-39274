<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/Categories', function () {
    return view('categories');
});

Route::get('/About', function () {
    return view('about');
});

/*
|--------------------------------------------------------------------------
| Web Routes for JSON
|--------------------------------------------------------------------------
|
| Comment here
|
*/

Route::get('/Products', 'App\Http\Controllers\ProductsController@index')->name('products.index');

/*Product Categroies*/
Route::get('/NewProducts', 'App\Http\Controllers\NewProductsController@index')->name('newProducts.index');
Route::get('/BestSellers', 'App\Http\Controllers\BestSellerProductsController@index')->name('bestsellerProducts.index');
Route::get('/Bundles', 'App\Http\Controllers\BundleProductsController@index')->name('bundleProducts.index');
Route::get('/Events', 'App\Http\Controllers\EventProductsController@index')->name('eventProducts.index');
Route::get('/MixAndMatch', 'App\Http\Controllers\MixProductsController@index')->name('mixProducts.index');

/*Product Types*/
Route::get('/Pastries', 'App\Http\Controllers\PastriesController@index')->name('pastries.index');
Route::get('/Pastries/{productId}', 'App\Http\Controllers\PastriesController@details')->name('pastries.details');
Route::get('/Beverages', 'App\Http\Controllers\BeveragesController@index')->name('beverages.index');
Route::get('/Beverages/{productId}', 'App\Http\Controllers\BeveragesController@details')->name('beverages.details');
Route::get('/Desserts', 'App\Http\Controllers\DessertsController@index')->name('desserts.index');
Route::get('/Desserts/{productId}', 'App\Http\Controllers\DessertsController@details')->name('desserts.details');
Route::get('/ToppingsAndSinkers', 'App\Http\Controllers\ToppingsAndSinkersController@index')->name('toppings.index');
Route::get('/ToppingsAndSinkers/{productId}', 'App\Http\Controllers\ToppingsAndSinkersController@details')->name('toppings.details');
Route::get('/NutsAndNougat', 'App\Http\Controllers\NutsAndNougatController@index')->name('nuts.index');
Route::get('/NutsAndNougat/{productId}', 'App\Http\Controllers\NutsAndNougatController@details')->name('nuts.details');

Route::get('/Orders/Create/{productId}', 'App\Http\Controllers\OrdersController@create')->name('orders.create');
Route::get('/Orders/Notification', 'App\Http\Controllers\OrdersController@notification')->name('orders.notification');

Route::get('/Billing/Create/{productId}', 'App\Http\Controllers\BillsController@create')->name('bills.create');
Route::get('/Payments/Create', 'App\Http\Controllers\PaymentsController@create')->name('payments.create');

Route::get('/Cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/Cart/Create', 'App\Http\Controllers\CartController@create')->name('cart.create');

Route::get('resizer/images/{location}/{photo}/{width}', function ($location, $photo, $width) {

    $image = new \Intervention\Image\ImageManager();
    $url = public_path('images/' . $location .'/'.$photo); // If your photo is in public folder
    $width1 = $width;

    $imgsize_arr = getimagesize('images/' . $location .'/'.$photo);
    
    $imgheight = (int) $imgsize_arr[1];
    $imgwidth = (int) $imgsize_arr[0];
    $height1 = ($width1 * $imgheight)/$imgwidth;

    $res = $image->cache(function ($image) use ($url, $width1, $height1) {

        return $image->make($url)->resize($width1, $height1);
    }, 9999, true);

    return $res->response();

    })->name('resizer');