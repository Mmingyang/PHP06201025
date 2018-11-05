@extends("shop.layouts.main")
@section("title","订单列表")
@section("content")

    <div class="container-fluid">
        <div class="col-md-12">

            <form class="form-inline pull-right" method="get">

                <div class="form-group">
                    <input type="date" class="form-control" placeholder="开始时间" size="5" name="start_time" value="{{request()->get("start_time")}}">
                </div>
                -
                <div class="form-group">
                    <input type="date" class="form-control" placeholder="结束时间" size="5" name="end_time" value="{{request()->get("end_time")}}">
                </div>

                <button type="submit" class="btn btn-primary">搜索</button>

            </form>

        </div>

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
            <th>操作</th>
        </tr>
        @foreach($data as $datum)
        <tr>
            <td>{{$datum->id}}</td>
            <td>{{$datum->order_code}}</td>
            <td>{{$datum->province}}</td>
            <td>{{$datum->city}}</td>
            <td>{{$datum->area}}</td>
            <td>{{$datum->detail_address}}</td>
            <td>{{$datum->tel}}</td>
            <td>{{$datum->name}}</td>
            <td>{{$datum->created_at}}</td>
            <td>
                @if($datum->status==-1)
                    已取消
                    @elseif($datum->status==0)
                    待付款
                    @elseif($datum->status==1)
                    待发货
                    @else
                    已完成
                    @endif
            </td>
            <td>
                <a href="check/{{$datum->id}}" class="btn btn-info">查看</a>
                @if($datum->status==0)
                    <a href="{{route('shop.order.off',$datum->id)}}" class="btn btn-info">取消订单</a>
                @elseif($datum->status==1)
                    <a href="{{route('shop.order.deliver',$datum->id)}}" class="btn btn-info">发货</a>
                @endif
            </td>
        </tr>
        @endforeach

    </table>

@endsection