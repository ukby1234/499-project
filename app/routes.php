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

Route::get('/weather/{location}', 'WeatherController@getWeather');
Route::get('/', 'SiteController@showIndex');
Route::get('/articles', 'SiteController@showArticleList');
Route::get('/article/{id}', 'SiteController@showArticle');
Route::post('/article', 'SiteController@postArticle');
Route::get('/login', 'SiteController@showLogin');
Route::post('/login', 'SiteController@authentication');
Route::get('/profile', 'SiteController@profile');
Route::get('/logout', 'SiteController@logout');