<?php

namespace App\Http\Controllers\Shop;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends BaseController
{
    //订单列表
    public function index(Request $request)
    {
        $url = $request->query();

        $start =$request->get("start_time");
        $end =$request->get("end_time");

        $shopId=Auth::user()->shop->id;

        $query=Order::where("shop_id",$shopId);

        if($start !==null ){
            $query->where("created_at",">=","$start");
        }
        if( $end !==null){
            $query->where("created_at","<=",$end);
        }

//        dd($query);
        $data=$query->get();

//        dd($data);
        return view("shop.order.index",compact("data"));

    }
    
    //订单详情
    public function check($id)
    {
        $order=Order::find($id);

        return view("shop.order.check",compact("order"));

    }

    //取消订单
    public function off($id)
    {
        $data=Order::find($id);

//        dd($data);
        $data->status=1;
        $data->save();

        return redirect()->route("shop.order.index")->with("success","取消订单成功");

    }

    //发货
    public function deliver($id)
    {
        $data=Order::find($id);

//        dd($data);
        $data->status=2;
        $data->save();

        return redirect()->route("shop.order.index")->with("success","发货成功");

    }


    //统计订单量
    //天
    public function day(Request $request)
    {

        $shopId=Auth::user()->shop->id;

        $data=Order::where("shop_id",$shopId)
            ->select(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as date,COUNT(*) as nums,SUM(total) as money"))
            ->groupBy('date')
            ->get();

//        dd($data->toArray());
        return view("shop.order.day",compact("data"));

    }
    
    //月
    public function month()
    {
        $shopId=Auth::user()->shop->id;

        $data=Order::where("shop_id",$shopId)
            ->select(DB::raw("DATE_FORMAT(created_at,'%Y-%m') as date,COUNT(*) as nums,SUM(total) as money"))
            ->groupBy('date')
            ->get();

//        dd($data->toArray());
        return view("shop.order.month",compact("data"));

    }

    //总计
    public function total()
    {

        $id=Auth::user()->shop->id;

//        dd($id);

        $data=Order::where("shop_id",$id)
            ->select(DB::raw("COUNT(*) as nums,SUM(total) as money"))
            ->get();

//        dd($data->toArray());

        return view("shop.order.total",compact("data"));

    }


    //菜品销量统计
    //菜品
    //日
    public function cday()
    {

        $shopId=Auth::user()->shop->id;
        $order=Order::where("shop_id",$shopId)->whereIn("status",[1,2,3])->pluck("id");
        $data=OrderDetail::select(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as date,SUM(amount) as nums,SUM(amount * goods_price) as money"))
            ->whereIn("order_id",$order)
            ->groupBy('date')
            ->get();

//        dd($data->toArray());
        return view("shop.order.cday", compact("data"));
    }
    //月
    public function cmonth()
    {
        $shopId = Auth::user()->shop->id;
        $order = Order::where("shop_id", $shopId)->whereIn("status", [1, 2, 3])->pluck("id");
        $data = OrderDetail::select(DB::raw("DATE_FORMAT(created_at,'%Y-%m') as date,SUM(amount) as nums,SUM(amount * goods_price) as money"))
            ->whereIn("order_id",$order)
            ->groupBy('date')
            ->get();

//        dd($data->toArray());
        return view("shop.order.cmonth", compact("data"));
    }

    //总
    public function ctotal()
    {
        $ids = Order::where("shop_id",Auth::user()->shop->id)->pluck("id");
        $data= OrderDetail::select(DB::raw("SUM(amount) as nums,SUM(amount * goods_price) as money"))
            ->whereIn("order_id",$ids)
            ->get();

//        dd($data->toArray());

        return view("shop.order.ctotal", compact("data"));
    }



}
