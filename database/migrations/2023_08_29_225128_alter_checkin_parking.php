<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCheckinParking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('checkin_parking', function (Blueprint $table) {
            // $table->string('duration')->nullable()->after('is_fee');
            // $table->time('transaction_time')->nullable()->after('is_fee');
            // $table->string('country')->nullable()->after('is_fee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checkin_parking', function (Blueprint $table) {
            //
        });
    }
}
