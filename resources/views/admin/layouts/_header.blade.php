<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">后台管理</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#}">首页 <span class="sr-only">(current)</span></a></li>
                {{--商家分类--}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">商家分类列表<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route("admin.shopcategory.index")}}">商家分类列表</a></li>
                        <li><a href="{{route("admin.shopcategory.add")}}">商家分类添加</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">其它</a></li>

                    </ul>
                </li>
                {{--商家--}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">商家列表<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route("admin.user.index")}}">商家分类列表</a></li>
                        <li><a href="{{route("admin.user.add")}}">商家分类添加</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">其它</a></li>
                    </ul>
                </li>
                {{--商铺--}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">商铺列表<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route("admin.shop.index")}}">商铺列表</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">其它</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                @auth("admin")

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{\Illuminate\Support\Facades\Auth::guard("admin")->user()->name}}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            {{--<li><a href="#">我的信息</a></li>--}}
                            <li><a href="#">修改个人密码</a></li>

                            <li role="separator" class="divider"></li>
                            <li><a href="{{route("admin.admin.logout")}}">退出</a></li>
                        </ul>
                    </li>

                @endauth


                @guest("admin")

                        <li id="login-li"><a href="{{route("admin.admin.login")}}">登录</a></li>

                @endguest


            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>