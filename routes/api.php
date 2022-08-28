<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'API\AuthController@register');
Route::post('login', 'API\AuthController@login');

Route::group(['prefix' => 'addproduct'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('getall', 'API\admin\AddProductController@getAll');
        Route::post('create', 'API\admin\AddProductController@store');
        Route::post('update', 'API\admin\AddProductController@update');
        Route::post('delete', 'API\admin\AddProductController@destroy');
    });
});

Route::group(['prefix' => 'cart'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('getall', 'API\admin\CartController@getAll');
        Route::post('create', 'API\admin\CartController@store');
        Route::post('update', 'API\admin\CartController@update');
        Route::post('delete', 'API\admin\CartController@destroy');
    });
});

Route::group(['prefix' => 'detail'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('getall', 'API\admin\DetailController@getAll');
        Route::post('create', 'API\admin\DetailController@store');
        Route::post('update', 'API\admin\DetailController@update');
        Route::post('delete', 'API\admin\DetailController@destroy');
    });
});

Route::group(['prefix' => 'productcategories'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('getall', 'API\admin\ProductCategoriesController@getAll');
        Route::post('create', 'API\admin\ProductCategoriesController@store');
        Route::post('update', 'API\admin\ProductCategoriesController@update');
        Route::post('delete', 'API\admin\ProductCategoriesController@destroy');
    });
});

Route::group(['prefix' => 'purchaselog'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('getall', 'API\admin\PurchaseLogController@getAll');
        Route::post('create', 'API\admin\PurchaseLogController@store');
        Route::post('update', 'API\admin\PurchaseLogController@update');
        Route::post('delete', 'API\admin\PurchaseLogController@destroy');
    });
});

Route::group(['prefix' => 'task'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('getall', 'API\admin\TaskController@getAll');
        Route::post('create', 'API\admin\TaskController@store');
        Route::post('update', 'API\admin\TaskController@update');
        Route::post('delete', 'API\admin\TaskController@destroy');
    });
});
