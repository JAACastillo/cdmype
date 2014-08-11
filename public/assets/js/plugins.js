(function($){
    
    
    
    /**
     * @AUTOCOMPLETAR
     **/
    
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
    
    jQuery.fn.cargoEmpresario = function(opcion)
    {
        $(this).on('change',function()
        {
            var configuracion = 
                {
                    cargo: ''
                }

            $.extend(configuracion, opcion);
            var pt = $(this).val();
            $(configuracion.cargo).empty();
            
            if(pt == '1')
            {
                for(i=0; i<= _m.length - 1; i++)
                {
                    $(configuracion.cargo).append("<option value="+(i+1)+">"+_m[i]+"</option>");
                }
            }
            
            else if(pt == '2') 
            {
                for(i=0; i<= _h.length - 1; i++)
                {
                    $(configuracion.cargo).append("<option value="+(i+3)+">"+_h[i]+"</option>");
                }
            }
        });
    }
    
    jQuery.fn.removerClase = function()
    {
        $(this).click(function(e) 
        {
            e.preventDefault();
            var _clase = $(this).attr('class');
            
            if(_clase == 'opc glyphicon glyphicon-chevron-up') 
            {
                var _cls1 = 'opc glyphicon glyphicon-chevron-up';
                var _cls2 = 'opc glyphicon glyphicon-chevron-down';
            }
            
            else 
            {
                var _cls1 = 'opc glyphicon glyphicon-chevron-down';
                var _cls2 = 'opc glyphicon glyphicon-chevron-up';
            }

            $(this).removeClass(_cls1).addClass(_cls2);
        });
    }
    
    jQuery.fn.objToggle = function(opcion)
    {
        $(this).click(function(e) 
        {
            e.preventDefault();
            var configuracion = 
            {
                cl: ' '
            }
        
            var _option = $.extend(configuracion, opcion);
            $(_option.cl).toggle();
        });
    }
    
})(jQuery)