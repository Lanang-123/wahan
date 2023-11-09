<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('ride_owner_id');
            $table->string('slug')->unique();
            $table->string('name')->unique();
            $table->double('price', 12, 2);
            $table->double('fee', 8, 2);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();

            $table->index(['id', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rides');
    }
}
