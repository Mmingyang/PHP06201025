<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class PermissionController extends BaseController
{
    //
    public function index()
    {
        $permissions=Permission::all();


        return view("admin.permission.index",compact("permissions"));

    }

    //添加权限
    public function add(Request $request)
    {
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
        $urls=array_diff($urls,$pers);


        if($request->isMethod("post")){

            $this->validate($request,[
                'name'=>"required|unique:permissions",
                'intro'=>"required",
            ],[
                'intro.required'=>"权限描述 不能为空",
            ]);

            $data=$request->post();
            $data['guard_name']='admin';
            Permission::create($data);

            return redirect()->route("admin.permission.index")->with("success","创建成功");

        }

        return view("admin.permission.add",compact("urls"));
    }



    //编辑权限
    public function edit(Request $request,$id)
    {
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


        //找到指定的id
        $permissions=Permission::find($id);

        if($request->isMethod("post")){
            $this->validate($request,[
                'name'=>"required",
                'intro'=>"required",
            ],[
                'intro.required'=>"权限描述 不能为空",
            ]);

            $data=$request->post();
            $data['guard_name']='admin';

            $permissions->update($data);

            return redirect()->route("admin.permission.index")->with("success","编辑成功");

        }

        return view("admin.permission.edit",compact("permissions","urls"));

    }




    //删除权限
    public function del($id)
    {
        $per=Permission::find($id);
//        dd($per);

        if($per->delete()){

            return redirect()->route("admin.permission.index")->with("success","删除成功");
        }

    }


}
