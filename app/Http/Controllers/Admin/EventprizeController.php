<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use App\Models\Event_prizes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventprizeController extends BaseController
{
    //抽奖活动奖品列表
    public function index()
    {
        $events=Event_prizes::all();

        return view("admin.eventprize.index",compact("events"));

    }


    //抽奖活动奖品添加
    public function add(Request $request)
    {
        if($request->isMethod("post")){
            $this->validate($request,[
                'activity_id'=>"required",
                'name'=>'required|unique:event_prizes',
                'description'=>"required",
            ],[
                'activity_id.required'=>"活动ID不能为空",
                'name.required'=>"奖品名称不能为空",
                'description.required'=>"奖品详情不能为空",
            ]);

            $data=$request->post();
            $data["user_id"]=0;

//            dd($data);
            if(Event_prizes::create($data)){

                return redirect()->route("admin.eventprize.index")->with("success","添加成功");

            }

        }

        $events=Activity::where('start_time', '>', time())->get();

        return view("admin.eventprize.add",compact("events"));

    }


    //抽奖活动奖品编辑
    public function edit(Request $request,$id)
    {

        $events=Event_prizes::find($id);

        if($request->isMethod("post")){
            $this->validate($request,[
                'activity_id'=>"required",
                'name'=>'required',
                'description'=>"required",
            ],[
                'activity_id.required'=>"活动ID不能为空",
                'name.required'=>"奖品名称不能为空",
                'description.required'=>"奖品详情不能为空",
            ]);

            $data=$request->post();
            $data["user_id"]=0;

//            dd($data);
            if($events->update($data)){

                return redirect()->route("admin.eventprize.index")->with("success","编辑成功");
            }

        }

        $eventList=Activity::all();

        return view("admin.eventprize.edit",compact("events","eventList"));

    }

    //抽奖活动删除
    public function del($id)
    {
        $events=Event_prizes::find($id);

        if($events->delete()){

         return redirect()->route("admin.eventprize.index")->with("success","删除成功");
        }

    }

}
