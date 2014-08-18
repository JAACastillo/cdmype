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
            correo: {
                validators: {
                    notEmpty: {
                        message: 'El correo es requerido.'
                    },
                    emailAddress: {
                        message: 'El correo no es valido.'
                    }
                }
            },
            contrasena: {
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