<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
        	['name' => 'Ambient'],
        	['name' => 'Art'],
        	['name' => 'Culture'],
        	['name' => 'Economic'],
        	['name' => 'Education'],
        	['name' => 'Heath'],
        	['name' => 'More'],
        	['name' => 'Opinion'],
        	['name' => 'Politic'],
        	['name' => 'Science'],
        	['name' => 'Sport'],
        	['name' => 'Technology'],
        	['name' => 'World']                       
        ]);
    }
}
