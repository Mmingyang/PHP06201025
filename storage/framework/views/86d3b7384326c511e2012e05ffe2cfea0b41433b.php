<?php $__env->startSection("title","会员列表"); ?>
<?php $__env->startSection("content"); ?>

    <form class="form-inline pull-right" method="get">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="请输入会员名称" name="keyword" value="<?php echo e(request()->get("keyword")); ?>">
        </div>

        <button type="submit" class="btn btn-primary">搜索</button>

    </form>


    <table class="table">
        <tr>
            <th>ID</th>
            <th>会员名称</th>
            <th>会员电话</th>
            <th>会员余额</th>
            <th>会员积分</th>
            <th>会员状态</th>
            <th>会员创建时间</th>
            <th>操作</th>
        </tr>
        <?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $good): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($good->id); ?></td>
            <td><?php echo e($good->username); ?></td>
            <td><?php echo e($good->tel); ?></td>
            <td><?php echo e($good->money); ?></td>
            <td><?php echo e($good->jifen); ?></td>
            <td>
                <?php if($good->status==1): ?>
                    会员
                <?php else: ?>
                    非会员
                <?php endif; ?>

            </td>
            <td><?php echo e($good->created_at); ?></td>
            <td>
                <a href="check/<?php echo e($good->id); ?>" class="btn btn-info">查看</a>
                <a href="off/<?php echo e($good->id); ?>" class="btn btn-info">禁用</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("admin.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>