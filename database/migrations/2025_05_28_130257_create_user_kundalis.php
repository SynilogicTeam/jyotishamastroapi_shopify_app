<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_kundalis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shop_id')->index()->nullable();
            $table->string('customer_id')->index()->nullable();
            $table->string('name')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('birth_time')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('tz')->nullable();
            $table->string('style')->nullable();
            $table->string('language')->nullable();
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
        Schema::dropIfExists('user_kundalis');
    }
};
