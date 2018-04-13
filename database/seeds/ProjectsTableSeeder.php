<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
        	'name' => 'GoogleGlass',
        	'description' => 'VR glasses woah dude',
        	'active' => '1',
            'companies_id' => '1'
        ]);

        DB::table('projects')->insert([
            'name' => 'Twitter is cool but...',
            'description' => 'Things that we are missing',
            'active' => '1',
            'companies_id' => '2'
        ]);
    }
}
