<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id')->comment('文章ID');
            $table->string('title',50)->default('')->comment('文章标题');
            $table->string('keyword',100)->default('')->comment('关键字');
            $table->tinyInteger('cate_id')->default(0)->comment('文章分类ID');
            $table->string('introduce')->default('')->comment('文章简介');
            $table->string('img_path')->default('')->comment('封面图片地址');
            $table->text('content_html')->comment('文章内容-html格式');
            $table->text('content_mark')->comment('文章内容-markdown格式');
            $table->tinyInteger('status',0,1)->default(1)->comment('状态 0:删除  1:正常');
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
        Schema::drop('articles');
    }
}
