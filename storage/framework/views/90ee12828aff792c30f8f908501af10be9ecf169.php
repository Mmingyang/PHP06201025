<?php $__env->startSection("title","抽奖活动奖品列表"); ?>
<?php $__env->startSection("content"); ?>

    <a href="<?php echo e(route("admin.eventprize.add")); ?>" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>活动ID</th>
            <th>奖品名称</th>
            <th>奖品详情</th>
            <th>中奖商户ID</th>
            <th>操作</th>
        </tr>
        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($event->id); ?></td>
            <td><?php echo e($event->activity_id); ?></td>
            <td><?php echo e($event->name); ?></td>
            <td><?php echo $event->description; ?></td>
            <td><?php echo e($event->user_id); ?></td>
            <td>
                <a href="edit/<?php echo e($event->id); ?>" class="btn btn-info">编辑</a>
                <a href="del/<?php echo e($event->id); ?>" class="btn btn-info">删除</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("admin.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>