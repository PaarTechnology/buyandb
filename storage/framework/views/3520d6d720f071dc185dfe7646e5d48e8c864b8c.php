<?php $__env->startSection('title',$seller->shop ? $seller->shop->name : translate("shop_name_not_found")); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex gap-2 align-items-center">
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
                        <div class="flex-between">
                            <div class="mx-1"><h4><i class="tio-shop-outlined"></i></h4></div>
                            <div><h4><?php echo e(translate('seller_request_for_open_a_shop.')); ?></h4></div>
                        </div>
                        <div class="text-center">
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="approved">
                                <button type="submit"
                                        class="btn btn--primary btn-sm"><?php echo e(translate('approve')); ?></button>
                            </form>
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit"
                                        class="btn btn-danger btn-sm"><?php echo e(translate('reject')); ?></button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- Page Header -->
        <div class="page-header">
            <div class="flex-between row mx-1">
                <div>
                    <h1 class="page-header-title"><?php echo e($seller->shop ? $seller->shop->name : translate("shop_Name")." : ".translate("update_Please")); ?></h1>
                </div>
            </div>
            <!-- Nav Scroller -->
            <div class="js-nav-scroller hs-nav-scroller-horizontal">
                <!-- Nav -->
                <ul class="nav nav-tabs flex-wrap page-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link "
                           href="<?php echo e(route('admin.sellers.view',$seller->id)); ?>"><?php echo e(translate('shop')); ?></a>
                    </li>
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
                        <a class="nav-link active"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'review'])); ?>"><?php echo e(translate('review')); ?></a>
                    </li>
                </ul>
                <!-- End Nav -->
            </div>
            <!-- End Nav Scroller -->
        </div>
        <!-- End Page Header -->
        <div class="content container-fluid p-0">
            <!-- End Page Header -->
            <div class="row gx-2 gx-lg-3">
                <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                    <!-- Card -->
                    <div class="card">
                        <!-- Header -->
                        <div class="px-3 py-4">
                            <div class="row align-items-center">
                                <div class="col-sm-4 col-md-6 col-lg-8 mb-3 mb-sm-0">
                                    <h5 class="mb-0 d-flex gap-1 align-items-center">
                                        <?php echo e(translate('review_table')); ?>

                                        <span
                                            class="badge badge-soft-dark radius-50 fz-12"><?php echo e($reviews->total()); ?></span>
                                    </h5>
                                </div>
                                <div class="col-sm-8 col-md-6 col-lg-4">
                                    <form action="<?php echo e(url()->current()); ?>" method="GET">
                                        <!-- Search -->
                                        <div class="input-group input-group-merge input-group-custom">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tio-search"></i>
                                                </div>
                                            </div>
                                            <input id="datatableSearch_" type="search" name="search"
                                                   class="form-control"
                                                   placeholder="<?php echo e(translate('search_by_product_name')); ?>" aria-label="Search orders"
                                                   value="<?php echo e($search); ?>">
                                            <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                                        </div>
                                        <!-- End Search -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <div class="table-responsive datatable-custom">
                            <table id="columnSearchDatatable"
                                   style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                   class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                                <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th><?php echo e(translate('SL')); ?></th>
                                    <th><?php echo e(translate('product')); ?></th>
                                    <th><?php echo e(translate('review')); ?></th>
                                    <th><?php echo e(translate('rating')); ?></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($reviews->firstItem()+ $key); ?></td>
                                        <td>
                                        <span class="d-block font-size-sm text-body">
                                            <a href="<?php echo e(route('admin.product.view',[$review->product['id']])); ?>"
                                                class="title-color hover-c1">
                                                <?php echo e($review->product?$review->product['name']: translate('product_not_found')); ?>

                                            </a>
                                        </span>
                                        </td>

                                        <td>
                                            <p class="text-wrap mb-1">
                                                <?php echo e($review->comment?$review->comment: translate("no_Comment_Found")); ?>

                                            </p>
                                            <?php if($review->attachment): ?>
                                                <?php $__currentLoopData = json_decode($review->attachment); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(asset('storage/app/public/review')); ?>/<?php echo e($img); ?>"
                                                        data-lightbox="mygallery">
                                                        <img class="p-1" width="60" height="60"
                                                                src="<?php echo e(asset('storage/app/public/review')); ?>/<?php echo e($img); ?>"
                                                                alt="" onerror="this.src='<?php echo e(asset('public/assets/back-end/img/image-place-holder.png')); ?>'">
                                                    </a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <label class="mb-0 badge badge-soft-info">
                                                <?php echo e($review->rating); ?> <i class="tio-star"></i>
                                            </label>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>

                        </div>
                        <!-- End Table -->

                        <div class="table-responsive mt-4">
                            <div class="px-4 d-flex justify-content-lg-end">
                                <!-- Pagination -->
                                <?php echo e($reviews->links()); ?>

                            </div>
                        </div>

                        <?php if(count($reviews)==0): ?>
                            <div class="text-center p-4">
                                <img class="mb-3 w-160"
                                     src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg"
                                     alt="Image Description">
                                <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                            </div>
                    <?php endif; ?>
                    <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/seller/view/review.blade.php ENDPATH**/ ?>