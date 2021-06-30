<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->comment("使用者ID");
		    $table->string('user_nickname',8)->comment("使用者名稱");
		    $table->string('user_account',32)->unique()->comment("使用者帳號");
		    $table->string('user_password',32)->comment("使用者密碼");
		    $table->string('user_contactEmail',64)->comment("使用者信箱");
		    $table->string('user_contactLine',32)->comment("使用者LINE");
		    $table->string('user_picture')->default('default.jpg')->comment("使用者頭貼");
		    $table->tinyInteger('user_admin')->default('0')->comment("1:管理員 0:普通");
		    $table->smallInteger('user_borrowtime')->default('0')->comment("使用者借用次數");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
