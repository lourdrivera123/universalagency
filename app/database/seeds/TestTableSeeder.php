<?php

class TestTableSeeder extends Seeder {
    public function run()
    {
    	Test::create(['test_type' => 'Personality Test']);
    	Test::create(['test_type' => 'IQ Test']);
	}
}