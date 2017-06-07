<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('events', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->datetime('start');
          $table->datetime('end');
          $table->integer('group_id');
          $table->integer('room_id');
          $table->integer('user_id');
          $table->string('email');
          $table->string('color');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
