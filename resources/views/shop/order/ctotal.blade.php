@extends("shop.layouts.main")
@section("title","订单量总量统计")
@section("content")

    <table class="table">
        <tr>
            <th>总数量</th>
            <th>总金额</th>
        </tr>
        @foreach($data as $datum)
        <tr>
            <td>{{$datum->nums}}</td>
            <td>{{$datum->money}}</td>
        </tr>
        @endforeach
    </table>

@endsection

