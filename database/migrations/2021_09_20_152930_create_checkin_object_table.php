<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckinObjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkin_object', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('ticket_id');
            $table->unsignedInteger('order_item_id');
            $table->tinyInteger('use_guide')->default(0);
            $table->unsignedInteger('guide_id')->nullable();
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
        Schema::dropIfExists('checkin_object');
    }
}
