<?php $__env->startSection("title","抽奖报名列表"); ?>
<?php $__env->startSection("content"); ?>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>活动ID</th>
            <th>报名用户ID</th>
            <th>报名时间</th>
        </tr>
        <?php $__currentLoopData = $applys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($event->id); ?></td>
            <td><?php echo e($event->activity_id); ?></td>
            <td><?php echo e($event->user_id); ?></td>
            <td><?php echo e($event->created_at); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("admin.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>