<?php $__env->startSection("title","菜品分类添加"); ?>
<?php $__env->startSection("content"); ?>
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <?php echo e(csrf_field()); ?>

            <label for="inputEmail3" class="col-sm-2 control-label">分类名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="" name="name" value="<?php echo e(old("name")); ?>">
            </div>
        </div>
        <div class="form-group">
            <?php echo e(csrf_field()); ?>

            <label for="inputEmail3" class="col-sm-2 control-label">分类编号</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="type_id" placeholder="" name="type_id" value="<?php echo e(old("type_id")); ?>">
            </div>
        </div>
        <div class="form-group">
            <?php echo e(csrf_field()); ?>

            <label for="inputEmail3" class="col-sm-2 control-label">描述</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="description" placeholder="" name="description" value="<?php echo e(old("description")); ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否是默认分类</label>
            <div class="col-sm-10">
                <input type="radio" class="" id="is_selected" placeholder="" name="is_selected" value="1">是
                <input type="radio" class="" id="is_selected" placeholder="" name="is_selected" value="0" checked>不是
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("shop.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>