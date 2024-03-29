<?php

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/color', 'HomeController@color')->name('home.color');
    Route::post('/color', 'HomeController@colorPost')->name('colorPost');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

        /* Google Social Login */
        Route::get('/login/google', 'GoogleLoginController@redirect')->name('login.google-redirect');
        Route::get('/login/google/callback', 'GoogleLoginController@callback')->name('login.google-callback');

        /* facebook Social Login */
        Route::get('/login/facebook', 'FacebookLoginController@redirect')->name('auth.facebook');
        Route::get('/login/facebook/callback', 'FacebookLoginController@callback')->name('handleFacebookCallback');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});
