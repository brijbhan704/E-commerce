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
// Frontend Route------------------------------------------
Route::get('/','HomeController@index');
//category route-------------------------------------------
Route::get('category_by_product/{category_id}','HomeController@showProductBy_Category');
//brands Route---------------------------------------------
Route::get('manufacture_by_product/{manufacture_id}','HomeController@showProductBy_Manufacture');
//product details------------------------------------------
Route::get('view_product/{product_id}','HomeController@view_product');
//Cart Route-----------------------------------------------
Route::post('add_to_cart','CartController@add_to_cart');
Route::get('show_cart','CartController@show_cart');
Route::get('delete-cart/{rowId}','CartController@delete_cart');
Route::post('update_cart','CartController@update_cart');

//checkout route are here----------------------------------

Route::get('checkout','CheckoutController@checkout');
Route::get('login_check','CheckoutController@login_check');
Route::post('user_register','CheckoutController@user_register');
Route::post('save_user_register','CheckoutController@shipping_details');
Route::post('customer_login','CheckoutController@customer_login');
Route::get('customer_logout','CheckoutController@customer_logout');

Route::get('payment','CheckoutController@payment');
Route::post('order_place','CheckoutController@order_place');

//paumoney
Route::get('payumoney','PayumoneyController@payumoney');








//Backend Route--------------------------------------------
Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/logout','SuperAdminController@logout');


//category route
Route::get('/add_category','CategoryController@create');
Route::get('/all_category','CategoryController@index');
Route::post('/create_category','CategoryController@store');
Route::get('/unactive_category/{category_id}','CategoryController@unactive_category');
Route::get('/active_category/{category_id}','CategoryController@active_category');
Route::get('/edit_category/{category_id}','CategoryController@edit');
Route::post('/update_category/{category_id}','CategoryController@update');
Route::get('/delete_category/{category_id}','CategoryController@destroy');


//manufacture or brand route
Route::get('/add_brand','ManufactureController@create');
Route::get('/all_brand','ManufactureController@index');
Route::post('/create_brand','ManufactureController@store');
Route::get('/unactive_brand/{manufacture_id}','ManufactureController@unactive_brand');
Route::get('/active_brand/{manufacture_id}','ManufactureController@active_brand');
Route::get('/edit_brand/{manufacture_id}','ManufactureController@edit');
Route::post('/update_brand/{manufacture_id}','ManufactureController@update');
Route::get('/delete_brand/{manufacture_id}','ManufactureController@destroy');


//products route
Route::get('/add_product','ProductController@create');
Route::get('/all_product','ProductController@index');
Route::post('/create_product','ProductController@store');
Route::get('/unactive_product/{product_id}','ProductController@unactive_product');
Route::get('/active_product/{product_id}','ProductController@active_product');
Route::get('/edit_product/{product_id}','ProductController@edit');
Route::post('/update_product/{product_id}','ProductController@update');
Route::get('/delete_product/{product_id}','ProductController@destroy');


//Slider Route
Route::get('/add_slider','SliderController@create');
Route::get('/all_slider','SliderController@index');
Route::post('/create_slider','SliderController@store');
Route::get('/unactive_slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active_slider/{slider_id}','SliderController@active_slider');
Route::get('/edit_slider/{slider_id}','SliderController@edit');
Route::post('/update_slider/{slider_id}','SliderController@update');
Route::get('/delete_slider/{slider_id}','SliderController@destroy');

//Manage Orders Slider
Route::get('manage_order','ManageorderController@index');
Route::get('show_product/{order_id}','ManageorderController@show_product');

