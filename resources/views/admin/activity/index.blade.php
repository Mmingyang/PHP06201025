@extends("admin.layouts.main")
@section("title","抽奖活动列表")
@section("content")

    <a href="{{route("admin.activity.add")}}" class="btn btn-info">添加</a>

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
        @foreach($activitys as $event)
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
                <a href="open/{{$event->id}}" class="btn btn-danger">开奖</a>
                @endif
                <a href="edit/{{$event->id}}" class="btn btn-info">编辑</a>
                <a href="del/{{$event->id}}" class="btn btn-info">删除</a>
            </td>
        </tr>
        @endforeach

    </table>


@endsection

