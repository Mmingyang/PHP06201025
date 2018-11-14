<?php

namespace App\Http\Controllers\Shop;

use App\Models\Activity;
use App\Models\Event_prizes;
use App\Models\Event_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ActivityController extends BaseController
{
    //抽奖活动列表
    public function index()
    {
        $events = Activity::all();
        return view("shop.activity.index", compact('events'));
    }

    //报名抽奖活动
    public function sign(Request $request){
//        $event=Activity::find($id);
//        dd ($event);
//        //得到限制人数
//        $nums=Activity::where("id",$id)->pluck("num")->toArray();
////        dd($nums);
//        //得到当前报名人数
//        $num=Event_user::where("activity_id",$event->id)->count();
//        //判断限制人数是否多于报名人数
//        if($nums<$num){
//
//            return back()->with("danger","已经超过限制人数");
//        }
//        //得到一条数据
//        $user=Event_user::where("activity_id",$id)->where('user_id',Auth::id())->first();
//        dd($user);
//
        //得到当前用户ID
//        $data=[
//            'user_id'=>Auth::user()->id,
//            'activity_id'=>$id,
//        ];

//        dd($data['user_id']);
//        if($user){
//            return back()->with("warning","你已报名");
//        }
//        Event_user::create($data);
//        return back()->with("success","报名成功 等待开奖");

        //redis 并发解决活动报名
        //得到活动id
        $eventId = $request->input('id');
        //得到当前登录商户id
        $user=Event_user::where("activity_id",$eventId)->where('user_id',Auth::id())->first();
        $data=[
            'user_id'=>Auth::user()->id,
            'activity_id'=>$eventId,
        ];
        $userId = $data['user_id'];

//        dd($userId);
        //得到redis里面的限制人数的数据
        $num=Redis::get("event_num:".$eventId);
        //得到当前报名人数
        $users=Redis::scard("event:".$eventId);

//        dd($users);

        if($user){
            return back()->with("warning","你已报名");
        }
        //判断当前报名人数是否小于限制人数 是就报名成功
        if ($users<$num){
            //把当前报名的人的ID 存到 Redis中
            Redis::sadd("event:".$eventId,$userId);

            Event_user::create($data);
            return back()->with("success","报名成功 等待开奖");
        }else{
            return back()->with("danger","报名失败");
        }

    }


    //查看
    public function check($id)
    {
        $eventPrizes=Event_prizes::where("activity_id",$id)->get();
        return view("shop.activity.check",compact("eventPrizes"));

    }





}
