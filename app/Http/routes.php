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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api'], function()
{
	Route::post('login', 'Login\AuthenticateController@authenticate');
	Route::get('user', 'Login\AuthenticateController@index');
	Route::get('companies', 'Companies\CompaniesController@index');
	Route::put('companies/{id}', 'Companies\CompaniesController@update');
	Route::post('companies', 'Companies\CompaniesController@store');
	Route::delete('companies/{id}', 'Companies\CompaniesController@destroy');
});
