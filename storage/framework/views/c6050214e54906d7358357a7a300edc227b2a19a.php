<?php $__env->startSection("title","商铺分类编辑"); ?>
<?php $__env->startSection("content"); ?>
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <?php echo e(csrf_field()); ?>

            <label for="inputEmail3" class="col-sm-2 control-label">分类名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="" name="name" value="<?php echo e($spcates->name); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">分类图片</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="img">
                <img src="/<?php echo e($spcates->img); ?>" alt="" width="50">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否上线</label>
            <div class="col-sm-10">
                <input type="radio" class="" id="status" placeholder="" name="status" value="1" <?php if($spcates["status"]==1) echo "checked"?>>上线
                <input type="radio" class="" id="status" placeholder="" name="status" value="0" <?php if($spcates["status"]==0) echo "checked"?>>不上线
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">分类排名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="sort" placeholder="" name="sort" value="<?php echo e($spcates->sort); ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">编辑</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("shop.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>