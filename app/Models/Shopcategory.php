<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shopcategory
 *
 * @property int $id
 * @property string $name 名称
 * @property string $img 图片
 * @property int $status 状态：1 显示 0 隐藏
 * @property int $sort 排序
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shopcategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shopcategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shopcategory whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shopcategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shopcategory whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shopcategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shopcategory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop[] $shops
 */
class Shopcategory extends Model
{
    //
    protected $fillable = ['name','img','status','sort'];

    public function shops()
    {
        return $this->hasMany(Shop::class,"shop_cate_id");
    }


}
