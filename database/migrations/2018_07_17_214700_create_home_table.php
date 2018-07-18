<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home', function (Blueprint $table) {
            $table->increments('home_id')->comment('主页内容ID');
            $table->string('main_title', 50)->comment('一级标题');
            $table->string('sub_title', 256)->comment('二级标题');
            $table->string('ssub_title', 50)->comment('三级标题');
            $table->string('url', 1024)->comment('内容URL');
            $table->string('picture_url', 1024)->comment('图片URL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home');
    }
}
