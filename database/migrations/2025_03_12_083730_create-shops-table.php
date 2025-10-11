<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->string('shop_name',255);
            $table->tinyInteger('plan_id')->default(1);

            $table->string('permanent_token',255);
            $table->tinyInteger('is_active')->default(1);

            $table->string('version',4);
            $table->string('payment_status',20)->index();

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
        Schema::drop('shops');
    }
}
