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
    'uses'      => 'UserController@getHome',
    'as'        => 'home'
]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [
        'uses'  => 'PostController@getDashboard',
        'as'    => 'dashboard'
    ]);
    Route::get('/logout', [
        'uses'  => 'UserController@logout',
        'as'    => 'logout'
    ]);
});

Route::post('/signup', [
    'uses'      => 'UserController@postSignup',
    'as'        => 'signup'
]);

Route::post('/signin', [
    'uses'      => 'UserController@postSignin',
    'as'        => 'signin'
]);

Route::post('/create-post', [
    'uses'      => 'PostController@postCreatePost',
    'as'        => 'create.post'
]);

Route::get('/delete-post/{post_id}', [
    'uses'      => 'PostController@getDeletePost',
    'as'        => 'delete.post',
    'middleware'=> 'auth'
]);

Route::post('/edit',[
    'uses'      => 'PostController@postEditPost',
    'as'        => 'edit'
]);

Route::get('/account', [
    'uses'      => 'UserController@getAccount',
    'as'        => 'account'
]);

Route::post('/account-update', [
    'uses'      => 'UserController@postAccountUpdate',
    'as'        => 'account.update'
]);

Route::get('/user-image/{filename}', [
    'uses'      => 'UserController@getUserImage',
    'as'        => 'account.image'
]);
