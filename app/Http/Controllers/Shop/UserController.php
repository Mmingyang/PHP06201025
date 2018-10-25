<?php

namespace App\Http\Controllers\Shop;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    //
    public function index()
    {
        $users=User::all();
        return view("shop.user.index",compact("users"));

    }


    public function zc(Request $request)
    {
        if($request->isMethod("post")){
            $this->validate($request,[
                'name'=>"required|max:10|min:2|unique:users",
                'email'=>"required",
                'password'=>"required",
                "captcha"=>"required|captcha"
            ]);

            $data=$request->post();

            $data["password"]=bcrypt($data["password"]);

            if(User::create($data)){

                return redirect()->route("shop.user.index")->with("success","注册成功");

            }

        }

        return view("shop.user.zc");

    }

    public function add(Request $request)
    {
        if($request->isMethod("post"))
        {
            $this->validate($request,[
                'name'=>"required|max:10|min:2|unique:users",
                'email'=>"required",
                'password'=>"required",
            ]);

            $data=$request->post();

            $data["password"]=bcrypt($data["password"]);

            if(User::create($data)){

                return redirect()->route("shop.user.index")->with("success","添加成功");

            }

        }

        return view("shop.user.add");

    }

    public function edit(Request $request,$id)
    {
        $user=User::find($id);

        if($request->isMethod("post")){

            $this->validate($request,[
                'name'=>"required|max:10|min:2|unique:users",
                'email'=>"required",
                'password'=>"required",
            ]);

            $data=$request->post();

            $data["password"]=bcrypt($data["password"]);

            if($user->update($data)){

                return redirect()->route("shop.user.index")->with("success","编辑成功");

            }

        }

        return view("shop.user.edit",compact("user"));

    }


    public function del($id)
    {
        $user=User::find($id);

        if($user->delete()){

            return redirect()->route("shop.user.index")->with("success","删除成功");

        }

    }


    public function login(Request $request)
    {
        if ($request->isMethod("post")) {
            //验证
            $data = $this->validate($request, [
                "name" => "required",
                "password" => "required",
            ]);

            //验证账号密码是否正确
            if (Auth::attempt($data, $request->has("remember"))) {


                return redirect()->route("shop.shop.index")->with("success", "登录成功");

            }else{

                return redirect()->back()->withInput()->with("danger","账号密码错误");

            }

        }

        return view("shop.user.login");
    }


    public function logout()
    {

        Auth::logout();

        return redirect()->route("shop.user.index")->with("success","退出登录成功");

    }


    public function xg(Request $request)
    {
        $id=Auth::id();
//        dd($id);
        $user=User::find($id);

        if($request->isMethod("post")){

            $data=$this->validate($request,[
                'password'=>"required",
            ]);
            $data["password"]=bcrypt($data["password"]);
            if($user->update($data)){

                return redirect()->route("shop.user.index")->with("success","编辑成功");

            }

        }

        return view("shop.user.xg",compact("user"));

    }

}
