<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //购物车列表显示
    public function index(Request $request)
    {
        //用户ID 只看那个ID的地址
        $uId=$request->input('user_id');
//        dd($uId);
        //显示购物车
        $carts=Cart::where('user_id',$uId)->get();

        $goodsList=[];
        $totalCost=0;
        foreach ($carts as $k=>$v){

            $good=Menu::where("id",$v->goods_id)->first(['id as goods_id','goods_name','goods_img','goods_price']);

            $good->amount = $v->amount;
            //算总价
            $totalCost += $good->amount * $good->goods_price;
            $goodsList[] = $good;

        }

        return [
            'goods_list' => $goodsList,
            'totalCost' => $totalCost,
        ];

    }

    public function add(Request $request)
    {
        //接收参数
        $goods=$request->post('goodsList');
        $counts=$request->post('goodsCount');
//        dd($goods);
        foreach ($goods as $k=>$good){
            $data = [
                'user_id' => $request->post('user_id'),
                'goods_id' => $good,
                'amount' => $counts[$k]
            ];

            Cart::create($data);
        }
        return[
            'status' => "true",
            'message' => "添加成功",

        ];

    }


}
