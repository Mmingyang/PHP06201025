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
    return view('welcome');
});


Route::domain("admin.elm.com")->namespace("Admin")->group(function (){


    Route::get("shopcategory/index","ShopcategoryController@index")->name("admin.shopcategory.index");
    Route::any("shopcategory/add","ShopcategoryController@add")->name("admin.shopcategory.add");
    Route::any("shopcategory/edit/{id}","ShopcategoryController@edit")->name("admin.shopcategory.edit");
    Route::get("shopcategory/del/{id}","ShopcategoryController@del")->name("admin.shopcategory.del");


    Route::any("admin/login","AdminController@login")->name("admin.admin.login");
    Route::get("admin/index","AdminController@index")->name("admin.admin.index");
    Route::any("admin/add","AdminController@add")->name("admin.admin.add");
    Route::any("admin/edit/{id}","AdminController@edit")->name("admin.admin.edit");
    Route::get("admin/del/{id}","AdminController@del")->name("admin.admin.del");
    Route::get("admin/logout","AdminController@logout")->name("admin.admin.logout");
    Route::any("admin/xg/","AdminController@xg")->name("admin.admin.xg");



    Route::get("user/index","UserController@index")->name("admin.user.index");
    Route::any("user/add","UserController@add")->name("admin.user.add");
    Route::any("user/edit/{id}","UserController@edit")->name("admin.user.edit");
    Route::get("user/del/{id}","UserController@del")->name("admin.user.del");


    Route::get("shop/index","ShopController@index")->name("admin.shop.index");
    Route::any("shop/add","ShopController@add")->name("admin.shop.add");
    Route::any("shop/edit/{id}","ShopController@edit")->name("admin.shop.edit");
    Route::get("shop/del/{id}","ShopController@del")->name("admin.shop.del");
    Route::any("shop/shen/{id}","ShopController@shen")->name("admin.shop.shen");


    Route::get("event/index","EventController@index")->name("admin.event.index");
    Route::any("event/add","EventController@add")->name("admin.event.add");
    Route::any("event/edit/{id}","EventController@edit")->name("admin.event.edit");
    Route::get("event/del/{id}","EventController@del")->name("admin.event.del");

});


Route::domain("shop.elm.com")->namespace("Shop")->group(function (){


    Route::get("user/index","UserController@index")->name("shop.user.index");
    Route::any("user/zc","UserController@zc")->name("shop.user.zc");
    Route::any("user/add","UserController@add")->name("shop.user.add");
    Route::any("user/edit/{id}","UserController@edit")->name("shop.user.edit");
    Route::get("user/del/{id}","UserController@del")->name("shop.user.del");
    Route::any("user/login","UserController@login")->name("shop.user.login");
    Route::get("user/logout","UserController@logout")->name("shop.user.logout");
    Route::any("user/xg/","UserController@xg")->name("shop.user.xg");


    Route::get("shop/index","ShopController@index")->name("shop.shop.index");
    Route::any("shop/add","ShopController@add")->name("shop.shop.add");
    Route::any("shop/edit/{id}","ShopController@edit")->name("shop.shop.edit");
    Route::get("shop/del/{id}","ShopController@del")->name("shop.shop.del");



    Route::get("menucategory/index","MenuCategoryController@index")->name("shop.menucategory.index");
    Route::any("menucategory/add","MenuCategoryController@add")->name("shop.menucategory.add");
    Route::any("menucategory/edit/{id}","MenuCategoryController@edit")->name("shop.menucategory.edit");
    Route::get("menucategory/del/{id}","MenuCategoryController@del")->name("shop.menucategory.del");



    Route::get("menu/index","MenuController@index")->name("shop.menu.index");
    Route::any("menu/add","MenuController@add")->name("shop.menu.add");
    Route::any("menu/edit/{id}","MenuController@edit")->name("shop.menu.edit");
    Route::get("menu/del/{id}","MenuController@del")->name("shop.menu.del");
    Route::any("menu/upload","MenuController@upload")->name("shop.menu.upload");


    Route::get("event/index","EventController@index")->name("shop.event.index");
    Route::get("event/ck/{id}","EventController@ck")->name("shop.event.ck");

});