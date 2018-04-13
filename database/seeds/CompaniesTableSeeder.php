<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
        	'name' => 'Google',
        	'address' => '1940 Crowfield Road',

            'user_id' => 1
        ]);

        DB::table('companies')->insert([
            'name' => 'Twitter',
            'address' => '4737 Williams Lane',

            'user_id' => 2
        ]);
        
    }
}
