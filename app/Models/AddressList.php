<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AddressList
 *
 * @property int $id
 * @property string $name 用户名
 * @property string $tel 用户电话
 * @property string $provence 省
 * @property string $city 市
 * @property string $area 区
 * @property string $detail_address 详细地址
 * @property string $user_id 用户ID
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AddressList whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AddressList whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AddressList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AddressList whereDetailAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AddressList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AddressList whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AddressList whereProvence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AddressList whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AddressList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AddressList whereUserId($value)
 * @mixin \Eloquent
 */
class AddressList extends Model
{
    //
    protected $fillable = ['name','tel','provence','city','area','detail_address','user_id','is_default'];

}
