<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get("test", function () {

    $shopName="互联网学院";
    $to = '1929652240@qq.com';//收件人
    $subject = $shopName.' 审核通知';//邮件标题
    \Illuminate\Support\Facades\Mail::send(
        'emails.shop',
        compact("shopName"),
        function ($message) use($to, $subject) {
            $message->to($to)->subject($subject);
        }
    );
});



Route::domain("admin.elm.com")->namespace("Admin")->group(function (){

    //region 后台商铺分类列表
    Route::get("shopcategory/index","ShopcategoryController@index")->name("admin.shopcategory.index");
    Route::any("shopcategory/add","ShopcategoryController@add")->name("admin.shopcategory.add");
    Route::any("shopcategory/edit/{id}","ShopcategoryController@edit")->name("admin.shopcategory.edit");
    Route::get("shopcategory/del/{id}","ShopcategoryController@del")->name("admin.shopcategory.del");
    //endregion
    //region 后台管理员列表
    Route::any("admin/login","AdminController@login")->name("admin.admin.login");
    Route::get("admin/index","AdminController@index")->name("admin.admin.index");
    Route::any("admin/add","AdminController@add")->name("admin.admin.add");
    Route::any("admin/edit/{id}","AdminController@edit")->name("admin.admin.edit");
    Route::get("admin/del/{id}","AdminController@del")->name("admin.admin.del");
    Route::get("admin/logout","AdminController@logout")->name("admin.admin.logout");
    Route::any("admin/xg/","AdminController@xg")->name("admin.admin.xg");
    //endregion
    //region 后台用户列表
    Route::get("user/index","UserController@index")->name("admin.user.index");
    Route::any("user/add","UserController@add")->name("admin.user.add");
    Route::any("user/edit/{id}","UserController@edit")->name("admin.user.edit");
    Route::get("user/del/{id}","UserController@del")->name("admin.user.del");
    //endregion
    //region 后台商户列表
    Route::get("shop/index","ShopController@index")->name("admin.shop.index");
    Route::any("shop/add","ShopController@add")->name("admin.shop.add");
    Route::any("shop/edit/{id}","ShopController@edit")->name("admin.shop.edit");
    Route::get("shop/del/{id}","ShopController@del")->name("admin.shop.del");
    Route::any("shop/shen/{id}","ShopController@shen")->name("admin.shop.shen");
    //endregion
    //region 后台活动列表
    Route::get("event/index","EventController@index")->name("admin.event.index");
    Route::any("event/add","EventController@add")->name("admin.event.add");
    Route::any("event/edit/{id}","EventController@edit")->name("admin.event.edit");
    Route::get("event/del/{id}","EventController@del")->name("admin.event.del");
    //endregion
    //region 订单量列表
    Route::get("order/day","OrderController@day")->name("admin.order.day");
    Route::get("order/month","OrderController@month")->name("admin.order.month");
    Route::get("order/total","OrderController@total")->name("admin.order.total");
    Route::get("order/cday","OrderController@cday")->name("admin.order.cday");
    Route::get("order/cmonth","OrderController@cmonth")->name("admin.order.cmonth");
    Route::get("order/ctotal","OrderController@ctotal")->name("admin.order.ctotal");
    //endregion
    //region 会员管理
    Route::get("member/index","MemberController@index")->name("admin.member.index");
    Route::get("member/check/{id}","MemberController@check")->name("admin.member.check");
    Route::get("member/off/{id}","MemberController@off")->name("admin.member.off");
    //endregion
    //region 权限管理
    Route::get("permission/index","PermissionController@index")->name("admin.permission.index");
    Route::any("permission/add","PermissionController@add")->name("admin.permission.add");
    Route::any("permission/edit/{id}","PermissionController@edit")->name("admin.permission.edit");
    Route::get("permission/del/{id}","PermissionController@del")->name("admin.permission.del");
    //endregion
    //region 角色管理
    Route::get("role/index","RoleController@index")->name("admin.role.index");
    Route::any("role/add","RoleController@add")->name("admin.role.add");
    Route::any("role/edit/{id}","RoleController@edit")->name("admin.role.edit");
    //endregion
    //region 导航菜单管理
    Route::get("nav/index","NavController@index")->name("admin.nav.index");
    Route::any("nav/add","NavController@add")->name("admin.nav.add");
    //endregion
    //region 抽奖活动管理
    Route::get("activity/index","ActivityController@index")->name("admin.activity.index");
    Route::any("activity/add","ActivityController@add")->name("admin.activity.add");
    Route::any("activity/edit/{id}","ActivityController@edit")->name("admin.activity.edit");
    Route::get("activity/del/{id}","ActivityController@del")->name("admin.activity.del");
    Route::get("activity/open/{id}","ActivityController@open")->name("admin.activity.open");
    //endregion
    //region 抽奖活动管理
    Route::get("eventprize/index","EventprizeController@index")->name("admin.eventprize.index");
    Route::any("eventprize/add","EventprizeController@add")->name("admin.eventprize.add");
    Route::any("eventprize/edit/{id}","EventprizeController@edit")->name("admin.eventprize.edit");
    Route::get("eventprize/del/{id}","EventprizeController@del")->name("admin.eventprize.del");
    //endregion
    //region 抽奖报名管理
    Route::get("apply/index","ApplyController@index")->name("admin.apply.index");
    //endregion

});


