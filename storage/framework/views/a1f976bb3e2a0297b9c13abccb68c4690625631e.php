<?php $__env->startSection("title","商铺列表"); ?>
<?php $__env->startSection("content"); ?>
    <style type="text/css">
        .lll {
            color: red;
        }

        .xxx {
            color: greenyellow;
        }
    </style>
    <div class="row">
        <div class="col-md-4">
        </div>
    </div>
    <table class="table">
        <tr>
            <th>id</th>
            <th>店铺分类ID</th>
            <th>名称</th>
            <th>店铺图片</th>
            <th>评分</th>
            <th>是否是品牌</th>
            <th>准时送达</th>
            <th>蜂鸟配送</th>
            <th>保标记</th>
            <th>票标记</th>
            <th>准标记</th>
            <th>起送金额</th>
            <th>配送费</th>
            <th>店公告</th>
            <th>优惠信息</th>
            <th>状态</th>
            <th>用户</th>
            <th>操作</th>
        </tr>
        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($data->id); ?></td>
                <td><?php echo e($data->category->name); ?></td>
                <td><?php echo e($data->shop_name); ?></td>
                <td><img src="/<?php echo e($data->shop_img); ?>" width="30" height="30"></td>
                <td><?php echo e($data->shop_score); ?></td>
                <td >
                    <a <?php echo($data->is_brand == 1 ? "class='glyphicon glyphicon-ok xxx'" : "class='glyphicon glyphicon-remove lll'")?>></a>
                </td>
                <td >
                    <a <?php echo($data->is_time == 1 ? "class='glyphicon glyphicon-ok xxx'" : "class='glyphicon glyphicon-remove lll'")?>></a>
                </td>
                <td><a <?php echo($data->is_feng == 1 ? "class='glyphicon glyphicon-ok xxx'" : "class='glyphicon glyphicon-remove lll'")?>></a></td>
                <td >
                    <a <?php echo($data->is_bao == 1 ? "class='glyphicon glyphicon-ok xxx'" : "class='glyphicon glyphicon-remove lll'")?>></a>
                </td>
                <td>
                    <a <?php echo($data->is_piao == 1 ? "class='glyphicon glyphicon-ok xxx'" : "class='glyphicon glyphicon-remove lll'")?>></a>
                </td>
                <td >
                    <a <?php echo($data->is_zhun == 1 ? "class='glyphicon glyphicon-ok xxx'" : "class='glyphicon glyphicon-remove lll'")?>></a>
                </td>
                <td><?php echo e($data->qi_money); ?></td>
                <td><?php echo e($data->pei_money); ?></td>
                <td><?php echo e($data->notice); ?></td>
                <td><?php echo e($data->discount); ?></td>
                <td><?php if($data->state==1): ?>
                        已审核
                    <?php else: ?>
                        未审核
                    <?php endif; ?></td>
                <td><?php echo e($data->user->name); ?></td>
                <td>
                    <?php if($data->state!=1): ?>
                        <a href="shen/<?php echo e($data->id); ?>" class="btn btn-info">审核</a>
                        <?php else: ?>
                        &ensp;&ensp;&ensp; &ensp;&ensp;&ensp;&ensp;
                    <?php endif; ?>
                    <a href="edit/<?php echo e($data->id); ?>" class="btn btn-info">编辑</a>
                    <a href="del/<?php echo e($data->id); ?>" class="btn btn-danger">删除</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("admin.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>