<?php

class ApiController extends BaseController {

 /* AUTOCOMPLEMENTAR */
    
    //EMPRESARIO
    public function getEmpresario() 
    {
		$term =  Input::get('term');
        
        $empresarios = Empresario::where('nombre', 'LIKE', "%" . $term . "%")
            ->get();
		
        foreach ($empresarios as $empresario) 
        {
		    $results[] = array('label' => $empresario->nombre, 'value' => $empresario->id);
		}
		
        return $results;
    }

    //EMPRESA
    public function getEmpresa() 
    {
		$term =  Input::get('term');
        
        $empresas = Empresa::where('nombre', 'LIKE', "%" . $term . "%")
            ->get();
		
        foreach ($empresas as $empresa) 
        {
		    $results[] = array('label' => $empresa->nombre, 'value' => $empresa->id);
		}
		
        return $results;
    }

   //CONSULTOR
    public function getConsultor() 
    {
		$term =  Input::get('term');
        
        $consultor = Consultor::where('nombre', 'LIKE', "%" . $term . "%")
            ->get();
		
        foreach ($consultor as $consultor) 
        {
		    $results[] = array('label' => $consultor->nombre, 'value' => $consultor->id);
		}
		
        return $results;
    }
    
   //AT-TDR
    public function getAttermino() 
    {
		$term =  Input::get('term');
        
        $attermino = AtTermino::where('tema', 'LIKE', "%" . $term . "%")
            ->get();
		
        foreach ($attermino as $attermino) 
        {
		    $results[] = array('label' => $attermino->tema, 'value' => $attermino->id);
		}
		
        return $results;
    }

}