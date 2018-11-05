@extends("admin.layouts.main")
@section("title","会员查看列表")
@section("content")

    <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>会员名称</th>
            <th>会员电话</th>
            <th>会员余额</th>
            <th>会员积分</th>
            <th>会员状态</th>
            <th>会员创建时间</th>
        </tr>
        <tr>
            <td>{{$member->id}}</td>
            <td>{{$member->username}}</td>
            <td>{{$member->tel}}</td>
            <td>{{$member->money}}</td>
            <td>{{$member->jifen}}</td>
            <td>
                @if($member->status==1)
                    会员
                @else
                    非会员
                @endif

            </td>
            <td>{{$member->created_at}}</td>
        </tr>


    </table>


@endsection

