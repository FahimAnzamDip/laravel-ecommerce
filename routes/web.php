<?php

use Illuminate\Support\Facades\Route;


//Frontend Routes
Route::get('/', 'PagesController@indexPage')->name('home.page');
Route::get('/product/{id}/details', 'PagesController@productDetails')->name('product.details');
Route::get('/shop', 'PagesController@shop')->name('shop.page');
Route::get('/about', 'PagesController@about')->name('about.page');
Route::get('/contact', 'PagesController@contact')->name('contact.page');
Route::get('/product/view/{id}', 'PagesController@productView')->name('product.quick.view');

//User Auth Routes
Auth::routes(['verify' => true]);
Route::get('/user/logout', 'UsersController@logout')->name('user.logout');

//User Profile Routes
Route::get('/user/home', 'UsersController@index')->name('user.home');
Route::post('/user/change/password', 'UsersController@updatePassword')->name('user.update.pass');
Route::post('/user/update/details', 'UsersController@updateDetails')->name('user.update.details');

//User Wishlist Routes
Route::get('/add/wishlist/{id}', 'WishlistsController@addWishlist')->name('add.wishlist');
Route::get('/wishlist/show', 'WishlistsController@showWishlist')->name('show.wishlist');
Route::get('/wishlist/{id}/remove', 'WishlistsController@removeWishlist')->name('remove.wishlist');
Route::get('/wishlist/{id}/add/cart', 'WishlistsController@addToCart')->name('wishlist.add.cart');

//User Cart Routes
Route::get('/add/to/cart/{id}', 'CartsController@addToCart')->name('add.cart');
Route::post('/add/to/cart', 'CartsController@addToCartPost')->name('add.cart.post');
Route::get('/show/cart', 'CartsController@showCart')->name('show.cart');
Route::get('/cart/{rowId}/remove', 'CartsController@removeCart')->name('cart.remove');
Route::post('/cart/update', 'CartsController@updateCart')->name('cart.update');

//user Checkout Routes
Route::get('/checkout', 'CheckoutController@checkout')->name('checkout');
Route::post('/apply/coupon', 'CheckoutController@applyCoupon')->name('apply.coupon');
Route::get('/remove/coupon', 'CheckoutController@removeCoupon')->name('remove.coupon');

//User Payment Routes
Route::post('/user/payment', 'PaymentController@payment')->name('user.payment');

//User Order Tracker Routes
Route::get('/user/order/tracker', 'TrackerController@orderTracker')->name('order.track');
Route::post('/user/order/tracker/', 'TrackerController@orderTrackerProcess')->name('order.track.process');

//Admin Auth Routes
Route::get('/admin', 'Admin\LoginController@showLoginForm')->name('admin.login.form');
Route::post('/admin', 'Admin\LoginController@login')->name('admin.login');
Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

//Admin Dashboard Routes
Route::get('/admin/home', 'AdminController@index')->name('admin.home');
//In Admin Namespace
Route::namespace('Admin')->group(function () {
    //Categories
    Route::get('/admin/categories', 'CategoryController@index')->name('category.index');
    Route::post('/admin/category/store', 'CategoryController@store')->name('category.store');
    Route::get('/admin/category/{id}/edit', 'CategoryController@edit')->name('category.edit');
    Route::post('/admin/category/{id}/update', 'CategoryController@update')->name('category.update');
    Route::get('/admin/category/{id}/delete', 'CategoryController@delete')->name('category.delete');
    //Sub Categories
    Route::get('/admin/subcategories', 'SubCategoryController@index')->name('subcategory.index');
    Route::post('/admin/subcategory/store', 'SubCategoryController@store')->name('subcategory.store');
    Route::get('/admin/subcategory/{id}/edit', 'SubCategoryController@edit')->name('subcategory.edit');
    Route::post('/admin/subcategory/{id}/update', 'SubCategoryController@update')->name('subcategory.update');
    Route::get('/admin/subcategory/{id}/delete', 'SubCategoryController@delete')->name('subcategory.delete');
    //Brands
    Route::get('/admin/brands', 'BrandsController@index')->name('brand.index');
    Route::post('/admin/brand/store', 'BrandsController@store')->name('brand.store');
    Route::get('/admin/brand/{id}/edit', 'BrandsController@edit')->name('brand.edit');
    Route::post('/admin/brand/{id}/update', 'BrandsController@update')->name('brand.update');
    Route::get('/admin/brand/{id}/delete', 'BrandsController@delete')->name('brand.delete');
    //Users
    Route::get('/admin/users', 'UsersController@index')->name('admin.users');
    //Coupons
    Route::get('/admin/coupons', 'CouponsController@index')->name('coupon.index');
    Route::post('/admin/coupon/store', 'CouponsController@store')->name('coupon.store');
    Route::get('/admin/coupon/{id}/edit', 'CouponsController@edit')->name('coupon.edit');
    Route::post('/admin/coupon/{id}/update', 'CouponsController@update')->name('coupon.update');
    Route::get('/admin/coupon/{id}/delete', 'CouponsController@delete')->name('coupon.delete');
    //Newsletter
    Route::get('/admin/newsletters', 'NewslettersController@index')->name('newsletter.index');
    Route::post('/admin/newsletter/store', 'NewslettersController@store')->name('newsletter.store');
    Route::get('/admin/newsletter/{id}/delete', 'NewslettersController@delete')->name('newsletter.delete');
    //Products
    Route::get('/admin/products', 'ProductsController@index')->name('product.index');
    Route::get('/admin/product/{id}/show', 'ProductsController@show')->name('product.show');
    Route::get('/get/subcategory/{category_id}', 'ProductsController@getSubCategory');
    Route::get('/admin/product/create', 'ProductsController@create')->name('product.create');
    Route::post('/admin/product/store', 'ProductsController@store')->name('product.store');
    Route::get('/admin/product/{id}/edit', 'ProductsController@edit')->name('product.edit');
    Route::post('/admin/product/{id}/update', 'ProductsController@update')->name('product.update');
    Route::get('/admin/product/{id}/delete', 'ProductsController@delete')->name('product.delete');
    Route::get('/admin/product/{id}/activate', 'ProductsController@activate')->name('product.activate');
    Route::get('/admin/product/{id}/deactivate', 'ProductsController@deactivate')->name('product.deactivate');
    //Sliders
    Route::get('/admin/sliders', 'SliderController@index')->name('slider.index');
    Route::post('/admin/slider/store', 'SliderController@store')->name('slider.store');
    Route::get('/admin/slider/{id}/edit', 'SliderController@edit')->name('slider.edit');
    Route::post('/admin/slider/{id}/update', 'SliderController@update')->name('slider.update');
    Route::get('/admin/slider/{id}/delete', 'SliderController@delete')->name('slider.delete');
    //Orders
    Route::get('/admin/orders', 'OrdersController@orders')->name('orders');
    Route::get('/admin/orders/{id}/details', 'OrdersController@orderDetails')->name('order.details');
    Route::get('/admin/orders/process', 'OrdersController@orderProcess')->name('order.process');
    //Site Settings

});
