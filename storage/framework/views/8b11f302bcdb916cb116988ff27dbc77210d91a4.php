<?php $__env->startSection("title","商铺列表"); ?>
<?php $__env->startSection("content"); ?>

        <?php if($users->shop_id==0): ?>

            <a href="<?php echo e(route("shop.shop.add")); ?>" class="btn btn-info">申请店铺</a>

        <?php endif; ?>

        <?php if($users->shop_id!=0): ?>

            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>商铺分类ID</th>
                    <th>商铺名称</th>
                    <th>商铺图片</th>
                    <th>评分</th>
                    <th>是否是品牌</th>
                    <th>是否准时送达</th>
                    <th>是否蜂鸟配送</th>
                    <th>是否保标记</th>
                    <th>是否票标记</th>
                    <th>是否准标记</th>
                    <th>起送金额</th>
                    <th>配送费</th>
                    <th>店公告</th>
                    <th>优惠信息</th>
                    <th>商铺状态</th>
                    <th>店铺负责人</th>
                    <th>操作</th>
                </tr>
                
                    <tr>
                        <td><?php echo e($shop->id); ?></td>
                        <td><?php echo e($shop->shop_cate_id); ?></td>
                        <td><?php echo e($shop->shop_name); ?></td>
                        <td><img src="/<?php echo e($shop->shop_img); ?>" width="50"></td>
                        <td><?php echo e($shop->shop_score); ?></td>
                        <td><?php if($shop->is_brand==1) echo "是"; else echo "否";?></td>
                        <td><?php if($shop->is_time==1) echo "是"; else echo "否";?></td>
                        <td><?php if($shop->is_feng!==1) echo "否"; else echo "是";?></td>
                        <td><?php if($shop->is_bao!==1) echo "否"; else echo "是";?></td>
                        <td><?php if($shop->is_piao!==1) echo "否"; else echo "是";?></td>
                        <td><?php if($shop->is_zhun!==1) echo "否"; else echo "是";?></td>
                        <td><?php echo e($shop->qi_money); ?></td>
                        <td><?php echo e($shop->pei_money); ?></td>
                        <td><?php echo e($shop->notice); ?></td>
                        <td><?php echo e($shop->discount); ?></td>
                        <td><?php if($shop->state==1){ echo "已审核";}elseif($shop->state==2){ echo "未审核";}else{ echo "禁用";}?></td>
                        <td><?php echo e($shop->user_id); ?></td>
                        <td>
                            <a href="" class="btn btn-info">审核</a>
                            <a href="edit/<?php echo e($shop->id); ?>" class="btn btn-info">编辑</a>
                            <a href="del/<?php echo e($shop->id); ?>" class="btn btn-info">删除</a>
                        </td>
                    </tr>
                
            </table>


        <?php endif; ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("shop.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>