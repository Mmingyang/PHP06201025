<?php $__env->startSection("title","角色编辑"); ?>
<?php $__env->startSection("content"); ?>

    <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>

    <form class="form-horizontal" method="post">
        <div class="form-group">
            <?php echo e(csrf_field()); ?>

            <label for="inputEmail3" class="col-sm-2 control-label">角色名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="" name="name" value="<?php echo e($role->name); ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">角色权限</label>
            <div class="col-sm-10">
                <?php $__currentLoopData = $pers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $per): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="checkbox" name="per[]" value="<?php echo e($per->id); ?>"
                            <?php if($role->hasPermissionTo($per->name)): ?>
                           checked
                            <?php endif; ?>
                    ><?php echo e($per->name); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">编辑</button>
            </div>
        </div>
    </form>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("admin.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>