<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Admin;
use App\Http\Controllers\Api\V1\Users;
use App\Http\Controllers\Api\V1\Role;
use App\Http\Controllers\Api\V1\City;
use App\Http\Controllers\Api\V1\Country;
use App\Http\Controllers\Api\V1\State;

use App\Http\Controllers\Api\V1\Category;
use App\Http\Controllers\Api\V1\Products;
use App\Http\Controllers\Api\V1\Sub_category;
use App\Http\Controllers\Api\V1\Order;
use App\Http\Controllers\Api\V1\Banner;
use App\Http\Controllers\Api\V1\Combo;
use App\Http\Controllers\Api\V1\Color;
use App\Http\Controllers\Api\V1\Size;
use App\Http\Controllers\Api\V1\Groupcode;
use App\Http\Controllers\Api\V1\Page;
use App\Http\Controllers\Api\V1\Coupon;




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

//Route::apiResource('users', UserController::class);

Route::Post('v1/login', [Admin::class, 'login']);
Route::Post('v1/register', [Admin::class, 'register']);
Route::Post('v1/googlelogin', [Admin::class, 'googlelogin']);
Route::Get('v1/generateuser', [Admin::class, 'generateuser']);
Route::get('v1/getdashboardrecords', [Admin::class, 'getdashboardrecords']);
Route::get('v1/getsetting', [Admin::class, 'getsetting']);
Route::post('v1/updatesetting', [Admin::class, 'updatesetting']);

Route::Post('v1/verifyusername', [Admin::class, 'verifyUserName']);
Route::post('v1/update-password', [Admin::class, 'updatepassword']);

Route::get('v1/users/list-usersdt', [Users::class, 'listUsersdt']);
Route::get('v1/users/getallusers', [Users::class, 'getallUsers']);
Route::post('v1/users/create-users', [Users::class, 'createUsers']);
Route::post('v1/users/update-users', [Users::class, 'updateUsers']);
Route::delete('v1/users/delete-users', [Users::class, 'deleteUsers']);
Route::get('v1/users/get-usersdt', [Users::class, 'listUsersById']);

Route::get('v1/role/list-roledt', [Role::class, 'listRoledt']);
Route::get('v1/role/getallrole', [Role::class, 'getallRole']);
Route::post('v1/role/create-role', [Role::class, 'createRole']);
Route::post('v1/role/update-role', [Role::class, 'updateRole']);
Route::delete('v1/role/delete-role', [Role::class, 'deleteRole']);
Route::get('v1/role/get-roledt', [Role::class, 'listRoleById']);

Route::get('v1/country/list-countrydt', [Country::class, 'listCountrydt']);
Route::post('v1/country/create-country', [Country::class, 'createCountry']);
Route::post('v1/country/update-country', [Country::class, 'updateCountry']);
Route::delete('v1/country/delete-country', [Country::class, 'deleteCountry']);
Route::get('v1/country/get-countrydt', [Country::class, 'listCountryById']);

Route::get('v1/state/list-statedt', [State::class, 'listStatedt']);
Route::post('v1/state/create-state', [State::class, 'createState']);
Route::post('v1/state/update-state', [State::class, 'updateState']);
Route::delete('v1/state/delete-state', [State::class, 'deleteState']);
Route::get('v1/state/getStateByCountry', [State::class, 'getStateByCountry']);
Route::get('v1/state/get-statedt', [State::class, 'listStateById']);

Route::get('v1/city/list-citydt', [City::class, 'listCitydt']);
Route::post('v1/city/create-city', [City::class, 'createCity']);
Route::post('v1/city/update-city', [City::class, 'updateCity']);
Route::delete('v1/city/delete-city', [City::class, 'deleteCity']);
Route::get('v1/city/get-citydt', [City::class, 'listCityById']);
Route::get('v1/state/getCityByState', [City::class, 'getCityByState']);


Route::get('v1/category/list-categorydt', [Category::class, 'listCategorydt']);
Route::get('v1/category/getallcategory', [Category::class, 'getallCategory']);
Route::post('v1/category/create-category', [Category::class, 'createCategory']);
Route::post('v1/category/update-category', [Category::class, 'updateCategory']);
Route::delete('v1/category/delete-category', [Category::class, 'deleteCategory']);
Route::get('v1/category/list-category-ById', [Category::class, 'listCategoryById']);


Route::get('v1/Combo/list-Combodt', [Combo::class, 'listCombodt']);
Route::get('v1/Combo/getallCombo', [Combo::class, 'getallCombo']);
Route::post('v1/Combo/create-Combo', [Combo::class, 'createCombo']);
Route::post('v1/Combo/update-Combo', [Combo::class, 'updateCombo']);
Route::delete('v1/Combo/delete-Combo', [Combo::class, 'deleteCombo']);
Route::get('v1/Combo/list-Combo-ById', [Combo::class, 'listComboById']);

Route::get('v1/coupon/list-coupondt', [Coupon::class, 'listCoupondt']);
Route::get('v1/coupon/getallcoupon', [Coupon::class, 'getallCoupon']);
Route::post('v1/coupon/create-coupon', [Coupon::class, 'createCoupon']);
Route::post('v1/coupon/update-coupon', [Coupon::class, 'updateCoupon']);
Route::delete('v1/coupon/delete-coupon', [Coupon::class, 'deleteCoupon']);
Route::get('v1/coupon/list-coupon-ById', [Coupon::class, 'listCouponById']);
Route::post('v1/coupon/get-coupon-by-code', [Coupon::class, 'listCouponByCode']);

