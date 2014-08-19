
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
            duracion: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido.'
                    }
                }
            },
            fecha_inicio: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            fecha_final: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            pago: {
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
            },
            lugar_firma: {
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