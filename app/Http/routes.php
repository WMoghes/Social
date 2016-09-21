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

Route::get('/', [
    'uses' => 'UserController@getHome',
    'as' => 'home'
]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [
        'uses' => 'UserController@getDashboard',
        'as' => 'dashboard'
    ]);
    Route::get('/logout', [
        'uses' => 'UserController@logout',
        'as' => 'logout'
    ]);
});

Route::post('/signup', [
    'uses' => 'UserController@postSignup',
    'as' => 'signup'
]);

Route::post('/signin', [
    'uses' => 'UserController@postSignin',
    'as' => 'signin'
]);

Route::post('/create-post', [
    'uses'  => 'PostController@postCreatePost',
    'as'    => 'post.create'
]);

