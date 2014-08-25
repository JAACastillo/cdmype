
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
                    },
                    regexp: {
                        regexp: /(^([0-9]{4,4}[-]{1,1}[0-9]{6,6}[-]{1,1}[0-9]{3,3}[-]{1,1}[0-9]{1,1})|^)$/,
                        message: 'NIT invalido'
                    }
                }
            },
            dui: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    },
                    regexp: {
                        regexp: /(^([0-9]{8,8}[-]{1,1}[0-9]{1,1})|^)$/,
                        message: 'DUI invalido'
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
                    regexp: {
                        regexp: /(^([0-9]{4,4}[-]{1,1}[0-9]{4,4})|^)$/,
                        message: 'Telefono invalido'
                    }
                }
            },
            celular: {
                validators: {
                    regexp: {
                        regexp: /(^([0-9]{4,4}[-]{1,1}[0-9]{4,4})|^)$/,
                        message: 'Telefono invalido'
                    }
                }
            }
            
        }
    });


});

</script>