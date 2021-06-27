<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdertabItems extends Migration
{
    public function up()
    {
        Schema::create('ordertab_items', function (Blueprint $table) {

		$table->increments('tab_id')->comment("ALL訂單表ID");
        
		$table->string('order_id',32)->comment("訂單ID_外鍵");

        $table->foreign('order_id')->references('order_id')->on('ordertab_infor')->onDelete('cascade');
        
		$table->integer('item_id')->unsigned()->comment("物品ID_外鍵");

        $table->foreign('item_id')->references('item_id')->on('item')->onDelete('cascade');


		$table->integer('order_items_quantity')->comment("訂單物品數量");

        });
    }

    public function down()
    {
        Schema::dropIfExists('ordertab_items');
    }
}
