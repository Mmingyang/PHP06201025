@extends("admin.layouts.main")
@section("title","商铺列表")
@section("content")
    <style type="text/css">
        .lll {
            color: red;
        }

        .xxx {
            color: greenyellow;
        }
    </style>
    <div class="row">
        <div class="col-md-4">
        </div>
    </div>
    <table class="table">
        <tr>
            <th>id</th>
            <th>店铺分类ID</th>
            <th>名称</th>
            <th>店铺图片</th>
            <th>评分</th>
            <th>是否是品牌</th>
            <th>准时送达</th>
            <th>蜂鸟配送</th>
            <th>保标记</th>
            <th>票标记</th>
            <th>准标记</th>
            <th>起送金额</th>
            <th>配送费</th>
            <th>店公告</th>
            <th>优惠信息</th>
            <th>状态</th>
            <th>用户</th>
            <th>操作</th>
        </tr>
        @foreach($datas as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->category->name}}</td>
                <td>{{$data->shop_name}}</td>
                <td><img src="/{{$data->shop_img}}" width="30" height="30"></td>
                <td>{{$data->shop_score}}</td>
                <td >
                    <a <?php echo($data->is_brand == 1 ? "class='glyphicon glyphicon-ok xxx'" : "class='glyphicon glyphicon-remove lll'")?>></a>
                </td>
                <td >
                    <a <?php echo($data->is_time == 1 ? "class='glyphicon glyphicon-ok xxx'" : "class='glyphicon glyphicon-remove lll'")?>></a>
                </td>
                <td><a <?php echo($data->is_feng == 1 ? "class='glyphicon glyphicon-ok xxx'" : "class='glyphicon glyphicon-remove lll'")?>></a></td>
                <td >
                    <a <?php echo($data->is_bao == 1 ? "class='glyphicon glyphicon-ok xxx'" : "class='glyphicon glyphicon-remove lll'")?>></a>
                </td>
                <td>
                    <a <?php echo($data->is_piao == 1 ? "class='glyphicon glyphicon-ok xxx'" : "class='glyphicon glyphicon-remove lll'")?>></a>
                </td>
                <td >
                    <a <?php echo($data->is_zhun == 1 ? "class='glyphicon glyphicon-ok xxx'" : "class='glyphicon glyphicon-remove lll'")?>></a>
                </td>
                <td>{{$data->qi_money}}</td>
                <td>{{$data->pei_money}}</td>
                <td>{{$data->notice}}</td>
                <td>{{$data->discount}}</td>
                <td>@if($data->state==1)
                        已审核
                    @else($data->state==2)
                        未审核
                    @endif</td>
                <td>{{$data->user->name}}</td>
                <td>
                    @if($data->state!=1)
                        <a href="shen/{{$data->id}}" class="btn btn-info">审核</a>
                        @else
                        &ensp;&ensp;&ensp; &ensp;&ensp;&ensp;&ensp;
                    @endif
                    <a href="edit/{{$data->id}}" class="btn btn-info">编辑</a>
                    <a href="del/{{$data->id}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
