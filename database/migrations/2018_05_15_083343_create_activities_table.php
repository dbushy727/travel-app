<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chatroom_id')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->string('slug')->unique();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->datetime('start_at');
            $table->datetime('end_at');
            $table->timestamps();

            $table->foreign('chatroom_id')->references('id')->on('chatrooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
