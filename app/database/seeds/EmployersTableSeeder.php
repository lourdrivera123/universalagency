<?php

class EmployersTableSeeder extends Seeder {
    public function run()
    {
    	User::create(['email' => 'jolibee@gmail.com', 'password' => Hash::make('hello123'), 'confirmed' => 1]);

        Employer::create(['businessname' => 'Jolibee','photo' => 'images/employer_pictures/923105cd1f7767dfa09c8ca4b1ece7ca.jpg', 'phone_number' => '09309292180', 'address' => 'Makati City', 'description' => 'This Business is inline a fast food service with a wide range of branches.', 'user_id' => '3']);

        User::create(['email' => 'mcdo@gmail.com', 'password' => Hash::make('hello123'), 'confirmed' => 1]);

        Employer::create(['businessname' => 'Mcdonalds','photo' => 'images/employer_pictures/b07e085f508307ad446bb3fda337a6af.jpg', 'phone_number' => '09123456789', 'address' => 'Cebu City', 'description' => 'This Business is in fast food service and has a wide range of branches.', 'user_id' => '4']);

        User::create(['email' => 'chowking@gmail.com', 'password' => Hash::make('hello123'), 'confirmed' => 1]);

        Employer::create(['businessname' => 'Chowking','photo' => 'images/employer_pictures/858fb8110eae85748aa7733ccb6363b5.jpg', 'phone_number' => '09078843578', 'address' => 'Mandaluyong City', 'description' => 'This is a japanese style fast food with a wide range of branches.', 'user_id' => '5']);
	}
}