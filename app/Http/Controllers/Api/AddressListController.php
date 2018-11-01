<?php

namespace App\Http\Controllers\Api;

use App\Models\AddressList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AddressListController extends Controller
{
    //
    public function index(Request $request)
    {
        //得到用户ID
        $memberId=$request->input("user_id");

        $address=AddressList::where("user_id",$memberId)->get();
//        dd($address);
        return $address;

    }

    //添加地址
    public function add(Request $request)
    {
        //验证不能为空
        $validate=Validator::make($request->all(),[
            'name'=>"required",
            'tel' => [
                'required',
                'regex:/^0?(13|14|15|17|18|19)[0-9]{9}$/',
            ],
            'provence'=>'required',
            'city'=>'required',
            'area'=>'required',
            'detail_address'=>'required',

        ]);
        //判断验证
        if($validate->fails()){

            return[
                'status' => "false",
                //获取错误信息
                "message" => $validate->errors()->first()
            ];
        }
        //得到所有
        $data=$request->all();
        if(AddressList::create($data)){
            $data = [
                'status' => "true",
                'message' => "添加成功",
            ];
        }else{
            $data = [
                'status' => false,
                'message' => "添加失败",
            ];
        }
//        dd($data);
        return $data;
    }


    //修改地址
    public function edit(Request $request)
    {
        if($_POST){
            $data=$request->post();

            $addressEdit=AddressList::find($data['id']);

            if($addressEdit->update($data)){
                $data = [
                    'status' => "true",
                    'message' => "编辑成功",
                ];

            }
//            dd($data);
            return $data;

        }else{
            //回显
            //找到ID
            $id=$request->post("id");
//            dd($id);
            //通过ID找到指定一条数据
            $address=AddressList::find($id);

            return $address;

        }

    }







}
