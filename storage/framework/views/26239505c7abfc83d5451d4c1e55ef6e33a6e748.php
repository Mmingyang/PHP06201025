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
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">菜品分类列表<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo e(route("shop.menuCategory.index")); ?>">菜品分类列表</a></li>
                        <li><a href="<?php echo e(route("shop.menuCategory.add")); ?>">菜品分类添加</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">其它</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">菜品列表<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo e(route("shop.menu.index")); ?>">菜品列表</a></li>
                        <li><a href="<?php echo e(route("shop.menu.add")); ?>">菜品添加</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">其它</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">活动列表<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo e(route("shop.event.index")); ?>">活动列表</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">其它</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">订单列表<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo e(route("shop.order.index")); ?>">订单列表</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">其它</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">订单量统计<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo e(route("shop.order.day")); ?>">日</a></li>
                        <li><a href="<?php echo e(route("shop.order.month")); ?>">月</a></li>
                        <li><a href="<?php echo e(route("shop.order.total")); ?>">总计</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">其它</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">菜品销量统计<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo e(route("shop.order.cday")); ?>">日</a></li>
                        <li><a href="<?php echo e(route("shop.order.cmonth")); ?>">月</a></li>
                        <li><a href="<?php echo e(route("shop.order.ctotal")); ?>">总计</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">其它</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">抽奖活动<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo e(route("shop.activity.index")); ?>">抽奖活动列表</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">其它</a></li>
                    </ul>
                </li>


            </ul>
            <ul class="nav navbar-nav navbar-right">

                <?php if(auth()->guard("web")->check()): ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(route("shop.user.xg")); ?>">修改个人密码</a></li>
                            

                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo e(route("shop.user.logout")); ?>">退出</a></li>
                        </ul>
                    </li>

                <?php endif; ?>



                <?php if(auth()->guard("web")->guest()): ?>

                        <li id="login-li"><a href="<?php echo e(route("shop.user.login")); ?>">登录</a></li>
                        <li id="login-li"><a href="<?php echo e(route("shop.user.zc")); ?>">注册</a></li>

                <?php endif; ?>


            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>