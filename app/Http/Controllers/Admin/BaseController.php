<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class BaseController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth:admin')->except("login");

        $this->middleware(function ($request,\Closure $next){

            //得到当前访问的路由
            $route=Route::currentRouteName();

            //设置白名单
            $allow=[
                "admin.admin.login",
                "admin.admin.logout",
                "admin.admin.index",
            ];

            //判断不等于当前路由和白名单并且保安不是admin并且不是超级管理员admin
            if(!in_array($route,$allow) && !Auth::guard("admin")->user()->can($route) && Auth::guard("admin")->id()!=4){

                exit(view("admin.no"));
            }

            return $next($request);

        });


    }

}
