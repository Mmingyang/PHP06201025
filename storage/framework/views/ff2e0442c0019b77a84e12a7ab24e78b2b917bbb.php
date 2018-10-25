<?php $__env->startSection("title","商铺分类列表"); ?>
<?php $__env->startSection("content"); ?>

    <a href="<?php echo e(route("admin.shopcategory.add")); ?>" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>分类名称</th>
            <th>分类图片</th>
            <th>是否上线</th>
            <th>排名</th>
            <th>操作</th>
        </tr>
        <?php $__currentLoopData = $spcates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spcate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($spcate->id); ?></td>
            <td><?php echo e($spcate->name); ?></td>
            <td><img src="/<?php echo e($spcate->img); ?>" width="50"></td>
            <td><?php if($spcate->status==1){echo "上线"; }else{echo "未上线";}?></td>
            <td><?php echo e($spcate->sort); ?></td>
            <td>
                <a href="edit/<?php echo e($spcate->id); ?>" class="btn btn-info">编辑</a>
                <a href="del/<?php echo e($spcate->id); ?>" class="btn btn-info">删除</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("admin.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>