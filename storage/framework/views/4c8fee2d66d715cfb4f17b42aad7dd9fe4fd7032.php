<?php $__env->startSection("title","菜品列表"); ?>
<?php $__env->startSection("content"); ?>


    <a href="<?php echo e(route("shop.menu.add")); ?>" class="btn btn-info">添加</a>


        <form class="form-inline pull-right" method="get">
            <div class="form-group">
                <select name="goods_id" class="form-control">
                    <option value="">请选择分类</option>
                    <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mcs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($mcs->id); ?>"><?php echo e($mcs->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="最低价" size="5" name="minPrice" value="<?php echo e(request()->get("minPrice")); ?>">
            </div>
            -
            <div class="form-group">
                <input type="text" class="form-control" placeholder="最高价" size="5" name="maxPrice" value="<?php echo e(request()->get("maxPrice")); ?>">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="请输入名称" name="keyword" value="<?php echo e(request()->get("keyword")); ?>">
            </div>

            <button type="submit" class="btn btn-primary">搜索</button>

        </form>


    <table class="table">
        <tr>
            <th>ID</th>
            <th>菜品名称</th>
            <th>菜品图片</th>
            <th>评分</th>
            <th>所属商家ID</th>
            <th>所属分类ID</th>
            <th>价格</th>
            <th>描述</th>
            <th>菜品状态</th>
            <th>操作</th>
        </tr>
        <?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($menu->id); ?></td>
            <td><?php echo e($menu->goods_name); ?></td>

            <td>
                <?php if($menu->goods_img): ?>
                    <img src="<?php echo e($menu->goods_img); ?>?x-oss-process=image/resize,m_fill,w_100,h_80">
                    
                <?php endif; ?>
            </td>

            <td><?php echo e($menu->rating); ?></td>
            <td><?php echo e($menu->shop_id); ?></td>
            <td><?php echo e($menu->menu_cate_id); ?></td>
            <td><?php echo e($menu->goods_price); ?></td>
            <td><?php echo e($menu->description); ?></td>
            <td><?php if($menu->status==1) echo "上架"; else echo "下架";?></td>
            <td>
                <a href="edit/<?php echo e($menu->id); ?>" class="btn btn-info">编辑</a>
                <a href="del/<?php echo e($menu->id); ?>" class="btn btn-info">删除</a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>

    <?php echo e($goods->links()); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("shop.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>