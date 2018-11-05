<?php $__env->startSection("title","订单列表"); ?>
<?php $__env->startSection("content"); ?>

    <div class="container-fluid">
        <div class="col-md-12">

            <form class="form-inline pull-right" method="get">

                <div class="form-group">
                    <input type="date" class="form-control" placeholder="开始时间" size="5" name="start_time" value="<?php echo e(request()->get("start_time")); ?>">
                </div>
                -
                <div class="form-group">
                    <input type="date" class="form-control" placeholder="结束时间" size="5" name="end_time" value="<?php echo e(request()->get("end_time")); ?>">
                </div>

                <button type="submit" class="btn btn-primary">搜索</button>

            </form>

        </div>

        <table class="table">
        <tr>
            <th>ID</th>
            <th>订单编号</th>
            <th>省份</th>
            <th>市</th>
            <th>区县</th>
            <th>详细地址</th>
            <th>收货人电话</th>
            <th>收货人姓名</th>
            <th>下单时间</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($datum->id); ?></td>
            <td><?php echo e($datum->order_code); ?></td>
            <td><?php echo e($datum->province); ?></td>
            <td><?php echo e($datum->city); ?></td>
            <td><?php echo e($datum->area); ?></td>
            <td><?php echo e($datum->detail_address); ?></td>
            <td><?php echo e($datum->tel); ?></td>
            <td><?php echo e($datum->name); ?></td>
            <td><?php echo e($datum->created_at); ?></td>
            <td>
                <?php if($datum->status==-1): ?>
                    已取消
                    <?php elseif($datum->status==0): ?>
                    待付款
                    <?php elseif($datum->status==1): ?>
                    待发货
                    <?php else: ?>
                    已完成
                    <?php endif; ?>
            </td>
            <td>
                <a href="check/<?php echo e($datum->id); ?>" class="btn btn-info">查看</a>
                <?php if($datum->status==0): ?>
                    <a href="<?php echo e(route('shop.order.off',$datum->id)); ?>" class="btn btn-info">取消订单</a>
                <?php elseif($datum->status==1): ?>
                    <a href="<?php echo e(route('shop.order.deliver',$datum->id)); ?>" class="btn btn-info">发货</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("shop.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>