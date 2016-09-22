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

Route::post('/edit', function(\Illuminate\Http\Request $request){
    return response()->json(['message' => $request['body']]);
})->name('edit');
