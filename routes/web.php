
  <?php

  Route::get('/', function ()
  {
  	return view('welcome');
  });

  Auth::routes();

  Route::get('/home/', 'HomeController@index');

  Route::get('/profile', 'Admin\UserController@profile');
   Route::post('/profile', 'Admin\UserController@update_avatar');

     Route::post('/profileUpdate', 'Admin\UserController@updateProfile');

  

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

        Route::get('/eliminarpaciente/{id}', 'PacienteController@delete');

        Route::get('/restaurarpaciente/{id}', 'PacienteController@restore');




     //ayuda consulta con hidden 
      Route::get('/consultarPacientes', 'PacienteController@consultarPacientes'); 
      Route::get('/searchConsulta','PacienteController@searchConsulta');



          Route::get('/recetasPacientes', 'PacienteController@RecetaPacientes');
          Route::get('/search','PacienteController@search');




          //22222222


           Route::get('/registrarPacientes', 'PacienteController@registrarPacientes');

           Route::post('/guardarPaciente', 'PacienteController@guardarPaciente');     

        //    Route::get('/consultarPacientes', 'PacienteController@consultarPacientes'); 
           

           Route::get('/pacienteshistorial', 'PacienteController@pacienteHistorial');

           Route::get('/Receta/{id}', 'PacienteController@recetas');
           Route::post('/Receta/{id}', 'PacienteController@guardarReceta');

           Route::get('pacientePDF/{id}', 'PacienteController@pacientePDF');

           Route::get('/historialRecetas', 'PacienteController@historialRecetas');
          Route::get('/historialSearch','PacienteController@historialSearch');


           Route::get('PDF/{id}', 'PacienteController@PDF');

      });
