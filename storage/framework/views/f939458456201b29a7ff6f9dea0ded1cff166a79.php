<?php $__env->startSection("title","导航菜单添加"); ?>

<?php $__env->startSection("content"); ?>

    <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
            <label class="col-sm-2 control-label">导航菜单名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="" name="name" value="<?php echo e(old("name")); ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">导航菜单路由</label>
            <div class="col-sm-10">
                <select name="url" class="form-control">
                    <option value="">--请选择--</option>
                    <?php $__currentLoopData = $urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($url); ?>"><?php echo e($url); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">上级菜单</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="" name="pid" value="<?php echo e(old("pid")); ?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>

<?php $__env->stopSection(); ?>



<?php echo $__env->make("admin.layouts._footer", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make("admin.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>