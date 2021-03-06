<?php

namespace App\Http\Controllers\Admin;


use App\Models\Order;
use App\Models\Shop;
use App\Models\Shopcategory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ShopController extends BaseController
{
    //店铺显示
    public function index()
    {
        $datas=Shop::all();
        return view("admin.shop.index",compact("datas"));
    }
    //店铺修改
    public function edit(Request $request,$id)
    {
        //读取一条数据
        $data=Shop::find($id);
        $fl=Shopcategory::all();
        if($request->isMethod("post")) {
            $this->validate($request,[
                "shop_category_id"=>"required",
                "shop_name"=>"required",
                "qi_money"=>"required",
                "pei_money"=>"required",
                "notice"=>"required",
                "discount"=>"required"
            ]);
            $da=$request->post();
            $file = $request->file("shop_img");
            if($file==null){
                $da['shop_img']=$data->shop_img;
//                dd($da);
            }else{
                unlink($data->shop_img);
                $da['shop_img']=$file->store("shop_img");
            }
            $da['shop_img']=$file->store("shop_img");
            $da['is_brand']=$request->has("is_brand")?1:0;
            $da['is_time']=$request->has("is_time")?1:0;
            $da['is_feng']=$request->has("is_feng")?1:0;
            $da['is_bao']=$request->has("is_bao")?1:0;
            $da['is_piao']=$request->has("is_piao")?1:0;
            $da['is_zhun']=$request->has("is_zhun")?1:0;
//            dd($da);
            $data->update($da);
            //返回
            session()->flash("success","修改成功");
            return redirect()->route("admin.shop.index");

        }

        return view("admin.shop.edit",compact("data","fl"));
    }

    //删除
    public function del($id)
    {
        //查询一条
//        $store=Shop::find($id);
        //删除店铺需要同时删除用户 需要用到事务保证
        DB::transaction(function () use ($id) {
            //删除店铺
            $shop = Shop::findOrFail($id)->delete();
            //删除用户
            $user = User::where("shop_id", $id)->delete();
//            dd($user);
        });

        return redirect()->route("admin.shop.index")->with("success","删除成功");
    }

    public function shen($id)
    {
        $data=Shop::find($id);
//        dd($id);
        $data->state=1;
//        dd($data);
        $data->save();

        $user=User::where('id',$data->user_id)->first();

        $shopName=$data->shop_name;
        $to = $user->email;

        // dd($to);
        $subject =$shopName. '审核通知';

        Mail::send(
            'emails.shop',
            compact("shopName"),
            function ($message) use($to, $subject) {
//                dd($message);
                $message->to($to)->subject($subject);
            }
        );


        return redirect()->route("admin.shop.index")->with("success","审核成功");
    }


}
