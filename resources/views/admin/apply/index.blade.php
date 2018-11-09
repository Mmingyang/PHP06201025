@extends("admin.layouts.main")
@section("title","抽奖报名列表")
@section("content")

    <table class="table">
        <tr>
            <th>ID</th>
            <th>活动ID</th>
            <th>报名用户ID</th>
            <th>报名时间</th>
        </tr>
        @foreach($applys as $event)
        <tr>
            <td>{{$event->id}}</td>
            <td>{{$event->activity_id}}</td>
            <td>{{$event->user_id}}</td>
            <td>{{$event->created_at}}</td>
        </tr>
        @endforeach

    </table>


@endsection

