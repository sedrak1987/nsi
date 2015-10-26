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

Route::get('/', 'Auth\AuthController@getLogin'
);
Route::get('admin/login', 'Auth\AuthController@getLogin');

// Registration routes...
Route::post('admin/login', 'Auth\AuthController@postLogin');
Route::get('admin/logout', 'Auth\AuthController@getLogout');
Route::get('admin/logout', [
    'as' => 'logout', 'uses' => 'Auth\AuthController@getLogout'
]);




Route::group(['middleware' => 'auth'], function () {
    Route::resource('admin/projects', 'Admin\ProjectsController');
    Route::resource('admin/accounts', 'Admin\AccountsController');
    Route::resource('admin/charges', 'Admin\ChargesController');
    //Route::get('admin/{x}', 'Admin\MainController');
    Route::post('admin/create', 'Admin\MainController@create');
    Route::resource('admin', 'Admin\MainController');
});

