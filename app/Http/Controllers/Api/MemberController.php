<?php

namespace App\Http\Controllers\Api;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Mrgoon\AliSms\AliSms;

class MemberController extends Controller
{
    // 用户注册
    public function reg(Request $request)
    {
        $data=$request->post();

        $sms=$data['sms'];
        $sm=Redis::get("tel_".$data['tel']);

        $data['password']=Hash::make($request->password);

        if($sms==$sm){

            Member::create($data);
            $data = [
                'status' => "true",
                'message' => "注册成功 请登录",
            ];
        }else{
            $data = [
                'status' => false,
                'message' => "注册失败",
            ];
        }

        return $data;

    }

    
    //用户短信验证
    public function sms(Request $request)
    {
        //接收参数
        $tel=$request->get("tel");

        //随机验证码
        $code=mt_rand(10000,99999);

        //保存验证码
        Redis::set("tel_".$tel,$code);
        Redis::expire("tel_".$tel,60*5);

        //发送
        $config = [
            'access_key' => env("ALIYUN_ACCESS_ID"),
            'access_secret' => env("ALIYUN_ACCESS_KEY"),
            'sign_name' => '个人学习分享',
        ];

        $sms = new AliSms();
        $response = $sms->sendSms($tel, 'SMS_149417399', ['code'=> $code], $config);

        //返回
        if ($response->Code=="OK"){
            $data = [
                "status" => true,
                "message" => "获取短信验证码成功".$code
            ];
        }else{
            $data = [
                "status" => false,
                "message" =>$response->Message
            ];
        }

//        dd($data);
        return $data;
        
    }


    //用户登录
    public function login()
    {

        //接收数据
        $name=\request()->name;
        $password=\request()->password;

        //判断
        $member=Member::where('username',$name)->first();

        if($member && Hash::check($password,$member->password)){
            $data = [
                'status' => "true",
                'message' => "登录成功",
                'username' => $name,
            ];

        }else{
            $data = [
                'status' => false,
                'message' => "登录失败",
            ];

        }

        return $data;

    }
    
    
    //忘记密码
    public function forget(Request $request)
    {
        //接收参数
        $data=$request->post();
        $sms=$data['sms'];
        $sm=Redis::get("tel_".$data['tel']);
        //密码加密
        $data['password']=Hash::make($request->password);
        //电话号码为接收的电话号码
        $tel=$data['tel'];
//        dd($data['tel']);
        if($sms==$sm){
            //查找条件为电话号码的一条数据
            $member=Member::where('tel',$tel)->first();

            if($member->update($data)){
                $data = [
                    'status' => "true",
                    'message' => "重置成功",
                ];
            }else{
                $data = [
                    'status' => false,
                    'message' => "重置失败",
                ];
            }

        }else{
            $data = [
                'status' => false,
                'message' => "重置失败",
            ];
        }

        return $data;
    }
    
    
    
    

}
