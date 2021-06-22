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
    return view('welcome', [
        'stores' => \App\Store::take(6)->get(),
        'products' => \App\Product::all()
    ]);
});

Route::get('/profile', 'HomeController@show')
    ->name('users.show');
Route::post('/profile', 'HomeController@update')
    ->name('users.update');

Route::get('/cart', 'UserController@index')
    ->name('myCart')
    ->middleware('auth');

Route::post('/cart', 'UserController@store')
    ->name('add.to.cart')
    ->middleware('auth');
Route::get('/cart/{id}', 'UserController@destroy')
    ->name('delete.order')
    ->middleware('auth');

Route::get('/owner/stores', 'OwnerController@show')
    ->name('owner.stores');

Route::get('/owner/products', 'OwnerController@product')
    ->name('owner.products');

Route::get('/stores', 'StoreController@index')
    ->name('stores.index');
Route::get('/stores/{id}', 'StoreController@show')
    ->name('stores.show');
Route::get('/stores/create', 'StoreController@create')
    ->name('stores.create');
Route::post('/stores', 'StoreController@store')
    ->name('stores.store');

Route::get('/owner', 'OwnerController@index')
    ->middleware('can:control_store')
    ->name('owner.dashboard');
Route::get('/owner/register', 'OwnerController@register')->name('owner.register');
Route::get('/owner/login', 'OwnerController@login')->name('owner.login');
Route::post('/owner/login', 'OwnerController@check')->name('owner.check');

Route::get('/owner/stores/{id}', 'StoreController@destroy')
    ->name('stores.destroy')
    ->middleware('auth');


Route::get('/products', 'ProductController@index')
    ->name('products.index');
Route::get('/products/create', 'ProductController@create')
    ->name('products.create')
    ->middleware('auth');
Route::post('/products', 'ProductController@store')
    ->name('products.store')
    ->middleware('auth');
Route::get('/products/{id}', 'ProductController@show')
    ->name('products.show');

Route::get('/owner/products/{id}', 'ProductController@destroy')
    ->name('products.destroy')
    ->middleware('auth');

Route::get('/category/products/{id}', 'SubCategoryController@index')
    ->name('category.products');

Auth::routes();

Route::get('/contact', 'GuestController@contact')->name('contact.us');
Route::get('/about','GuestController@about')->name('about.us');

Route::get('/home', 'HomeController@index')
    ->name('home');
Route::post('/home', 'HomeController@assign')
    ->name('home.assign');
Route::get('/home/{user_id}/{role_id}', 'HomeController@reassign')
    ->name('home.reassign');
