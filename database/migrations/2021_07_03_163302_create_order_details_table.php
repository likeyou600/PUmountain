<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id()->comment("ALL訂單表ID");
            $table->foreignId('order_id')->comment("訂單ID_外鍵")->constrained('orders')->cascadeOnDelete();
            $table->foreignId('item_id')->comment("物品ID_外鍵")->constrained('items')->cascadeOnDelete();
            $table->integer('quantity')->unsigned()->comment("訂單物品數量");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
