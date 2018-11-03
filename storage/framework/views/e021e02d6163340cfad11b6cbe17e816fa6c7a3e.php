<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookmarks Admin - <?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" type="text/css" href="../css/app.css">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>
<body>
    <div class="container" id="app">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo app('Tightenco\Ziggy\BladeRouteGenerator')->generate(); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
