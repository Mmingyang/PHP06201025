<?php $__env->startSection("title","订单量总量统计"); ?>
<?php $__env->startSection("content"); ?>

    <table class="table">
        <tr>
            <th>总数量</th>
            <th>总价钱</th>
        </tr>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($datum->nums); ?></td>
            <td><?php echo e($datum->money); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

<?php $__env->stopSection(); ?>


<?php echo $__env->make("shop.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>