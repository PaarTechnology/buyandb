<?php $__env->startSection('title', translate('all_Category')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta property="og:image" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="og:title" content="Categories of <?php echo e($web_config['name']->value); ?> "/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description" content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">

    <meta property="twitter:card" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="twitter:title" content="Categories of <?php echo e($web_config['name']->value); ?>"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description" content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">

    <style>
        .active{
            background: <?php echo e($web_config['secondary_color']); ?>;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Content-->
    <div class="container p-3 rtl __inline-52" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9 text-center">
                <h4><?php echo e(translate('category')); ?></h4>
            </div>
        </div>
        <div class="row">
            <!-- Sidebar-->
            <div class="col-lg-3 col-md-4">
                <?php $__currentLoopData = \App\CPU\CategoryManager::parents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-header mb-2 p-2 side-category-bar" onclick="get_categories('<?php echo e(route('category-ajax',[$category['id']])); ?>')">
                        <img src="<?php echo e(asset("storage/app/public/category/$category->icon")); ?>" onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'" class="__img-18 mr-1">

                            <?php echo e($category['name']); ?>


                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- Content  -->
            <div class="col-lg-9 col-md-8">
                <!-- Products grid-->
                <hr>
                <div class="row" id="ajax-categories">
                    <label class="col-md-12 text-center mt-5"><?php echo e(translate('select_your_desire_category.')); ?></label>
                </div>
                <!-- Pagination-->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function () {
            $('.card-header').click(function() {
                $('.card-header').removeClass('active');
                $(this).addClass('active');
            });

        });
        function get_categories(route) {
            $.get({
                url: route,
                dataType: 'json',
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (response) {
                    $('html,body').animate({scrollTop: $("#ajax-categories").offset().top}, 'slow');
                    $('#ajax-categories').html(response.view);
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/themes/default/web-views/categories.blade.php ENDPATH**/ ?>