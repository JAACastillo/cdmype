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

    Route::get('login', ['as' => 'login'  ,'uses' => 'AutenticacionController@get_login']);

    Route::post('login', 'AutenticacionController@post_login');
    Route::get('asistencia-tecnica/tdr/{id}', ['as' => 'pdfAt', 'uses' => 'pasoTerminosController@pdf']);
    Route::get('capacitaciones/tdr/{id}', ['as' => 'pdfCap', 'uses' => 'CapTerminoController@pdf']);

    Route::get('formato/{doc}', ['as' => 'f7', 'uses' =>
    function($doc){
        return Redirect::to('assets/formatos/'. $doc);
    }
    ]);

    Route::get('correo', function(){
        $usuario = User::find(1);
        $pass = "11231123";
        return View::make('emails.usuarioCreado', compact('usuario', 'pass'));

    });

    //AutoComplementar
        Route::controller('api', 'ApiController');//Ver Especialidades
        Route::get('consultor/especialidades/{idConsultor}', ['as' => 'verEspecialidades', 'uses' => 'ConsultorController@verEspecialidades']);


/* Si esta Logueado */

    Route::group(array('before'=>'auth'), function()
    {

        Route::get('diplomas', ['as' => 'diplomas', 'uses' => function(){
            $empresarios = Diploma::all();
            // return $empresarios;
            return View::make('diplomas', compact('empresarios'));
        }]);
        route::get('diploma/{id}', [ 'as' => 'diploma', 'uses' => function($id){

            $empresario = Diploma::find($id);
            $nombre = $empresario->nombre;
            $estado = $empresario->tipo;
            // $nombre = "RENÉ ORLANDO SANABRIA ZAMORA";
            $curso = "Diplomado en Gestión Empresarial";

            $pdf = App::make('dompdf');
            $pdf->loadView('pdf.diploma', compact('nombre', 'curso', 'estado'));
            return $pdf->stream();
        }]);

    require(__DIR__ . '/routes/configuraciones.php');
    require(__DIR__ . '/routes/asesorias.php');
    require(__DIR__ . '/routes/usuarios.php');
    require(__DIR__ . '/routes/empresas.php');
    require(__DIR__ . '/routes/empresarios.php');
    require(__DIR__ . '/routes/consultores.php');
    require(__DIR__ . '/routes/atterminos.php');
    require(__DIR__ . '/routes/capacitaciones.php');
    require(__DIR__ . '/routes/eventos.php');

    /* Index */
        Route::get('/', function() {
            return View::make('dashboard');
        });

    /* Cerrar Sesion */
        Route::get('/logout', 'AutenticacionController@get_logOut');




    //Buscar
        Route::controller('buscar', 'ApiController');

    //Pagina error

        App::error(function($exception, $code)
        {
            switch ($code)
            {
                case 404:
                    return Response::view('pagina_404', array(), 404);
            }
        });

    });


