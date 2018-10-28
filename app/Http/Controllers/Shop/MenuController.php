<?php

namespace App\Http\Controllers\Shop;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MenuController extends BaseController
{
    //
    public function index(Request $request)
    {

//        $menus=Menu::all();
        $id=Auth::id();
        $mc=MenuCategory::all()->where("type_id",$id);
//        dd($mc);
        $url=$request->query();

        $cateId=$request->input("good_id");
        $keyword=$request->input("keyword");
        $min = $request->input("minPrice");
        $max = $request->input("maxPrice");

        $query=Menu::orderBy("id")->where("shop_id",$id);

        if ($keyword!==null){
            $query->where("goods_name","like","%{$keyword}%");
        }
        if ($cateId!==null){
            $query->where("menu_cate_id",$cateId);
        }
        if ($max!==null){

            $query->where("goods_money","<=",$max);
        }
        if ($min!==null){

            $query->where("goods_money",">=",$min);
        }
        $goods=$query->paginate(1);

        $cates=MenuCategory::where("shop_id",Auth::user()->shop->id)->get();
//        dd($cates);

        return view("shop.menu.index",compact("mc","goods","url","cates"));

    }


    public function add(Request $request)
    {

        $fl=Shop::all();

        $menus=MenuCategory::all();

        if($request->isMethod("post")){

            $this->validate($request, [
                "goods_name" => "required|unique:menus",
                "goods_img" => "required",
                "menu_cate_id"=>"required",
                "goods_money"=>"required",
                "description"=>"required",
                "status"=>"required",
            ],[
                "goods_name.required"=>"菜品名称不能为空",
                "goods_name.unique"=>"菜品名称已存在",
                "goods_img.required"=>"菜品图片不能为空",
                "menu_cate_id.required"=>"所属分类ID不能为空",
                "goods_money.required"=>"价格不能为空",
                "description.required"=>"描述不能为空",
                "status.required"=>"菜品状态不能为空",
            ]);


            $data=$request->post();
//            dd($data);
            $data['shop_id']=Auth::id();
//            dd($data["shop_id"]);
            if(Menu::create($data)){

                return redirect()->route("shop.menu.index")->with("success","添加成功");

            }

        }

        $cates=MenuCategory::where("shop_id",Auth::user()->shop->id)->get();
        return view("shop.menu.add",compact("fl","menus"));

    }


    public function edit(Request $request,$id)
    {

        $menu=Menu::find($id);
        $fl=Shop::all();
        $menus=MenuCategory::all();

        if($request->isMethod("post")){

            $this->validate($request, [
                "goods_name" => "required",
                "goods_img" => "required",
                "menu_cate_id"=>"required",
                "goods_money"=>"required",
                "description"=>"required",
                "status"=>"required",
            ],[
                "goods_name.required"=>"菜品名称不能为空",
                "goods_img.required"=>"菜品图片不能为空",
                "menu_cate_id.required"=>"所属分类ID不能为空",
                "goods_money.required"=>"价格不能为空",
                "description.required"=>"描述不能为空",
                "status.required"=>"菜品状态不能为空",
            ]);

            $data=$request->post();
//            dd($data);
            $data['shop_id']=Auth::id();

            if($menu->update($data)){

                return redirect()->route("shop.menu.index")->with("编辑成功");

            }else{

                return redirect()->route("shop.menu.edit")->with("编辑失败");

            }

        }

        return view("shop.menu.edit",compact("fl","menus","menu"));

    }


    public function del($id)
    {
        $menu=Menu::find($id);

        $img=$menu->goods_img;
//        dd($img);

        Storage::delete($img);

        if($menu->delete()){

            return redirect()->route("shop.menu.index")->with("success","删除成功");

        }

    }

    public function upload(Request $request)
    {
        //处理上传
        //dd($request->file("file"));

        $file=$request->file("file");
//        dd($file);

        if ($file){
            //上传
            $url=$file->store("menu_cate");

            /// var_dump($url);
            //得到真实地址  加 http的址
//            $url=Storage::url($url);

            $data['url']=env("ALIYUN_OSS_URL").$url;

            return $data;
            ///var_dump($url);
        }

    }






}
