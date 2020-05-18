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

// Route::get('/', function () {
//     return view('shop');
// });
// フロントトップページ
Route::get('/', 'ShopController@index');

Auth::routes();

// 商品検索
Route::get('search', 'ShopController@search');

// 管理画面トップページ
Route::get('admin', 'AdminController@index');

Route::post('admin/edit/editComplete', 'AdminController@editComplete');

// 管理画面編集
Route::get('admin/edit/{id}', 'AdminController@edit');

// 商品詳細
Route::get('/{id}', 'ShopController@show');

// Route::get('/home', 'HomeController@index')->name('home');
