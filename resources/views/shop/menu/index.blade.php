@extends("shop.layouts.main")
@section("title","菜品列表")
@section("content")


    <a href="{{route("shop.menu.add")}}" class="btn btn-info">添加</a>


        <form class="form-inline pull-right" method="get">
            <div class="form-group">
                <select name="goods_id" class="form-control">
                    <option value="">请选择分类</option>
                    @foreach($cates as $mcs)
                        <option value="{{$mcs->id}}">{{$mcs->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="最低价" size="5" name="minPrice" value="{{request()->get("minPrice")}}">
            </div>
            -
            <div class="form-group">
                <input type="text" class="form-control" placeholder="最高价" size="5" name="maxPrice" value="{{request()->get("maxPrice")}}">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="请输入名称" name="keyword" value="{{request()->get("keyword")}}">
            </div>

            <button type="submit" class="btn btn-primary">搜索</button>

        </form>


    <table class="table">
        <tr>
            <th>ID</th>
            <th>菜品名称</th>
            <th>菜品图片</th>
            <th>评分</th>
            <th>所属商家ID</th>
            <th>所属分类ID</th>
            <th>价格</th>
            <th>描述</th>
            <th>菜品状态</th>
            <th>操作</th>
        </tr>
        @foreach($goods as $menu)
        <tr>
            <td>{{$menu->id}}</td>
            <td>{{$menu->goods_name}}</td>

            <td>
                @if($menu->goods_img)
                    <img src="{{$menu->goods_img}}?x-oss-process=image/resize,m_fill,w_100,h_80">
                    {{--<img src="{{env("ALIYUN_OSS_URL").$menu->goods_img}}?x-oss-process=image/resize,m_fill,w_80,h_80">--}}
                @endif
            </td>

            <td>{{$menu->rating}}</td>
            <td>{{$menu->shop_id}}</td>
            <td>{{$menu->menu_cate_id}}</td>
            <td>{{$menu->goods_price}}</td>
            <td>{{$menu->description}}</td>
            <td><?php if($menu->status==1) echo "上架"; else echo "下架";?></td>
            <td>
                <a href="edit/{{$menu->id}}" class="btn btn-info">编辑</a>
                <a href="del/{{$menu->id}}" class="btn btn-info">删除</a>
            </td>
        </tr>
        @endforeach

    </table>

    {{$goods->links()}}

@endsection

