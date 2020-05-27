<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country');

            $table->date('check_in');
            $table->date('check_out');
            $table->integer('adults');
            $table->integer('children');
            $table->integer('room_type_id');
            $table->integer('room_id');
            $table->boolean('status')->default(1);
            $table->boolean('paid')->default(0);
            $table->integer('down_payment')->default(0);
            $table->date('booked_on');
            $table->bigInteger('base_price');
            $table->integer('additional_persons')->nullable();
            $table->integer('additional_persons_price')->nullable();
            $table->boolean('additional_bed')->nullable()->default(0);
            $table->integer('additional_bed_price')->nullable();
            $table->integer('paid_services_price')->nullable();
            $table->integer('activities_price')->nullable();
            $table->bigInteger('total_before_tax');
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
        Schema::dropIfExists('bookings');
    }
}
