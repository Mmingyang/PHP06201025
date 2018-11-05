<?php $__env->startSection("title","会员查看列表"); ?>
<?php $__env->startSection("content"); ?>

    <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>会员名称</th>
            <th>会员电话</th>
            <th>会员余额</th>
            <th>会员积分</th>
            <th>会员状态</th>
            <th>会员创建时间</th>
        </tr>
        <tr>
            <td><?php echo e($member->id); ?></td>
            <td><?php echo e($member->username); ?></td>
            <td><?php echo e($member->tel); ?></td>
            <td><?php echo e($member->money); ?></td>
            <td><?php echo e($member->jifen); ?></td>
            <td>
                <?php if($member->status==1): ?>
                    会员
                <?php else: ?>
                    非会员
                <?php endif; ?>

            </td>
            <td><?php echo e($member->created_at); ?></td>
        </tr>


    </table>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("admin.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>