<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('categories')->insert(array(


             array(
                'id' => 1,
                'name' => 'Politics',
                ),
            array(
                'id' => 2,
                'name' => 'Sports',
                ),
            array(
                'id' => 3,
                'name' => 'Relationships&Romance',
                ),
             array(
                'id' => 4,
                'name' => 'Business&Career',
                ),
             array(
                'id' => 5,
                'name' => 'Education',
                ),
              array(
                'id' => 6,
                'name' => 'Religion',
                ),
              array(
                'id' => 7,
                'name' => 'Entertainment',
                ),
               array(
                'id' => 8,
                'name' => 'Movies&Music',
                ),
                array(
                'id' => 9,
                'name' => 'Fashion&Style',
                ),
                array(
                'id' => 10,
                'name' => 'Arts&Literature',
                ),
                array(
                'id' => 11,
                'name' => 'Science&Technology',
                ),
                array(
                'id' => 12,
                'name' => 'Programming&Computers',
                ),
           
           

        ));
    }

}