<?php $__env->startSection("title","抽奖活动添加"); ?>

<?php $__env->startSection("content"); ?>

    <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>

    <form class="form-horizontal" method="post">
        <div class="form-group">
            <?php echo e(csrf_field()); ?>

            <label for="inputEmail3" class="col-sm-2 control-label">活动名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="" name="title" value="<?php echo e(old("title")); ?>">
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
                <script id="container" name="content" value="<?php echo e(old("content")); ?>" type="text/plain"></script>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">报名开始时间</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="name" placeholder="" name="start_time" value="<?php echo e(old("start_time")); ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">报名结束时间</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="name" placeholder="" name="end_time" value="<?php echo e(old("end_time")); ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">开奖时间</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="name" placeholder="" name="prize_time" value="<?php echo e(old("prize_time")); ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">报名人数限制</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="" name="num" value="<?php echo e(old("num")); ?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("admin.layouts.main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>