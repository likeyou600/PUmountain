<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_photos', function (Blueprint $table) {
            $table->id()->comment("活動照片ID");
            $table->foreignId('photo_year_id')->comment("年份ID_外鍵")->constrained('photo_years')->cascadeOnDelete();
            $table->string('location',255)->comment("活動地點");
            $table->string('site',255)->comment("照片網址");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_photos');
    }
}
