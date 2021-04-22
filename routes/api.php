<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->group(function () {
    Route::get('/users', 'UsersController@index');
});
Route::namespace('Api')->group(function () {
    Route::get('/audio', 'AudioController@index');
});
Route::namespace('Api')->group(function () {
    Route::post('/auth', 'AuthController@auth');
    Route::post('/userInfo', 'UsersController@getUser');
    Route::post('/getPostsWhere', 'PostsController@getWhere');
    Route::post('/getTopUsers', 'UsersTopController@getUsersComp');
    Route::post('/getDialogs', 'DirectController@getDialogs');
    Route::post('/subscribe', 'SubController@subscribe');
    Route::post('/checkSub', 'SubController@check');
    Route::post('/unSub', 'SubController@unSubscribe');
    Route::post('/check', 'AuthController@auth');
});
Route::namespace('Api')->group(function () {
    Route::post('/reg', 'RegController@reg');
});
Route::namespace('Api')->group(function () {
    Route::post('/getImage', 'AuthController@getImage');
});
Route::namespace('Api')->group(function () {
    Route::post('/getPosts', 'PostsController@show');
});

