<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time__entries', function (Blueprint $table) {
            $table->increments('id');
            // $table->datetime('date_hour_start_estimated');
            // $table->datetime('date_hour_finish_estimated');
            $table->datetime('start');
            $table->datetime('stop')->nullable();
            $table->string('total')->nullable();
            $table->string('duration')->nullable();
        //    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time__entries');
    }
}
