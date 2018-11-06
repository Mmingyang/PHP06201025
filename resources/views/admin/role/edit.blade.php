@extends("admin.layouts.main")

@section("title","角色编辑")
@section("content")

    <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>

    <form class="form-horizontal" method="post">
        <div class="form-group">
            {{csrf_field()}}
            <label for="inputEmail3" class="col-sm-2 control-label">角色名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="" name="name" value="{{$role->name}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">角色权限</label>
            <div class="col-sm-10">
                @foreach($pers as $per)
                    <input type="checkbox" name="per[]" value="{{$per->id}}"
                            @if($role->hasPermissionTo($per->name))
                           checked
                            @endif
                    >{{$per->name}}
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">编辑</button>
            </div>
        </div>
    </form>


@endsection

