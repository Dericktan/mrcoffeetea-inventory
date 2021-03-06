<?php

use Illuminate\Http\Request;

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

Route::group(['namespace' => 'Api'], function() {
    Route::post('login', 'AuthController@login');
    
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('me', 'AuthController@me');

        Route::group(['prefix' => 'categories'], function() {
            Route::get('', 'CategoryController@index');
            Route::post('', 'CategoryController@store');
            Route::get('{id}', 'CategoryController@show');
            Route::put('{id}', 'CategoryController@update');
            Route::delete('{id}', 'CategoryController@destroy');
        });

        Route::group(['prefix' => 'suppliers'], function() {
            Route::get('', 'SupplierController@index');
            Route::post('', 'SupplierController@store');
            Route::get('{id}', 'SupplierController@show');
            Route::put('{id}', 'SupplierController@update');
            Route::post('{id}/photo', 'SupplierController@updatePhoto');
            Route::delete('{id}', 'SupplierController@destroy');
        });

        Route::group(['prefix' => 'products'], function() {
            Route::get('', 'ProductController@index');
            Route::post('', 'ProductController@store');
            Route::get('{id}', 'ProductController@show');
            Route::put('{id}', 'ProductController@update');
            Route::post('{id}/photo', 'ProductController@updatePhoto');
            Route::delete('{id}', 'ProductController@destroy');
        });

        Route::group(['prefix' => 'expenses'], function() {
            Route::get('', 'ExpenseController@index');
            Route::get('today', 'ExpenseController@today_expense');
            Route::get('month', 'ExpenseController@month_expense');
            Route::get('year', 'ExpenseController@year_expense');
            Route::post('', 'ExpenseController@store');
            Route::put('{id}', 'ExpenseController@update');
            Route::delete('{id}', 'ExpenseController@destroy');
        });

        Route::group(['prefix' => 'reports'], function() {
            Route::get("product", 'ReportController@product');
        });
    });
});
