<?php $__env->startSection('title',$seller->shop ? $seller->shop->name : translate("shop_name_not_found")); ?>

<?php $__env->startPush('css_or_js'); ?>

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

        <!-- Page Heading -->
        <div class="flex-between d-sm-flex row align-items-center justify-content-between mb-2 mx-1">
            <div>
                <?php if($seller->status=="pending"): ?>
                    <div class="mt-4 pr-2">
                        <div class="flex-start">
                            <div class="mx-1"><h4><i class="tio-shop-outlined"></i></h4></div>
                            <div><h4><?php echo e(translate('seller_request_for_open_a_shop')); ?>.</h4></div>
                        </div>
                        <div class="text-center">
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" class="btn btn--primary btn-sm"><?php echo e(translate('approve')); ?></button>
                            </form>
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="btn btn-danger btn-sm"><?php echo e(translate('reject')); ?></button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Page Header -->
        <div class="page-header">
            <div class="flex-between mx-1 row">
                <div>
                    <h1 class="page-header-title"><?php echo e($seller->shop ? $seller->shop->name : translate("shop_Name")." : ".translate("update_Please")); ?></h1>
                </div>

            </div>
            <!-- Nav Scroller -->
            <div class="js-nav-scroller hs-nav-scroller-horizontal">
                <!-- Nav -->
                <ul class="nav nav-tabs flex-wrap page-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo e(route('admin.sellers.view',$seller->id)); ?>"><?php echo e(translate('shop')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'order'])); ?>"><?php echo e(translate('order')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'product'])); ?>"><?php echo e(translate('product')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"
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

                </ul>
                <!-- End Nav -->
            </div>
            <!-- End Nav Scroller -->
        </div>
        <!-- End Page Header -->

        <div class="row g-3">
            <div class="col-md-6">
                <form action="<?php echo e(url()->current()); ?>"
                      style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                      method="GET">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"> <?php echo e(translate('sales_Commission')); ?> : </h5>

                            <label class="switcher" for="commission_status">
                                <input type="checkbox" class="switcher_input" value="1" name="commission_status" id="commission_status" <?php echo e($seller['sales_commission_percentage'] !=null ? 'checked':''); ?> onclick="toogleModal(event,'commission_status','general-icon.png','general-icon.png','<?php echo e(translate('want_to_Turn_ON_Sales_Commission_For_This_Seller')); ?>?','<?php echo e(translate('want_to_Turn_OFF_Sales_Commission_For_This_Seller')); ?>?',`<p><?php echo e(translate('if_sales_commission_is_enabled_here_the_this_commission_will_be_applied')); ?></p>`,`<p><?php echo e(translate('if_sales_commission_is_disabled_here_the_system_default_commission_will_be_applied')); ?></p>`)">
                                <span class="switcher_control"></span>
                            </label>
                        </div>
                        <div class="card-body">
                            <small class="badge badge-soft-info text-wrap mb-3">
                                <?php echo e(translate('if_sales_commission_is_disabled_here_the_system_default_commission_will_be_applied')); ?>.
                            </small>
                            <div class="form-group">
                                <label><?php echo e(translate('commission')); ?> ( % )</label>
                                <input type="number" value="<?php echo e($seller['sales_commission_percentage']); ?>"
                                       class="form-control" name="commission">
                            </div>
                            <button type="submit" class="btn btn--primary"><?php echo e(translate('update')); ?></button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <form action="<?php echo e(url()->current()); ?>"
                      style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                      method="GET">
                    <?php echo csrf_field(); ?>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"> <?php echo e(translate('GST_Number')); ?> : </h5>

                            <label class="switcher" for="gst_status">
                                <input type="checkbox" class="switcher_input" value="1" name="gst_status" id="gst_status" <?php echo e($seller['gst'] !=null ? 'checked':''); ?> onclick="toogleModal(event,'gst_status','general-icon.png','general-icon.png','<?php echo e(translate('want_to_Turn_ON_GST_Number_For_This_Seller')); ?>?','<?php echo e(translate('want_to_Turn_OFF_GST_Number_For_This_Seller')); ?>?',`<p><?php echo e(translate('if_GST_number_is_enabled_here_it_will_be_show_in_invoice')); ?></p>`,`<p><?php echo e(translate('if_GST_number_is_disabled_here_it_will_not_show_in_invoice')); ?></p>`)">
                                <span class="switcher_control"></span>
                            </label>

                        </div>
                        <div class="card-body">
                            <small class="badge text-wrap badge-soft-info mb-3">
                                <?php echo e(translate('if_GST_number_is_disabled_here_it_will_not_show_in_invoice')); ?>.
                            </small>
                            <div class="form-group">
                                <label> <?php echo e(translate('number')); ?>  </label>
                                <input type="text" value="<?php echo e($seller['gst']); ?>"
                                       class="form-control" name="gst">
                            </div>
                            <button type="submit" class="btn btn--primary"><?php echo e(translate('update')); ?> </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><?php echo e(translate('seller_POS')); ?></h5>
                    </div>

                    <div class="card-body">
                        <form action="<?php echo e(url()->current()); ?>" method="GET">
                            <input type="hidden" name="seller_pos_update" value="1">
                            <div class="form-group">
                                <div class="d-flex justify-content-between align-items-center gap-10 form-control">
                                    <span class="title-color">
                                        <?php echo e(translate('Seller_POS_Permission')); ?>

                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right" title="<?php echo e(translate('if_enabled_this_seller_can_access_POS_from_the_website_and_seller_app')); ?>">
                                            <img width="16" src="<?php echo e(asset('/public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                        </span>
                                    </span>

                                    <label class="switcher" for="seller_pos">
                                        <input type="checkbox" class="switcher_input" value="1" name="seller_pos" id="seller_pos" <?php echo e($seller['pos_status'] == 1 ? 'checked':''); ?> onclick="toogleModal(event,'seller_pos','pos-seller-on.png','pos-seller-off.png','<?php echo e(translate('want_to_Turn_ON_POS_For_This_Seller')); ?>?','<?php echo e(translate('want_to_Turn_OFF_POS_For_This_Seller')); ?>?',`<p><?php echo e(translate('if_enabled_this_seller_can_access_POS_from_the_website_and_seller_app')); ?></p>`,`<p><?php echo e(translate('if_disabled_this_seller_cannot_access_POS_from_the_website_and_seller_app')); ?></p>`)">
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn--primary"><?php echo e(translate('save')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/seller/view/setting.blade.php ENDPATH**/ ?>