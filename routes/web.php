
<?php

Route::get('/', function ()
{
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/reportar', 'HomeController@report');


Route::group(['middleware' => 'admin', 'namespace'=>'Admin'], function () 
	{
    	Route::get('/usuarios', 'UserController@index');
    	
    });
