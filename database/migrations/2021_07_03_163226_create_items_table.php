<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id()->comment("物品ID");
            $table->foreignId('category_id')->comment("物品ID_外鍵")->constrained('categories')->cascadeOnDelete();
            $table->integer('quantity')->unsigned()->comment("物品數量");
            $table->string('picture',32)->default('default.jpg')->comment("物品照片");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
