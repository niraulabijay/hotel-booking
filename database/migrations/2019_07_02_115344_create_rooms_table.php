<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('roomtype_id')->unsigned();
            $table->foreign('roomtype_id')->references('id')->on('room_types')->ondelete('cascade');

            $table->integer('floor_id')->unsigned();
            $table->foreign('floor_id')->references('id')->on('floors')->ondelete('cascade');

            $table->boolean('status');

            $table->integer('number');


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
        Schema::dropIfExists('rooms');
    }
}
