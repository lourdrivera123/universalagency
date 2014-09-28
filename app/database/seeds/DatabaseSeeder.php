<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('JobcategoriesTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('EmployersTableSeeder');
		$this->call('AssignRolesTableSeeder');
		$this->call('JobsTableSeeder');
		$this->call('DegreelevelsTableSeeder');
		$this->call('TestTableSeeder');
		$this->call('PersonalityquestionsTableSeeder');
		$this->call('PersonalityanswersTableSeeder');
		$this->call('IqquestionsTableSeeder');
		$this->call('ContractsTableSeeder');
	}

}
