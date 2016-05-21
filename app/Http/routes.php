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

 
Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'HomeController@home');
    Route::get('/curso/{id}', 'HomeController@home');


    /*** ADMIN ***/
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('/admin', 'HomeController@index');

    Route::get('/reprovados', 'HomeController@reproved');    

    Route::get('/cadastrar', 'HomeController@createUsers');
    Route::post('/cadastrar', 'UserController@saveUsers');
   
    Route::post('/deleteuser', 'UserController@deleteUser');
    
    Route::get('/editar/{id}', 'HomeController@editUser');
    Route::post('/editar', 'UserController@editUser');

    Route::get('/gerenciar-usuarios', 'HomeController@usersManagement');

    Route::get('/convidar', 'HomeController@inviteUser');
    Route::post('/sendtoken', 'HomeController@sendEmail');
    
    /*  Courses */
    Route::get('/gerenciar-cursos', 'CourseController@coursesManagement');
    Route::get('/cadastrar-curso', 'CourseController@createCourse');
    Route::get('/editar-curso/{id}', 'HomeController@updateCourse');
    Route::post('/editar-curso/', 'CourseController@updateCourse');
    Route::post('/cadastrar-curso', 'CourseController@saveCourse');
    Route::post('/deletecourse', 'CourseController@deleteUser');

    /* Works */
    Route::post('/resendtoken', 'WorkController@resendToken');
    Route::post('/gerenciar', 'WorkController@manage');
    Route::get('/aprovados', 'HomeController@approved');


});
