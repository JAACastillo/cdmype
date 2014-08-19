
<script type="text/javascript">

$(document).ready(function() {

	$('#validar2').bootstrapValidator({
        message: 'Valor no valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            fecha: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            solicitante: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido.'
                    }
                }
            },
            tiempo_ampliacion: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            periodo: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            razonamiento: {
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