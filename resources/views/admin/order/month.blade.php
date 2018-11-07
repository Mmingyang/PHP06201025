@extends("admin.layouts.main")
@section("title","订单量月统计")
@section("content")

    <table class="table">
        <tr>
            <th>月份</th>
            <th>订单金额</th>
            <th>店铺名</th>
        </tr>
        @foreach($data as $datum)
        <tr>
            <td>{{$datum->date}}</td>
            <td>{{$datum->nums}}</td>
            <td>{{$datum->shop->shop_name}}</td>
        </tr>
        @endforeach
    </table>

@endsection

