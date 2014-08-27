<?php

/**
* Agregamos un usuario nuevo a la base de datos.
*/

class ProyectoIndicadorTableSeeder extends Seeder {
    public function run(){

        proyectoIndicador::create(array(
            'nombre'    => 'Formalización',
            'tipo'      => 'Boolean'
            
        ));
        proyectoIndicador::create(array(
            'nombre'    => 'Venta Nacional',
            'tipo'      => 'Dinero'
            
        ));
        proyectoIndicador::create(array(
            'nombre'    => 'Venta Exportación',
            'tipo'      => 'Dinero'
            
        ));
        proyectoIndicador::create(array(
            'nombre'    => 'Empleos',
            'tipo'      => 'Numero'
            
        ));
        proyectoIndicador::create(array(
            'nombre'    => 'Costo de producción',
            'tipo'      => 'Dinero'
            
        ));
        proyectoIndicador::create(array(
            'nombre'    => 'Financiamiento',
            'tipo'      => 'Dinero'
            
        ));
        proyectoIndicador::create(array(
            'nombre'    => 'Capital Semilla',
            'tipo'      => 'Dinero'
            
        ));
        proyectoIndicador::create(array(
            'nombre'    => 'Mercado Local',
            'tipo'      => 'Boolean'
            
        ));
        proyectoIndicador::create(array(
            'nombre'    => 'Mercado Regional',
            'tipo'      => 'Boolean'
            
        ));
        proyectoIndicador::create(array(
            'nombre'    => 'Mercado Nacional',
            'tipo'      => 'Boolean'
            
        ));
        proyectoIndicador::create(array(
            'nombre'    => 'Mercado Internacional',
            'tipo'      => 'Boolean'
            
        ));
        proyectoIndicador::create(array(
            'nombre'    => 'Nuevo Producto',
            'tipo'      => 'Text'
            
        ));
        
    }
}










