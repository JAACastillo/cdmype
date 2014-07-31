@extends('plantillas.plantilla')

@section('contenido')

    <div class="row">
        <div class="col-xs-0 col-sm-3 col-md-2">
            <!-- Izquierda -->
        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-8">
        
        @if(Session::has('mensaje_error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('mensaje_error') }}
            </div>
        @endif

            <!-- Formulario -->
            {{ Form::open(array('url' => '/login', 'class' => 'form-horizontal')) }}
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
                                <label for="correo" class="control-label col-xs-12 col-sm-12 col-md-3">Correo Eléctronico: </label>
                                <div class="col-xs-12 col-sm-12 col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon glyphicon glyphicon-envelope"></span>
                                        <input name="correo" type="text" class="form-control" value="" autofocus="autofocus" tabindex="1" placeholder="ejemplo@ejemplo.com">
                                    </div>    
                                </div>
                            </div>
                            <!-- Contraseña -->
                            <div class="form-group">
                                <label for="contrasena" class="control-label col-xs-12 col-sm-12 col-md-3">Contraseña: </label>
                                <div class="col-xs-12 col-sm-12 col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon glyphicon glyphicon-lock"></span>
                                        <input name="contrasena" type="password" class="form-control" value="" tabindex="2" placeholder="Ingrese su contraseña">
                                    </div>
                                    <br/>
                                    <div class="input-group">
                                    {{ Form::checkbox('rememberme', true) }}  
                                    {{ Form::label('lblRememberme', 'Recordar contraseña') }}
                                    </div>
                                </div>
                            </div>                 
                        </div>
                    
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-xs-2"></div>
                                <div class="col-xs-8">
                                    <!-- Boton -->
                                    <button type="submit" tabindex="3" class="btn btn-danger btn-lg btn-block">
                                    <span class="glyphicon glyphicon-ok"></span>
                                     Iniciar sesión
                                    </button>
                                </div>
                                <div class="col-xs-2"></div>
                            </div>
                        </div>
                    </div>
            {{form::close()}}

        </div>
        
        <div class="col-xs-1 col-sm-3 col-md-2">
            <!-- derecha -->
        </div>
    </div>

@stop