<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//home
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('home', 'PagesController@home');

//Auth
Route::group(['namespace' => 'Auth', 'middleware' => 'web'], function(){
    Route::get('signup', ['as' => 'signup', 'uses' => 'AuthController@signup']);
    Route::post('signup', 'AuthController@register');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
