<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dogs', function () {
    return view('vue');
})->name('home');


// Route::get('/admin/{any}', function () {
//     return view('admin');
// })->where('any', '.*');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => 'role:admin'
], function () {
    
    // Route::group(['namespace' => 'Auth'], function () {
    //     // Authentication Routes
    //     $this->get('login', 'LoginController@showLoginForm')->name('admin.login');
    //     $this->post('login', 'LoginController@login');
    //     $this->post('logout', 'LoginController@logout')->name('admin.logout');

    //     // Registration Routes
    //     $this->get('register', 'RegisterController@showRegistrationForm')->name('admin.register');
    //     $this->post('register', 'RegisterController@register');

    //     // Password Reset Routes
    //     $this->get('password/reset', 'ForgotPasswordController@showLinkRequestForm');
    //     $this->post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
    //     $this->get('password/reset/{token}', 'ResetPasswordController@showResetForm');
    //     $this->post('password/reset', 'ResetPasswordController@reset');
    // });



    // Authentication routes group
    // Route::group(['namespace' => 'Auth'], function () {
    //     Route::get('login', 'LoginController@showLoginForm');
    //     Route::post('login', 'LoginController@login');
    //     Route::post('edit/{id}', 'LoginController@logout');
        
    //     Route::post('update/{id}', 'UserController@update');
    //     Route::delete('block/{id}', 'UserController@block');
    //     Route::get('/{id}/dogs', 'UserController@listDogs');
    // });

    // Admin Api routes
    Route::get('{any}', function () {
        return view('vue');
    })->where('any', '.*');

});

// Route::get('{any}', function () {
//     return view('home');
// })->where('any', '.*');
