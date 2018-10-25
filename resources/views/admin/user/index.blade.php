@extends("admin.layouts.main")
@section("title","商家列表")
@section("content")

    <a href="{{route("admin.user.add")}}" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>商家名称</th>
            <th>商家邮箱</th>
            <th>商家密码</th>
            <th>操作</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->password}}</td>
            <td>
                <a href="edit/{{$user->id}}" class="btn btn-info">编辑</a>
                <a href="del/{{$user->id}}" class="btn btn-info">删除</a>
            </td>
        </tr>
        @endforeach

    </table>


@endsection

