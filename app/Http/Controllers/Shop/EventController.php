<?php

namespace App\Http\Controllers\Shop;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends BaseController
{
    //
    public function index()
    {

//        $events=Event::paginate(1);

        $events=Event::where("end_time",">=",date('Y-m-d H:i:s', time()))->get();


        return view("shop/event/index",compact("events"));
    }

    public function ck(Request $request,$id)
    {
        $data=Event::find($id);

        $data->start_time=str_replace(" ","T",$data->start_time);
        $data->end_time=str_replace(" ","T",$data->end_time);

        return view("shop.event.ck",compact("data"));

    }




}
