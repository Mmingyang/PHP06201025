@extends("shop.layouts.main")
@section("title","菜品分类列表")
@section("content")

    <a href="{{route("shop.menuCategory.add")}}" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>分类名称</th>
            <th>分类编号</th>
            <th>所属商家ID</th>
            <th>描述</th>
            <th>是否为默认分类</th>
            <th>操作</th>
        </tr>
        @foreach($menus as $menu)
        <tr>
            <td>{{$menu->id}}</td>
            <td>{{$menu->name}}</td>
            <td>{{$menu->type_id}}</td>
            <td>{{$menu->shop_id}}</td>
            <td>{{$menu->description}}</td>
            <td><?php if($menu->is_selected==1) echo "是"; else echo "不是";?></td>
            <td>
                <a href="edit/{{$menu->id}}" class="btn btn-info">编辑</a>
                <a href="del/{{$menu->id}}" class="btn btn-info">删除</a>
            </td>
        </tr>
        @endforeach

    </table>


@endsection

