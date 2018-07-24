<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->increments('archive_id');
            $table->integer('folder_id')->unsigned()->comment('存档文件夹ID');
            $table->string('titile', 256)->comment('文章标题');
            $table->integer('read_salvation')->default(0)->comment('阅读数量');
            $table->text('content')->comment('文章内容');
//            $table->text('content_html')->comment('文章内容Html');
            $table->string('label', 256)->default('[]')->comment('文章标题');
            $table->integer('like')->unsigned()->default(0)->comment('点赞');
            $table->tinyInteger('is_publish')->comment('是否发布');
            $table->tinyInteger('is_home')->default(0)->comment('是否显示在主页');
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
        Schema::dropIfExists('archives');
    }
}
