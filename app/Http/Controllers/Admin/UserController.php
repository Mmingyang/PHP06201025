<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends BaseController
{
    //
    public function index()
    {
        $users=User::all();
        return view("admin.user.index",compact("users"));

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

                return redirect()->route("admin.user.index")->with("success","添加成功");

            }

        }

        return view("admin.user.add");

    }

    public function edit(Request $request,$id)
    {
        $user=User::find($id);


        if($request->isMethod("post")){

            $this->validate($request,[
                'name'=>"required|max:10|min:2",
                'email'=>"required",
                'password'=>"required",
            ]);

            $data=$request->post();

            $data["password"]=bcrypt($data["password"]);

            if($user->update($data)){

                return redirect()->route("admin.user.index")->with("success","编辑成功");

            }

        }

        return view("admin.user.edit",compact("user"));

    }


    public function del($id)
    {
        DB::transaction(function () use ($id){

//            DB::table('users')->where('id','=',$id)->delete();
//            DB::table('shops')->where('user_id','=',$id)->delete();

            User::findOrFail($id)->delete();

            Shop::where(["user_id",$id])->delete();
        });

        return redirect()->route("admin.user.index")->with("success","删除成功");
    }



}
