
<?php

Route::get('/', function ()
{
	return view('welcome');
});

Auth::routes();

Route::get('/home/', 'HomeController@index');
Route::get('/reportar', 'HomeController@report');

//Administrador
Route::group(['middleware' => 'admin', 'namespace'=>'Admin'], function () 
	{
    	Route::get('/usuarios', 'UserController@index');
    	Route::post('/usuarios', 'UserController@store');


    	Route::get('/usuario/{id}', 'UserController@edit');
    	Route::post('/usuario/{id}', 'UserController@update');
    	Route::get('/usuario/{id}/eliminar', 'UserController@delete');

    	Route::get('/usuario/{id}/restaurar', 'UserController@restore');
    });

//Doctor

//Route::get('/pacientes', 'Doc\PacienteController@index');

Route::group(['middleware' => 'auth', 'namespace'=>'Doc'], function () 
	{
    	Route::get('/pacientes', 'PacienteController@index');
    	Route::post('/pacientes', 'PacienteController@store');



    	Route::get('/paciente/{id}', 'PacienteController@edit');
  		Route::post('/paciente/{id}', 'PacienteController@update');

 		Route::get('/paciente/{id}/eliminar', 'PacienteController@delete');



Route::get('/pacientesConsulta/{id}', 'PacienteController@indexConsulta');
        //22222222


         Route::get('/registrarPacientes', 'PacienteController@registrarPacientes');

         Route::post('/guardarPaciente', 'PacienteController@guardarPaciente');     

          Route::get('/consultarPacientes', 'PacienteController@consultarPacientes'); 

          Route::post('/consultarPacientes2', 'PacienteController@consultarPacientes2');


    });

