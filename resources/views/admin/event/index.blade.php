@extends("admin.layouts.main")
@section("title","活动列表")
@section("content")

    <a href="{{route("admin.event.add")}}" class="btn btn-info">添加</a>

            <form class="form-inline pull-right" method="get">
                <div class="form-group">
                    <select name="time" class="form-control">
                        <option value="">请选择时间</option>
                        <option value="1">进行中</option>
                        <option value="2">已结束</option>
                        <option value="3">未开始</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="请输入名称" name="keyword" value="{{request()->get("keyword")}}">
                </div>
                <button type="submit" class="btn btn-primary">搜索</button>
            </form>


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
                <a href="edit/{{$event->id}}" class="btn btn-info">编辑</a>
                <a href="del/{{$event->id}}" class="btn btn-info">删除</a>
            </td>
        </tr>
        @endforeach

    </table>

    {{$events->links()}}

@endsection

