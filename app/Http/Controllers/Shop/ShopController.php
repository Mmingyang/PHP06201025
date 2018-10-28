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

        $id=Auth::id();

//        $shop=Shop::find($id);

        $users = User::find($id);
//        dd($users);
        if ($users->shop_id == 0){
            $shop[0]=$users;
        }else{
            $shop = $users->tj($id);
        }
//        dd($shop[0]);

        return view("shop.shop.index",compact("shop"));

    }


    public function add(Request $request)
    {
        //获取分类
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

            $shop=DB::table("shops")->orderBy('id','desc')->first();

            $user=User::find($data["user_id"]);

            $user["shop_id"]=$shop->id;

            DB::update("update users set shop_id = :shop_id where id= :id",[$user["shop_id"],$data["user_id"]]);

            session()->flash("success","注册成功等待平台审核");

            Auth::logout();

            //返回
            return redirect()->route("shop.user.login");

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
        $fl=Shopcategory::all();

        if($request->isMethod("post")){


                $this->validate($request, [
                    "shop_cate_id" => "required",
                    "shop_name" => "required",
                    "shop_img" => "required",
                    "qi_money" => "required",
                    "pei_money" => "required",
                    "notice" => "required",
                    "discount" => "required"
                ]);
                $data = $request->post();
                $file = $request->file("shop_img");
                $data['shop_img'] = $file->store("shop_img", "image");
                $data['is_brand'] = $request->has("is_brand") ? 1 : 0;
                $data['is_time'] = $request->has("is_time") ? 1 : 0;
                $data['is_feng'] = $request->has("is_feng") ? 1 : 0;
                $data['is_bao'] = $request->has("is_bao") ? 1 : 0;
                $data['is_piao'] = $request->has("is_piao") ? 1 : 0;
                $data['is_zhun'] = $request->has("is_zhun") ? 1 : 0;
                $data['state'] = 2;
                $data['user_id'] = Auth::id();

                if($shop->update($data)){

                    return redirect()->route("shop.shop.index")->with("success","编辑成功");


                }else{

                    return redirect()->route("shop.shop.edit")->with("danger","编辑失败");


                }

         }


        return view("shop.shop.edit",compact("shop","fl"));
    }









}
