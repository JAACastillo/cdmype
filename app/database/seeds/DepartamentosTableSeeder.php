<?php

/**
* Agregamos un usuario nuevo a la base de datos.
*/

class DepartamentosTableSeeder extends Seeder {
    public function run(){

        Departamento::create(array(
            'departamento'     => 'Cabañas'
            
        ));
        
    }
}