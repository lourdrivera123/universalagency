<?php

class AssignRolesTableSeeder extends Seeder {
    public function run()
    {
    	 $user = User::find(1);
    	 $user->assignRole(1);

    	 $user = User::find(2);
    	 $user->assignRole(3);

    	 $user = User::find(3);
    	 $user->assignRole(2);

    	 $user = User::find(4);
    	 $user->assignRole(2);

    	 $user = User::find(5);
    	 $user->assignRole(2);
    }
}