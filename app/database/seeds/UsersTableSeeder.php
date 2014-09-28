<?php

class UsersTableSeeder extends Seeder {
    public function run()
    {
        User::create(['email' => 'lourdrivera123@gmail.com', 'password' => Hash::make('hello123'), 'confirmed' => '1']);

        Resume::create(['user_id' => 1, 'first_name' => 'Zemiel', 'last_name' => 'Asma', 'photo' => '/images/applicant_pictures/user.jpg', 'position_desired' => 1, 'birth_date' => '1994-11-07']);

        User::create(['email' => 'rosellbarnes95@gmail.com', 'password' => Hash::make('hello123'), 'confirmed' => '1']);
	}
}