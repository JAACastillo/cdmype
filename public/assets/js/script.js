/**
 *@VARIABLES GLOBALES
**/
var _h = ['representante','empresario','propietario',];
var _m = ['empresaria','propietaria','representante'];
var _uri = window.location;
var servidor = "http://localhost/atcdmype/public";
var _servidor1 = servidor + '/api/';

$(document).ready(function(e) 
{
    /**
     *@VARIABLES
    **/
    var _url = window.location;
    
    $('.mostrarOcultar').hide();
    $('.mostrarOcultarTabla1').hide();
    $('.mostrarOcultarTabla2').hide();
    
    
    $('#sexo').cargoEmpresario(
        {
            cargo:'#tipo'
        });
    
    $('.glyphicon-chevron-up[data-content]').popover(
        {
            html: true,
            placement: 'bottom',
        });

    $('.opc').removerClase();
    
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

    $('.getConsultor').autocompletar(
        { 
            hd: '#consultor_id',
            sv: _servidor1
        });
    
    $('.getAttermino').autocompletar(
        { 
            hd: '#attermino_id',
            sv: _servidor1
        });
    
    $('.toggle').objToggle(
        {
            cl: '.mostrarOcultar'
        });
    
    $('.toggleTabla1').objToggle(
        {
            cl: '.mostrarOcultarTabla1'
        });
    
    $('.toggleTabla2').objToggle(
        {
            cl: '.mostrarOcultarTabla2'
        });
    

});
