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
            $table->string('description')->nullable();
            $table->float('estimated_minute');
            $table->string('status');

            $table->integer('projects_id')->unsigned();
            

            $table->integer('time_id')->unsigned();
            $table->engine = 'InnoDB';
        });

        Schema::table('tasks', function($table) {
                $table->foreign('projects_id')->references('id')->on('projects')
                ->update('cascade')
                ->onDelete('cascade');
                
                $table->foreign('time_id')->references('id')->on('time__entries')->onDelete('cascade');
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
