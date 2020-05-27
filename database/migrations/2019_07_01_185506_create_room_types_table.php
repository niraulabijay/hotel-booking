<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('short_code');
            $table->longText('description');
            $table->integer('base_occupancy');
            $table->integer('higher_occupancy')->nullable();
            $table->integer('child_occupancy');
            $table->boolean('extra_bed')->nullable();
            $table->integer('base_price');
            $table->integer('extra_person_price')->nullable();
            $table->integer('extra_bed_price')->nullable();
            $table->string('image_thumbnail');
            $table->boolean('status');
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
        Schema::dropIfExists('room_types');
    }
}
