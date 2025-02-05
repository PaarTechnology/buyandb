<div class="container rtl pb-4 pt-3 px-0 px-md-3">
    <div class="shipping-policy-web">
        <div class="row g-3 justify-content-center mx-max-md-0">
            <?php $__currentLoopData = $company_reliability; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($value['status'] == 1 && !empty($value['title'])): ?>
                    <div class="col-md-3 d-flex justify-content-center px-max-md-0">
                        <div class="shipping-method-system">
                            <div class="text-center">
                                <img class="<?php echo e(Session::get('direction') === "rtl" ? 'float-right ml-2' : 'mr-2'); ?> size-60"  src="<?php echo e(asset("/storage/app/public/company-reliability").'/'.$value['image']); ?>"
                                    onerror="this.src='<?php echo e(asset('/public/assets/front-end/img').'/'.$value['item'].'.png'); ?>'"
                                        alt="">
                            </div>
                            <div class="text-center">
                                <p class="m-0">
                                    <?php echo e($value['title']); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/buyandb/public_html/resources/themes/default/web-views/partials/_company-reliability.blade.php ENDPATH**/ ?>