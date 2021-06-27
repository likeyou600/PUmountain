<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Item extends Migration
{
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {

		$table->increments('item_id')->comment("物品ID");
		$table->string('item_category',32)->comment("物品種類");
		$table->integer('item_quantity')->comment("物品數量");
		$table->string('item_picture',32)->default('default.jpg')->comment("物品照片");

        });
    }

    public function down()
    {
        Schema::dropIfExists('item');
    }
}
