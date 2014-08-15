(function($){

// Botones animados
    //Ladda.bind( 'input[type=submit]' );
    Ladda.bind( 'div:not(.progress-demo) button', { timeout: 9000 } );
    Ladda.bind( '.progress-demo button', {
        callback: function( instance ) {
            var progress = 0;
            var interval = setInterval( function() {
                progress = Math.min( progress + Math.random() * 0.1, 1 );
                instance.setProgress( progress );
                if( progress === 1 ) {
                    instance.stop();
                    clearInterval( interval );}
            }, 200 );}
    } );

// Bootstrap

    $("[data-toggle='tooltip']").tooltip();
    $("[data-toggle='popover']").popover();

//Selector

    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'No hay resultados'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }

    $(window).load(function(){ //patch fix size of select box
        $('.chosen-container').css('width', '100%');
    });

// Popup Especialidades-Consultores
              
    $("[data-toggle='modal']").click(function(){
      $.ajax({
            url: servidor + "/consultor/especialidades/" + $(this).data('id'),
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                $("#tabla").html('Cargando...');
            },
            error: function() {
                $("#tabla").html('<div> Ha surgido un error. </div>');
            },
            success: function(respuesta) {
                if (respuesta) {
                    var html = '<table class="table table-bordered">';
                            html += '<tr class="active">';
                            html += '<th class="text-center">N°</th>';
                            html += '<th class="text-center">Especialidades</th>';
                            html += '</tr>';
                            for (var i = 1; i <= respuesta.length; i++) {
                                var dato;
                                dato = respuesta[i-1];
                                html += '<tr>';
                                html += '<td class="text-center">' + i + '</td>';
                                html += '<td>&nbsp&nbsp' + dato + '</td>';
                                html += '</tr>';
                            };
                        html += '</ul>';
                    html += '</table>';
                    $("#tabla").html(html);
                } else {
                    $("#tabla").html('<div> El consultor no tiene especialidades. </div>');
                }
            }
        });
    });

//Eliminacion de registros

      $('.delete').click(function(e) 
        {
            e.preventDefault();
            if(confirm('Esta seguro de borrar la fila?'))
            {
                var _id = $(this).data('id');
                var _form = $(this).data('form');
                var _action = $(_form).attr('action').replace('TERM_ID', _id);
                var _row = $(this).parents('tr');
                _row.fadeOut(1000);
            
                $.post(_action, $(_form).serialize(), function(result) 
                {
                    if(result.success) 
                    {
                        setTimeout(function() 
                        {
                            _row.delay(1000).remove();
                        }, 1000);
                    } 
                    else 
                        _row.show();
                }, 'json');
            }
        });

    //Autocompletar
        var servidor = "http://localhost/atcdmype";
        var _servidor1 = servidor + '/api/';

        $(document).ready(function(e) 
        {
            $('.getEmpresario').autocompletar(
                { 
                    hd: '#empresario_id',
                    sv: _servidor1
                });
            
            $('.getEmpresa').autocompletar(
                { 
                    hd: '#empresa_id',
                    sv: _servidor1
                });
        });

        jQuery.fn.autocompletar = function(opcion)
        {
        var configuracion = 
            {
                hd: ' ',
                sv: ' '
            }
        
        var option = $.extend(configuracion, opcion);
        
        $(this).autocomplete(
            {

                source: configuracion.sv + $(this).data('url'),
                data: 'service=' + $(this).val(),
                focus: function(event,ui) {
                $(this).val(ui.item.label);
                return false;
            },
            select: function(event,ui) 
                {
                    $(this).val(ui.item.label);
                    if(configuracion.hd != ' ')
                    $(configuracion.hd).val(ui.item.value);
                    return false;
                }
            });
        }

})(jQuery)