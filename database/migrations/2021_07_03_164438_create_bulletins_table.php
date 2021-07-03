<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulletinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulletins', function (Blueprint $table) {
            $table->id()->comment("公告ID");
            $table->string('title',128)->comment("標題");
            $table->text('content')->comment("內容");
            $table->foreignId('user_id')->comment("使用者ID_外鍵")->constrained('users')->cascadeOnDelete();
            $table->timestamp('created_at')->comment("公告時間")->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bulletins');
    }
}
