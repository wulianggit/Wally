<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')->comment('分类ID');
            $table->integer('pid')->default(0)->comment('父级ID');
            $table->string('name', 25)->default('')->comment('分类名称');
            $table->tinyInteger('sort', 0, 1)->default(0)->comment('排序');
            $table->tinyInteger('status', 0, 1)->default(1)->comment('状态 1:正常 0:删除');
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
        Schema::drop('categories');
    }
}
