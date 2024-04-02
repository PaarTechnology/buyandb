<?php $__env->startSection('title', translate('SMS_Module_Setup')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('/public/assets/back-end/img/3rd-party.png')); ?>" alt="">
                <?php echo e(translate('3rd_party')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Inlile Menu -->
        <?php echo $__env->make('admin-views.business-settings.third-party-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Inlile Menu -->

        <div class="row gy-3" id="sms-gatway-cards">

            <?php $__currentLoopData = $sms_gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$sms_config): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">
                    <div class="card h-100">
                        <form action="<?php echo e(route('admin.business-settings.addon-sms-set')); ?>" method="POST"
                              id="<?php echo e($sms_config->key_name); ?>-form" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="card-header d-flex flex-wrap align-content-around">
                                <h5>
                                    <span class="text-uppercase"><?php echo e(str_replace('_',' ',$sms_config->key_name)); ?></span>
                                </h5>

                                <?php
                                    $img_path = asset('/public/assets/back-end/img/modal/sms/'.$sms_config->key_name.'.png');
                                ?>

                                <label class="switcher show-status-text">
                                    <input class="switcher_input" type="checkbox" name="status" value="1"
                                    onclick="smsMethodStatusModal(event,'<?php echo e($sms_config->key_name); ?>','<?php echo e($img_path); ?>',
                                    '<?php echo e(translate('want_to_Turn_ON_')); ?><?php echo e(ucwords(str_replace('_',' ',$sms_config->key_name))); ?><?php echo e(translate('_as_the_SMS_Gateway')); ?>?','<?php echo e(translate('want_to_Turn_OFF_')); ?><?php echo e(ucwords(str_replace('_',' ',$sms_config->key_name))); ?><?php echo e(translate('_as_the_SMS_Gateway')); ?>??',
                                    `<p><?php echo e(translate('if_enabled_system_can_use_this_SMS_Gateway')); ?></p>`,
                                    `<p><?php echo e(translate('if_disabled_system_cannot_use_this_SMS_Gateway')); ?></p>`)"
                                        id="<?php echo e($sms_config->key_name); ?>" <?php echo e($sms_config['is_active']==1?'checked':''); ?>>

                                    <span class="switcher_control" data-ontitle="<?php echo e(translate('on')); ?>" data-offtitle="<?php echo e(translate('off')); ?>"></span>
                                </label>
                            </div>

                            <div class="card-body">

                                <input name="gateway" value="<?php echo e($sms_config->key_name); ?>" class="d-none">
                                <input name="mode" value="live" class="d-none">

                                <?php ($skip=['gateway','mode','status']); ?>
                                <?php $__currentLoopData = $sms_config->live_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!in_array($key,$skip)): ?>
                                        <div class="form-group" style="margin-bottom: 10px">
                                            <label for="exampleFormControlInput1"
                                                   class="form-label"><?php echo e(ucwords(str_replace('_',' ',$key))); ?>

                                                   <span class="text-danger">*</span>
                                                </label>
                                            <input type="text" class="form-control"
                                                   name="<?php echo e($key); ?>"
                                                   placeholder="<?php echo e(ucwords(str_replace('_',' ',$key))); ?>"
                                                   value="<?php echo e(env('APP_ENV')=='demo'?'':$value); ?>">
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="text-right" style="margin-top: 20px">
                                    <button type="submit" class="btn btn-primary px-5"><?php echo e(translate('save')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        function smsMethodStatusModal(e, toggle_id, image, on_title, off_title, on_message, off_message) {
            e.preventDefault();

            $('#toggle-status-image').attr('src', image);
            if ($('#'+toggle_id).is(':checked')) {
                $('#toggle-status-title').empty().append(on_title);
                $('#toggle-status-message').empty().append(on_message);
                $('#toggle-status-ok-button').attr('toggle-ok-button', toggle_id);
                $('.toggle-modal-img-box .status-icon').attr('src', '<?php echo e(asset("/public/assets/back-end/img/modal/status-green.png")); ?>');
            } else {
                $('#toggle-status-title').empty().append(off_title);
                $('#toggle-status-message').empty().append(off_message);
                $('#toggle-status-ok-button').attr('toggle-ok-button', toggle_id);
                $('.toggle-modal-img-box .status-icon').attr('src', '<?php echo e(asset("/public/assets/back-end/img/modal/status-warning.png")); ?>');
            }
            $('#toggle-status-modal').modal('show');
        }

        <?php if($payment_gateway_published_status == 1): ?>
            $('#sms-gatway-cards').find('input').each(function(){
                $(this).attr('disabled', true);
            });
            $('#sms-gatway-cards').find('select').each(function(){
                $(this).attr('disabled', true);
            });
            $('#sms-gatway-cards').find('.switcher_input').each(function(){
                $(this).removeAttr('checked', true);
            });
            $('#sms-gatway-cards').find('button').each(function(){
                $(this).attr('disabled', true);
            });
        <?php endif; ?>
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/business-settings/sms-index.blade.php ENDPATH**/ ?>