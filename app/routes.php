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


       
    /* Asistencia Tecnica TDR */

        /* Paso 1 */
        /* Paso 2 */
        Route::any('attermino-empresa',function(){
            return View::make('asistencia-tecnica.creacion-paso-1');
        });
        /* Paso 3 */
        Route::any('attermino-envio-oferta',function(){
            $consultores = Consultor::orderBy('nombre','asc')
            ->paginate();

            return View::make('asistencia-tecnica.creacion-paso-4')
            ->with('consultores', $consultores);
        });
        /* Paso 4 */
        Route::any('attermino-agregar-oferta',function(){
            $consultores = Consultor::orderBy('nombre','asc')
            ->paginate();

            return View::make('asistencia-tecnica.creacion-paso-5')
            ->with('consultores', $consultores);
        });
        /* Paso 5 */
        Route::any('attermino-seleccion-consultor',function(){
            $consultores = Consultor::orderBy('nombre','asc')
            ->paginate();

            return View::make('asistencia-tecnica.creacion-paso-6')
            ->with('consultores', $consultores);
        });
        /* Paso 6 */
        Route::resource('atcontratos','AtContratoController');
        /* Paso 7 */
        Route::resource('actas','ActaController');


    /* Capacitaciones TDR */

        /* Paso 1 */
        Route::resource('capterminos','CapTerminoController');
        /* Paso 1 */
        Route::any('captermino-empresa',function(){
            return View::make('capacitaciones.creacion-paso-1');
        });
        /* Paso 4 */
        Route::any('captermino-envio-oferta',function(){
            $consultores = Consultor::orderBy('nombre','asc')
            ->paginate();

            return View::make('capacitaciones.creacion-paso-4')
            ->with('consultores', $consultores);
        });
        /* Paso 5 */
        Route::any('captermino-agregar-oferta',function(){
            $consultores = Consultor::orderBy('nombre','asc')
            ->paginate();

            return View::make('capacitaciones.creacion-paso-5')
            ->with('consultores', $consultores);
        });
        /* Paso 6 */
        Route::any('captermino-seleccion-consultor',function(){
            $consultores = Consultor::orderBy('nombre','asc')
            ->paginate();

            return View::make('capacitaciones.creacion-paso-6')
            ->with('consultores', $consultores);
        });
        /* Paso 7 */
        Route::resource('capcontratos','CapContratoController');

    //AutoComplementar
        Route::controller('api', 'ApiController');

    });
