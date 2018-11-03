<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Shop
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $shop_cate_id 店铺分类id
 * @property string $shop_name 店铺名
 * @property string $shop_img 店铺图片
 * @property string|null $shop_score 评分
 * @property int $is_brand 是否是品牌
 * @property int $is_time 是否准时
 * @property int $is_feng 是否是蜂鸟配送
 * @property int $is_bao 是否有保字
 * @property int $is_piao 是否有票字
 * @property int $is_zhun 是否有准字
 * @property float $qi_money 起送金额
 * @property float $pei_money 配送费
 * @property string $notice 店铺公告
 * @property string $discount 店铺优惠
 * @property int $state 1:已审核，2未审核，3禁用
 * @property int $user_id 此商品属于谁的，用户id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Shopcategory $category
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereIsBao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereIsBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereIsFeng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereIsPiao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereIsTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereIsZhun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereNotice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop wherePeiMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereQiMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereShopCateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereShopImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereShopName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereShopScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop whereUserId($value)
 */
class Shop extends Model
{
    //
    public function category()
    {
        return $this->belongsTo(Shopcategory::class,"shop_cate_id");
    }
    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }




    protected $fillable=["shop_name","shop_cate_id","shop_img","shop_score","is_brand","is_time","is_feng","is_bao","is_piao","is_zhun","qi_money","pei_money","notice","discount","state","user_id"];

}
