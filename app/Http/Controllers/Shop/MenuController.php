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
        $url = $request->query();
        //接收数据
        $cateId=$request->get("goods_id");
        $keyword=$request->get("keyword");
        $min = $request->get("minPrice");
        $max = $request->get("maxPrice");

        $query=Menu::where('shop_id',Auth::user()->shop->id);

        if ($keyword!==null){
            $query->where("goods_name","like","%{$keyword}%");
        }
        if ($cateId!==null){
            $query->where("menu_cate_id",$cateId);
        }
        if ($max!==null){

            $query->where("goods_price","<=",$max);
        }
        if ($min!==null){

            $query->where("goods_price",">=",$min);
        }
        $goods=$query->paginate(1);
        //得到所有分类
        $cates=MenuCategory::where("shop_id",Auth::user()->shop->id)->get();

        return view("shop.menu.index",compact("cates","goods","url"));

    }


    public function add(Request $request)
    {

        if($request->isMethod("post")){

            $this->validate($request, [
                "goods_name" => "required|unique:menus",
                "goods_img" => "required",
                "menu_cate_id"=>"required",
                "goods_price"=>"required",
                "description"=>"required",
                "status"=>"required",
            ],[
                "goods_name.required"=>"菜品名称不能为空",
                "goods_name.unique"=>"菜品名称已存在",
                "goods_img.required"=>"菜品图片不能为空",
                "menu_cate_id.required"=>"所属分类ID不能为空",
                "goods_price.required"=>"价格不能为空",
                "description.required"=>"描述不能为空",
                "status.required"=>"菜品状态不能为空",
            ]);


            $data=$request->post();
//            dd($data);
            $data['shop_id']=Auth::user()->shop->id;
//            dd($data);

            if(Menu::create($data)){

                return redirect()->route("shop.menu.index")->with("success","添加成功");

            }

        }

        $cates=MenuCategory::where("shop_id",Auth::user()->shop->id)->get();
        return view("shop.menu.add",compact("cates"));

    }


    public function edit(Request $request,$id)
    {

        $menu=Menu::find($id);
        $fl=Shop::all();

        if($request->isMethod("post")){

            $this->validate($request, [
                "goods_name" => "required",
                "menu_cate_id"=>"required",
                "goods_price"=>"required",
                "description"=>"required",
                "status"=>"required",
            ],[
                "goods_name.required"=>"菜品名称不能为空",
                "menu_cate_id.required"=>"所属分类ID不能为空",
                "goods_price.required"=>"价格不能为空",
                "description.required"=>"描述不能为空",
                "status.required"=>"菜品状态不能为空",
            ]);

            $data=$request->post();
            if($data['goods_img']== null){
                $data['goods_img']=$menu['goods_img'];
            }

            $data['shop_id']=Auth::user()->shop->id;

//            dd($data);
            if($menu->update($data)) {

                return redirect()->route("shop.menu.index")->with("success","编辑成功");

            }
        }
        $cates=MenuCategory::where("shop_id",Auth::user()->shop->id)->get();
        return view("shop/menu/edit",compact("fl","menu","cates"));

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
