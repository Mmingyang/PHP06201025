@extends("admin.layouts.main")
@section("title","管理员列表")
@section("content")

    <a href="{{route("admin.admin.add")}}" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>管理员名称</th>
            <th>管理员邮箱</th>
            <th>管理员密码</th>
            <th>操作</th>
        </tr>
        @foreach($admins as $admin)
        <tr>
            <td>{{$admin->id}}</td>
            <td>{{$admin->name}}</td>
            <td>{{$admin->email}}</td>
            <td>{{$admin->password}}</td>
            <td>
                <a href="edit/{{$admin->id}}" class="btn btn-info">编辑</a>
                <a href="del/{{$admin->id}}" class="btn btn-info">删除</a>
            </td>
        </tr>
        @endforeach

    </table>


@endsection

