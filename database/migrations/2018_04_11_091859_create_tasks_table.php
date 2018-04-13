<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->float('estimated_minute');
            $table->boolean('active');

            $table->integer('projects_id')->unsigned();
            

            $table->integer('time_id')->unsigned();
        });

        Schema::table('tasks', function($table) {
                $table->foreign('projects_id')->references('id')->on('projects');
                $table->foreign('time_id')->references('id')->on('time__entries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
