<?php $__env->startSection("title","活动列表"); ?>
<?php $__env->startSection("content"); ?>

    <a href="<?php echo e(route("admin.event.add")); ?>" class="btn btn-info">添加</a>

            <form class="form-inline pull-right" method="get">
                <div class="form-group">
                    <select name="time" class="form-control">
                        <option value="">请选择时间</option>
                        <option value="1">进行中</option>
                        <option value="2">已结束</option>
                        <option value="3">未开始</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"  placeholder="请输入名称" name="keyword" value="<?php echo e(request()->get("keyword")); ?>">
                </div>
                <button type="submit" class="btn btn-primary">搜索</button>
            </form>


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
                <a href="edit/<?php echo e($event->id); ?>" class="btn btn-info">编辑</a>
                <a href="del/<?php echo e($event->id); ?>" class="btn btn-info">删除</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>

    <?php echo e($events->links()); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("admin.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>