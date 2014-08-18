
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
            correo: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido.'
                    },
                    emailAddress: {
                        message: 'Campo invalido.'
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
            'especialidad_id[]': {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            telefono: {
                validators: {
                    emailAddress: {
                        message: 'Campo invalido.'
                    }
                }
            },
            celular: {
                validators: {
                    emailAddress: {
                        message: 'Campo invalido.'
                    }
                }
            }
            
        }
    });


});

</script>