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
            $table->datetime('start');
            $table->datetime('stop')->nullable();
            $table->float('duration')->nullable();
            $table->time('in_progress')->nullable();
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
