
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
                        message: 'El Usuario es requerido.'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'El correo es requerido.'
                    },
                    emailAddress: {
                        message: 'El correo no es valido.'
                    }
                }
            },
            // password: {
            //     validators: {
            //         notEmpty: {
            //             message: 'La Contraseña es requerida.'
            //         },
            //          stringLength: {
            //             min: 6,
            //             max: 10,
            //             message: 'La Contraseña debe tener mas de 6 caracteres'
            //         }
            //     }
            // },
            // password_confirmation: {
            //     validators: {
            //         notEmpty: {
            //             message: 'La confirmacion de la Contraseña es requerida.'
            //         },
            //         identical: {
            //             field: 'password',
            //             message: 'Las contraseñas no son iguales.'
            //         }
            //     }
            // },
            tipo: {
                validators: {
                    notEmpty: {
                        message: 'El campo tipo es requerido'
                    }
                }
            },
        }
    });


});

</script>