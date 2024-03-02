<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/get', '\App\Http\Controllers\GetController');
Route::post('/post', '\App\Http\Controllers\PostController');

Route::group([
    'prefix' => 'auth',
    'namespace' => '\App\Http\Controllers\User',
    'middleware' => 'guest',
], function () {
    Route::post('/login', 'LoginController');
    Route::post('/register', 'RegisterController');
});

Route::group([
    'prefix' => 'auth',
    'middleware' => 'auth:sanctum',
    'namespace' => '\App\Http\Controllers',
], function () {
    Route::group([], function () {
//        Route::delete('/auth/personal_access_token', 'User\TokenController@destroy');
//        Route::get('/users/', 'User\UserController');
        Route::delete('/user/logout', 'User\LogoutController');
        Route::get('/user', 'User\CheckLoginController');
//        Route::patch('/users/', 'User\UpdateController');
    });
});

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
