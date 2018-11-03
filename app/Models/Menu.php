<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Menu
 *
 * @property int $id
 * @property string $goods_name 菜品名称
 * @property string $goods_img 菜品图片
 * @property float $rating 菜品评分
 * @property int $shop_id 所属商家ID
 * @property int $menu_cate_id 所属分类ID
 * @property float $goods_price 价格
 * @property string $description 描述
 * @property int $month_sales 月销量
 * @property int $rating_count 评分数量
 * @property string $tips 提示信息
 * @property int $many_count 满意度数量
 * @property float $many_rate 满意度评分
 * @property int $status 菜品状态 1 上架 0 下架
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $satisfy_rate 好评率
 * @property-read \App\Models\MenuCategory $mc
 * @property-read \App\Models\MenuCategory $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereGoodsImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereGoodsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereGoodsPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereManyCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereManyRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereMenuCateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereMonthSales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereRatingCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereSatisfyRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereTips($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Menu extends Model
{
    //
    protected $fillable = ['goods_name','goods_img','shop_id','menu_cate_id','goods_price','description','status'];

    public function mc()
    {
        return $this->belongsTo(MenuCategory::class,"menu_cate_id");
    }

    public function user()
    {
        return $this->hasOne(MenuCategory::class,"shop_id");
    }

}
