<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'SiteController@showIndex');
Route::get('/articles', 'ArticleController@showArticleList');
Route::get('/article/{id}', 'ArticleController@showArticle');
Route::post('/article', 'ArticleController@postArticle');
Route::post('/comment', 'ArticleController@postComment');
Route::get('/login', 'UserController@showLogin');
Route::post('/login', 'UserController@authentication');
Route::get('/profile', 'UserController@profile');
Route::get('/logout', 'UserController@logout');
Route::post('/avatar','UserController@uploadAvatar');
Route::get('/editor','AdminController@editor');
Route::get('/aboutme','SiteController@aboutme');
Route::get('/user','AdminController@newUser');
Route::post('/user','AdminController@addUser');
