<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends BaseController
{
    //会员管理
    //会员列表
    public function index(Request $request)
    {
        $url = $request->query();
        $keyword=$request->get("keyword");
        $query=Member::orderBy("id");
        if ($keyword!==null){
            $query->where("username","like","%{$keyword}%");
        }
        $goods=$query->paginate(10);
        return view("admin.member.index",compact("url","goods"));

    }

    //查看
    public function check($id)
    {

        $member=Member::find($id);


        return view("admin.member.check",compact("member"));
    }


    //禁用
    public function off($id)
    {
        $data=Member::find($id);

        $data->status=0;
        $data->save();

        return redirect()->route("admin.member.index")->with("success","禁用成功");
    }



}
