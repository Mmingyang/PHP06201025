@extends("admin.layouts.main")
@section("title","会员列表")
@section("content")

    <form class="form-inline pull-right" method="get">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="请输入会员名称" name="keyword" value="{{request()->get("keyword")}}">
        </div>

        <button type="submit" class="btn btn-primary">搜索</button>

    </form>


    <table class="table">
        <tr>
            <th>ID</th>
            <th>会员名称</th>
            <th>会员电话</th>
            <th>会员余额</th>
            <th>会员积分</th>
            <th>会员状态</th>
            <th>会员创建时间</th>
            <th>操作</th>
        </tr>
        @foreach($goods as $good)
        <tr>
            <td>{{$good->id}}</td>
            <td>{{$good->username}}</td>
            <td>{{$good->tel}}</td>
            <td>{{$good->money}}</td>
            <td>{{$good->jifen}}</td>
            <td>
                @if($good->status==1)
                    会员
                @else
                    非会员
                @endif

            </td>
            <td>{{$good->created_at}}</td>
            <td>
                <a href="check/{{$good->id}}" class="btn btn-info">查看</a>
                <a href="off/{{$good->id}}" class="btn btn-info">禁用</a>
            </td>
        </tr>
        @endforeach

    </table>


@endsection

