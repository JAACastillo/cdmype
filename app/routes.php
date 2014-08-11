<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* Login */

	Route::get('login', 'AutenticacionController@get_login');
    
	Route::post('login', 'AutenticacionController@post_login');

/* Si esta Logueado */

    Route::group(array('before'=>'auth'), function() 
    {
    
    require(__DIR__ . '/routes/configuraciones.php');
    require(__DIR__ . '/routes/usuarios.php');
    require(__DIR__ . '/routes/empresas.php');
    require(__DIR__ . '/routes/empresarios.php');
    require(__DIR__ . '/routes/consultores.php');
    require(__DIR__ . '/routes/atterminos.php');

    /* Index */
        Route::get('/', function() {
            return View::make('index');
        });
    
    /* Cerrar Sesion */
        Route::get('logout', 'AutenticacionController@get_logOut');


       
    //AutoComplementar
        Route::controller('api', 'ApiController');

    });
