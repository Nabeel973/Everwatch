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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('user')->group(function() {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/testhome', 'HomeController@testhome')->name('testhome');
});

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('login.submit');
    Route::post('logout/', 'Auth\AdminLoginController@logout')->name('logout');
    Route::get('/', 'Auth\AdminController@index')->name('dashboard');

    Route::prefix('customers')->name('customers.')->group(function() {
        Route::get('/view','Admin\CustomersController@index')->name('index');
        Route::get('/list','Admin\CustomersController@user_list')->name('list');
        Route::get('/create','Admin\CustomersController@create')->name('create');
        Route::post('/submit','Admin\CustomersController@submit')->name('submit');
        Route::post('/details','Admin\CustomersController@customer_details')->name('details');
    });

    Route::prefix('settings')->name('settings.')->group(function() {
        Route::prefix('city')->name('city.')->group(function() {
            Route::get('/index','Admin\SettingsController@city_index')->name('index');
            Route::get('/list','Admin\SettingsController@city_list')->name('list');
            Route::post('/store','Admin\SettingsController@city_store')->name('store');
            Route::post('/edit','Admin\SettingsController@city_edit')->name('edit');
            Route::post('{id}/update','Admin\SettingsController@city_update')->name('update');

            Route::prefix('branch')->name('branch.')->group(function() {
                Route::get('/index','Admin\SettingsController@branch_index')->name('index');
                Route::get('/list','Admin\SettingsController@branch_list')->name('list');
                Route::post('/store','Admin\SettingsController@branch_store')->name('store');
                Route::post('/edit','Admin\SettingsController@branch_edit')->name('edit');
                Route::post('{id}/update','Admin\SettingsController@branch_update')->name('update');
            });
        });

        Route::prefix('profile')->name('profile.')->group(function() {
            Route::get('{id}/edit','Admin\AdminProfileController@edit')->name('edit');
            Route::post('/update','Admin\AdminProfileController@update')->name('update');
        });
    });

});
