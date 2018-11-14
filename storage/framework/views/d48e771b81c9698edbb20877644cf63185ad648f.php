<?php $__env->startSection("title","详情"); ?>
<?php $__env->startSection("content"); ?>

    <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>

    <table class="table">
        <tr>
            <th>获奖编号</th>
            <th>活动标题</th>
            <th>奖品名称</th>
            <th>奖品详情</th>
            <th>中奖用户</th>
        </tr>
        <?php $__currentLoopData = $eventPrizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventPrize): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($eventPrize->id); ?></td>
                <td><?php echo e($eventPrize->event->title); ?></td>
                <td><?php echo e($eventPrize->name); ?></td>
                <td><?php echo e($eventPrize->description); ?></td>
                <td><?php echo e($eventPrize->users->name); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("shop.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>