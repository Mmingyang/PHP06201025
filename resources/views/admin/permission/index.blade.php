@extends("admin.layouts.main")
@section("title","权限列表")
@section("content")

    <a href="{{route("admin.permission.add")}}" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>权限名称</th>
            <th>权限描述</th>
            <th>操作</th>
        </tr>
        @foreach($permissions as $permission)
        <tr>
            <td>{{$permission->id}}</td>
            <td>{{$permission->name}}</td>
            <td>{{$permission->intro}}</td>
            <td>
                <a href="edit/{{$permission->id}}" class="btn btn-info">编辑</a>
                <a href="del/{{$permission->id}}" class="btn btn-info">删除</a>
            </td>
        </tr>
        @endforeach

    </table>


@endsection

