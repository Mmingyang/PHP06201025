@extends("admin.layouts.main")

@section("title","抽奖活动奖品编辑")

@section("content")

    <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>

    <form class="form-horizontal" method="post">
        <div class="form-group">
            {{csrf_field()}}
            <label for="inputEmail3" class="col-sm-2 control-label">活动ID</label>
            <div class="col-sm-10">
                <select name="activity_id" class="form-control">
                    <option value="">请选择活动</option>
                    @foreach($eventList as $event)
                        <option value="{{$event->id}}" @if($events->activity_id==$event->id) selected @endif >{{$event->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            {{csrf_field()}}
            <label for="inputEmail3" class="col-sm-2 control-label">奖品名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="" name="name" value="{{$events->name}}">
            </div>
        </div>

        <script type="text/javascript">
            var ue = UE.getEditor('container');
            ue.ready(function() {
                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
            });
        </script>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">奖品详情</label>
            <div class="col-sm-10">
                <script id="container" name="description" type="text/plain">{{$events->description}}</script>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">编辑</button>
            </div>
        </div>
    </form>
@endsection

