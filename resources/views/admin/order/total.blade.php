@extends("admin.layouts.main")
@section("title","订单量总量统计")
@section("content")

    <table class="table">
        <tr>
            <th>总数量</th>
            <th>总金额</th>
            <th>店铺名</th>
        </tr>
        @foreach($data as $datum)
        <tr>
            <td>{{$datum->nums}}</td>
            <td>{{$datum->money}}</td>
            <td>{{$datum->shop->shop_name}}</td>
        </tr>
        @endforeach
    </table>

@endsection

