<?php $__env->startSection("title","商家列表"); ?>
<?php $__env->startSection("content"); ?>

    <a href="<?php echo e(route("admin.user.add")); ?>" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>商家名称</th>
            <th>商家邮箱</th>
            <th>商家密码</th>
            <th>操作</th>
        </tr>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($user->id); ?></td>
            <td><?php echo e($user->name); ?></td>
            <td><?php echo e($user->email); ?></td>
            <td><?php echo e($user->password); ?></td>
            <td>
                <a href="edit/<?php echo e($user->id); ?>" class="btn btn-info">编辑</a>
                <a href="del/<?php echo e($user->id); ?>" class="btn btn-info">删除</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("admin.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>