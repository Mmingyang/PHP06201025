<?php $__env->startSection("title","管理员列表"); ?>
<?php $__env->startSection("content"); ?>

    <a href="<?php echo e(route("admin.admin.add")); ?>" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>管理员名称</th>
            <th>管理员邮箱</th>
            <th>角色名</th>
            <th>操作</th>
        </tr>
        <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($admin->id); ?></td>
            <td><?php echo e($admin->name); ?></td>
            <td><?php echo e($admin->email); ?></td>
            <td><?php echo e(str_replace(['[',']','"'],'',json_encode($admin->getRoleNames(),JSON_UNESCAPED_UNICODE))); ?></td>
            <td>
                <a href="edit/<?php echo e($admin->id); ?>" class="btn btn-info">编辑</a>
                <a href="del/<?php echo e($admin->id); ?>" class="btn btn-info">删除</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("admin.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>