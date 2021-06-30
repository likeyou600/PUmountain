<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdertabItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordertab_items', function (Blueprint $table) {
            $table->id()->comment("ALL訂單表ID");
        
            $table->string('order_id',32)->comment("訂單ID_外鍵");    
            $table->foreign('order_id')->references('id')->on('ordertab_infors')->onDelete('cascade');

            $table->foreignId('item_id')->comment("物品ID_外鍵")->constrained('items')->cascadeOnDelete();

            $table->integer('order_items_quantity')->unsigned()->comment("訂單物品數量");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordertab_items');
    }
}
