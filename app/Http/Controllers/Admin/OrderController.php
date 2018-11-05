<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends BaseController
{
    //订单量日统计
    public function day(Request $request)
    {

        $shopId=Auth::id();

//        dd($shopId);
        $data=Order::where("shop_id",$shopId)
            ->select(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as date,COUNT(*) as nums,SUM(total) as money"))
            ->groupBy('date')
            ->get();

//        dd($data->toArray());
        return view("admin.order.day",compact("data"));

   }


   //订单量月统计
    public function month()
    {
        $shopId=Auth::id();

        $data=Order::where("shop_id",$shopId)
            ->select(DB::raw("DATE_FORMAT(created_at,'%Y-%m') as date,COUNT(*) as nums,SUM(total) as money"))
            ->groupBy('date')
            ->get();

//        dd($data->toArray());
        return view("admin.order.month",compact("data"));

    }


    //订单总计
    public function total()
    {
        $id=Auth::id();

//        dd($id);
        $data=Order::where("shop_id",$id)
            ->select(DB::raw("COUNT(*) as nums"))
            ->get();
//        dd($data->toArray());

        return view("admin.order.total",compact("data"));

    }


    //菜品销量统计
    //日统计
    public function cday()
    {

        //读取商家所有订单
        $order=Order::where("shop_id",Auth::id())->whereIn("status",[1,2,3])->pluck("id");
//        dd($order);
        $data= OrderDetail::select(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as date,SUM(amount) as nums,SUM(amount * goods_price) as money"))
            ->whereIn("order_id",$order)
            ->groupBy('date')
            ->get();
//        dd($data->toArray());
        return view("admin.order.cday", compact("data"));

    }

    //月统计
    public function cmonth()
    {
        //读取商家所有订单
        $order=Order::where("shop_id",Auth::id())->whereIn("status",[1,2,3])->pluck("id");
//        dd($order);
        $data= OrderDetail::select(DB::raw("DATE_FORMAT(created_at,'%Y-%m') as date,SUM(amount) as nums,SUM(amount * goods_price) as money"))
            ->whereIn("order_id",$order)
            ->groupBy('date')
            ->get();
//        dd($data->toArray());

        return view("admin.order.cmonth", compact("data"));

    }

    //总计
    public function ctotal()
    {
        $order=Order::where("shop_id",Auth::id())->whereIn("status",[1,2,3])->pluck("id");
        $data= OrderDetail::select(DB::raw("SUM(amount) as nums,SUM(amount * goods_price) as money"))
            ->whereIn("order_id",$order)
            ->get();
//        dd($data->toArray());

        return view("shop.order.ctotal", compact("data"));
    }




}
