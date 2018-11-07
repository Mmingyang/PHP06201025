<?php

namespace App\Http\Controllers\Admin;

use App\Models\Nav;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class NavController extends Controller
{
    //导航菜单列表
    public function index()
    {
        $navs=Nav::paginate(5);

        return view("admin.nav.index",compact("navs"));

    }

    //导航菜单添加
    public function add(Request $request)
    {
        if ($request->isMethod("post")) {

            $data = $request->post();
//            dd($data);

            if(Nav::create($data)){

                return redirect()->route("admin.nav.index")->with("success","添加成功");
            }

        }

        //声明空数组装路由名
        $urls=[];
        //得到所有路由
        $routes=Route::getRoutes();
//        dd($routes);
        //循环遍历
        foreach ($routes as $route){
            if(isset($route->action['namespace']) && $route->action['namespace']=="App\Http\Controllers\Admin"){

                $urls[]=$route->action['as'];
            }
        }
        //转化成数组
        $pers=Permission::pluck("name")->toArray();

        //已经存在的删除
//        $urls=array_diff($urls,$pers);

        return view("admin.nav.add",compact("urls"));

    }




}
