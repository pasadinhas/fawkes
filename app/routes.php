<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Pages
 */
Route::get('/', [
    'as' => 'home',
    'uses' => 'PageController@home'
]);

/**
 * Groups
 */
Route::group(['prefix' => 'groups'], function()
{
    Route::get('/', [
        'as' => 'groups',
        'uses' => 'GroupsController@index'
    ]);
});

/**
 * Authentication
 */
Route::get('/login', [
    'before' => 'guest',
    'as' => 'login',
    'uses' => 'SessionController@store'
]);

Route::get('/logout', [
    'before' => 'auth',
    'as' => 'logout',
    'uses' => 'SessionController@destroy'
]);