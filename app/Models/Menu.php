<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
