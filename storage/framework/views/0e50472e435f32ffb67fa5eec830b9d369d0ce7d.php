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
                <?php $__currentLoopData = \App\Models\Nav::where("pid",0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k1=>$v1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"><?php echo e($v1->name); ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <?php $__currentLoopData = \App\Models\Nav::where("pid",$v1->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k2=>$v2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route($v2->url)); ?>"><?php echo e($v2->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                
                
                    
                    
                        
                        
                        
                        

                    
                
                
                
                    
                    
                        
                        
                        
                        
                    
                
                
                
                    
                    
                        
                        
                        
                    
                
                
                
                    
                    
                        
                        
                        
                        
                    
                
                
                
                    
                    
                        
                        
                        
                    
                
                
                
                    
                    
                        
                        
                        
                        
                        
                    
                
                
                
                    
                    
                        
                        
                        
                        
                        
                    
                
                
                
                    
                    
                        
                        
                        
                        
                    
                


            </ul>
            <ul class="nav navbar-nav navbar-right">

                <?php if(auth()->guard("admin")->check()): ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo e(\Illuminate\Support\Facades\Auth::guard("admin")->user()->name); ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            
                            <li><a href="<?php echo e(route("admin.nav.index")); ?>">导航菜单管理</a></li>
                            <li><a href="<?php echo e(route("admin.admin.xg")); ?>">修改个人密码</a></li>

                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo e(route("admin.admin.logout")); ?>">退出</a></li>
                        </ul>
                    </li>

                <?php endif; ?>


                <?php if(auth()->guard("admin")->guest()): ?>

                        <li id="login-li"><a href="<?php echo e(route("admin.admin.login")); ?>">登录</a></li>

                <?php endif; ?>


            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>