<?php $__env->startSection("title","订单详情"); ?>
<?php $__env->startSection("content"); ?>

    <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>
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
        </tr>
        <tr>
            <td><?php echo e($order->id); ?></td>
            <td><?php echo e($order->order_code); ?></td>
            <td><?php echo e($order->province); ?></td>
            <td><?php echo e($order->city); ?></td>
            <td><?php echo e($order->area); ?></td>
            <td><?php echo e($order->detail_address); ?></td>
            <td><?php echo e($order->tel); ?></td>
            <td><?php echo e($order->name); ?></td>
            <td><?php echo e($order->created_at); ?></td>
            <td>
                <?php if($order->status==-1): ?>
                    已取消
                <?php elseif($order->status==0): ?>
                    待付款
                <?php elseif($order->status==1): ?>
                    待发货
                <?php else: ?>
                    已完成
                <?php endif; ?>
            </td>
        </tr>

    </table>

<?php $__env->stopSection(); ?>


<?php echo $__env->make("shop.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>