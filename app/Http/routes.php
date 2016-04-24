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

// Route::when('*', 'csrf', ['post', 'put', 'delete']);

Route::get('/login', 'Auth\AuthController@showLogin');
Route::post('/login', 'Auth\AuthController@doLogin', ['before' => 'csrf']);

Route::get('/register', 'Auth\AuthController@showRegistration');
Route::post('/register', 'Auth\AuthController@doRegistration', ['before' => 'csrf']);

Route::get('/', 'Dashboard\DashboardController@index');

Route::resource('clients', 'Clients\ClientsController');