@extends("shop.layouts.main")
@section("title","添加菜品")

@section("content")
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">菜品名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="" name="goods_name" value="{{old("goods_name")}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">菜品图片</label>
            <div class="col-sm-10">
                <input type="file" name="goods_img" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">所属分类ID</label>
            <div class="col-sm-10">
                <select name="menu_cate_id" class="form-control">
                    <option value="">--选择分类--</option>
                    @foreach($menus as $menu)
                        <option value="{{$menu->id}}">{{$menu->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">价格</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="" name="goods_money" value="{{old("goods_money")}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">描述</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="" name="description" value="{{old("description")}}">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">菜品状态</label>
            <div class="col-sm-10">
                <input type="radio" class="" placeholder="" name="status" value="1" checked>上架
                <input type="radio" class="" placeholder="" name="status" value="0">下架
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
        </div>
    </form>
    </div>
@endsection
