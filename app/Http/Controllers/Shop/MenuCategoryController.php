<?php

namespace App\Http\Controllers\Shop;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MenuCategoryController extends BaseController
{
    //
    public function index()
    {
        //dd(Auth::user()->shop->id);
        $menus=MenuCategory::where("shop_id",Auth::user()->shop->id)->get();


        return view("shop.menuCategory.index",compact("menus"));
    }

    public function add(Request $request)
    {
        if($request->isMethod("post")){

            $this->validate($request, [
                "name" => "required",
                "type_id" => "required",
                "description"=>"required",
            ],[
                "type_id.required"=>"菜品编号不能为空",
                "description.required"=>"描述不能为空",
            ]);

            $data=$request->post();
            $data['shop_id']=Auth::user()->shop->id;
//            dd($data);
            if(MenuCategory::create($data)){

                return redirect()->route("shop.menuCategory.index")->with("success","添加成功");

            }else{

                return redirect()->route("shop.menuCategory.add")->with("danger","添加失败");

            }
        }

        return view("shop.menuCategory.add");

    }


    public function edit(Request $request,$id)
    {
        $fl=Shop::all();

        $menucate=MenuCategory::find($id);

        if($request->isMethod("post")){

            $this->validate($request, [
                "name" => "required",
                "type_id" => "required",
                "description"=>"required",
            ],[
                "type_id.required"=>"菜品编号不能为空",
                "description.required"=>"描述不能为空",
            ]);

            $data=$request->post();

            if($menucate->update($data)){

                return redirect()->route("shop.menuCategory.index")->with("success","编辑成功");

            }else{

                return back()->with("danger","编辑失败");

            }

        }

        return view("shop.menuCategory.edit",compact("menucate","fl"));

    }


    public function del($id)
    {
        $menucate=MenuCategory::find($id);

        $cate=MenuCategory::findOrFail($id);

        $menuCount=Menu::where('menu_cate_id',$cate->id)->count();

        if ($menuCount){
            //回跳
            return  back()->with("danger","当前分类下有店铺，不能删除");
        }

        if($menucate->delete()){

            return redirect()->route("shop.menuCategory.index")->with("success","删除成功");

        }else{

            return back()->with("danger","删除失败");

        }


    }






}
