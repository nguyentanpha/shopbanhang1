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
//frontend
Route::get('/', 'HomeController@index');
Route::get('/trang_chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search');
//danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@sohw_category_home');
Route::get('/thuong-hieu-san-pham/{brand_id}','BrandProduct@sohw_brand_home');
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');
//backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');//dashboard là trang quản lý
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::post('/filter-by-date','AdminController@filter_by_date');//gui ngay 
Route::post('/dashboard-filter','AdminController@dashboard_filter');
Route::post('/days-order','AdminController@days_order');
//category
Route::get('/add-category-product', 'CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}', 'CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}', 'CategoryProduct@delete_category_product');
Route::get('/all-category-product', 'CategoryProduct@all_category_product');

Route::get('/uncative-category-product/{category_product_id}', 'CategoryProduct@uncative_category_product');
Route::get('/cative-category-product/{category_product_id}', 'CategoryProduct@cative_category_product');
 
Route::post('/save-category-product', 'CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}', 'CategoryProduct@update_category_product');

//Login facebook
Route::get('/login-facebook','AdminController@login_facebook');
Route::get('/admin/callback','AdminController@callback_facebook');

//Login  google
Route::get('/login-google','AdminController@login_google');
Route::get('/google/callback','AdminController@callback_google');


//Brand Prodcut
Route::get('/add-brand-product', 'BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}', 'BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}', 'BrandProduct@delete_brand_product');
Route::get('/all-brand-product', 'BrandProduct@all_brand_product');

Route::get('/uncative-brand-product/{brand_product_id}', 'BrandProduct@uncative_brand_product');
Route::get('/cative-brand-product/{brand_product_id}', 'BrandProduct@cative_brand_product');
 
Route::post('/save-brand-product', 'BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}', 'BrandProduct@update_brand_product');
//Prodcut
Route::get('/add-product', 'ProductController@add_product')->middleware('auth.roles');
Route::get('/edit-product/{product_id}', 'ProductController@edit_product')->middleware('auth.roles');

Route::get('/delete-product/{product_id}', 'ProductController@delete_product');
Route::get('/all-product', 'ProductController@all_product');

Route::get('/uncative-product/{product_id}', 'ProductController@uncative_product');
Route::get('/cative-product/{product_id}', 'ProductController@cative_product');
 
Route::post('/save-product', 'ProductController@save_product');
Route::post('/update-product/{product_id}', 'ProductController@update_product');

//cart
Route::post('/add-cart-ajax','CartController@add_cart_ajax');
Route::get('/gio-hang','CartController@gio_hang'); 
Route::post('/save-cart', 'CartController@save_cart');
Route::post('/update-cart-quantity', 'CartController@update_cart_quantity');
Route::post('/update-cart','CartController@update_cart');
Route::get('/show_cart', 'CartController@show_cart');

Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart');
Route::get('/del-product/{session_id}','CartController@delete_product');

//coupon giam gia
Route::post('/check-coupon', 'CartController@check_coupon');
//coupon admin
Route::get('/insert-coupon', 'CouponController@insert_coupon');
Route::get('/list-coupon', 'CouponController@list_coupon');
Route::get('/delete-coupon/{coupon_id}', 'CouponController@delete_coupon');
Route::post('/insert-coupon-code', 'CouponController@insert_coupon_code');
//checkout

Route::get('/login-checkout', 'CheckoutController@login_checkout');
Route::get('/logout-checkout', 'CheckoutController@logout_checkout');
Route::post('/add-customer', 'CheckoutController@add_customer');
Route::post('/order-place', 'CheckoutController@order_place');
Route::post('/login-customer', 'CheckoutController@login_customer');
Route::get('/checkout', 'CheckoutController@checkout');
Route::get('/payment', 'CheckoutController@payment');
Route::post('/save-checkout-customer', 'CheckoutController@save_checkout_customer');
Route::post('/calculate-fee', 'CheckoutController@calculate_fee');
Route::post('/select-delivery-home', 'CheckoutController@select_delivery_home');
Route::get('/del-fee', 'CheckoutController@del_fee'); //Xóa phí vận chuyển
Route::post('/confirm-order', 'CheckoutController@confirm_order');// Xác nhận đặt hàng
//order

Route::get('/print-order/{checkout_code}', 'OrderController@print_order');
Route::get('/manage-order', 'OrderController@manage_order');
// Route::get('/manage-order', 'CheckoutController@manage_order');
Route::get('/view-order/{order_code}', 'OrderController@view_order');
Route::post('/update-order-qty', 'OrderController@update_order_qty');
Route::post('/update-qty', 'OrderController@update_qty');


Route::get('/them-moi', 'CheckoutController@them_moi');
//vận chuyển
Route::get('/delivery', 'DeliveryController@delivery');
Route::post('/select-delivery', 'DeliveryController@select_delivery');
Route::post('/insert-delivery', 'DeliveryController@insert_delivery');
Route::post('/select-feeship', 'DeliveryController@select_feeship');
Route::post('/update-delivery', 'DeliveryController@update_delivery');


//banner
Route::get('/manage-slider', 'SliderController@manage_slider');
Route::get('/add-slider', 'SliderController@add_slider');
Route::post('/insert-slider', 'SliderController@insert_slider');
Route::get('/uncative-slide/{slider_id}', 'SliderController@uncative_slide');
Route::get('/cative-slide/{slider_id}', 'SliderController@cative_slide');

//banner right
Route::get('/manage-slider-right', 'SliderController@manage_slider_right');
Route::get('/add-slider-right', 'SliderController@add_slider_right');
Route::post('/insert-slider-right', 'SliderController@insert_slider_right');
Route::get('/uncative-slide-right/{slider_right_id}', 'SliderController@uncative_slide_right');
Route::get('/cative-slide-right/{slider_right_id}', 'SliderController@cative_slide_right');

//authentication roles

Route::get('/register-auth', 'AuthController@register_auth');
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');//trang login authentication

Route::get('users','UserController@index')->middleware('auth.roles');//trang all user

Route::post('assign-roles','UserController@assign_roles')->middleware('auth.roles'); //cấp quyền từng user
Route::post('store-users','UserController@store_users')->middleware('auth.roles');//thêm user
Route::get('delete-user-roles/{admin_id}','UserController@delete_user_roles')->middleware('auth.roles');
Route::get('add-users','UserController@add_users');//trang add user
Route::get('impersonate/{admin_id}','UserController@impersonate');//trang all user
Route::get('impersonate-destroy','UserController@impersonate_destroy');//trang all user