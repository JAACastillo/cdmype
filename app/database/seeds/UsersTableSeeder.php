<?php

/**
* Agregamos un usuario nuevo a la base de datos.
*/

class UsersTableSeeder extends Seeder {
    public function run(){
        User::create(array(
            'email'     => 'admin@admin.com',
            'nombre'  => 'Jesus Alfonso Alvarado Castillo',
            'password' => Hash::make('admin'),
            'tipo'  => '1'
        ));
    }
}