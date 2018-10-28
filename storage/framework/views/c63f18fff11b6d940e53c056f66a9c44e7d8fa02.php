<?php $__env->startSection("title","活动查看"); ?>

<?php $__env->startSection("content"); ?>
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <?php echo e(csrf_field()); ?>

            <label for="inputEmail3" class="col-sm-2 control-label">活动名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="" name="title" value="<?php echo e($data->title); ?>" disabled>
            </div>
        </div>

        <script type="text/javascript">
            var ue = UE.getEditor('container');
            ue.ready(function() {
                ue.execCommand('serverparam', '_token', '<?php echo e(csrf_token()); ?>'); // 设置 CSRF token.
            });
        </script>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">活动详情</label>
            <div class="col-sm-10">
                <script id="container" name="content" type="text/plain"><?php echo $data->content; ?></script>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">活动开始时间</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="name" placeholder="" name="start_time" value="<?php echo e($data->start_time); ?>" disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">活动结束时间</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="name" placeholder="" name="end_time" value="<?php echo e($data->end_time); ?>" disabled>
            </div>
        </div>

    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("shop.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>