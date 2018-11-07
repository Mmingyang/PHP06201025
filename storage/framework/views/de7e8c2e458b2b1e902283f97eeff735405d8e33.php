<?php $__env->startSection("title","导航菜单管理列表"); ?>
<?php $__env->startSection("content"); ?>

    <a href="<?php echo e(route("admin.nav.add")); ?>" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>导航菜单名称</th>
            <th>导航菜单路由</th>
            <th>排序</th>
            <th>父ID</th>
            <th>操作</th>
        </tr>
        <?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($nav->id); ?></td>
            <td><?php echo e($nav->name); ?></td>
            <td><?php echo e($nav->url); ?></td>
            <td><?php echo e($nav->sort); ?></td>
            <td><?php echo e($nav->pid); ?></td>
            <td>
                <a href="del/<?php echo e($nav->id); ?>" class="btn btn-info">删除</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>

    <?php echo e($navs->links()); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("admin.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>