@extends("shop.layouts.main")
@section("title","活动列表")
@section("content")

    <table class="table">
        <tr>
            <th>ID</th>
            <th>活动名称</th>
            <th>活动详情</th>
            <th>活动开始时间</th>
            <th>活动结束时间</th>
            <th>操作</th>
        </tr>
        @foreach($events as $event)
        <tr>
            <td>{{$event->id}}</td>
            <td>{{$event->title}}</td>
            <td>{!! $event->content !!}</td>
            <td>{{$event->start_time}}</td>
            <td>{{$event->end_time}}</td>
            <td>
                <a href="ck/{{$event->id}}" class="btn btn-info">查看</a>
            </td>
        </tr>
        @endforeach

    </table>


@endsection

