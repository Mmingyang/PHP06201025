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
            <a class="navbar-brand" href="#">前台管理</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">首页 <span class="sr-only">(current)</span></a></li>
                {{--菜品分类列表--}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">菜品分类列表<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route("shop.menucategory.index")}}">菜品分类列表</a></li>
                        <li><a href="{{route("shop.menucategory.add")}}">菜品分类添加</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">其它</a></li>
                    </ul>
                </li>
                {{--菜品列表--}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">菜品列表<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route("shop.menu.index")}}">菜品列表</a></li>
                        <li><a href="{{route("shop.menu.add")}}">菜品添加</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">其它</a></li>
                    </ul>
                </li>


            </ul>
            <ul class="nav navbar-nav navbar-right">

                @auth("web")

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{\Illuminate\Support\Facades\Auth::user()->name}}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route("shop.user.xg")}}">修改个人密码</a></li>
                            {{--<li><a href="#">消费记录</a></li>--}}

                            <li role="separator" class="divider"></li>
                            <li><a href="{{route("shop.user.logout")}}">退出</a></li>
                        </ul>
                    </li>

                @endauth



                @guest("web")

                        <li id="login-li"><a href="{{route("shop.user.login")}}">登录</a></li>
                        <li id="login-li"><a href="{{route("shop.user.zc")}}">注册</a></li>

                @endguest


            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>