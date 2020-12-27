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

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function() {
    Route::group(['namespace' => '\App\Http\Controllers\Dashboard'], function() {
        Route::get('', 'DashboardController@index')->name('index');
    });

    Route::group(['namespace' => '\App\Http\Controllers\User', 'as' => 'users.'], function() {
        Route::get('usuarios', 'UserController@index')->name('index');
    });
});
