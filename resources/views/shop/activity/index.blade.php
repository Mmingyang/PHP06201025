@extends("shop.layouts.main")
@section("title","抽奖活动列表")
@section("content")


    <table class="table">
        <tr>
            <th>ID</th>
            <th>活动名称</th>
            <th>活动详情</th>
            <th>报名开始时间</th>
            <th>报名结束时间</th>
            <th>开奖时间</th>
            <th>报名人数限制</th>
            <th>是否已开奖</th>
            <th>操作</th>
        </tr>
        @foreach($events as $event)
        <tr>
            <td>{{$event->id}}</td>
            <td>{{$event->title}}</td>
            <td>{!! $event->content !!}</td>
            <td>{{$event->start_time}}</td>
            <td>{{$event->end_time}}</td>
            <td>{{$event->prize_time}}</td>
            <td>{{$event->users->count()}}/{{$event->num}}</td>
            <td>
                @if($event->is_prize==1)
                    是
                @else
                    否
                @endif
            </td>
            <td>
                @if($event->is_prize!==1)
                <a href="{{route('shop.activity.sign',["id"=>$event->id])}}" class="btn btn-danger">报名</a>
                @endif
                @if($event->is_prize!==0)
                <a href="check/{{$event->id}}" class="btn btn-info">查看</a>
                @endif
            </td>
        </tr>
        @endforeach

    </table>


@endsection

