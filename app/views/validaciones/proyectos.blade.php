<script type="text/javascript">

$(document).ready(function() {

	$('#validar').bootstrapValidator({
        excluded: ':disabled',
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
                        message: 'Campo requerido.'
                    }
                }
            },
            descripcion: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido.'
                    }
                }
            },
            meta: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido.'
                    }
                }
            },
            fechaInicio: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido.'
                    }
                }
            },
            fechaFin: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido.'
                    }
                }
            },
            'indicadores[]': {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido.'
                    }
                }
            }
        }
    });

});

</script>