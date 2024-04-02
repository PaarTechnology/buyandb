

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title><?php echo e(translate('forgot_password')); ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['fav_icon']->value); ?>">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/vendor.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/icon-set/style.css">
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/theme.minc619.css?v=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/toastr.css">
</head>

<body>
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="main">
    <div class="position-fixed top-0 right-0 left-0 bg-img-hero __h-32rem"
         style="background-image: url(<?php echo e(asset('public/assets/admin')); ?>/svg/components/abstract-bg-4.svg);">
        <!-- SVG Bottom Shape -->
        <figure class="position-absolute right-0 bottom-0 left-0">
            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1921 273">
                <polygon fill="#fff" points="0,273 1921,273 1921,0 "/>
            </svg>
        </figure>
        <!-- End SVG Bottom Shape -->
    </div>

    <!-- Content -->
    <div class="container py-5 py-sm-7">
        <?php ($e_commerce_logo=\App\Model\BusinessSetting::where(['type'=>'company_web_logo'])->first()->value); ?>
        <a class="d-flex justify-content-center mb-5" href="javascript:">
            <img class="z-index-2 __w-8rem"  src="<?php echo e(asset("storage/app/public/company/".$e_commerce_logo)); ?>" alt="Logo"
                 onerror="this.src='<?php echo e(asset('public/assets/back-end/img/400x400/img2.jpg')); ?>'"
                 >
        </a>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <h2 class="h3 mb-4"><?php echo e(translate('forgot_password?')); ?></h2>
                <p class="font-size-md"><?php echo e(translate('follow_steps')); ?></p>
                <ol class="list-unstyled font-size-md">
                    <li><span class="text-primary mr-2">1.</span><?php echo e(translate('fill_in_your_email_address_below.')); ?></li>
                    <li><span class="text-primary mr-2">2.</span><?php echo e(translate('we_will_send_email you a temporary code.')); ?></li>
                    <li><span class="text-primary mr-2">3.</span><?php echo e(translate('use_the_code_to_change_your_password_on_our_secure_website.')); ?></li>
                </ol>
                <?php ($verification_by=\App\CPU\Helpers::get_business_settings('forgot_password_verification')); ?>
                <?php if($verification_by=='email'): ?>
                    <div class="card py-2 mt-4">
                        <form class="card-body needs-validation" action="<?php echo e(route('seller.auth.forgot-password')); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="recover-email"><?php echo e(translate('enter_your_email_address')); ?></label>
                                <input class="form-control" type="email" name="identity" id="recover-email" required>
                                <div class="invalid-feedback"><?php echo e(translate('please_provide_valid_email_address.')); ?></div>
                            </div>
                            <button class="btn btn-primary" type="submit"><?php echo e(translate('get_new_password')); ?></button>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="card py-2 mt-4">
                        <form class="card-body needs-validation" action="<?php echo e(route('seller.auth.forgot-password')); ?>"
                            method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="recover-email"><?php echo e(translate('enter_your_phone_number')); ?></label>
                                <input class="form-control" type="text" name="identity" id="recover-email" required>
                                <div class="invalid-feedback"><?php echo e(translate('please_provide_valid_phone_number.')); ?></div>
                            </div>
                            <button class="btn btn--primary" type="submit"><?php echo e(translate('get_new password')); ?></button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- End Content -->
</main>
<!-- ========== END MAIN CONTENT ========== -->


<!-- JS Implementing Plugins -->
<script src="<?php echo e(asset('public/assets/back-end')); ?>/js/vendor.min.js"></script>

<!-- JS Front -->
<script src="<?php echo e(asset('public/assets/back-end')); ?>/js/theme.min.js"></script>
<script src="<?php echo e(asset('public/assets/back-end')); ?>/js/toastr.js"></script>
<?php echo Toastr::message(); ?>


<?php if($errors->any()): ?>
    <script>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        toastr.error('<?php echo e($error); ?>', Error, {
            CloseButton: true,
            ProgressBar: true
        });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>
<?php endif; ?>

<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {
        // INITIALIZATION OF SHOW PASSWORD
        // =======================================================
        $('.js-toggle-password').each(function () {
            new HSTogglePassword(this).init()
        });

        // INITIALIZATION OF FORM VALIDATION
        // =======================================================
        $('.js-validate').each(function () {
            $.HSCore.components.HSValidation.init($(this));
        });
    });
</script>

<!-- IE Support -->
<script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="<?php echo e(asset('public/assets/admin')); ?>/vendor/babel-polyfill/polyfill.min.js"><\/script>');
</script>
</body>
</html>

<?php /**PATH /home/buyandb/public_html/resources/views/seller-views/auth/forgot-password.blade.php ENDPATH**/ ?>