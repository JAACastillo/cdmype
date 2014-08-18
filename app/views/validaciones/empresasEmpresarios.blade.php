
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
            empresario: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido.'
                    }
                }
            },
            empresa: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido.'
                    }
                }
            },
            empresa_id: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido.'
                    }
                }
            },
            empresario_id: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            tipo: {
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
