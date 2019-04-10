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

Route::get('/admin', function () {
    return view('welcome');
});
Route::get('/', 'web\FrontController@index')->name('front');
Route::get('/article/{article}', 'web\FrontController@blogpost')->name('front.show');
Route::get('/categories/{slug}', 'web\FrontController@getCategory')->name('front.category');


Auth::routes();
Route::get('/admin', 'HomeController@index');
Route::get('/admin/home', 'HomeController@index')->name('home');
Route::resource('/admin/category', 'CategoryController');
Route::resource('/admin/article', 'ArticleController');
