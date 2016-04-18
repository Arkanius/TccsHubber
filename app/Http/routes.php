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

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
    	return view('index');
    });

    Route::get('/tcc', function () {
    });

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/admin', 'HomeController@index');

    Route::get('/cadastrar', 'HomeController@createUsers');
    Route::post('/cadastrar', 'UserController@saveUsers');
    Route::post('/deleteuser', 'UserController@deleteUser');

    Route::get('/gerenciar-usuarios', 'HomeController@usersManagement');
});
