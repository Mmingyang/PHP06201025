<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        DB::transaction(function () use ($id){

            User::findOrFail($id)->delete();

            Shop::where(["user_id",$id])->delete();
        });

        return back()->with("success","删除成功");
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


                $user=Auth::user();

                $shop=$user->shop;
//                dd($shop);
                if($shop){
                    switch ($shop->state){
                        case 3:
                            Auth::logout();
                            return back()->withInput()->with("danger","商铺已禁用");
                            break;
                        case 2:
                            Auth::logout();
                            return back()->withInput()->with("danger","商铺待审核");
                    }

                }else{

                    return redirect()->route("shop.shop.add")->with("danger","还未申请商铺");
                }


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
        $users=User::find($id);

        if($request->isMethod("post")){
            $this->validate($request, [
                'old_password'=>'required',
                'password'=>'required|confirmed'
            ],[
                'old_password.required'=>"旧密码不能为空",
            ]);

            $user=Auth::guard()->user();
            $oldPassword=$request->post("old_password");

            if(Hash::check($oldPassword,$user->password)){

                $user->password=Hash::make($request->post("password"));

                $user->save();

                return redirect()->route("shop.user.index")->with("success","重置成功");
            }

            return back()->with("danger","旧密码不正确");


        }

        return view("shop.user.xg",compact("users"));

    }

}
