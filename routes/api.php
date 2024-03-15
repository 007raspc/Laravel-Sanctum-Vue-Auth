<?php

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
    'middleware' => 'auth:sanctum',
    'namespace' => '\App\Http\Controllers',
], function () {
    Route::group([
        'prefix' => 'auth',
    ], function () {
        Route::delete('/user/logout', 'User\LogoutController');
        Route::get('/user', 'User\CheckLoginController');
        Route::get('/user/show', 'User\ShowController');
        Route::get('/user/me', 'User\ShowController@me');
        Route::patch('/user/', 'User\UpdateController');
//        Route::delete('/auth/personal_access_token', 'User\TokenController@destroy');
//        Route::get('/users/', 'User\UserController');
    });
    Route::group([
        'prefix' => 'products',
        'namespace' => '\App\Http\Controllers\Product',
    ], function () {
        Route::get('/', 'IndexController');
        Route::get('/create', 'CreateController');
        Route::post('/', 'StoreController');
        Route::get('/{product}/edit', 'EditController');
        Route::patch('/{product}', 'UpdateController');
        Route::delete('/{product}', 'DeleteController');
    });
    Route::group([
        'prefix' => 'companies',
        'namespace' => '\App\Http\Controllers\Company',
    ], function () {
        Route::get('/', 'IndexController');
        Route::get('/{company}', 'ActivateController');
//        Route::get('/create', 'CreateController');
        Route::post('/', 'StoreController');
        Route::delete('/{company}', 'DeleteController');
    });
    Route::group([
        'prefix' => 'helpers',
        'namespace' => '\App\Http\Controllers\Helper',
    ], function () {
        Route::post('/upload', 'UploadController');
    });
});
