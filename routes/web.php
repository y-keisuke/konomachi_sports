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

//フォロー機能
Route::post('follows', 'FollowController@store');
Route::delete('follows', 'FollowController@destory');

//メッセージ機能
Route::get('boards/{board}', 'BoardController@show');
Route::post('boards', 'BoardController@store');
Route::post('messages', 'MessageController@store');

//検索
Route::get('search', 'SearchController@search');
Route::get('searched', 'SearchController@index');
