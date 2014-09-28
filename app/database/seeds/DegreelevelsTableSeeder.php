<?php

class DegreelevelsTableSeeder extends Seeder {
    public function run()
    {
    	Degreelevel::create(['levelname' => 'High School']);

    	Degreelevel::create(['levelname' => 'Vocational']);

    	Degreelevel::create(['levelname' => 'College Diploma']);

    	Degreelevel::create(['levelname' => 'Bachelor\'s Degree']);

    	Degreelevel::create(['levelname' => 'Master\'s Degree']);

    	Degreelevel::create(['levelname' => 'Doctorate']);
	}
}