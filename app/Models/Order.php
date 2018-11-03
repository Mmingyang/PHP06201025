<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    static public $statusText=[-1 => "已取消", 0 => "代付款", 1 => "待发货", 2 => "待确认", 3 => "完成"];

    public $fillable = ['user_id', 'shop_id', 'order_code', 'province', 'city', 'area', 'detail_address', 'tel', 'name', 'total', 'status'];

    public function shop()
    {
        return $this->belongsTo(Shop::class,"shop_id");
    }

    public function goods()
    {
        return $this->hasMany(OrderDetail::class,"order_id");
    }

    public function getOrderStatusAttribute()
    {
        // $arr = [-1 => "已取消", 0 => "代付款", 1 => "待发货", 2 => "待确认", 3 => "完成"];
        return self::$statusText[$this->status];
    }

}
