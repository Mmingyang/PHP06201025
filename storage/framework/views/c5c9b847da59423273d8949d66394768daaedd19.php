<?php $__env->startSection("title","抽奖活动列表"); ?>
<?php $__env->startSection("content"); ?>

    <a href="<?php echo e(route("admin.activity.add")); ?>" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>活动名称</th>
            <th>活动详情</th>
            <th>报名开始时间</th>
            <th>报名结束时间</th>
            <th>开奖时间</th>
            <th>报名人数限制</th>
            <th>是否已开奖</th>
            <th>操作</th>
        </tr>
        <?php $__currentLoopData = $activitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($event->id); ?></td>
            <td><?php echo e($event->title); ?></td>
            <td><?php echo $event->content; ?></td>
            <td><?php echo e($event->start_time); ?></td>
            <td><?php echo e($event->end_time); ?></td>
            <td><?php echo e($event->prize_time); ?></td>
            <td><?php echo e($event->users->count()); ?>/<?php echo e($event->num); ?></td>
            <td>
                <?php if($event->is_prize==1): ?>
                    是
                <?php else: ?>
                    否
                <?php endif; ?>
            </td>
            <td>
                <?php if($event->is_prize!==1): ?>
                <a href="open/<?php echo e($event->id); ?>" class="btn btn-danger">开奖</a>
                <?php endif; ?>
                <a href="edit/<?php echo e($event->id); ?>" class="btn btn-info">编辑</a>
                <a href="del/<?php echo e($event->id); ?>" class="btn btn-info">删除</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("admin.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>