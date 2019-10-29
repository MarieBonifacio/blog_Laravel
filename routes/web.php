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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/article', 'ArticleController@index')->name('articles');
Route::get('/article/{id}', 'ArticleController@showArticle')->name('article');
Route::get('/createArticle', 'ArticleController@create')->name('createArticle')->middleware('auth');
Route::post('/storeArticle', 'ArticleController@store')->name('storeArticle')->middleware('auth');
Route::delete('/article/{id}', 'ArticleController@delete')->name('deleteArticle')->middleware('auth');
    

Route::get('/profil/{id}', 'HomeController@profil')->name('profil');