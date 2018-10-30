<?php $__env->startSection("title","菜品分类列表"); ?>
<?php $__env->startSection("content"); ?>

    <a href="<?php echo e(route("shop.menuCategory.add")); ?>" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>分类名称</th>
            <th>分类编号</th>
            <th>所属商家ID</th>
            <th>描述</th>
            <th>是否为默认分类</th>
            <th>操作</th>
        </tr>
        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($menu->id); ?></td>
            <td><?php echo e($menu->name); ?></td>
            <td><?php echo e($menu->type_id); ?></td>
            <td><?php echo e($menu->shop_id); ?></td>
            <td><?php echo e($menu->description); ?></td>
            <td><?php if($menu->is_selected==1) echo "是"; else echo "不是";?></td>
            <td>
                <a href="edit/<?php echo e($menu->id); ?>" class="btn btn-info">编辑</a>
                <a href="del/<?php echo e($menu->id); ?>" class="btn btn-info">删除</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("shop.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>