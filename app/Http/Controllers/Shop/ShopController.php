<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop;
use App\Models\Shopcategory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends BaseController
{
    //
    public function index()
    {

        $id=Auth::user()->id;

        $users=User::find($id);

        $shop=Shop::find($id);


        return view("shop.shop.index",compact("shop","users"));

    }


    public function add(Request $request)
    {


        $fl=Shopcategory::all();
        if($request->isMethod("post")) {
            $this->validate($request,[
                "shop_cate_id"=>"required",
                "shop_name"=>"required",
                "shop_img"=>"required",
                "qi_money"=>"required",
                "pei_money"=>"required",
                "notice"=>"required",
                "discount"=>"required"
            ]);
            $data=$request->post();
            $file = $request->file("shop_img");
            $data['shop_img']=$file->store("shop_img","image");
            $data['is_brand']=$request->has("is_brand")?1:0;
            $data['is_time']=$request->has("is_time")?1:0;
            $data['is_feng']=$request->has("is_feng")?1:0;
            $data['is_bao']=$request->has("is_bao")?1:0;
            $data['is_piao']=$request->has("is_piao")?1:0;
            $data['is_zhun']=$request->has("is_zhun")?1:0;
            $data['state']=2;
            $data['user_id']=Auth::id();
//            dd($data);
            Shop::create($data);

            $shop=DB::table("shops")->orderBy("id","desc")->first();
//            dd($shop);
//            $user = User::find($data['user_id']);
//
//            $user["shop_id"] = $shop->id;
//
//            DB::update('update users set shop_id= :shop_id where id= :id ',[$user["shop_id"],$data['user_id']]);

            $user = User::find($data['user_id']);
//            dd($user);
            $user["shop_id"] = $shop->id;
//            dd($user["shop_id"]);
//            DB::update('update users set shop_id= :shop_id where id= :id ',[$user["shop_id"],$data['user_id']]);

//            DB::update('update users set shop_id= :shop_id where id= :id',[$user["shop_id"],$data["user_id"]]);


            //返回
            return redirect()->route("shop.shop.index")->with("success","注册成功");

        }


        return view("shop.shop.add",compact("fl"));
    }


    public function del($id)
    {

        $shop=Shop::find($id);

        if($shop->delete()){
            unlink($shop->shop_img);
            return redirect()->route("shop.shop.index")->with("success","删除成功");

        }

    }


    public function edit(Request $request,$id)
    {

        $shop=Shop::find($id);

        if($request->isMethod("post")){







        }

        return view("shop.shop.edit",compact("shop"));
    }









}
