<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends BaseController
{
    //
    public function index(Request $request)
    {

        $url = $request->query();
        $time =$request->get("time");
        //有效期内
        $query = Event::orderBy("id");
        //得到当前时间
        $date=date('Y-m-d H:i:s', time());
        //判断时间  1 进行 2 结束 3 未开始
        if( $time == 1 ){
            $query->where("start_time","<=",$date)->where("end_time",">",$date);
        }
        if($time == 2){
            $query->where("end_time","<",$date);
        }
        if($time == 3){
            $query->where("start_time",">",$date);
        }

        $events = $query->paginate(1);
//        dd($date);

        return view("admin.event.index",compact("events","url"));

    }


    public function add(Request $request)
    {

        if($request->isMethod("post")){

            $this->validate($request, [
                "title" => "required|unique:events",
                "content" => "required",
                "start_time" => "required",
                "end_time" => "required",
            ],[
                'title.required'=>"活动名称不能为空",
                'content.required'=>"活动详情不能为空",
                'start_time.required'=>"活动开始时间不能为空",
                'end_time.required'=>"活动结束时间不能为空",
            ]);

            $data=$request->post();

            if(Event::create($data)){

                return redirect()->route("admin.event.index")->with("success","添加活动成功");
            }

        }

        return view("admin.event.add");
    }

    public function edit(Request $request,$id)
    {

        $data=Event::find($id);

        $data->start_time=str_replace(" ","T",$data->start_time);
        $data->end_time=str_replace(" ","T",$data->end_time);

        if($request->isMethod("post")){
            $da=$this->validate($request, [
                "title" => "required",
                "content" => "required",
                "start_time" => "required",
                "end_time" => "required",
            ],[
                'title.required'=>"活动名称不能为空",
                'content.required'=>"活动详情不能为空",
                'start_time.required'=>"活动开始时间不能为空",
                'end_time.required'=>"活动结束时间不能为空",
            ]);

            $da['start_time']=str_replace("T"," ",$da['start_time']);
            $da['end_time']=str_replace("T"," ",$da['end_time']);


            if($data->update($da)){

                return redirect()->route("admin.event.index")->with("success","活动编辑成功");

            }

        }

        return view("admin.event.edit",compact("data"));
    }

    public function del($id)
    {

        $event=Event::find($id);

        if($event->delete()){

            return redirect()->route("admin.event.index")->with("success","删除成功");

        }

    }







}
