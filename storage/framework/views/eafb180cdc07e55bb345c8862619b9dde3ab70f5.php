<?php $__env->startSection("title","店铺编辑"); ?>

<?php $__env->startSection("content"); ?>
    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">分类</label>
            <div class="col-sm-10">
                <select name="shop_category_id" class="form-control">
                    <option >--选择分类--</option>
                    <?php $__currentLoopData = $fl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option <?php if($data->shop_cate_id==$fls->id): ?>selected <?php endif; ?> value="<?php echo e($fls->id); ?>"><?php echo e($fls->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="名称" name="shop_name" value="<?php echo e($data->shop_name); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">店铺图片
            </label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name="shop_img">
                <img src="/<?php echo e($data->shop_img); ?>" width="100px">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">起送金额
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="起送金额" name="qi_money" value="<?php echo e($data->qi_money); ?>" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">配送费
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="配送费" name="pei_money" value="<?php echo e($data->pei_money); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">店公告
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="店公告" name="notice" value="<?php echo e($data->notice); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">优惠信息
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="优惠信息" name="discount" value="<?php echo e($data->discount); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">
            </label>
            <div class="col-sm-10">
                <input type="checkbox" <?php if($data->is_brand==1): ?>checked <?php endif; ?>  name="is_brand" >品牌连锁店&nbsp;
                <input type="checkbox" <?php if($data->is_time==1): ?>checked <?php endif; ?> name="is_time"  >准时送达&nbsp;
                <input type="checkbox" <?php if($data->is_feng==1): ?>checked <?php endif; ?> name="is_feng"  >蜂鸟配送&nbsp;
                <input type="checkbox" <?php if($data->is_bao==1): ?>checked <?php endif; ?> name="is_bao"   >保&nbsp;
                <input type="checkbox" <?php if($data->is_piao==1): ?>checked <?php endif; ?> name="is_piao"  >票&nbsp;
                <input type="checkbox" <?php if($data->is_zhun==1): ?>checked <?php endif; ?> name="is_zhun"  >准
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

<?php echo $__env->make("admin.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>