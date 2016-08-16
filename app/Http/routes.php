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



    Route::get('/', 'AccountController@index');

//Route::get('/home', 'AccountController@index');

    Route::resource('/account', 'AccountController');

    Route::get('/report', 'ReportController@index');

    Route::get('/report/{date}', 'ReportController@show');

    Route::auth();

    Route::get('new-user', 'RegistrationController@index');

    Route::resource('/roles', 'RoleController');

    Route::resource('/manage-user', 'ManageUserController');

    Route::resource('/profile', 'UserProfileController');

    Route::get('/home', 'HomeController@index');

