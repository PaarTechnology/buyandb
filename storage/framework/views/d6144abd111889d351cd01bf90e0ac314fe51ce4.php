<?php $__env->startSection('title', $seller->shop? $seller->shop->name : translate("shop_Name")); ?>

<?php $__env->startPush('css_or_js'); ?>
<style>
    .pair-list > div{
        flex-wrap: wrap;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('/public/assets/back-end/img/add-new-seller.png')); ?>" alt="">
                <?php echo e(translate('seller_details')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Page Header -->
        <div class="page-header border-0 mb-4">
            <!-- Nav Scroller -->
            <div class="js-nav-scroller hs-nav-scroller-horizontal">
                <!-- Nav -->
                <ul class="nav nav-tabs flex-wrap page-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active"
                           href="<?php echo e(route('admin.sellers.view',$seller->id)); ?>"><?php echo e(translate('shop_overview')); ?></a>
                    </li>
                    <?php if($seller->status!="pending"): ?>
                        <li class="nav-item">
                            <a class="nav-link"
                            href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'order'])); ?>"><?php echo e(translate('order')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                            href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'product'])); ?>"><?php echo e(translate('product')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                            href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'setting'])); ?>"><?php echo e(translate('setting')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                            href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'transaction'])); ?>"><?php echo e(translate('transaction')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                            href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'review'])); ?>"><?php echo e(translate('review')); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
                <!-- End Nav -->
            </div>
            <!-- End Nav Scroller -->
        </div>
        <!-- End Page Header -->

        <div class="card card-top-bg-element mb-5">
            <div class="card-body">
                <div class="d-flex flex-wrap gap-3 justify-content-between">
                    <div class="media flex-column flex-sm-row gap-3">
                        <img class="avatar avatar-170 rounded-0"
                            onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                            src="<?php echo e(asset('storage/app/public/shop/'.$seller->shop->image)); ?>"alt="image">

                        <div class="media-body">
                            <?php if($seller->shop->temporary_close || ($seller->shop->vacation_status && $current_date >= date('Y-m-d', strtotime($seller->shop->vacation_start_date)) && $current_date <= date('Y-m-d', strtotime($seller->shop->vacation_end_date)))): ?>
                                <div class="d-flex justify-content-between gap-2 mb-4">
                                    <?php if($seller->shop->temporary_close): ?>
                                        <div class="btn btn-soft-danger"><?php echo e(translate('this_shop_currently_close_now')); ?> </div>
                                    <?php elseif($seller->shop->vacation_status && $current_date >= date('Y-m-d', strtotime($seller->shop->vacation_start_date)) && $current_date <= date('Y-m-d', strtotime($seller->shop->vacation_end_date))): ?>
                                        <div class="btn btn-soft-danger"><?php echo e(translate('this_shop_currently_on_vacation')); ?> </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <div class="d-block">
                                <h2 class="mb-2 pb-1"><?php echo e($seller->shop? $seller->shop->name : translate("shop_Name")." : ".translate("update_Please")); ?></h2>
                                <div class="d-flex gap-3 flex-wrap mb-3 lh-1">
                                    <div class="review-hover position-relative cursor-pointer d-flex gap-2 align-items-center">
                                        <i class="tio-star"></i>
                                        <span><?php echo e(round($seller->average_rating, 1)); ?></span>

                                        <div class="review-details-popup">
                                            <h6 class="mb-2"><?php echo e(translate('rating')); ?></h6>
                                            <div class="">
                                                <ul class="list-unstyled list-unstyled-py-2 mb-0">
                                                    <!-- Review Ratings -->
                                                    <li class="d-flex align-items-center font-size-sm">
                                                        <span class="mr-3">5 <?php echo e(translate('star')); ?></span>
                                                            <div class="progress flex-grow-1">
                                                                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        <span class="ml-3"><?php echo e($seller->single_rating_5); ?></span>
                                                    </li>
                                                    <!-- End Review Ratings -->

                                                    <!-- Review Ratings -->
                                                    <li class="d-flex align-items-center font-size-sm">
                                                        <span class="mr-3">4 <?php echo e(translate('star')); ?></span>
                                                            <div class="progress flex-grow-1">
                                                                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        <span class="ml-3"><?php echo e($seller->single_rating_4); ?></span>
                                                    </li>
                                                    <!-- End Review Ratings -->

                                                    <!-- Review Ratings -->
                                                    <li class="d-flex align-items-center font-size-sm">
                                                        <span class="mr-3">3 <?php echo e(translate('star')); ?></span>
                                                            <div class="progress flex-grow-1">
                                                                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        <span class="ml-3"><?php echo e($seller->single_rating_3); ?></span>
                                                    </li>
                                                    <!-- End Review Ratings -->

                                                    <!-- Review Ratings -->
                                                    <li class="d-flex align-items-center font-size-sm">
                                                        <span class="mr-3">2 <?php echo e(translate('star')); ?></span>
                                                            <div class="progress flex-grow-1">
                                                                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        <span class="ml-3"><?php echo e($seller->single_rating_2); ?></span>
                                                    </li>
                                                    <!-- End Review Ratings -->

                                                    <!-- Review Ratings -->
                                                    <li class="d-flex align-items-center font-size-sm">
                                                        <span class="mr-3">1 <?php echo e(translate('star')); ?></span>
                                                            <div class="progress flex-grow-1">
                                                                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        <span class="ml-3"><?php echo e($seller->single_rating_1); ?></span>
                                                    </li>
                                                    <!-- End Review Ratings -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="border-left"></span>
                                    <a href="javascript:" class="text-dark"><?php echo e($seller->total_rating); ?> <?php echo e(translate('ratings')); ?></a>
                                    <span class="border-left"></span>
                                    <a href="<?php echo e($seller->status!="pending" ? route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'review']): 'javascript:'); ?>" class="text-dark"><?php echo e($seller->rating_count); ?> <?php echo e(translate('reviews')); ?></a>
                                </div>
                                <?php if( $seller->status!="pending" && $seller->status!="suspended" && $seller->status!="rejected"): ?>
                                    <a href="<?php echo e(route('shopView',['id'=>$seller->id])); ?>" class="btn btn-outline--primary px-4" target="_blank"><i class="tio-globe"></i> <?php echo e(translate('view_live')); ?>

                                <?php endif; ?>
                                </a>
                            </div>
                        </div>
                    </div>

                    <?php if($seller->status=="pending"): ?>
                        <div class="d-flex justify-content-sm-end flex-wrap gap-2 mb-3">
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit"
                                        class="btn btn-danger px-5"><?php echo e(translate('reject')); ?></button>
                            </form>
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="approved">
                                <button type="submit"
                                        class="btn btn-success px-5"><?php echo e(translate('approve')); ?></button>
                            </form>
                        </div>
                    <?php endif; ?>
                    <?php if($seller->status=="approved"): ?>
                        <div class="d-flex justify-content-sm-end flex-wrap gap-2 mb-3">
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="suspended">
                                <button type="submit"
                                        class="btn btn-danger px-5"><?php echo e(translate('suspend_this_seller')); ?></button>
                            </form>
                        </div>
                    <?php endif; ?>
                    <?php if($seller->status=="suspended" || $seller->status=="rejected"): ?>
                        <div class="d-flex justify-content-sm-end flex-wrap gap-2 mb-3">
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="approved">
                                <button type="submit"
                                        class="btn btn-success px-5"><?php echo e(translate('active')); ?></button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>

                <hr>

                <div class="d-flex gap-3 flex-wrap flex-lg-nowrap">
                    <div class="border p-3 w-170">
                        <div class="d-flex flex-column mb-1">
                            <h6 class="font-weight-normal"><?php echo e(translate('total_products')); ?> :</h6>
                            <h3 class="text-primary fs-18"><?php echo e($seller->product_count); ?></h3>
                        </div>
                        <div class="d-flex flex-column">
                            <h6 class="font-weight-normal"><?php echo e(translate('total_orders')); ?> :</h6>
                            <h3 class="text-primary fs-18"><?php echo e($seller->orders_count); ?></h3>
                        </div>
                    </div>

                    <div class="row gy-3 flex-grow-1 w-100">
                        <div class="col-sm-6 col-xxl-3">
                            <h4 class="mb-3 text-capitalize"><?php echo e(translate('shop_information')); ?></h4>

                            <div class="pair-list">
                                <div>
                                    <span class="key text-nowrap"><?php echo e(translate('shop_name')); ?></span>
                                    <span>:</span>
                                    <span class="value "><?php echo e($seller->shop->name); ?></span>
                                </div>

                                <div>
                                    <span class="key"><?php echo e(translate('phone')); ?></span>
                                    <span>:</span>
                                    <span class="value"><?php echo e($seller->shop->contact); ?></span>
                                </div>

                                <div>
                                    <span class="key"><?php echo e(translate('address')); ?></span>
                                    <span>:</span>
                                    <span class="value"><?php echo e($seller->shop->address); ?></span>
                                </div>

                                <div>
                                    <span class="key"><?php echo e(translate('status')); ?></span>
                                    <span>:</span>
                                    <span class="value">
                                        <span class="badge badge-<?php echo e($seller->status=='approved'? 'info' :'danger'); ?>">
                                            <?php echo e($seller->status=='approved'? translate('active') : translate('inactive')); ?>

                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xxl-3">
                            <h4 class="mb-3 text-capitalize"><?php echo e(translate('seller_information')); ?></h4>

                            <div class="pair-list">
                                <div>
                                    <span class="key"><?php echo e(translate('name')); ?></span>
                                    <span>:</span>
                                    <span class="value"><?php echo e($seller->f_name); ?> <?php echo e($seller->l_name); ?></span>
                                </div>

                                <div>
                                    <span class="key"><?php echo e(translate('email')); ?></span>
                                    <span>:</span>
                                    <span class="value"><?php echo e($seller->email); ?></span>
                                </div>

                                <div>
                                    <span class="key"><?php echo e(translate('phone')); ?></span>
                                    <span>:</span>
                                    <span class="value"><?php echo e($seller->phone); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php if($seller->status!="pending"): ?>
                            <div class="col-xxl-6">
                                <div class="bg-light p-3 border border-primary-light rounded">
                                    <h4 class="mb-3 text-capitalize"><?php echo e(translate('bank_information')); ?></h4>

                                    <div class="d-flex gap-5">
                                        <div class="pair-list">
                                            <div>
                                                <span class="key text-nowrap"><?php echo e(translate('bank_name')); ?></span>
                                                <span class="px-2">:</span>
                                                <span class="value "><?php echo e($seller->bank_name ? $seller->bank_name : translate('no_data_found')); ?></span>
                                            </div>

                                            <div>
                                                <span class="key text-nowrap"><?php echo e(translate('branch')); ?></span>
                                                <span class="px-2">:</span>
                                                <span class="value"><?php echo e($seller->branch ? $seller->branch : translate('no_data_found')); ?></span>
                                            </div>
                                        </div>
                                        <div class="pair-list">
                                            <div>
                                                <span class="key text-nowrap"><?php echo e(translate('holder_name')); ?></span>
                                                <span class="px-2">:</span>
                                                <span class="value"><?php echo e($seller->holder_name ? $seller->holder_name : translate('no_data_found')); ?></span>
                                            </div>

                                            <div>
                                                <span class="key text-nowrap"><?php echo e(translate('A/C_No')); ?></span>
                                                <span class="px-2">:</span>
                                                <span class="value"><?php echo e($seller->account_no ? $seller->account_no : translate('no_data_found')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if($seller->status!="pending"): ?>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row justify-content-between align-items-center g-2 mb-3">
                        <div class="col-sm-6">
                            <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
                                <img width="20" class="mb-1" src="<?php echo e(asset('/public/assets/back-end/img/admin-wallet.png')); ?>" alt="">
                                <?php echo e(translate('seller_Wallet')); ?>

                            </h4>
                        </div>
                    </div>

                    <div class="row g-2" id="order_stats">
                        <div class="col-lg-4">
                            <!-- Card -->
                            <div class="card h-100 d-flex justify-content-center align-items-center">
                                <div class="card-body d-flex flex-column gap-10 align-items-center justify-content-center">
                                    <img width="48" class="mb-2" src="<?php echo e(asset('/public/assets/back-end/img/withdraw.png')); ?>" alt="">
                                    <h3 class="for-card-count mb-0 fz-24"><?php echo e($seller->wallet ? \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($seller->wallet->total_earning)) : 0); ?></h3>
                                    <div class="font-weight-bold text-capitalize mb-30">
                                        <?php echo e(translate('withdrawable_balance')); ?>

                                    </div>
                                    
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <div class="col-lg-8">
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <div class="card card-body h-100 justify-content-center">
                                        <div class="d-flex gap-2 justify-content-between align-items-center">
                                            <div class="d-flex flex-column align-items-start">
                                                <h3 class="mb-1 fz-24"><?php echo e($seller->wallet ? \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($seller->wallet->pending_withdraw)) : 0); ?></h3>
                                                <div class="text-capitalize mb-0"><?php echo e(translate('pending_Withdraw')); ?></div>
                                            </div>
                                            <div>
                                                <img width="40" class="mb-2" src="<?php echo e(asset('/public/assets/back-end/img/pw.png')); ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-body h-100 justify-content-center">
                                        <div class="d-flex gap-2 justify-content-between align-items-center">
                                            <div class="d-flex flex-column align-items-start">
                                                <h3 class="mb-1 fz-24"><?php echo e($seller->wallet ? \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($seller->wallet->commission_given)) : 0); ?></h3>
                                                <div class="text-capitalize mb-0"><?php echo e(translate('total_Commission_given')); ?></div>
                                            </div>
                                            <div>
                                                <img width="40" src="<?php echo e(asset('/public/assets/back-end/img/tcg.png')); ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-body h-100 justify-content-center">
                                        <div class="d-flex gap-2 justify-content-between align-items-center">
                                            <div class="d-flex flex-column align-items-start">
                                                <h3 class="mb-1 fz-24"><?php echo e($seller->wallet ? \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($seller->wallet->withdrawn)) : 0); ?></h3>
                                                <div class="text-capitalize mb-0"><?php echo e(translate('aready_Withdrawn')); ?></div>
                                            </div>
                                            <div>
                                                <img width="40" src="<?php echo e(asset('/public/assets/back-end/img/aw.png')); ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-body h-100 justify-content-center">
                                        <div class="d-flex gap-2 justify-content-between align-items-center">
                                            <div class="d-flex flex-column align-items-start">
                                                <h3 class="mb-1 fz-24"><?php echo e($seller->wallet ? \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($seller->wallet->delivery_charge_earned)) : 0); ?></h3>
                                                <div class="text-capitalize mb-0"><?php echo e(translate('total_delivery_charge_earned')); ?></div>
                                            </div>
                                            <div>
                                                <img width="40" src="<?php echo e(asset('/public/assets/back-end/img/tdce.png')); ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-body h-100 justify-content-center">
                                        <div class="d-flex gap-2 justify-content-between align-items-center">
                                            <div class="d-flex flex-column align-items-start">
                                                <h3 class="mb-1 fz-24"><?php echo e($seller->wallet ? \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($seller->wallet->total_tax_collected)) : 0); ?></h3>
                                                <div class="text-capitalize mb-0"><?php echo e(translate('total_tax_given')); ?></div>
                                            </div>
                                            <div>
                                                <img width="40" src="<?php echo e(asset('/public/assets/back-end/img/ttg.png')); ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-body h-100 justify-content-center">
                                        <div class="d-flex gap-2 justify-content-between align-items-center">
                                            <div class="d-flex flex-column align-items-start">
                                                <h3 class="mb-1 fz-24"><?php echo e($seller->wallet ? \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($seller->wallet->collected_cash)) : 0); ?></h3>
                                                <div class="text-capitalize mb-0"><?php echo e(translate('collected_cash')); ?></div>
                                            </div>
                                            <div>
                                                <img width="40" src="<?php echo e(asset('/public/assets/back-end/img/cc.png')); ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/seller/view.blade.php ENDPATH**/ ?>