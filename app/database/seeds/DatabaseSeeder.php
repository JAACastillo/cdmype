<?php

class DatabaseSeeder extends Seeder {


	public function run()
	{
		Eloquent::unguard();

		$this->call('proyectoIndicador');
		// $this->call('UsersTableSeeder');
		// $this->call('MunicipiosTableSeeder');
		// $this->call('DepartamentosTableSeeder');
		// $this->call('ConfiguracionesTableSeeder');
		// $this->call('EspecialidadesTableSeeder');
		// $this->call('SubEspecialidadesTableSeeder');
	}

}
