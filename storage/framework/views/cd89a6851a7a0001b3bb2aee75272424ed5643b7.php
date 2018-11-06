<?php $__env->startSection("title","角色列表"); ?>
<?php $__env->startSection("content"); ?>

    <a href="<?php echo e(route("admin.role.add")); ?>" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>角色名称</th>
            <th>权限名称</th>
            <th>操作</th>
        </tr>
        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($role->id); ?></td>
            <td><?php echo e($role->name); ?></td>
            <td><?php echo e(str_replace(['[',']','"'],'', $role->permissions()->pluck('name'))); ?></td>
            <td>
                <a href="edit/<?php echo e($role->id); ?>" class="btn btn-info">编辑</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("admin.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>