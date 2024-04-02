<?php ($decimal_point_settings = \App\CPU\Helpers::get_business_settings('decimal_point_settings')); ?>

<div class="card">
    <?php if($wishlists->count()>0): ?>
        <div class="card-body p-2 p-sm-3">
            <div class="d-flex flex-column gap-10px">
            <?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($product = $wishlist->product_full_info); ?>
                <?php if( $wishlist->product_full_info): ?>
                    <div class="wishlist-item" id="row_id<?php echo e($product->id); ?>">
                        <div class="wishlist-img position-relative">
                            <a href="<?php echo e(route('product',$product->slug)); ?>" class="d-block h-100">
                                <img class="__img-full" src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                                onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'" alt="wishlist"
                                    >
                            </a>

                            <?php if($product->discount > 0): ?>
                                <span class="for-discoutn-value px-1">
                                    <?php if($product->discount_type == 'percent'): ?>
                                        <?php echo e(round($product->discount,(!empty($decimal_point_settings) ? $decimal_point_settings: 0))); ?>%
                                    <?php elseif($product->discount_type =='flat'): ?>
                                        <?php echo e(\App\CPU\Helpers::currency_converter($product->discount)); ?>

                                    <?php endif; ?>
                                </span>
                            <?php endif; ?>

                        </div>
                        <div class="wishlist-cont align-items-end align-items-sm-center">
                            <div class="wishlist-text">
                                <div class="font-name">
                                    <a href="<?php echo e(route('product',$product['slug'])); ?>"><?php echo e($product['name']); ?></a>
                                </div>
                                <?php if($brand_setting): ?>
                                    <span class="sellerName"> <?php echo e(translate('brand')); ?> : <span class="text-base"><?php echo e($product->brand?$product->brand['name']:''); ?></span> </span>
                                <?php endif; ?>

                                <div class=" mt-sm-1">
                                    <?php if($product->discount > 0): ?>
                                        <strike style="color: #9B9B9B;" class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-3'); ?>">
                                            <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?>

                                        </strike>
                                    <?php endif; ?>
                                    <span class="font-weight-bold amount text-dark"><?php echo e(\App\CPU\Helpers::get_price_range($product)); ?></span>
                                </div>
                            </div>
                            <a href="javascript:" onclick="removeWishlist('<?php echo e($product['id']); ?>', 'remove-wishlist-modal')" class="remove--icon">
                                <i class="fa fa-trash" style="color: red"></i>
                            </a>

                        </div>
                    </div>
                <?php else: ?>
                    <span class="badge badge-danger"><?php echo e(translate('item_removed')); ?></span>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    <?php else: ?>
        <div class="login-card">
            <div class="text-center py-3 text-capitalize">
                <img src="<?php echo e(asset('public/assets/front-end/img/icons/wishlist.png')); ?>" alt="" class="mb-4" width="70">
                <h5 class="fs-14"><?php echo e(translate('no_product_found_in_wishlist')); ?>!</h5>
            </div>
        </div>
    <?php endif; ?>
</div>

<div class="card-footer border-0"><?php echo e($wishlists->links()); ?></div>
<?php /**PATH /home/buyandb/public_html/resources/themes/default/web-views/partials/_wish-list-data.blade.php ENDPATH**/ ?>