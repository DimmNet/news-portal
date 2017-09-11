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

Route::get('/', 'NewsController@index')->name('home');

Route::get('/news/{news}/{title}', 'NewsController@show')->where('news', '\d+');
Route::get('/news/create', 'NewsController@create');
Route::post('/news', 'NewsController@store')->name('news.store');
Route::get('/news/edit/{news}', 'NewsController@edit')->name('news.edit')
    ->where('news', '\d+')->middleware('can:update,news');
Route::post('/news/update/{news}', 'NewsController@update')->name('news.update')
    ->where('news', '\d+')->middleware('can:update,news');
Route::delete('news/{news}', 'NewsController@destroy')->name('news.delete')
    ->where('news', '\d+')->middleware('can:delete,news');

Auth::routes();

Route::get('/home', 'HomeController@index');
