<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckinParkingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkin_parking', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('car_type_id');
            $table->string('checkin_number')->unique();
            $table->string('police_number');
            $table->double('price', 12, 2);
            $table->integer('total_passengers');
            $table->string('image');
            $table->tinyInteger('is_fee')->default(0);
            $table->timestamps();
            $table->index(['id', 'car_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkin_parking');
    }
}
