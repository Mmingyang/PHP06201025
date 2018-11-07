@extends("admin.layouts.main")
@section("title","导航菜单管理列表")
@section("content")

    <a href="{{route("admin.nav.add")}}" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>导航菜单名称</th>
            <th>导航菜单路由</th>
            <th>排序</th>
            <th>父ID</th>
            <th>操作</th>
        </tr>
        @foreach($navs as $nav)
        <tr>
            <td>{{$nav->id}}</td>
            <td>{{$nav->name}}</td>
            <td>{{$nav->url}}</td>
            <td>{{$nav->sort}}</td>
            <td>{{$nav->pid}}</td>
            <td>
                <a href="del/{{$nav->id}}" class="btn btn-info">删除</a>
            </td>
        </tr>
        @endforeach

    </table>

    {{$navs->links()}}

@endsection

