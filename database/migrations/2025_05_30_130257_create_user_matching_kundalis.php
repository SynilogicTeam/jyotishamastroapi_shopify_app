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
        Schema::create('user_matching_kundalis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shop_id')->index()->nullable();
            $table->string('customer_id')->index()->nullable();
            $table->string('boy_name')->nullable();
            $table->string('boy_dob')->nullable();
            $table->string('boy_tob')->nullable();
            $table->string('boyPob')->nullable();
            $table->string('boy_lat')->nullable();
            $table->string('boy_lon')->nullable();
            $table->string('boy_city')->nullable();
            $table->string('boy_state')->nullable();
            $table->string('boy_country')->nullable();
            $table->string('boy_tz')->nullable();
            $table->string('girl_name')->nullable();
            $table->string('girl_dob')->nullable();
            $table->string('girl_tob')->nullable();
            $table->string('girlPob')->nullable();
            $table->string('girl_lat')->nullable();
            $table->string('girl_lon')->nullable();
            $table->string('girl_city')->nullable();
            $table->string('girl_state')->nullable();
            $table->string('girl_country')->nullable();
            $table->string('girl_tz')->nullable();
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
        Schema::dropIfExists('user_matching_kundalis');
    }
};
