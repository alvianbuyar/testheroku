<?php

use App\task;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('search', 'HomeController@search');

Route::get('pesan/{id}', 'PesanController@index');
Route::post('pesan/{id}', 'PesanController@pesan');
Route::get('checkout', 'PesanController@checkout');
Route::delete('checkout/{id}', 'PesanController@delete');

Route::get('confirmation', 'PesanController@confirm');

Route::get('profile', 'ProfileController@index');
Route::get('editprofile', 'ProfileController@edit');
Route::post('updateprofile', 'ProfileController@update');

Route::get('history', 'HistoryController@index');
Route::get('history/{id}', 'HistoryController@detail');
Route::post('history/{id}', 'HistoryController@upload');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'Admin\DashboardController@index');
    Route::resource('/productcategories', 'Admin\ProductCategoriesController');
    Route::resource('/addproduct', 'Admin\AddProductController');
    Route::resource('/users', 'Admin\UserController');
    Route::resource('/roles', 'Admin\RoleController');
    Route::resource('/task', 'Admin\TaskController');
    Route::resource('/cart', 'Admin\CartController');
    Route::resource('/purchaselog', 'Admin\PurchaseLogController');
    Route::resource('/loanlog', 'Admin\LoanLogController');
    Route::resource('/detail', 'Admin\DetailController');
    // Route::post('detail', 'Admin\DetailController@index')->name('index');
    Route::post('/searchdetail', 'Admin\DetailController@search')->name('search');
});
