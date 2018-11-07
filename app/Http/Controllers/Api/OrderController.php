<?php

namespace App\Http\Controllers\Api;

use App\Models\AddressList;
use App\Models\Cart;
use App\Models\Member;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Mrgoon\AliSms\AliSms;

class OrderController extends Controller
{
    //添加订单
    public function add(Request $request)
    {
        //查收货地址
        $address=AddressList::where('id',$request->post('address_id'))->first();
        //dd($address);
        //判断是否属实
        if($address===null){
            return[
                'status'=> false,
                'message'=>"地址选择错误",
            ];
        }

        //接收数据
        //得到用户id
        $data['user_id']=$request->post("user_id");
        //得到商家id
        $carts=Cart::where("user_id",$request->post("user_id"))->get();
        $shopId=Menu::find($carts[0]->goods_id)->shop_id;
        $data['shop_id']=$shopId;
        //得到订单编号
        $data['order_code']=date("ymdHis").rand(1000,9999);
        //得到地址
        $data['province']=$address->provence;
        $data['city']=$address->city;
        $data['area']=$address->area;
        $data['detail_address']=$address->detail_address;
        $data['name']=$address->name;
        $data['tel']=$address->tel;
        //总和
        $total=0;

        foreach ($carts as $k=>$v){
            $good=Menu::where('id',$v->goods_id)->first(["id as goods_id","goods_img","goods_price"]);
            //求商品总和
            $total +=$v->amount * $good->goods_price;

        }

        $data['total']=$total;
        //设置状态
        $data['status']=0;
//        dd($data);
        //事务
        DB::beginTransaction();

        try{
            //创建订单
            $order=Order::create($data);

            foreach ($carts as $kk=>$cart){
                $menu=Menu::find($cart->goods_id);
                OrderDetail::insert([
                    'order_id'=>$order->id,
                    'goods_id'=>$cart->goods_id,
                    'amount'=>$cart->amount,
                    'goods_name'=>$menu->goods_name,
                    'goods_img'=>$menu->goods_img,
                    'goods_price'=>$menu->goods_price,
                ]);
            }
            //找到用户id 删除之前的
            Cart::where("user_id",$request->post('user_id'))->delete();

            //提交事务
            DB::commit();
        }catch (\Exception $exception){
            //事务回滚
            DB::rollBack();
            return[
                'status'=>false,
                'message'=>$exception->getMessage(),
            ];
        }


        return [
            'status'=>"true",
            'message'=>"添加成功",
            'order_id'=>$order->id,
        ];

    }


    //订单列表
    public function index(Request $request)
    {

        $orders=Order::where("user_id",$request->input('user_id'))->get();
//        dd($orders);
        $datas=[];
        foreach ($orders as $order){
            $data['id']=$order->id;
            $data['order_code']=$order->order_code;
            $data['order_birth_time']=(string)$order->created_at;
            $data['order_status']= $order->order_status;
            $data['shop_id']=(string)$order->shop_id;
            $data['shop_name']=$order->shop->shop_name;
            $data['shop_img']=$order->shop->shop_img;
            $data['order_price']=$order->total;
            $data['order_address']=$order->province. $order->city . $order->area . $order->detail_address;

            $data['goods_list']=$order->goods;

            $datas[]=$data;
        }

//        dd($datas);
        //返回数据
        return $datas;
    }


    public function check(Request $request)
    {
        //通过订单id得到一条
        $order=Order::find($request->input('id'));
//        dd($order->order_status);
        //接收参数
        $data['id'] = $order->id;
        $data['order_code'] = $order->order_code;
        $data['order_birth_time'] = (string)$order->created_at;
        $data['order_status'] =$order->order_status;
        $data['shop_id'] = $order->shop_id;
        $data['shop_name'] = $order->shop->shop_name;
        $data['shop_img'] = $order->shop->shop_img;
        $data['order_price'] = $order->total;
        $data['order_address'] = $order->provence . $order->city . $order->area . $order->detail_address;
        $data['goods_list'] = $order->goods;

        //返回数据
        return $data;

    }

    //订单支付
    public function zfb(Request $request)
    {
        //订单id
        $order=Order::find($request->post('id'));

        //用户
        $member=Member::find($order->user_id);

        if($order->total > $member->money){

            return[
                'status'=>'false',
                'message'=>'余额不足',
            ];


        }
        //扣钱
        $member->money=$member->money - $order->total;
        $member->save();

        $order->status=1;
        $order->save();

        //发送邮件
        //通过订单得到店铺名
        $shopId=$order->shop_id;
//        dd($shopId);


        //查当前商铺用户ID
        $user=Shop::where("id",$shopId)->first()->toArray();
//        dd($user);
        //得到用户ID
        $userId=$user['user_id'];
//        dd($userId);
        //通过用户id找邮箱
        $em=User::where("id",$userId)->first()->toArray();
//        dd($em);
        $email=$em['email'];
        //用户名字
        $name =$em['name'];
        $shopName=$name;
        $to=$email;
        $subject=$shopName.'订单通知';
        \Illuminate\Support\Facades\Mail::send(
            'emails.order',
            compact("shopName"),
            function ($message) use($to, $subject) {
                $message->to($to)->subject($subject);
            }
        );

        //得到用户电话
        $tel=$order->tel;

        //发送短信
        $code=$name;
//        dd($code);
        $config = [
            'access_key' => env("ALIYUN_ACCESS_ID"),
            'access_secret' => env("ALIYUN_ACCESS_KEY"),
            'sign_name' => '个人学习分享',
        ];

        $sms=New AliSms();
//        dd($tel);

        $response = $sms->sendSms($tel,"SMS_150572199",['name'=>$code],$config);
//        dd($response);

        return[
            'status'=>'true',
            'message'=>'支付成功',
        ];


    }




}
