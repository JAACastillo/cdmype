
<script type="text/javascript">

$(document).ready(function() {

	$('#validar').bootstrapValidator({
        message: 'Valor no valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido.'
                    }
                }
            },
            sexo: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            nit: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            dui: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            departamento: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            municipio_id: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            direccion: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            correo: {
                validators: {
                    emailAddress: {
                        message: 'El correo no es valido.'
                    } 
                }
            },
            telefono: {
                validators: {
                    regexp: {
                        regexp: /^[-0-9_\.]+$/,
                        message: 'No se permiten caracteres especiales'
                    }
                }
            },    
            celular: {
                validators: {
                    regexp: {
                        regexp: /^[-0-9_\.]+$/,
                        message: 'No se permiten caracteres especiales'
                    } 
                }
            }           
        }
    });


});

</script>
