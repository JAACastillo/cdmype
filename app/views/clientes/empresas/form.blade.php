<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            {{ Form::label('nombre', 'Nombre:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::text('nombre', null, array('placeholder' => 'Nombre', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('registro_iva', 'Registro de IVA:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::text('registro_iva', null, array('placeholder' => 'Registro de Iva', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('categoria', 'Categoría:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::select('categoria', array('' => '','1' => 'Empresa','2' => 'Grupo'), null, array('class' => 'form-control')) }} 
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('clasificacion', 'Clasificacion:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::select('clasificacion', array('' => '','1' => 'Emprendedor','2' => 'Micro-empresa','3' => 'Micro-empresa de Subsistencia','4' => 'Grupo Asociativo Empresas','5' => 'No Definido'), null, array('class' => 'form-control')) }} 
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('sector_economico', 'Sector Económico:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::select('sector_economico', array('' => '','1' => 'Artesanias','2' => 'Agroindustrias Alimentaria','3' => 'Calzado','4' => 'Comercio','5' => 'Construcción','5' => 'Química Farmaceutica','6' => 'Tecnología de Información y Comunicación','7' => 'Textiles y Confección','8' => 'Turismo','9' => 'Otros'), null, array('class' => 'form-control')) }} 
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('constitucion', 'Constitución:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::select('constitucion', array('' => '','1' => 'Informal Natural','2' => 'Formal Natural','3' => 'Formal Jurídica'), null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                        {{ Form::label('departamento', 'Departamento:', array('class' => 'control-label col-md-4')) }}
                        <div class="col-md-8">
                            {{ Form::select('departamento', $departamentos, null, array('class' => 'form-control')) }} 
                        </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('municipio_id', 'Municipio:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::select('municipio_id', $municipios, null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('direccion', 'Dirección:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::textarea('direccion', null, array('placeholder' => 'Dirección', 'rows' => '1', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('actividad', 'Actividad Económica:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::textarea('actividad', null, array('placeholder' => 'Actividad Económica', 'rows' => '2', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('descripcion', 'Descripción:', array('class' => 'control-label col-md-4')) }}
                            <div class="col-md-8">
                                {{ Form::textarea('descripcion', null, array('placeholder' => 'Descripción de la Empresa', 'rows' => '2', 'class' => 'form-control')) }}
                            </div>
                        </div>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>