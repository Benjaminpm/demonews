<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NewssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 50; $i++) {
            \DB::table('newss')->insert(array(
                   'name' => 'News' . $faker->firstNameFemale . ' ' . $faker->lastName,
                   'type'  => $faker->randomElement(['politic','economic','sport']),
                   'created_at' => date('Y-m-d H:m:s'),
                   'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}
