<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdertabInforsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordertab_infors', function (Blueprint $table) {
            $table->string('id',32)->primary()->comment("訂單ID");
            
            $table->foreignId('user_id')->comment("使用者ID_外鍵")->constrained('users')->cascadeOnDelete();

		    $table->string('order_pic',32)->nullable()->comment("訂單借用照片");
		    $table->string('order_returnpic',32)->nullable()->comment("訂單歸還照片");
		    $table->date('order_date')->nullable()->comment("訂單日期");
		    $table->date('order_last_return_date')->nullable()->comment("訂單最晚歸還日期");
		    $table->date('order_return_date')->nullable()->comment("訂單實際歸還日期");
		    $table->tinyInteger('order_status')->default('2')->comment("2:領取中，1:借用中，0:已歸還，99:取消");
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordertab_infors');
    }
}
