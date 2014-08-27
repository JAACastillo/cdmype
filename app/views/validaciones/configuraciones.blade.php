
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
            num_bancario: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido.'
                    }
                }
            },
            correo: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    },
                    emailAddress: {
                        message: 'Campo invalido.'
                    }
                }
            },
            institucion: {
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