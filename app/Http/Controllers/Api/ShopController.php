<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    // 首页显示
    public function index(Request $request)
    {
//        $keyword = $request->get("keyword");
//        // $query = Shop::orderBy("id");
//
////        dd($shops);
//        //内容搜索
//        if($keyword !== null){
//            $shops=Shop::where("shop_name","like","%{$keyword}%")->where('status',1)->get();
//        }else{
//            $shops=Shop::where("status",1)->get();
//        }
//        //追加 距离
//        foreach ($shops as  $k=>$v){
//            $shops[$k]->distance = rand(1000, 5000);
//            $shops[$k]->estimate_time = ceil($shops[$k]['distance'] / rand(100, 150));
//
//        }

        //得到所有商铺设置状态为1的显示
        $shops=Shop::where("state",1)->get();
        //追加
        foreach ($shops as $k=>$v){

            $shops[$k]->shop_rating="4.".rand(0,9);
            $shops[$k]->brand=true;
            $shops[$k]->on_time=true;
            $shops[$k]->fengniao=$v->is_feng;
            $shops[$k]->bao=$v->is_bao;
            $shops[$k]->piao=$v->is_piao;
            $shops[$k]->zhun=$v->is_zhun;
            $shops[$k]->start_send=$v->qi_money;
            $shops[$k]->send_cost=$v->pei_money;
            $shops[$k]->distance=rand(1000, 5000);
            $shops[$k]->estimate_time=rand(10, 60);
        }

        return $shops;
    }

    //首页详情
    public function check()
    {
        $id=request()->get('id');
        $shop=Shop::find($id);

//        dd($shop->toArray());

            $shop->shop_rating="4.5".rand(0,9);
            $shop->service_code="4.6".rand(0,9);
            $shop->foods_code="4.6".rand(0,9);
            $shop->high_or_low="4.6".rand(0,9);
            $shop->h_l_percent=30;
            $shop->brand=true;
            $shop->on_time=true;
            $shop->fengniao=true;
            $shop->bao=true;
            $shop->piao=true;
            $shop->zhun=true;
            $shop->start_send=20;
            $shop->send_cost=5;
            $shop->distance=rand(1000, 5000);
            $shop->estimate_time=31;
            $shop->satisfy_rate=91;


        $shop->evaluate=[

            [
                "user_id" => 12344,
                "username" => "w******k",
                "user_img" => "http//www.homework.com/images/slider-pic4.jpeg",
                "time" => "2017-2-22",
                "evaluate_code" => 1,
                "send_time" => 30,
                "evaluate_details" => "不怎么好吃"
            ],
            [
                "user_id" => 12344,
                "username" => "w******k",
                "user_img" => "http//www.homework.com/images/slider-pic4.jpeg",
                "time" => "2017-2-22",
                "evaluate_code" => 4.5,
                "send_time" => 30,
                "evaluate_details" => "很好吃"
            ],
            [
                "user_id" => 12344,
                "username" => "w******k",
                "user_img" => "http//www.homework.com/images/slider-pic4.jpeg",
                "time" => "2017-2-22",
                "evaluate_code" => 5,
                "send_time" => 30,
                "evaluate_details" => "很好吃"
            ],
            [
                "user_id" => 12344,
                "username" => "w******k",
                "user_img" => "http//www.homework.com/images/slider-pic4.jpeg",
                "time" => "2017-2-22",
                "evaluate_code" => 4.7,
                "send_time" => 30,
                "evaluate_details" => "很好吃"
            ],
            [
                "user_id" => 12344,
                "username" => "w******k",
                "user_img" => "http//www.homework.com/images/slider-pic4.jpeg",
                "time" => "2017-2-22",
                "evaluate_code" => 5,
                "send_time" => 30,
                "evaluate_details" => "很好吃"
            ]

        ];

        $cates=MenuCategory::where("shop_id",$id)->get();

        //当前分类商品
        foreach ($cates as $k=>$cate){

            $cates[$k]->goods_list=$cate->goodsList;
            $cates[$k]->type_accumulation=$cate->type_id;
        }

        $shop->commodity=$cates;

        return $shop;

    }





}
