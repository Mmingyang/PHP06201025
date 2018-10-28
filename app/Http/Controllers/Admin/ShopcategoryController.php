<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
use App\Models\Shopcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopcategoryController extends BaseController
{
    //
    public function index()
    {

        $spcates=Shopcategory::all();

        return view("admin.shopcategory.index",compact("spcates"));

    }

    public function add(Request $request)
    {
        if($request->isMethod("post")){

            $this->validate($request, [
                "name" => "required|unique:shopcategories",
                "img" => "required",
                "status" => "required"
            ],[
                'img.required'=>"图片不能为空",
                'status.required'=>"状态不能为空",
            ]);

            $data=$request->post();

            $data['img']=$request->file("img")->store("images","image");

            if(Shopcategory::create($data)){

                return redirect()->route("admin.shopcategory.index")->with("success","添加成功");

            }

        }

        return view("admin.shopcategory.add");

    }


    public function edit(Request $request,$id)
    {

        $spcates=Shopcategory::find($id);

        if($request->isMethod("post")){

            $data=$request->post();

            $file=$request->file("img");

            if($file==null){

                $data["img"]=$spcates->img;
                $spcates->update($data);
            }else{
                unlink($spcates->img);
                $data['img']=$request->file("img")->store("images","image");
                $spcates->update($data);

            }

            session()->flash("success","编辑成功");
            return redirect()->route("admin.shopcategory.index")->with("success","编辑成功");

        }

        return view("admin.shopcategory.edit",compact("spcates"));

    }


    public function del($id)
    {
        $spcate=Shopcategory::find($id);

        $cate=Shopcategory::findOrFail($id);

        $shopCount=Shop::where('shop_cate_id',$cate->id)->count();

        if ($shopCount){
            //回跳
            return  back()->with("danger","当前分类下有店铺，不能删除");
        }

        unlink($spcate->img);
        if($spcate->delete()){

            return redirect()->route("admin.shopcategory.index")->with("success","删除成功");
        }
    }




}
