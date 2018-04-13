<?php

use Illuminate\Database\Seeder;

class TimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('time__entries')->insert([

        	'start' => '2018-04-09 11:00:02',
        	'stop' => '2018-04-10 09:00:02',
        	'duration' => '40'

        ]);

        DB::table('time__entries')->insert([

            'start' => '2018-04-09 18:00:02',
            'stop' => '2018-04-10 15:00:02',
            'duration' => '40'

        ]);
    }
}
