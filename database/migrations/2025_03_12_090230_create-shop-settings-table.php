<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_settings', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('shop_id')->index();
            $table->string('key')->index();
            $table->text('value');
            $table->timestamps();

            $table->unique(['shop_id', 'key'], 'shop_settings_unique_shopid_key');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shop_settings');
    }
}
