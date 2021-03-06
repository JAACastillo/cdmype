
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
            nit: {
                validators: {
                    regexp: {
                        regexp: /(^([0-9]{4,4}[-]{1,1}[0-9]{6,6}[-]{1,1}[0-9]{3,3}[-]{1,1}[0-9]{1,1})|^)$/,
                        message: 'NIT invalido'
                    }
                }
            },
            registro_iva: {
                validators: {
                    // regexp: {
                    //     regexp: /(^([0-9]{5,5}[-]{1,1}[0-9]{1,1})|^)$/,
                    //     message: 'Registo de Iva invalido'
                    // }
                }
            },
            categoria: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            clasificacion: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            sector_economico: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            constitucion: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            departamento: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            municipio_id: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            direccion: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }
                }
            },
            actividad: {
                validators: {
                    notEmpty: {
                        message: 'Campo requerido'
                    }  
                }
            },
            descripcion:{
                validators: {
                    // regexp: {
                    //     regexp: /^[a-zñÑáéíóú -ÁÉÍÓÚA-Z0-9_\r\n.]+$/,
                    //     message: 'No se permiten caracteres especiales'
                    // }
                }
            }            
        }
    });


});

</script>
