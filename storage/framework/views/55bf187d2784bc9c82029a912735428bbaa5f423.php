<?php $__env->startSection('title', translate('forgot_Password')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <style>
        .text-primary {
            color: <?php echo e($web_config['primary_color']); ?>  !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php ($verification_by=\App\CPU\Helpers::get_business_settings('forgot_password_verification')); ?>
    <!-- Page Content-->
    <div class="container py-4 py-lg-5 my-4 rtl">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 text-start">
                <h2 class="h3 mb-4"><?php echo e(translate('forgot_your_password')); ?>?</h2>
                <p class="font-size-md">
                    <?php echo e(translate('change_your_password_in_three_easy_steps.')); ?> <?php echo e(translate('this_helps_to_keep_your_new_password_secure.')); ?>

                </p>
                <ol class="list-unstyled font-size-md p-0">
                    <li>
                        <span class="text-primary mr-2"><?php echo e(translate('1')); ?>.</span><?php echo e(translate('fill_in_your_email_address_below.')); ?>

                    </li>
                    <li>
                        <span class="text-primary mr-2"><?php echo e(translate('2')); ?>.</span><?php echo e(translate('we_will_email_you_a_temporary_code.')); ?>

                    </li>
                    <li>
                        <span class="text-primary mr-2"><?php echo e(translate('3')); ?>.</span><?php echo e(translate('use_the_code_to_change_your_password_on_our_secure_website.')); ?>

                    </li>
                </ol>

                <?php if($verification_by=='email'): ?>

                    <div class="card py-2 mt-4">
                        <form class="card-body needs-validation" action="<?php echo e(route('customer.auth.forgot-password')); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="recover-email"><?php echo e(translate('enter_your_email_address')); ?></label>
                                <input class="form-control" type="email" name="identity" id="recover-email" required>
                                <div class="invalid-feedback">
                                    <?php echo e(translate('please_provide_valid_email_address.')); ?>

                                </div>
                            </div>
                            <button class="btn btn--primary" type="submit">
                                <?php echo e(translate('get_new_password')); ?>

                            </button>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="card py-2 mt-4">
                        <form class="card-body needs-validation" action="<?php echo e(route('customer.auth.forgot-password')); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="recover-email"><?php echo e(translate('enter_your_phone_number')); ?></label>
                                <input class="form-control" type="text" name="identity" required>
                                <div class="invalid-feedback">
                                    <?php echo e(translate('please_provide_valid_phone_number')); ?>

                                </div>
                            </div>
                            <button class="btn btn--primary" type="submit"><?php echo e(translate('proceed')); ?></button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/themes/default/customer-view/auth/recover-password.blade.php ENDPATH**/ ?>