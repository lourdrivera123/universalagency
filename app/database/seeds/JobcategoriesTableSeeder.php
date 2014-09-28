<?php

class JobcategoriesTableSeeder extends Seeder {
    public function run()
    {
    	// Jobcategory::truncate();

        Jobcategory::create(['category' => 'Safety and Security', 'description' => 'This position is responsible for the security and safety concerns of the business or firm.']);

        Jobcategory::create(['category' => 'Finance Management', 'description' => 'This position is responsible for handling financial concerns in a business or firm.']);
	}
}
