@extends("admin.layouts.main")

@section("title","权限编辑")
@section("content")

    <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>

    <form class="form-horizontal" method="post">
        <div class="form-group">
            {{csrf_field()}}
            <label for="inputEmail3" class="col-sm-2 control-label">权限名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="" name="name" value="{{$permissions->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">权限描述</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="intro" placeholder="" name="intro" value="{{$permissions->intro}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">编辑</button>
            </div>
        </div>
    </form>


@endsection

