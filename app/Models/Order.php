<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $user_id 所属用户id
 * @property int $shop_id 商家ID
 * @property string $order_code 订单编号
 * @property string $province 省
 * @property string $city 市
 * @property string $area 县
 * @property string $detail_address 详细地址
 * @property string $tel 收货人电话
 * @property string $name 收货人姓名
 * @property string $total 价格
 * @property int $status 状态: -1 已取消 0 代付款 1 待发货 2 完成
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $order_status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderDetail[] $goods
 * @property-read \App\Models\Shop $shop
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereDetailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereOrderCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUserId($value)
 * @mixin \Eloquent
 */
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
