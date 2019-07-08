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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//ユーザー(個人)
Route::resource('users', 'UserController');

//チーム
Route::resource('teams', 'TeamController');

//活動状況
Route::resource('posts', 'PostController');

//お気に入り機能
Route::post('likes', 'LikeController@store');
Route::delete('likes', 'LikeController@destroy');
