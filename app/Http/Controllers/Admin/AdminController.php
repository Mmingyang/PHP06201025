<?php

namespace App\Http\Controllers\Admin;


use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends BaseController
{
    //
    public function login(Request $request)
    {
        if($request->isMethod("post")){

            $data = $this->validate($request, [
                "name" => "required",
                "password" => "required",
            ]);

            if (Auth::guard("admin")->attempt($data, $request->has("remember"))) {

                return redirect()->intended(route("admin.admin.index"))->with("success", "登录成功");

            }else{

                return redirect()->back()->withInput()->with("danger","账号密码错误");

            }

        }

        return view("admin.admin.login");


    }

    public function index()
    {
        $admins=Admin::all();

        return view("admin.admin.index",compact("admins"));
    }


    public function add(Request $request)
    {
        if($request->isMethod("post")){
            $this->validate($request,[
                'name'=>"required|max:10|min:2|unique:admins",
                'email'=>"required",
                'password'=>"required",
            ]);

            $data=$request->post();

            $data["password"]=bcrypt($data["password"]);

            if(Admin::create($data)){

                return redirect()->route("admin.admin.index")->with("success","添加成功");

            }else{

                return redirect()->route("admin.admin.add")->with("danger","添加失败");

            }

        }

        return view("admin.admin.add");
    }

    public function logout()
    {
        //指定保安名
        Auth::guard("admin")->logout();

        return redirect()->route("admin.admin.index")->with("success","退出登录成功");
    }

    public function edit(Request $request,$id)
    {
        $admin=Admin::find($id);


        if($request->isMethod("post")){
            $this->validate($request,[
                'name'=>"required|max:10|min:2|unique:admins",
                'email'=>"required",
                'password'=>"required",
            ]);

            $data=$request->post();

            $data["password"]=bcrypt($data["password"]);

            if($admin->update($data)){

                return redirect()->route("admin.admin.index")->with("success","编辑成功");

            }else{

                return redirect()->route("admin.admin.edit")->with("danger","编辑失败");

            }

        }

        return view("admin.admin.edit",compact("admin"));

    }

    public function del($id)
    {
        $admin=Admin::find($id);
//        dd($admin);
        if($admin->delete()){

            return redirect()->route("admin.admin.index")->with("success","删除成功");

        }

    }


    public function xg(Request $request)
    {
        $id=Auth::id();
//        dd($id);
        $admins=Admin::find($id);

        if($request->isMethod("post")){
            $this->validate($request, [
                'old_password'=>'required',
                'password'=>'required|confirmed'
            ],[
                'old_password.required'=>"旧密码不能为空",
            ]);

            $admin=Auth::guard('admin')->user();

            $oldPassword=$request->post("old_password");

            if(Hash::check($oldPassword,$admin->password)){

                $admin->password=Hash::make($request->post("password"));

                $admin->save();

                return redirect()->route("admin.admin.index")->with("success","重置成功");
            }

            return back()->with("danger","旧密码不正确");

        }

        return view("admin.admin.xg",compact("admins"));

    }







    
    
}
