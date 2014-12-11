<!DOCTYPE html>
<html lang="es">
    <head>
        <title> @yield('titulo', 'CDMYPE - Sistema CDMYPE') </title>
        <meta charset="UTF-8">
        <meta name=description content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='shortcut icon' href='/cdmype/sistema/assets/img/favicon.png'>
        <!-- CSS -->
        {{ HTML::style('assets/css/estilus.css', array('media' => 'screen')) }}

    </head>
    <body>
        <br/>
        <div id="cont" class="container">

            @yield('contenido')

        </div>
        <!-- JS -->
            <!-- Bootstrap -->
            {{ HTML::script('assets/js/jquery.min.js') }}
            {{ HTML::script('assets/js/jquery-ui.js') }}
            {{ HTML::script('assets/js/bootstrap.min.js') }}
            <!-- Validator -->
            {{ HTML::script('assets/js/bootstrapValidator.min.js') }}
            <!-- Mascaras -->
            {{ HTML::script('assets/js/jasny-bootstrap.min.js') }}
            <!-- Botones Animados -->
            {{ HTML::script('assets/js/spin.min.js') }}
            {{ HTML::script('assets/js/ladda.min.js') }}
            <!-- Shosen -->
            {{ HTML::script('assets/js/chosen.min.js') }}
            <!-- Mensajes -->
            {{ HTML::script('assets/js/bootstrap-growl.min.js') }}
            <!-- switch -->
            {{ HTML::script('assets/js/bootstrap-switch.min.js') }}
            <!-- DataTable -->
            {{ HTML::script('assets/js/dataTables.min.js') }}
            {{ HTML::script('assets/js/dataTables.bootstrap.js') }}
            <!-- Libreria -->
            {{ HTML::script('assets/js/libreria.js') }}

            {{ HTML::script('assets/js/areyousure.js') }}
            {{ HTML::script('assets/js/modernizr.js') }}
            {{ HTML::script('assets/js/pollyfiller.js') }}

            {{ HTML::script('assets/js/bootstrap-filestyle.js') }}


            <!-- calendario de trabajo -->
            {{ HTML::script('assets/js/underscore-min.js') }}
            {{ HTML::script('assets/js/calendar.js') }}
            {{ HTML::script('assets/js/es-Es.js') }}


            {{ HTML::script('assets/js/jquery.contextMenu.js') }}
            {{ HTML::script('assets/js/jquery.ui.position.js') }}

         <!-- Para las fechas -->
 <!-- <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>

 // <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script> -->

{{-- date_default_timezone_set('America/El_Salvador')--}}

         <script>
             webshims.setOptions('waitReady', false);
             webshims.setOptions('forms-ext', {types: 'date'});
             webshims.polyfill('forms forms-ext');
             $('form').areYouSure( {'message':'Your profile details are not saved!'} )
             $('form').areYouSure();
            $(":file").filestyle({buttonText: "Buscar"});
         </script>

            @yield("script")
            @yield("script2")
    </body>
</html>
