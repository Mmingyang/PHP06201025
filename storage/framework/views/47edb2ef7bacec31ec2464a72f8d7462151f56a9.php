<!-- 配置文件 -->
<script type="text/javascript" src="<?php echo e(asset('vendor/ueditor/ueditor.config.js')); ?>"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="<?php echo e(asset('vendor/ueditor/ueditor.all.js')); ?>"></script>
<script>
    window.UEDITOR_CONFIG.serverUrl = '<?php echo e(config('ueditor.route.name')); ?>'
</script>