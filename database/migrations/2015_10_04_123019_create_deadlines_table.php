<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeadlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deadlines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id');
            $table->string('description', 255);
            $table->string('type', 60);
            $table->timestamp('due_timestamp');
            $table->timestamps();
        });

        Schema::create('user_deadlines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('deadline_id');
            $table->boolean('completed');
            $table->timestamp('completed_on')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('deadlines');
        Schema::drop('user_deadlines');
    }
}

