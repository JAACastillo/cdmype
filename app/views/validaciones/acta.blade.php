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
            estado: {
                validators: {
                    notEmpty: {
                        message: 'El correo es requerido.'
                    }
                }
            },
            fecha: {
                validators: {
                    notEmpty: {
                        message: 'La Contraseña es requerida.'
                    }
                }
            }
        }
    });

});

</script>