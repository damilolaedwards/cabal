<?php

use Illuminate\Database\Seeder;
use \App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
        	'firstname' => 'Damilola',
        	'lastname' => 'Edwards',
        	'username' => 'Mycampus',
        	'email' => bcrypt('admin@mycampus.com'),
        	'role' => 'administrator',
        	'password' => 'admin@mycampus',
        	'sex' => 'male',
        	'day' => '01',
        	'month' => '05',
        	'year' => '2017',
        	'personal_text' => 'Welcome to mycampus.ng. Contact me @ 07035956711',
        	'institution_id' => '372'
        	]);
    }
}
