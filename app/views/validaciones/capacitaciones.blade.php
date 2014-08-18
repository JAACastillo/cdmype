
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
            encabezado: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido.'
                    }
                }
            },
            tema: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            categoria: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            descripcion: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            obj_general: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido.'
                    }
                }
            },
            obj_especifico: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            lugar: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            productos: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            fecha: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            fecha_lim: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            hora_ini: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            hora_fin: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            nota: {
                validators: {
                    regexp: {
                        regexp: /^[a-zñÑáéíóú ÁÉÍÓÚA-Z0-9_\.]+$/,
                        message: 'No se permiten caracteres especiales'
                    }
                }
            },
            especialidad_id: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            }
            
        }
    });


});

</script>