<!DOCTYPE html>
<html lang="es">
    <head>
        <title> @yield('titulo', 'CDMYPE - Inicio de Sesión') </title>
        <meta charset="UTF-8">
        <meta name=description content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='shortcut icon' href='/cdmype/public/assets/img/favicon.png'>


        <!-- CSS -->
        {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
        {{ HTML::script('assets/js/jasny-bootstrap.min.css') }}

    </head>
    <body>
        <br/>
        <div class="container">

            @yield('contenido')

        </div>
        
        <!-- JS -->
        {{ HTML::script('assets/js/jquery-2.1.1.min.js') }}
        {{ HTML::script('assets/js/bootstrap.min.js') }}
        <!-- Mascaras -->
        {{ HTML::script('assets/js/jasny-bootstrap.min.js') }}

    </body>
</html>