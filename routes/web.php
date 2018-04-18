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
Route::get('/', function () {
    return view('welcome');
});
Route::get('posts','postsController@index')->name('posts')->middleware('auth');
Route::get('posts/show/{id}','postsController@show')->name('posts.show')->middleware('auth');

Route::get('posts/create','postsController@create')->name('posts.create')->middleware('auth');
Route::post('posts','postsController@store')->name('posts.store');

Route::get('posts/{id}/edit','postsController@edit')->name('posts.edit')->middleware('auth');
Route::post('posts/{id}/update', 'postsController@update')->name('posts.update');

Route::delete('posts/{post}','postsController@destroy')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('logout/github', 'Auth\LoginController@destroy');