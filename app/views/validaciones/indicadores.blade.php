
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
            fechaInicio: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            ventaNacional: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido.'
                    }
                }
            },  
            'productos[]': {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido.'
                    }
                }
            },  
            'mercados[]': {
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