Route::get('v1/color/list-colordt', [Color::class, 'listColordt']);
Route::get('v1/color/getallcolor', [Color::class, 'getallColor']);
Route::post('v1/color/create-color', [Color::class, 'createColor']);
Route::post('v1/color/update-color', [Color::class, 'updateColor']);
Route::delete('v1/color/delete-color', [Color::class, 'deleteColor']);
Route::get('v1/color/list-color-ById', [Color::class, 'listColorById']);

Route::get('v1/size/list-sizedt', [Size::class, 'listSizedt']);
Route::get('v1/size/getallsize', [Size::class, 'getallSize']);
Route::post('v1/size/create-size', [Size::class, 'createSize']);
Route::post('v1/size/update-size', [Size::class, 'updateSize']);
Route::delete('v1/size/delete-size', [Size::class, 'deleteSize']);
Route::get('v1/size/list-size-ById', [Size::class, 'listSizeById']);

Route::get('v1/page/list-pagedt', [Page::class, 'listPagedt']);
Route::get('v1/page/getallpage', [Page::class, 'getallPage']);
Route::post('v1/page/create-page', [Page::class, 'createPage']);
Route::post('v1/page/update-page', [Page::class, 'updatePage']);
Route::delete('v1/page/delete-page', [Page::class, 'deletePage']);
Route::get('v1/page/list-page-ById', [Page::class, 'listPageById']);
Route::get('v1/page/list-page-ByPandL', [Page::class, 'getallPageWpageandLoc']);


Route::get('v1/groupcode/list-groupcodedt', [Groupcode::class, 'listGroupcodedt']);
Route::get('v1/groupcode/getallgroupcode', [Groupcode::class, 'getallGroupcode']);
Route::post('v1/groupcode/create-groupcode', [Groupcode::class, 'createGroupcode']);
Route::post('v1/groupcode/update-groupcode', [Groupcode::class, 'updateGroupcode']);
Route::delete('v1/groupcode/delete-groupcode', [Groupcode::class, 'deleteGroupcode']);
Route::get('v1/groupcode/list-groupcode-ById', [Groupcode::class, 'listGroupcodeById']);


Route::get('v1/products/list-productsdt', [Products::class, 'listProductsdt']);
Route::get('v1/products/getallproducts', [Products::class, 'getallProducts']);
Route::post('v1/products/create-products', [Products::class, 'createProducts']);
Route::post('v1/products/update-products', [Products::class, 'updateProducts']);
Route::delete('v1/products/delete-products', [Products::class, 'deleteProducts']);
Route::delete('v1/products/delete-product-image', [Products::class, 'deleteProductimage']);
Route::get('v1/products/list-products-ById', [Products::class, 'listProductsById']);


Route::get('v1/sub_category/list-sub_categorydt', [Sub_category::class, 'listSub_categorydt']);
Route::get('v1/sub_category/getallsub_category', [Sub_category::class, 'getallSub_category']);
Route::post('v1/sub_category/create-sub_category', [Sub_category::class, 'createSub_category']);
Route::post('v1/sub_category/update-sub_category', [Sub_category::class, 'updateSub_category']);
Route::delete('v1/sub_category/delete-sub_category', [Sub_category::class, 'deleteSub_category']);
Route::get('v1/sub_category/list-sub_category-ById', [Sub_category::class, 'listSub_categoryById']);
Route::get('v1/sub_category/list-sub_category-BycategoryId', [Sub_category::class, 'listSub_categoryBycategoryId']);

Route::get('v1/order/review', [Order::class, 'listReviewdt']);
Route::get('v1/order/new-order', [Order::class, 'listReviewdt']);
Route::get('v1/order/list-orderdt', [Order::class, 'listOrderdt']);
Route::get('v1/order/list-orderdtbystatus', [Order::class, 'listOrderdtbystatus']);
Route::POST('v1/order/update-invoice', [Order::class, 'updateInvoice']);

Route::post('v1/order/update-orderstus',[Order::class,'updateOrderStatus']);

Route::post('v1/order/update-ordercurrentstatus',[Order::class,'updateOrderCurrentStatus']);

Route::get('v1/order/list-orderbyId', [Order::class, 'listOrderById']);

Route::post('v1/order/checkout',[Order::class,'checkout']);

Route::post('v1/order/send-mail',[Order::class,'createMail']);


Route::post('v1/products/add-wishlist', [Products::class, 'addToWishlist']);
Route::delete('v1/products/remove-wishlist', [Products::class, 'removeFromWishlist']);
Route::get('v1/products/get-wishlistbyuserid', [Products::class, 'getwishlistcountbyuserid']);
Route::post('v1/products/update-deal-details', [Products::class, 'updateDealDetails']);
Route::post('v1/products/find-query', [Products::class, 'querySearch']);


Route::post('v1/order/add-cart',[Order::class,'addToCart']);
Route::post('v1/order/remove-cart',[Order::class,'removeCart']);
Route::post('v1/order/add-qty',[Order::class,'addProductqty']);
Route::post('v1/order/remove-qty',[Order::class,'removeProductqty']);
Route::get('v1/order/get-cartby-userid',[Order::class,'getcartbyuserid']);
Route::get('v1/order/get-cartby-sessionid',[Order::class,'getcartbysessionid']);


Route::get('v1/banner/list-bannerdt', [Banner::class, 'listBannerdt']);
Route::get('v1/banner/getallbanner', [Banner::class, 'getallBanner']);
Route::post('v1/banner/create-banner', [Banner::class, 'createBanner']);
Route::post('v1/banner/update-banner', [Banner::class, 'updateBanner']);
Route::delete('v1/banner/delete-banner', [Banner::class, 'deleteBanner']);
Route::get('v1/banner/get-bannerdtbyid', [Banner::class, 'listBannerById']);




