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
        {{ HTML::script('assets/js/areyousure.js') }}

        <!-- Para las fechas -->
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
        <!-- polyfiller file to detect and load polyfills -->
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>

        <script>
          webshims.setOptions('waitReady', false);
          webshims.setOptions('forms-ext', {types: 'date'});
          webshims.polyfill('forms forms-ext');
    $('form').areYouSure( {'message':'Your profile details are not saved!'} )       
          $('form').areYouSure();
   
        </script>
    </body>
</html>