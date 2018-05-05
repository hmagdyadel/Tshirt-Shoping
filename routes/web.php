<?php

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

Route::get('/', 'ShopController@index')->name('shop.index');
//facebook login
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

//google login
Route::get('login/google', 'Auth\LoginController@redirectToProvidergoogle')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallbackgoogle');


Route::prefix('admin')->group(function () {
    //logout
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('admin.logout');
    Route::get('/index', 'Admin\AdminController@index')->name('admin.index');
    Route::put('/{user}/update', 'Admin\AdminController@update')->name('admin.update');
    Route::get('/{user}/edit', 'Admin\AdminController@edit')->name('admin.edit');
    Route::get('/{user}/delete', 'Admin\AdminController@destroy')->name('admin.destroy');
    Route::get('/add', 'Admin\AdminController@addadmin')->name('add');
    Route::post('/add', 'Admin\AdminController@store')->name('add');
    Route::post('/changeEmail', 'Admin\AdminController@newEmail')->name('newEmail');
    Route::post('/changePassword', 'Admin\AdminController@newPassword')->name('newPassword');



    Route::prefix('product')->group(function () {
        Route::get('/index', 'Admin\ProductsController@index')->name('admin.product.index');
        Route::get('/add', 'Admin\ProductsController@addproduct')->name('admin.product.add');
        Route::post('/add', 'Admin\ProductsController@store')->name('admin.product.add');
        Route::put('/{product}/update', 'admin\ProductsController@update')->name('admin.product.update');
        Route::get('/{product}/edit', 'Admin\ProductsController@edit')->name('admin.product.edit');
        Route::get('/{product}/delete', 'Admin\ProductsController@destroy')->name('admin.product.destroy');
        Route::get('/add-to-cart/{id}', 'Admin\ProductsController@AddToCart')->name('admin.product.addToCart');
         });
    Route::prefix('category')->group(function () {
        Route::get('/index', 'Admin\CategoryController@index')->name('admin.category.index');
        Route::get('/add', 'Admin\CategoryController@create')->name('admin.category.add');
        Route::post('/add', 'Admin\CategoryController@store')->name('admin.category.add');
        Route::put('/{cat}/update', 'Admin\CategoryController@update')->name('admin.category.update');
        Route::get('/{cat}/edit', 'Admin\CategoryController@edit')->name('admin.category.edit');
        Route::get('/{cat}/delete', 'Admin\CategoryController@destroy')->name('admin.category.destroy');

    });
});
Route::prefix('admin')->group(function () {
    Route::get('/index', 'Admin\AdminController@index')->name('admin.index');
});
Route::prefix('product')->group(function () {
    Route::get('/add-to-cart/{id}', 'Admin\ProductsController@AddToCart')->name('product.addToCart');
    Route::get('/shopingCart', 'Admin\ProductsController@Cart')->name('product.shopingCart');
    Route::post('/search', 'Admin\ProductsController@search')->name('product.search');
    Route::get('/checkOut', 'Admin\ProductsController@checkOut')->name('products.checkout');
    Route::post('/checkOut', 'Admin\ProductsController@postcheckOut')->name('products.checkout');

});
Route::prefix('client')->group(function () {
    Route::group(['middleware' => 'guest'], function () {
        //sign up
        Route::get('/SignUp', 'ClientController@signup')->name('client.signup');
        Route::post('/SignUp', 'ClientController@postsignup')->name('client.signup');
        //sign in
        Route::get('/SignIn', 'ClientController@signin')->name('client.signin');
        Route::post('/SignIn', 'ClientController@postsignin')->name('client.signin');
    });
    Route::group(['middleware' => 'auth'], function () {
        //get profile
        Route::get('/profile', 'ClientController@getprofile')->name('client.profile');
        //logout
        Route::get('/logout', 'ClientController@logout')->name('client.logout');

    });


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
