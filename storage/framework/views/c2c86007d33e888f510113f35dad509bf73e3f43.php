<?php $__env->startSection('title', translate('track_Order_Result')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta property="og:image" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="og:title" content="<?php echo e($web_config['name']->value); ?> "/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description" content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">

    <meta property="twitter:card" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="twitter:title" content="<?php echo e($web_config['name']->value); ?>"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description" content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">
    <link rel="stylesheet" media="screen"
          href="<?php echo e(asset('public/assets/front-end')); ?>/vendor/nouislider/distribute/nouislider.min.css"/>
    <style>
       .closet{
            float: <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Content-->
    <div class="container rtl py-5" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
        <div class="card __card">
            <div class="card-body py-5">
                <div class="mw-1000 mx-auto">
                    <h3 class="text-center text-capitalize"><?php echo e(translate('track_order')); ?></h3>
                    <form action="<?php echo e(route('track-order.result')); ?>" type="submit" method="post" class="p-3">
                        <?php echo csrf_field(); ?>

                        <?php if(session()->has('Error')): ?>
                            <div class="alert alert-danger alert-block">
                                <span type="" class="closet __closet" data-dismiss="alert">×</span>
                                <strong><?php echo e(session()->get('Error')); ?></strong>
                            </div>
                        <?php endif; ?>
                        <div class="row g-3">
                            <div class="col-md-4 col-sm-6">
                                <input class="form-control prepended-form-control" type="text" value="<?php echo e(old('order_id')); ?>" name="order_id"
                                    placeholder="<?php echo e(translate('order_id')); ?>" required>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <input class="form-control prepended-form-control" type="text" value="<?php echo e(old('phone_number')); ?>" name="phone_number"
                                    placeholder="<?php echo e(translate('your_phone_number')); ?>" required>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn--primary w-100" type="submit" name="trackOrder"><?php echo e(translate('track_order')); ?></button>
                            </div>
                        </div>
                        <div class="mt-5 pt-md-5 mx-auto text-center" style="max-width:377px">
                            <img class="mb-2" src="<?php echo e(asset('/public/assets/front-end/img/track-truck.svg')); ?>" alt="">
                            <div class="opacity-50">
                                <?php echo e(translate('enter_your_order_ID_&_phone_number_to_get_delivery_updates')); ?>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/front-end')); ?>/vendor/nouislider/distribute/nouislider.min.js">
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/themes/default/web-views/order/tracking-page.blade.php ENDPATH**/ ?>