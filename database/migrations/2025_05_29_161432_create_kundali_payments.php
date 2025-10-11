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
        Schema::create('kundali_payments', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('shop_id')->index()->nullable();
            $table->string('customer_id')->index()->nullable();
            $table->string('order_id')->index()->nullable();
            $table->string('kundali_id')->index()->nullable();
            $table->string('kundali_type')->nullable();
            $table->string('plan_id')->nullable();
            $table->string('pdf_link')->nullable();
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
        Schema::dropIfExists('kundali_payments');
    }
};
