@extends('plantillas.plantilla')

@section('contenido')

    <div class="row animated flipInY">
        <div class="col-xs-0 col-sm-3">
            <!-- Izquierda -->
        </div>
        
        <div class="col-xs-12 col-sm-6">
        
        @if(Session::has('mensaje_error'))
            @section('script')

            <script type="text/javascript">

                $.growl("Tus datos son incorrectos", {
                    type: "danger",
                    allow_dismiss: false,
                    animate: {
                        enter: 'animated bounceIn',
                        exit: 'animated bounceOut'
                    }                               
                });
            </script>
            @stop
        @endif
            <!-- Formulario -->
            {{ Form::open(array('url' => '/login', 'class' => 'form-horizontal', 'id' => 'validar')) }}
                <!-- Emcabezado -->
                    <center>
                        <img class='img-responsive' src="assets/img/cdmype-logo.jpg">
                    </center>
                    
                    <legend></legend>
                <!-- Panel -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <center><h2 class="panel-title">Bienvenido</h2></center>
                        </div>
                        <div class="panel-body">
                        <br/>
                            <!-- Correo -->
                             <div class="form-group">
                                {{ Form::label('correo', 'Correo Electrónico:', array('class' => 'control-label col-md-3')) }}
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon glyphicon glyphicon-envelope"></div>
                                        {{ Form::text('correo', null, array('placeholder' => 'ejemplo@ejemplo.com', 'class' => 'form-control', 'autofocus')) }}
                                    </div>
                                    </div>
                            </div>                             
                            <!-- Contraseña -->
                            <div class="form-group">
                                {{ Form::label('contrasena', 'Contraseña:', array('class' => 'control-label col-md-3')) }}
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon glyphicon glyphicon-lock"></div>
                                         {{ Form::password('contrasena', array('placeholder' => 'Contraseña', 'class' => 'form-control')) }}
                                    </div>
                                    </div>
                            </div> 
                        </div>
                    
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-xs-2"></div>
                                <div class="col-xs-8">
                                    <!-- Boton -->
                                    <button type="submit" tabindex="3" class="btn btn-primary btn-lg btn-block ladda-button" data-style="zoom-in">
                                    <span class="glyphicon glyphicon-ok">&nbsp</span>
                                     Iniciar sesión
                                    </span><span class="ladda-spinner"></span><span class="ladda-spinner"></span></button>
                                </div>
                                <div class="col-xs-2"></div>
                            </div>
                        </div>
                    </div>
            {{form::close()}}
        </div>
        
        <div class="col-xs-1 col-sm-3">
            <!-- derecha -->
        </div>
    </div>
@section("script")

@include('validaciones.inicio')

@stop

@stop