Route::domain("shop.elm.com")->namespace("Shop")->group(function (){

    //region 前台用户列表
    Route::get("user/index","UserController@index")->name("shop.user.index");
    Route::any("user/zc","UserController@zc")->name("shop.user.zc");
    Route::any("user/add","UserController@add")->name("shop.user.add");
    Route::any("user/edit/{id}","UserController@edit")->name("shop.user.edit");
    Route::get("user/del/{id}","UserController@del")->name("shop.user.del");
    Route::any("user/login","UserController@login")->name("shop.user.login");
    Route::get("user/logout","UserController@logout")->name("shop.user.logout");
    Route::any("user/xg/","UserController@xg")->name("shop.user.xg");
    //endregion
    //region 前台商户列表
    Route::get("shop/index","ShopController@index")->name("shop.shop.index");
    Route::any("shop/add","ShopController@add")->name("shop.shop.add");
    Route::any("shop/edit/{id}","ShopController@edit")->name("shop.shop.edit");
    Route::get("shop/del/{id}","ShopController@del")->name("shop.shop.del");
    //endregion
    //region 前台菜品分类列表
    Route::get("menuCategory/index","MenuCategoryController@index")->name("shop.menuCategory.index");
    Route::any("menuCategory/add","MenuCategoryController@add")->name("shop.menuCategory.add");
    Route::any("menuCategory/edit/{id}","MenuCategoryController@edit")->name("shop.menuCategory.edit");
    Route::get("menuCategory/del/{id}","MenuCategoryController@del")->name("shop.menuCategory.del");
    //endregion
    //region 前台菜品列表
    Route::get("menu/index","MenuController@index")->name("shop.menu.index");
    Route::any("menu/add","MenuController@add")->name("shop.menu.add");
    Route::any("menu/edit/{id}","MenuController@edit")->name("shop.menu.edit");
    Route::get("menu/del/{id}","MenuController@del")->name("shop.menu.del");
    Route::any("menu/upload","MenuController@upload")->name("shop.menu.upload");
    //endregion
    //region 前台活动列表
    Route::get("event/index","EventController@index")->name("shop.event.index");
    Route::get("event/ck/{id}","EventController@ck")->name("shop.event.ck");
    //endregion
    //region 前台订单列表
    Route::get("order/index","OrderController@index")->name("shop.order.index");
    Route::get("order/check/{id}","OrderController@check")->name("shop.order.check");
    Route::get("order/off/{id}","OrderController@off")->name("shop.order.off");
    Route::get("order/deliver/{id}","OrderController@deliver")->name("shop.order.deliver");
    Route::get("order/day","OrderController@day")->name("shop.order.day");
    Route::get("order/month","OrderController@month")->name("shop.order.month");
    Route::get("order/total","OrderController@total")->name("shop.order.total");
    Route::get("order/cday","OrderController@cday")->name("shop.order.cday");
    Route::get("order/cmonth","OrderController@cmonth")->name("shop.order.cmonth");
    Route::get("order/ctotal","OrderController@ctotal")->name("shop.order.ctotal");
    //endregion
    //region 抽奖活动列表
    Route::get("activity/index","ActivityController@index")->name("shop.activity.index");
    Route::get("activity/sign/{id}","ActivityController@sign")->name("shop.activity.sign");
    //endregion

});