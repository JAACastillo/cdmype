
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
            tema: {
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
            productos: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            especialidad_id: {
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
            trabajo_local: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            tiempo_ejecucion: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            financiamiento: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            aporte: {
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