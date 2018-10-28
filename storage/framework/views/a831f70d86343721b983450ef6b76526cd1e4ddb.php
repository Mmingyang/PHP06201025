<?php $__env->startSection("title","编辑店铺"); ?>

<?php $__env->startSection("content"); ?>
    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">分类</label>
            <div class="col-sm-10">
                <select name="shop_cate_id" class="form-control">
                    <option >--选择分类--</option>
                    <?php $__currentLoopData = $fl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($fls->id); ?>" <?php if($fls["id"]===$shop["shop_cate_id"]) echo "selected"?>><?php echo e($fls->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="名称" name="shop_name" value="<?php echo e($shop->shop_name); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">店铺图片
            </label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="shop_img">
                <img src="/<?php echo e($shop->shop_img); ?>" alt="" width="50">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">起送金额
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="起送金额" name="qi_money" value="<?php echo e($shop->qi_money); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">配送费
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="配送费" name="pei_money" value="<?php echo e($shop->pei_money); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">店公告
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="店公告" name="notice" value="<?php echo e($shop->notice); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">优惠信息
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="优惠信息" name="discount"  value="<?php echo e($shop->discount); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">
            </label>
            <div class="col-sm-10">
                <input type="checkbox"  name="is_brand" <?php if($shop->is_brand==1) echo "checked"?> >品牌连锁店&nbsp;
                <input type="checkbox"  name="is_time" <?php if($shop->is_time==1) echo "checked"?> >准时送达&nbsp;
                <input type="checkbox"  name="is_feng" <?php if($shop->is_feng==1) echo "checked"?> >蜂鸟配送&nbsp;
                <input type="checkbox"  name="is_bao" <?php if($shop->is_bao==1) echo "checked"?> >保&nbsp;
                <input type="checkbox"  name="is_piao" <?php if($shop->is_piao==1) echo "checked"?> >票&nbsp;
                <input type="checkbox"  name="is_zhun" <?php if($shop->is_zhun==1) echo "checked"?> >准
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