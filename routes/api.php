<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function () {

    // Webapp routes
    Route::group(['prefix' => 'dogs'], function () {
        Route::get('/', 'DogController@index');
        Route::post('add', 'DogController@store');
        Route::get('edit/{id}', 'DogController@edit');
        Route::post('update/{id}', 'DogController@update');
        Route::delete('delete/{id}', 'DogController@delete');
    });

    // Admin routes
    Route::group([
        'prefix' => 'admin',
        'namespace' => 'Admin'
    ], function () {
        
        Route::group(['namespace' => 'Auth'], function () {
            Route::get('login', 'LoginController@showLoginForm');
            Route::post('login', 'LoginController@login');
            Route::post('edit/{id}', 'LoginController@logout');
            
            Route::post('update/{id}', 'UserController@update');
            Route::delete('block/{id}', 'UserController@block');
            Route::get('/{id}/dogs', 'UserController@listDogs');
        });

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'UserController@index');
            Route::post('add', 'UserController@add');
            Route::get('edit/{id}', 'UserController@edit');
            Route::post('update/{id}', 'UserController@update');
            Route::delete('block/{id}', 'UserController@block');
            Route::get('/{id}/dogs', 'UserController@listDogs');
        });

        Route::group(['prefix' => 'breeds'], function () {
            Route::get('/', 'BreedController@index');
            Route::get('/{id}', 'BreedController@show');
            Route::post('add', 'BreedController@add');
            Route::get('edit/{id}', 'BreedController@edit');
            Route::post('update/{id}', 'BreedController@update');
            Route::delete('delete/{id}', 'BreedController@delete');
        });
    });
});
