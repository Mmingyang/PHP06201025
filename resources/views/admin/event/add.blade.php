@extends("admin.layouts.main")

@section("title","活动添加")

@section("content")
    <form class="form-horizontal" method="post">
        <div class="form-group">
            {{csrf_field()}}
            <label for="inputEmail3" class="col-sm-2 control-label">活动名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="" name="title" value="{{old("title")}}">
            </div>
        </div>

        <script type="text/javascript">
            var ue = UE.getEditor('container');
            ue.ready(function() {
                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
            });
        </script>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">活动详情</label>
            <div class="col-sm-10">
                <script id="container" name="content" value="{{old("content")}}" type="text/plain"></script>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">活动开始时间</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="name" placeholder="" name="start_time" value="{{old("start_time")}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">活动结束时间</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="name" placeholder="" name="end_time" value="{{old("end_time")}}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>
@endsection
