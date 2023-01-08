<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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

// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/', [App\Http\Controllers\GuestController::class, 'index'])->name('home');
Route::get('/', 'App\Http\Controllers\GuestController@index');

Route::get('/Categories', function () {
    return view('categories');
});

// Route::get('/About', function () {
//     return view('about');
// });

Route::get('/About', 'App\Http\Controllers\ContentController@index');

Route::get('/Contact', 'App\Http\Controllers\ContactController@index')->name('contact.index');

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
Route::get('/products/{categoryID}', 'App\Http\Controllers\PastriesController@index')->name('pastries.index');
Route::get('/view/{productId}', 'App\Http\Controllers\PastriesController@details')->name('pastries.details');




Route::get('/Orders/Create/{productId}', 'App\Http\Controllers\OrdersController@create')->name('orders.create');

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

  
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/my-cart', 'App\Http\Controllers\CartController@getItemCart');
Route::get('/Billing/Create/{productlist}', 'App\Http\Controllers\BillsController@create')->name('bills.create');
Route::post('/Pay', 'App\Http\Controllers\CartController@checkoutorder');


Route::get('/my-orders', 'App\Http\Controllers\CartController@getAllCheckout');
Route::get('/Orders', 'App\Http\Controllers\OrdersController@index')->name('orders.index');
Route::get('/Orders/Receipt', 'App\Http\Controllers\EmailNotificationsController@details')->name('emails.mail');


Route::get('/posted-review', 'App\Http\Controllers\CartController@postreview');
Route::post('/post-contact', 'App\Http\Controllers\CartController@postcontact');

Route::get('/update-profile', 'App\Http\Controllers\Auth\RegisterController@getprofile');
Route::post('/update-my-profile', 'App\Http\Controllers\Auth\RegisterController@updateAccount');


Route::get('/faq', 'App\Http\Controllers\FaqController@index');



