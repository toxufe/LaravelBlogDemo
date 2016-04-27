<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', "HomeController@index");

//Route::get('/',function(){
//    return view('public.index');
//});
//Route::post('/article','ArticleController@store');

Route::Resource('/article','ArticleController');
Route::Post('/article/delete','ArticleController@destroy');

Route::auth();
Route::get('/', 'ArticleController@index');
