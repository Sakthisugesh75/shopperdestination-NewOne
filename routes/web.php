<?php

//use App\Http\Controllers\Controller\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controllers;

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
//     return view('welcome');
// });
//Route::get('/', [UserController::class, 'index']);
Route::get('/config-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return 'Config cache has been cleared';
});




Route::any('/', [Controllers\User\FrontendController::class, 'home']);
Route::any('faq', [Controllers\User\FrontendController::class, 'faq']);
Route::any('about-us', [Controllers\User\FrontendController::class, 'aboutus']);
Route::any('contact-us', [Controllers\User\FrontendController::class, 'contactus']);
Route::any('privacy-policy', [Controllers\User\FrontendController::class, 'privacy_policy']);
Route::any('return-policy', [Controllers\User\FrontendController::class, 'return_policy']);
Route::any('shipping', [Controllers\User\FrontendController::class, 'shipping_policy']);
Route::any('terms-condition', [Controllers\User\FrontendController::class, 'terms_condition']);
Route::any('user-login', [Controllers\User\FrontendController::class, 'user_login']);
Route::any('user-register', [Controllers\User\FrontendController::class, 'user_register']);
Route::any('my-profile', [Controllers\User\FrontendController::class, 'user_profile']);
Route::any('my-wishlist', [Controllers\User\FrontendController::class, 'user_wishlist']);
Route::any('my-orders', [Controllers\User\FrontendController::class, 'user_history']);
Route::any('cart', [Controllers\User\FrontendController::class, 'user_cart']);
Route::any('checkout', [Controllers\User\FrontendController::class, 'checkout']);



Route::any('user-product/{key}', [Controllers\User\FrontendController::class, 'product']);
Route::any('user-product-detail/{key}', [Controllers\User\FrontendController::class, 'product_detail']);

Route::any('product/{product_name}/{color}', [Controllers\User\FrontendController::class, 'productview']);




Route::any('combo/{key}', [Controllers\User\FrontendController::class, 'combo_detail']);



Route::post('razorpay-payment', [Controllers\User\FrontendController::class, 'store'])->name('razorpay-payment');


Route::any('user-invoice/{id}', [Controllers\User\FrontendController::class, 'userinvoice']);

Route::any('forgot-password', [Controllers\User\FrontendController::class, 'forgotPassword']);
Route::any('reset-password/{email}/{otp}', [Controllers\User\FrontendController::class, 'resetPassword']);

Route::any('dashboard', [Controllers\Admin\Admin::class, 'dashboard']);

Route::group(['middleware' => 'prevent-back-history'],function(){

Route::any('login', [Controllers\Admin\Admin::class, 'login']);
Route::any('signup', [Controllers\Admin\Admin::class, 'signup']);
Route::any('logout', [Controllers\Admin\Admin::class, 'logout']);
Route::any('404', [Controllers\Admin\Admin::class, 'page_not_found']);

Route::any('manage-users', [Controllers\Admin\UsersController::class, 'manageUsers']);
Route::any('add-users', [Controllers\Admin\UsersController::class, 'addUsers']);
Route::any('edit-users/{key}', [Controllers\Admin\UsersController::class, 'editUsers']);
Route::any('user-profile', [Controllers\Admin\UsersController::class, 'usersProfile']);
Route::any('manage-combo', [Controllers\Admin\UsersController::class, 'manageCombo']);
Route::any('manage-color', [Controllers\Admin\UsersController::class, 'manageColor']);
Route::any('manage-size', [Controllers\Admin\UsersController::class, 'manageSize']);
Route::any('manage-page', [Controllers\Admin\UsersController::class, 'managePage']);
Route::any('manage-coupon', [Controllers\Admin\UsersController::class, 'manageCoupon']);

Route::any('manage-category', [Controllers\Admin\CategoryController::class, 'manageCategory']);


Route::any('manage-sub_category', [Controllers\Admin\Sub_categoryController::class, 'manageSub_category']);


Route::any('manage-products', [Controllers\Admin\ProductsController::class, 'manageProducts']);
Route::any('manage-groupcode', [Controllers\Admin\ProductsController::class, 'manageGroupcode']);
Route::any('add-products', [Controllers\Admin\ProductsController::class, 'addProducts']);
Route::any('edit-products/{key}', [Controllers\Admin\ProductsController::class, 'editProducts']);
Route::any('product-detail', [Controllers\Admin\ProductsController::class, 'productDetail']);
Route::any('banner', [Controllers\Admin\ProductsController::class, 'manageBanner']);


Route::any('manage-role', [Controllers\Admin\RoleController::class, 'manageRole']);

Route::any('new-order', [Controllers\Admin\OrderController::class, 'newOrder']);
Route::any('order-history', [Controllers\Admin\OrderController::class, 'orderHistory']);
Route::any('order-detail/{key}', [Controllers\Admin\OrderController::class, 'orderDetail']);
Route::any('invoice/{key}', [Controllers\Admin\OrderController::class, 'invoice']);
Route::any('reviews', [Controllers\Admin\OrderController::class, 'reviews']);

Route::any('manage-country', [Controllers\Admin\CountryController::class, 'manageCountry']);
Route::any('add-country', [Controllers\Admin\CountryController::class, 'addCountry']);
Route::any('edit-country/{key}', [Controllers\Admin\CountryController::class, 'editCountry']);

Route::any('manage-state', [Controllers\Admin\StateController::class, 'manageState']);
Route::any('add-state', [Controllers\Admin\StateController::class, 'addState']);
Route::any('edit-state/{key}', [Controllers\Admin\StateController::class, 'editState']);

Route::any('manage-city', [Controllers\Admin\CityController::class, 'manageCity']);
Route::any('add-city', [Controllers\Admin\CityController::class, 'addCity']);
Route::any('edit-city/{key}', [Controllers\Admin\CityController::class, 'editCity']);







});
