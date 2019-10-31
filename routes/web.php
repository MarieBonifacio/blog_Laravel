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

//FORMULAIRE
Route::get('/article', 'ArticleController@index')->name('articles');
Route::get('/article/{id}', 'ArticleController@showArticle')->name('article');
Route::get('/createArticle', 'ArticleController@create')->name('createArticle')->middleware('auth');
Route::post('/storeArticle', 'ArticleController@store')->name('storeArticle')->middleware('auth');
Route::delete('/article/{id}', 'ArticleController@delete')->name('deleteArticle')->middleware('auth');
Route::get('/updateArticle/{id}', 'ArticleController@edit')->name('editArticle')->middleware('auth');
Route::put('/updateArticle/{article}', 'ArticleController@update')->name('updateArticle')->middleware('auth');

//IMAGES
Route::get('image-upload', 'ImageUploadController@imageUpload')->name('imageUpload');
Route::post('image-upload', 'ImageUploadController@imageUploadPost')->name('imageUploadPost');

//USER
Route::get('/profil/{id}', 'HomeController@profil')->name('profil');