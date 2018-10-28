<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_categories', function (Blueprint $table) {
            $table->increments('id');

            $table->string("name")->comment("菜品分类名称");

            $table->string("type_id")->comment("菜品分类编号");

            $table->integer("shop_id")->comment("所属商家ID");

            $table->string("description")->comment("菜品描述");

            $table->string("is_selected")->comment("是否为默认分类");

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
        Schema::dropIfExists('menu_categories');
    }
}
