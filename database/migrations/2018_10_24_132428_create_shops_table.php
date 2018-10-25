<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('shop_cate_id')->comment('店铺分类id');
            $table->string('shop_name')->comment('店铺名');
            $table->string('shop_img')->comment('店铺图片');
            $table->string('shop_score')->comment('评分');
            $table->boolean('is_brand')->comment('是否是品牌');
            $table->boolean('is_time')->comment('是否准时');
            $table->boolean('is_feng')->comment('是否是蜂鸟配送');
            $table->boolean('is_bao')->comment('是否有保字');
            $table->boolean('is_piao')->comment('是否有票字');
            $table->boolean('is_zhun')->comment('是否有准字');
            $table->decimal('qi_money')->comment('起送金额');
            $table->decimal('pei_money')->comment('配送费');
            $table->string('notice')->comment('店铺公告');
            $table->string('discount')->comment('店铺优惠');
            $table->integer('state')->comment('1:已审核，2未审核，3禁用');
            $table->integer('user_id')->comment('此商品属于谁的，用户id');

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
        Schema::dropIfExists('shops');
    }
}
