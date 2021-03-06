<?php $__env->startSection("title","商家登录"); ?>
<?php $__env->startSection("content"); ?>

    <form class="form-horizontal" method="post">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">商家姓名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="商家姓名" name="name" value="<?php echo e(old("name")); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> 记住我
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">登录</button>
            </div>
        </div>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("shop.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>