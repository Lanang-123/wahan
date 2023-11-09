<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckinRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkin_rides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('ride_id');
            $table->unsignedInteger('ticket_id');
            $table->unsignedInteger('order_item_id');
            $table->tinyInteger('use_guide')->default(0);
            $table->unsignedInteger('guide_id')->nullable();
            $table->double('price', 12, 2);
            $table->double('amount_fee', 12, 2);
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
        Schema::dropIfExists('checkin_rides');
    }
}
