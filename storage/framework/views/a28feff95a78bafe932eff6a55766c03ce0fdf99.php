<?php if(count($products) > 0): ?>
<ul class="list-group list-unstyled gap-3">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li>
        <div class="media gap-3 border-bottom pb-2 cursor-pointer" onclick="$('.search-bar-input-mobile').val('<?php echo e($product['name']); ?>'); $('.search-bar-input').val('<?php echo e($product['name']); ?>'); quickView('<?php echo e($product->id); ?>')">
                <img class="avatar avatar-xl border" width="75" onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>" alt="">
                <div class="media-body d-flex flex-column gap-1">
                    <h6 class="fz-13 mb-1 text-truncate custom-width"><?php echo e($product['name']); ?></h6>
                    <div class="fz-10"><?php echo e(translate('category')); ?>: <?php echo e($product->category->name ?? 'N/a'); ?></div>
                    <div class="fz-10"><?php echo e(translate('brand_Name')); ?>: <?php echo e($product->brand->name); ?></div>
                    <?php if($product->added_by == 'admin'): ?>
                    <div class="fz-10"><?php echo e(translate('seller')); ?>: <?php echo e($web_config['name']->value); ?></div>
                    <?php else: ?>
                    <div class="fz-10"><?php echo e(translate('seller')); ?>: <?php echo e(isset($product->seller) ? $product->seller->shop->name : translate('shop_not_found')); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php else: ?>

<div>
    <h5 class="m-0 text-muted"><?php echo e(translate('No_Product_Found')); ?></h5>
</div>

<?php endif; ?>
<?php /**PATH /home/buyandb/public_html/resources/views/admin-views/pos/_search-result.blade.php ENDPATH**/ ?>