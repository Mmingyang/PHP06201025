@extends("shop.layouts.main")
@section("title","商铺列表")
@section("content")

        @if($users->shop_id==0)

            <a href="{{route("shop.shop.add")}}" class="btn btn-info">申请店铺</a>

        @endif

        @if($users->shop_id!=0)

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
                {{--@foreach($shops as $shop)--}}
                    <tr>
                        <td>{{$shop->id}}</td>
                        <td>{{$shop->shop_cate_id}}</td>
                        <td>{{$shop->shop_name}}</td>
                        <td><img src="/{{$shop->shop_img}}" width="50"></td>
                        <td>{{$shop->shop_score}}</td>
                        <td><?php if($shop->is_brand==1) echo "是"; else echo "否";?></td>
                        <td><?php if($shop->is_time==1) echo "是"; else echo "否";?></td>
                        <td><?php if($shop->is_feng!==1) echo "否"; else echo "是";?></td>
                        <td><?php if($shop->is_bao!==1) echo "否"; else echo "是";?></td>
                        <td><?php if($shop->is_piao!==1) echo "否"; else echo "是";?></td>
                        <td><?php if($shop->is_zhun!==1) echo "否"; else echo "是";?></td>
                        <td>{{$shop->qi_money}}</td>
                        <td>{{$shop->pei_money}}</td>
                        <td>{{$shop->notice}}</td>
                        <td>{{$shop->discount}}</td>
                        <td><?php if($shop->state==1){ echo "已审核";}elseif($shop->state==2){ echo "未审核";}else{ echo "禁用";}?></td>
                        <td>{{$shop->user_id}}</td>
                        <td>
                            <a href="" class="btn btn-info">审核</a>
                            <a href="edit/{{$shop->id}}" class="btn btn-info">编辑</a>
                            <a href="del/{{$shop->id}}" class="btn btn-info">删除</a>
                        </td>
                    </tr>
                {{--@endforeach--}}
            </table>


        @endif


@endsection

