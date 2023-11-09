<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number');
            $table->integer('total_item');
            $table->double('total_price', 12, 2);
            $table->tinyInteger('use_guide')->default(0);
            $table->unsignedInteger('guide_id')->nullable();
            $table->tinyInteger('already_transfer_fee')->default(0);
            $table->tinyInteger('can_cancel')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->index(['id', 'guide_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
