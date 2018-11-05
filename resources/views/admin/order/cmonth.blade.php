@extends("admin.layouts.main")
@section("title","菜品月统计")
@section("content")

    <table class="table">
        <tr>
            <th>月份</th>
            <th>数量</th>
            <th>总计金额</th>
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

