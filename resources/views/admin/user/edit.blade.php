@extends("admin.layouts.main")

@section("title","商家编辑")
@section("content")
    <form class="form-horizontal" method="post">
        <div class="form-group">
            {{csrf_field()}}
            <label for="inputEmail3" class="col-sm-2 control-label">商家名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="" name="name" value="{{$user->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">商家邮箱</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="" name="email" value="{{$user->email}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">商家密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="" name="password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">编辑</button>
            </div>
        </div>
    </form>
@endsection

