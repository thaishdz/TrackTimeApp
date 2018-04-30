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

        	'start' => '2018-04-09 00:00:00',
        	'stop' => '2018-04-10 09:00:02',
        	'total' => '40',
            'duration' => '50:19',

        ]);

        DB::table('time__entries')->insert([

            'start' => '2018-04-09 18:00:02',
            'stop' => '2018-04-10 15:00:02',
            'total' => '30',
            'duration' => '50:19',

        ]);
    }
}
