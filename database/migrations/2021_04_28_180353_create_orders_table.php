<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('phone');
            $table->integer('delievery_id');
            $table->integer('payment_id');
            $table->string('delievery_cost');
            $table->integer('discount');
            $table->integer('total');
            $table->string('city');
            $table->string('street');
            $table->string('apps');
            $table->string('postcode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
