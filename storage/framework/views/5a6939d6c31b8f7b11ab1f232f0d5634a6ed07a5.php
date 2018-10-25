<?php $__env->startSection("title","管理员添加"); ?>
<?php $__env->startSection("content"); ?>
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <?php echo e(csrf_field()); ?>

            <label for="inputEmail3" class="col-sm-2 control-label">管理员名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="" name="name" value="<?php echo e(old("name")); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">管理员邮箱</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="" name="email" value="<?php echo e(old("email")); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">管理员密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="" name="password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("admin.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>