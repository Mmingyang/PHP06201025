@extends("admin.layouts.main")
@section("title","导航菜单添加")

@section("content")

    <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="col-sm-2 control-label">导航菜单名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="" name="name" value="{{old("name")}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">导航菜单路由</label>
            <div class="col-sm-10">
                <select name="url" class="form-control">
                    <option value="">--请选择--</option>
                    @foreach($urls as $url)
                        <option value="{{$url}}">{{$url}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">上级菜单</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="" name="pid" value="{{old("pid")}}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>

@endsection

@extends("admin.layouts._footer")
