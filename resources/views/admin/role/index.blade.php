@extends("admin.layouts.main")
@section("title","角色列表")
@section("content")

    <a href="{{route("admin.role.add")}}" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>角色名称</th>
            <th>权限名称</th>
            <th>操作</th>
        </tr>
        @foreach($roles as $role)
        <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->name}}</td>
            <td>{{str_replace(['[',']','"'],'', $role->permissions()->pluck('name'))}}</td>
            <td>
                <a href="edit/{{$role->id}}" class="btn btn-info">编辑</a>
            </td>
        </tr>
        @endforeach

    </table>


@endsection

