<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        return view("admin.permission.add");
    }

    //编辑权限
    public function edit(Request $request,$id)
    {
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

        return view("admin.permission.edit",compact("permissions"));

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
