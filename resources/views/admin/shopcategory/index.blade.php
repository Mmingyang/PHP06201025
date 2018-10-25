@extends("admin.layouts.main")
@section("title","商铺分类列表")
@section("content")

    <a href="{{route("admin.shopcategory.add")}}" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>分类名称</th>
            <th>分类图片</th>
            <th>是否上线</th>
            <th>排名</th>
            <th>操作</th>
        </tr>
        @foreach($spcates as $spcate)
        <tr>
            <td>{{$spcate->id}}</td>
            <td>{{$spcate->name}}</td>
            <td><img src="/{{$spcate->img}}" width="50"></td>
            <td><?php if($spcate->status==1){echo "上线"; }else{echo "未上线";}?></td>
            <td>{{$spcate->sort}}</td>
            <td>
                <a href="edit/{{$spcate->id}}" class="btn btn-info">编辑</a>
                <a href="del/{{$spcate->id}}" class="btn btn-info">删除</a>
            </td>
        </tr>
        @endforeach

    </table>


@endsection

