<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basket_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('order_id');
            $table->integer('product_id');
            $table->string('grind');
            $table->integer('quantity');
            $table->string('is_sku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basket_orders');
    }
}
