<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->unique()->comment("名称");
            $table->string("img")->comment("图片");
            $table->boolean("status")->default(1)->comment("状态：1 显示 0 隐藏");
            $table->integer("sort")->default(100)->comment("排序");
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
        Schema::dropIfExists('shopcategories');
    }
}
