<?php

namespace App\Http\Controllers\Shop;

use App\Models\Activity;
use App\Models\Event_prizes;
use App\Models\Event_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ActivityController extends BaseController
{
    //抽奖活动列表
    public function index()
    {
        $events = Activity::all();
        return view("shop.activity.index", compact('events'));
    }

    //报名抽奖活动
    public function sign($id){
        $event=Activity::find($id);
//        dd ($event);
        //得到限制人数
        $nums=Activity::where("id",$id)->pluck("num")->toArray();
//        dd($nums);
        //得到当前报名人数
        $num=Event_user::where("activity_id",$event->id)->count();
        //判断限制人数是否多于报名人数
        if($nums<$num){

            return back()->with("danger","已经超过限制人数");
        }
        //得到一条数据
        $user=Event_user::where("activity_id",$id)->where('user_id',Auth::id())->first();
//        dd($user);

        //得到当前用户ID
        $data=[
            'user_id'=>Auth::user()->id,
            'activity_id'=>$id,
        ];

//        dd($data['user_id']);
        if($user){
            return back()->with("warning","你已报名");
        }
        Event_user::create($data);
        return back()->with("success","报名成功 等待开奖");

    }





}
