<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use App\Models\Event_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplyController extends BaseController
{
    //
    public function index()
    {
        $applys=Event_user::all();

        return view("admin.apply.index",compact("applys"));
    }


}
