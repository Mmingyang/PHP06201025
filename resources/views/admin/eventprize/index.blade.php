@extends("admin.layouts.main")
@section("title","抽奖活动奖品列表")
@section("content")

    <a href="{{route("admin.eventprize.add")}}" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>活动ID</th>
            <th>奖品名称</th>
            <th>奖品详情</th>
            <th>中奖商户ID</th>
            <th>操作</th>
        </tr>
        @foreach($events as $event)
        <tr>
            <td>{{$event->id}}</td>
            <td>{{$event->activity_id}}</td>
            <td>{{$event->name}}</td>
            <td>{!! $event->description !!}</td>
            <td>{{$event->user_id}}</td>
            <td>
                <a href="edit/{{$event->id}}" class="btn btn-info">编辑</a>
                <a href="del/{{$event->id}}" class="btn btn-info">删除</a>
            </td>
        </tr>
        @endforeach

    </table>


@endsection

