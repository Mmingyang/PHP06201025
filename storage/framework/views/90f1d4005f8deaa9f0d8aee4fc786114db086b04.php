<?php $__env->startSection("title","权限列表"); ?>
<?php $__env->startSection("content"); ?>

    <a href="<?php echo e(route("admin.permission.add")); ?>" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>权限名称</th>
            <th>权限描述</th>
            <th>操作</th>
        </tr>
        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($permission->id); ?></td>
            <td><?php echo e($permission->name); ?></td>
            <td><?php echo e($permission->intro); ?></td>
            <td>
                <a href="edit/<?php echo e($permission->id); ?>" class="btn btn-info">编辑</a>
                <a href="del/<?php echo e($permission->id); ?>" class="btn btn-info">删除</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("admin.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>