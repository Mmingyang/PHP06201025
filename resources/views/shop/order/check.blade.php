@extends("shop.layouts.main")
@section("title","订单详情")
@section("content")

    <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>订单编号</th>
            <th>省份</th>
            <th>市</th>
            <th>区县</th>
            <th>详细地址</th>
            <th>收货人电话</th>
            <th>收货人姓名</th>
            <th>下单时间</th>
            <th>状态</th>
        </tr>
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->order_code}}</td>
            <td>{{$order->province}}</td>
            <td>{{$order->city}}</td>
            <td>{{$order->area}}</td>
            <td>{{$order->detail_address}}</td>
            <td>{{$order->tel}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->created_at}}</td>
            <td>
                @if($order->status==-1)
                    已取消
                @elseif($order->status==0)
                    待付款
                @elseif($order->status==1)
                    待发货
                @else
                    已完成
                @endif
            </td>
        </tr>

    </table>

@endsection

