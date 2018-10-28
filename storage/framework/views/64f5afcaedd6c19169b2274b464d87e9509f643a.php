<?php $__env->startSection("title","编辑菜品"); ?>

<?php $__env->startSection("content"); ?>
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">菜品名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="" name="goods_name" value="<?php echo e($menu->goods_name); ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">菜品图片</label>
            <div class="col-sm-10">
                <input type="file" name="goods_img" class="form-control">
                <img src="/<?php echo e($menu->goods_img); ?>" alt="" width="50">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">所属分类ID</label>
            <div class="col-sm-10">
                <select name="menu_cate_id" class="form-control">
                    <option value="">--选择分类--</option>
                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($mys->id); ?>" <?php if($mys->id==$menu->menu_cate_id): ?> selected <?php endif; ?> ><?php echo e($mys->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">价格</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="" name="goods_money" value="<?php echo e($menu->goods_money); ?>">
            </div>
        </div>


        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">描述</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="" name="description" value="<?php echo e($menu->description); ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">菜品状态</label>
            <div class="col-sm-10">
                <input type="radio" class="" placeholder="" name="status" value="1" <?php if($menu->status==1) echo "checked"?>>上架
                <input type="radio" class="" placeholder="" name="status" value="0" <?php if($menu->status==0) echo "checked"?>>下架
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">编辑</button>
            </div>
        </div>
        </div>
    </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("shop.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>