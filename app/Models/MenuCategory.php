<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MenuCategory
 *
 * @property int $id
 * @property string $name 菜品分类名称
 * @property string $type_id 菜品分类编号
 * @property int $shop_id 所属商家ID
 * @property string $description 菜品描述
 * @property string $is_selected 是否为默认分类
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Menu[] $goodsList
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuCategory whereIsSelected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuCategory whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuCategory whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MenuCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MenuCategory extends Model
{
    //
    protected $fillable = ['name','type_id','shop_id','description','is_selected'];

    public function goodsList()
    {
        return $this->hasMany(Menu::class,"menu_cate_id");
    }

}
