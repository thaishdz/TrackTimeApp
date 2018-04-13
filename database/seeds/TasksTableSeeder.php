<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
        	'name' => 'task 1',
        	'description' => 'Hello there!',
        	'estimated_minute' => '10',
        	'active' => '1',
            'projects_id' => '1',
            'time_id' => 1
        ]);

        DB::table('tasks')->insert([
            'name' => 'Edit Tweet',
            'description' => 'Finally, we have done this feature',
            'estimated_minute' => '0.5',
            'active' => '1',
            'projects_id' => '2',
            'time_id' => 2
        ]);
    }
}
