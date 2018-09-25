<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommodityOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodity_order', function (Blueprint $table) {
            $table->primary(['order_id', 'commodity_id']);
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('commodity_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('commodity_id')->references('id')->on('commodities')->onDelete('cascade');
            $table->integer('qty');
            $table->integer('duration')->default(1);
            $table->string('total');
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
        Schema::dropIfExists('commodity_order');
    }
}
