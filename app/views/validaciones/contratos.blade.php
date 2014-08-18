
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
            lugar_firma: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido.'
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
            firma: {
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