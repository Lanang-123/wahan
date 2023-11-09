<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_transfers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('guide_id');
            $table->unsignedInteger('order_id');
            $table->string('payment_type');
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->double('total', 12, 2);
            $table->string('status');

            $table->timestamps();
            $table->index(['id', 'guide_id', 'order_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fee_transfers');
    }
}
