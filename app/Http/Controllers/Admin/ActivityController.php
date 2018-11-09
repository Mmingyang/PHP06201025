<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use App\Models\Event_prizes;
use App\Models\Event_user;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class ActivityController extends BaseController
{
    //显示抽奖活动列表
    public function index()
    {
        $activitys=Activity::all();

        return view("admin.activity.index",compact("activitys"));
    }


    //抽奖活动添加
    public function add(Request $request)
    {
        if($request->isMethod("post")){
            $this->validate($request, [
                "title" => "required|unique:activities",
                "content" => "required",
                "start_time" => "required",
                "end_time" => "required",
                "prize_time" => "required",
                "num" => "required",
            ],[
                'title.required'=>"活动名称不能为空",
                'content.required'=>"活动详情不能为空",
                'start_time.required'=>"报名开始时间不能为空",
                'end_time.required'=>"报名结束时间不能为空",
                'prize_time.required'=>"开奖时间不能为空",
                'num.required'=>"报名人数限制不能为空",
            ]);

            $data=$request->post();

            $data['is_prize']=0;

//            dd($data);
            $activity=Activity::create($data);

//            Redis::set("event_num:".$activity->id,$activity->num);

            return redirect()->route("admin.activity.index")->with("success","添加成功");

        }

        return view("admin.activity.add");
    }


    //抽奖活动编辑
    public function edit(Request $request,$id)
    {

        $activity=Activity::find($id);

        $activity->start_time=str_replace(" ","T",$activity->start_time);
        $activity->end_time=str_replace(" ","T",$activity->end_time);
        $activity->prize_time=str_replace(" ","T",$activity->prize_time);

        if($request->isMethod("post")){
            $da=$this->validate($request, [
                "title" => "required",
                "content" => "required",
                "start_time" => "required",
                "end_time" => "required",
                "prize_time" => "required",
                "num" => "required",
            ],[
                'title.required'=>"活动名称不能为空",
                'content.required'=>"活动详情不能为空",
                'start_time.required'=>"报名开始时间不能为空",
                'end_time.required'=>"报名结束时间不能为空",
                'prize_time.required'=>"开奖时间不能为空",
                'num.required'=>"报名人数限制不能为空",
            ]);

            $da['start_time']=str_replace("T"," ",$da['start_time']);
            $da['end_time']=str_replace("T"," ",$da['end_time']);
            $da['prize_time']=str_replace("T"," ",$da['prize_time']);

            $da['is_prize']=0;

            if($activity->update($da)){

                return redirect()->route("admin.activity.index")->with("success","编辑成功");

            }

        }

        return view("admin.activity.edit",compact("activity"));

    }


    //抽奖活动删除
    public function del($id)
    {
        $activity=Activity::find($id);

        if($activity->delete()){

            return redirect()->route("admin.activity.index")->with("success","删除成功");
        }

    }


    //开始抽奖
    public function open(Request $request,$id)
    {
        //通过当前活动ID把已经报名的用户ID取出来、
        $userIds = Event_user::where('activity_id',$id)->pluck('user_id')->toArray();

        //打乱ID
        shuffle($userIds);

        //找出当前活动的奖品 并随机打乱
        $prizes = Event_prizes::where("activity_id", $id)->get();

        //奖品表
        foreach ($prizes as $k => $prize) {
            $v=array_rand($userIds);

            $user=User::where('id',$userIds[$v])->first();

            $to = $user->email;

            // dd($to);
            $subject = '中奖通知';

            Mail::send(
                'emails.event',
                compact("subject"),
                function ($message) use($to, $subject) {
//                dd($message);
                    $message->to($to)->subject($subject);
                }
            );

            //给用户赋值
            $prize->user_id = $userIds[$v];
            //保存修改状态
            $prize->save();

        }

        //修改活动状态
        $event=Activity::findOrFail($id);
        $event->is_prize=1;
        $event->save();


        return back()->with('success','开奖成功');

    }



}
