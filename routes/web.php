<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'User\HomeController@index')->name('home');
Route::get('/home', 'User\HomeController@index')->name('home');
Route::get('/collection', 'User\CollectionController@index')->name('collection');
Route::post('/order', 'User\OrderController@store')->name('order.store');

Route::get('admin/users', 'Admin\UserController@index')->name('users');
Route::get('admin/logs', 'Admin\LogController@index')->name('logs');

Route::resource('admin/sliders', 'Admin\SliderController', [
    'names' => [
        'index' => 'sliders',
        'create' => 'sliders.create',
        'store' => 'sliders.store',
        'edit' => 'sliders.edit',
        'update' => 'sliders.update',
        'destroy' => 'sliders.destroy',
    ]
]);

Route::resource('admin/sellers', 'Admin\SellerController', [
    'names' => [
        'index' => 'sellers',
        'create' => 'sellers.create',
        'store' => 'sellers.store',
        'edit' => 'sellers.edit',
        'update' => 'sellers.update',
        'destroy' => 'sellers.destroy',
    ]
]);

Route::resource('admin/products', 'Admin\ProductController', [
    'names' => [
        'index' => 'products',
        'create' => 'products.create',
        'store' => 'products.store',
        'edit' => 'products.edit',
        'update' => 'products.update',
        'destroy' => 'products.destroy',
    ]
]);

Route::resource('admin/mini_products', 'Admin\MiniProductController', [
    'names' => [
        'index' => 'mini_products',
        'create' => 'mini_products.create',
        'store' => 'mini_products.store',
        'edit' => 'mini_products.edit',
        'update' => 'mini_products.update',
        'destroy' => 'mini_products.destroy',
    ]
]);

Route::resource('admin/orders', 'Admin\OrderController', [
    'names' => [
        'index' => 'orders',
        'store' => 'orders.store',
        'edit' => 'orders.edit',
        'update' => 'orders.update',
    ]
]);

Route::get('admin/contacts', 'Admin\ContactController@index')->name('contacts');
Route::put('admin/contacts/update', 'Admin\ContactController@update')->name('contacts.update');