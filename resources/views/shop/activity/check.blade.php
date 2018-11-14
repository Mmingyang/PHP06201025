@extends("shop.layouts.main")
@section("title","详情")
@section("content")

    <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>

    <table class="table">
        <tr>
            <th>获奖编号</th>
            <th>活动标题</th>
            <th>奖品名称</th>
            <th>奖品详情</th>
            <th>中奖用户</th>
        </tr>
        @foreach($eventPrizes as $eventPrize)
            <tr>
                <td>{{$eventPrize->id}}</td>
                <td>{{$eventPrize->event->title}}</td>
                <td>{{$eventPrize->name}}</td>
                <td>{{$eventPrize->description}}</td>
                <td>{{$eventPrize->users->name}}</td>
            </tr>
        @endforeach

    </table>


@endsection

