<?php

class RolesTableSeeder extends Seeder {
    public function run()
    {
    	Role::create(['name' => 'applicant']);
    	Role::create(['name' => 'employer']);
    	Role::create(['name' => 'admin']);
    	Role::create(['name' => 'staff']);
	}
}