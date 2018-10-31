<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//region 首页展示
Route::get("shop/index","Api\ShopController@index");
//endregion
//region 查看详情
Route::get("shop/check","Api\ShopController@check");
//endregion
//region 用户注册短信验证
Route::get("member/sms","Api\MemberController@sms");
//endregion
//region 用户注册
Route::post("member/reg","Api\MemberController@reg");
//endregion
//region 用户登录
Route::post("member/login","Api\MemberController@login");
//endregion
//region 忘记密码
Route::post("member/forget","Api\MemberController@forget");
//endregion
