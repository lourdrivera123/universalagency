<?php

class ContractsTableSeeder extends Seeder {
    public function run()
    {
    	Contract::create(['contract_title' => 'sample contract', 'salary' => 10000, 'num_of_employees' => 2, 'job' => 'Finance Manager Needed - Jolibee Makati', 'employer' => 3, 'other' => 'wla lang', 'path' => 'contracts/sample contract.pdf']);
	}
}