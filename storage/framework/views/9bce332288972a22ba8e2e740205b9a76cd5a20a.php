<?php $__env->startSection("title","活动列表"); ?>
<?php $__env->startSection("content"); ?>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>活动名称</th>
            <th>活动详情</th>
            <th>活动开始时间</th>
            <th>活动结束时间</th>
            <th>操作</th>
        </tr>
        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($event->id); ?></td>
            <td><?php echo e($event->title); ?></td>
            <td><?php echo $event->content; ?></td>
            <td><?php echo e($event->start_time); ?></td>
            <td><?php echo e($event->end_time); ?></td>
            <td>
                <a href="ck/<?php echo e($event->id); ?>" class="btn btn-info">查看</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("shop.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>