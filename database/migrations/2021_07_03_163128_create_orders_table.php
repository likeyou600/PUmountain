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
            $table->id()->comment("訂單ID");
            $table->foreignId('user_id')->comment("使用者ID_外鍵")->constrained('users')->cascadeOnDelete();
		    $table->string('pic_borrow',32)->nullable()->comment("訂單借用照片");
		    $table->string('pic_return',32)->nullable()->comment("訂單歸還照片");
		    $table->date('borrow_date')->nullable()->comment("訂單日期");
		    $table->date('last_return_date')->nullable()->comment("訂單最晚歸還日期");
		    $table->date('return_date')->nullable()->comment("訂單實際歸還日期");
		    $table->tinyInteger('status')->default('2')->comment("2:領取中，1:借用中，0:已歸還，99:取消");
            $table->text('description')->comment("訂單備註");
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
