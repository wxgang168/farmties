<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommodityPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodity_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('commodity_id');
            $table->foreign('commodity_id')->references('id')->on('commodities')->onDelete('cascade');

            $table->float('price');
            $table->boolean('archived')->default(false);
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
        Schema::dropIfExists('commodity_prices');
    }
}
