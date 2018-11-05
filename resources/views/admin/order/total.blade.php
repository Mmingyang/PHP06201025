@extends("admin.layouts.main")
@section("title","订单量总量统计")
@section("content")

    <table class="table">
        <tr>
            <th>总数量</th>
        </tr>
        @foreach($data as $datum)
        <tr>
            <td>{{$datum->nums}}</td>
        </tr>
        @endforeach
    </table>

@endsection

