<?php

class JobsTableSeeder extends Seeder {
    public function run()
    {
    	Job::create(['job_category' => 2, 'company' => 1, 'description' => 'We are in need of a full - term finance manager with 4 years of experience in banking and finance.', 'job_title' => 'Finance Manager Needed - Jolibee Makati']);
	}
}