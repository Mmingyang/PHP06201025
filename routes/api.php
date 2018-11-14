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
//region 修改密码
Route::post("member/edit","Api\MemberController@edit");
//endregion
//region 用户详情
Route::get("member/detail","Api\MemberController@detail");
//endregion
//region 地址列表
Route::get("addressList/index","Api\AddressListController@index");
//endregion
//region 地址添加
Route::post("addressList/add","Api\AddressListController@add");
//endregion
//region 地址修改
Route::any("addressList/edit","Api\AddressListController@edit");
//endregion
//region 购物车列表
Route::get("cart/index","Api\CartController@index");
//endregion
//region 购物车添加
Route::post("cart/add","Api\CartController@add");
//endregion
//region 添加订单
Route::post("order/add","Api\OrderController@add");
//endregion
//region 订单列表
Route::get("order/index","Api\OrderController@index");
//endregion
//region 订单详情
Route::get("order/check","Api\OrderController@check");
//endregion
//region 订单支付
Route::post("order/zfb","Api\OrderController@zfb");
//endregion
//region 微信支付
Route::get("order/wxPay","Api\OrderController@wxPay");
Route::get("order/status","Api\OrderController@status");
Route::post("order/ok","Api\OrderController@ok");
Route::post("order/clear","Api\OrderController@clear");
////endregion