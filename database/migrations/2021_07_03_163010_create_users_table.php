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
		    $table->string('nickname',8)->comment("使用者名稱");
		    $table->string('account',32)->unique()->comment("使用者帳號");
		    $table->string('password',32)->comment("使用者密碼");
		    $table->string('contact_email',64)->comment("使用者信箱");
		    $table->string('contact_line',32)->comment("使用者LINE");
		    $table->string('picture')->default('default.jpg')->comment("使用者頭貼");
		    $table->tinyInteger('is_admin')->default('0')->comment("1:管理員 0:普通");
		    $table->smallInteger('borrowtime')->default('0')->comment("使用者借用次數");
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
