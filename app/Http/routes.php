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

Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@store');

Route::auth();

Route::get('/admin', 'AdminController@index');

// USERS
// this is magic, try php artisan route:list in console to see all the routes handled by this
Route::resource('/admin/users', 'UserController');

Route::get('/admin/users/delete/{user}', ['as' => 'admin.user.delete', 'uses' => 'UserController@destroy']);

// Contestants
Route::group(['prefix' => 'admin'], function () {
    Route::get('/contestants/photos', 'ContestantController@photos');
    Route::get('/contestants/preselected', 'ContestantController@preselected');
    Route::get('/contestants/finalists', 'ContestantController@finalists');
    Route::get('/contestants/{contestants}/status/{status}', 'ContestantController@status');
    Route::get('/contestants/delete/{contestant}', ['as' => 'admin.contestants.delete', 'uses' => 'ContestantController@destroy']);
    Route::get('/contestants/exportcsv', 'ContestantController@exportcsv');
    Route::resource('/contestants', 'ContestantController');
});

