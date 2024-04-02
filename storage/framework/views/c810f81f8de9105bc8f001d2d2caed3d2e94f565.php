<?php $__env->startSection('title', translate('announcement')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('public/assets/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/back-end/css/custom.css')); ?>" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(asset('/public/assets/back-end/img/announcement.png')); ?>" alt="">
                <?php echo e(translate('announcement_Setup')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <form action="<?php echo e(route('admin.business-settings.update-announcement')); ?>" method="POST"
                enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(isset($announcement)): ?>
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0"><?php echo e(translate('announcement_Setup')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-10 align-items-center mb-2">
                            <input type="radio" name="announcement_status"
                                    value="1" <?php echo e($announcement['status']==1?'checked':''); ?>>
                            <label class="title-color mb-0"><?php echo e(translate('active')); ?></label>
                        </div>
                        <div class="d-flex gap-10 align-items-center mb-4">
                            <input type="radio" name="announcement_status"
                                    value="0" <?php echo e($announcement['status']==0?'checked':''); ?>>
                            <label class="title-color mb-0"><?php echo e(translate('inactive')); ?></label>
                        </div>
                        <div class="d-flex flex-wrap gap-4">
                            <div class="form-group text-center">
                                <label class="title-color"><?php echo e(translate('background_color')); ?></label>
                                <input type="color" name="announcement_color"
                                        value="<?php echo e($announcement['color']); ?>" id="background-color"
                                        class="form-control form-control_color">
                                <div class="title-color mb-4 mt-3" id="background-color-set"><?php echo e($announcement['color']); ?></div>
                            </div>
                            <div class="form-group text-center">
                                <label class="title-color"><?php echo e(translate('text_color')); ?></label>
                                <input type="color" name="text_color" id="text-color" value="<?php echo e($announcement['text_color']); ?>"
                                        class="form-control form-control_color">
                                <div class="title-color mb-4 mt-3" id="text-color-set"><?php echo e($announcement['text_color']); ?></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="title-color d-flex"><?php echo e(translate('text')); ?></label>
                            <input class="form-control" type="text" name="announcement"
                                    value="<?php echo e($announcement['announcement']); ?>">
                        </div>

                        <div class="justify-content-end d-flex">
                            <button type="submit" class="btn btn--primary px-4"><?php echo e(translate('publish')); ?></button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        $('#background-color').on('change', function(){
            let background_color = $('#background-color').val();
            $('#background-color-set').text(background_color);
        });
        $('#text-color').on('change', function(){
            let text_color = $('#text-color').val();
            $('#text-color-set').text(text_color);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/business-settings/website-announcement.blade.php ENDPATH**/ ?>