<!DOCTYPE html>
<html lang="es">
    <head>
        <title> @yield('titulo', 'CDMYPE - Inicio de Sesión') </title>
        <meta charset="UTF-8">
        <meta name=description content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='shortcut icon' href='/cdmype/sistema/assets/img/favicon.png'>
        <!-- CSS -->
            <!-- Bootstrap -->
            {{ HTML::style('assets/css/jquery-ui.css', array('media' => 'screen')) }}
            {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
            <!-- Mascaras -->
            {{ HTML::style('assets/css/jasny-bootstrap.min.css') }}
            <!-- validator -->
            {{ HTML::style('assets/validator/css/bootstrapValidator.min.css', array('media' => 'screen')) }}
            <!-- Shosen -->
            {{ HTML::style('assets/chosen/chosen.min.css', array('media' => 'screen')) }}
            <!-- Switch -->
            {{ HTML::style('assets/switch/css/bootstrap-switch.min.css') }}
            <!-- Botones Animados -->
            {{ HTML::style('assets/ladda/ladda-themeless.min.css', array('media' => 'screen')) }}
            {{ HTML::style('assets/css/estilo.css', array('media' => 'screen')) }}
            {{ HTML::style('assets/css/animate.min.css', array('media' => 'screen')) }}

    </head>
    <body>
        <br/>
        <div class="container">

            @yield('contenido')

        </div>
        <!-- JS -->
            <!-- Bootstrap -->
            {{ HTML::script('assets/js/jquery.min.js') }}
            {{ HTML::script('assets/js/jquery-ui.js') }}
            {{ HTML::script('assets/js/bootstrap.min.js') }}
            <!-- Validator -->
            {{ HTML::script('assets/validator/js/bootstrapValidator.min.js') }}
            <!-- Mascaras -->
            {{ HTML::script('assets/js/jasny-bootstrap.min.js') }}
            <!-- Botones Animados -->
            {{ HTML::script('assets/ladda/spin.min.js') }}
            {{ HTML::script('assets/ladda/ladda.min.js') }}
            <!-- Shosen -->
            {{ HTML::script('assets/chosen/chosen.min.js') }}
            <!-- Mensajes -->
            {{ HTML::script('assets/js/bootstrap-growl.min.js') }}
            <!-- switch -->
            {{ HTML::script('assets/switch/js/bootstrap-switch.min.js') }}
            <!-- Libreria -->
            {{ HTML::script('assets/js/libreria.js') }}

            {{ HTML::script('assets/js/areyousure.js') }}
            {{ HTML::script('assets/js/modernizr.js') }}
            {{ HTML::script('assets/js/pollyfiller.js') }}

            {{ HTML::script('assets/js/bootstrap-filestyle.js') }}

       <!-- Para las fechas -->
 <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>

 <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>

         <script>
             webshims.setOptions('waitReady', false);
             webshims.setOptions('forms-ext', {types: 'date'});
             webshims.polyfill('forms forms-ext');
             $('form').areYouSure( {'message':'Your profile details are not saved!'} )
             $('form').areYouSure();
            $(":file").filestyle({buttonText: "Buscar"});
         </script>

            @yield("script")
    </body>
</html>
