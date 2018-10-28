<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Shop
 *
 * @mixin \Eloquent
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
