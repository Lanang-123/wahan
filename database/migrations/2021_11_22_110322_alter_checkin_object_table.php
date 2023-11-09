<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCheckinObjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('checkin_object', function (Blueprint $table) {
            $table->double('price', 12, 2)->after('guide_id')->default(0);
            $table->double('amount_fee', 12, 2)->after('guide_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checkin_object', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('amount_fee');
        });
    }
}
