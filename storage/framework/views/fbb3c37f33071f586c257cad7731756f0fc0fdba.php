<?php $__env->startSection("title","权限添加"); ?>
<?php $__env->startSection("content"); ?>

    <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>

    <form class="form-horizontal" method="post">
        <div class="form-group">
            <?php echo e(csrf_field()); ?>

            <label for="inputEmail3" class="col-sm-2 control-label">权限名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="" name="name" value="<?php echo e(old("name")); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">权限描述</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="intro" placeholder="" name="intro" value="<?php echo e(old("intro")); ?>">
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