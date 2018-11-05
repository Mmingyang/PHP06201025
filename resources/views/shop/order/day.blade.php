@extends("shop.layouts.main")
@section("title","订单量日统计")
@section("content")

    <table class="table">
        <tr>
            <th>日期</th>
            <th>订单数量</th>
            <th>订单金额</th>
        </tr>
        @foreach($data as $datum)
        <tr>
            <td>{{$datum->date}}</td>
            <td>{{$datum->nums}}</td>
            <td>{{$datum->money}}</td>

        </tr>
        @endforeach
    </table>

@endsection

