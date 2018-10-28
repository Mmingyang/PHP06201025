@extends("shop.layouts.main")
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


        @if($shop[0]->shop_id==0)

            <a href="{{route("shop.shop.add")}}" class="btn btn-info">申请店铺</a>

        @endif

        @if($shop[0]->shop_id!=0)

            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>商铺分类ID</th>
                    <th>商铺名称</th>
                    <th>商铺图片</th>
                    <th>评分</th>
                    <th>是否是品牌</th>
                    <th>是否准时送达</th>
                    <th>是否蜂鸟配送</th>
                    <th>是否保标记</th>
                    <th>是否票标记</th>
                    <th>是否准标记</th>
                    <th>起送金额</th>
                    <th>配送费</th>
                    <th>店公告</th>
                    <th>优惠信息</th>
                    <th>商铺状态</th>
                    <th>店铺负责人</th>
                    <th>操作</th>
                </tr>

                    <tr>
                        <td>{{$shop[0]->id}}</td>
                        <td>{{$shop[0]->shop_cate_id}}</td>
                        <td>{{$shop[0]->shop_name}}</td>
                        <td><img src="/{{$shop[0]->shop_img}}" width="50"></td>
                        <td>{{$shop[0]->shop_score}}</td>
                        <td >
                            <a <?php echo($shop[0]->is_brand == 1 ? "class='glyphicon glyphicon-ok xxx'" : "class='glyphicon glyphicon-remove lll'")?>></a>
                        </td>
                        <td >
                            <a <?php echo($shop[0]->is_time == 1 ? "class='glyphicon glyphicon-ok xxx'" : "class='glyphicon glyphicon-remove lll'")?>></a>
                        </td>
                        <td><a <?php echo($shop[0]->is_feng == 1 ? "class='glyphicon glyphicon-ok xxx'" : "class='glyphicon glyphicon-remove lll'")?>></a></td>
                        <td >
                            <a <?php echo($shop[0]->is_bao == 1 ? "class='glyphicon glyphicon-ok xxx'" : "class='glyphicon glyphicon-remove lll'")?>></a>
                        </td>
                        <td>
                            <a <?php echo($shop[0]->is_piao == 1 ? "class='glyphicon glyphicon-ok xxx'" : "class='glyphicon glyphicon-remove lll'")?>></a>
                        </td>
                        <td >
                            <a <?php echo($shop[0]->is_zhun == 1 ? "class='glyphicon glyphicon-ok xxx'" : "class='glyphicon glyphicon-remove lll'")?>></a>
                        </td>
                        <td>{{$shop[0]->qi_money}}</td>
                        <td>{{$shop[0]->pei_money}}</td>
                        <td>{{$shop[0]->notice}}</td>
                        <td>{{$shop[0]->discount}}</td>
                        <td><?php if($shop[0]->state==1){ echo "已审核";}elseif($shop[0]->state==2){ echo "未审核";}else{ echo "禁用";}?></td>
                        <td>{{$shop[0]->name}}</td>
                        <td>
                            <a href="edit/{{$shop[0]->id}}" class="btn btn-info">编辑</a>
                            <a href="del/{{$shop[0]->id}}" class="btn btn-info">删除</a>
                        </td>
                    </tr>

            </table>


        @endif


@endsection

