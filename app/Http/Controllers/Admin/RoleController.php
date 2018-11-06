<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends BaseController
{
    //
    public function index()
    {
        $roles=Role::all();

        return view("admin.role.index",compact("roles"));

    }

    //角色添加
    public function add(Request $request)
    {
        if($request->isMethod("post")){
            $this->validate($request,[
                'name'=>"required|unique:roles"
            ]);

            $pers=$request->post('per');
//            dd($request->post('per'));
            $role=Role::create([
                'name'=>$request->post("name"),
                'guard_name'=>"admin"
            ]);

//            dd($role);
            if($pers){

                $role->syncPermissions($pers);
            }

            return redirect()->route("admin.role.index")->with("success","创建成功");

        }

        $pers=Permission::all();

        return view("admin.role.add",compact("pers"));
    }


    //角色编辑
    public function edit(Request $request,$id)
    {

        $role=Role::find($id);

        if($request->isMethod("post")){
            $this->validate($request,[
                'name'=>"required"
            ]);

            $per=$request->post("per");
//            dd($per);

            $roles=$role->update([
                'name'=>$request->post("name"),
                'guard_name'=>"admin"
            ]);

            if($per){

                $role->syncPermissions($per);
            }

            return redirect()->route("admin.role.index")->with("success","编辑成功");

        }

        //得到所有权限
        $pers=Permission::all();

        return view("admin.role.edit",compact("role","pers"));

    }


}
