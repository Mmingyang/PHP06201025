<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Member
 *
 * @property int $id
 * @property string $username 用户名
 * @property string $tel 用户联系方式
 * @property string $password 用户密码
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float $money 余额
 * @property int $jifen 积分
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Member whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Member whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Member whereJifen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Member whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Member wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Member whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Member whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Member whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Member whereUsername($value)
 * @mixin \Eloquent
 * @property int|null $status 默认 1 会员 0非会员
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Member whereStatus($value)
 */
class Member extends Model
{
    //
    protected $fillable = ['username','tel','password'];
}
