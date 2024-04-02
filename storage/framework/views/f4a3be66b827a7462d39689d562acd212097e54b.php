<?php $__env->startSection('title', translate('seller_List')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-4">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('/public/assets/back-end/img/add-new-seller.png')); ?>" alt="">
                <?php echo e(translate('seller_List')); ?>

                <span class="badge badge-soft-dark radius-50 fz-12"><?php echo e($sellers->total()); ?></span>
            </h2>
        </div>
        <!-- End Page Title -->

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="d-flex justify-content-between gap-10 flex-wrap align-items-center">
                            <div class="">
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-merge input-group-custom">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                            placeholder="<?php echo e(translate('search_by_Name_or_Phone_or_Email')); ?>" aria-label="Search orders" value="<?php echo e($search); ?>">
                                        <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                                    </div>
                                </form>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <div class="dropdown text-nowrap">
                                    <button type="button" class="btn btn-outline--primary" data-toggle="dropdown">
                                        <i class="tio-download-to"></i>
                                        <?php echo e(translate('export')); ?>

                                        <i class="tio-chevron-down"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a type="submit" class="dropdown-item d-flex align-items-center gap-2 " href="<?php echo e(route('admin.sellers.export',['search' => $search])); ?>">
                                                <img width="14" src="<?php echo e(asset('/public/assets/back-end/img/excel.png')); ?>" alt="">
                                                <?php echo e(translate('excel')); ?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <a href="<?php echo e(route('admin.sellers.seller-add')); ?>" type="button" class="btn btn--primary text-nowrap">
                                    <i class="tio-add"></i>
                                    <?php echo e(translate('add_new_seller')); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table
                            style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                            class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(translate('SL')); ?></th>
                                <th><?php echo e(translate('shop_name')); ?></th>
                                <th><?php echo e(translate('seller_name')); ?></th>
                                <th><?php echo e(translate('contact_info')); ?></th>
                                <th><?php echo e(translate('status')); ?></th>
                                <th class="text-center"><?php echo e(translate('total_products')); ?></th>
                                <th class="text-center"><?php echo e(translate('total_orders')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($sellers->firstItem()+$key); ?></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-10 w-max-content">
                                            <img width="50"
                                            class="avatar rounded-circle"
                                                onerror="this.src='<?php echo e(asset('public/assets/back-end/img/400x400/img2.jpg')); ?>'"
                                                src="<?php echo e(asset('storage/app/public/shop')); ?>/<?php echo e($seller->shop->image); ?>"
                                                alt="">
                                            <div>
                                                <a class="title-color" href="<?php echo e(route('admin.sellers.view', ['id' => $seller->id])); ?>"><?php echo e(\Str::limit($seller->shop->name, 20)); ?></a>
                                                <br>
                                                <span class="text-danger">
                                                    <?php if($seller->shop->temporary_close): ?>
                                                        <?php echo e(translate('temporary_closed')); ?>

                                                    <?php elseif($seller->shop->vacation_status && $current_date >= date('Y-m-d', strtotime($seller->shop->vacation_start_date)) && $current_date <= date('Y-m-d', strtotime($seller->shop->vacation_end_date))): ?>
                                                        <?php echo e(translate('on_vacation')); ?>

                                                    <?php endif; ?>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a title="<?php echo e(translate('view')); ?>"
                                           class="title-color"
                                           href="<?php echo e(route('admin.sellers.view',$seller->id)); ?>">
                                            <?php echo e($seller->f_name); ?> <?php echo e($seller->l_name); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <div class="mb-1">
                                            <strong><a class="title-color hover-c1" href="mailto:<?php echo e($seller->email); ?>"><?php echo e($seller->email); ?></a></strong>
                                        </div>
                                        <a class="title-color hover-c1" href="tel:<?php echo e($seller->phone); ?>"><?php echo e($seller->phone); ?></a>
                                    </td>
                                    <td>
                                        <?php echo $seller->status=='approved'?'<label class="badge badge-success">'.translate('active').'</label>':'<label class="badge badge-danger">'.translate('inactive').'</label>'; ?>

                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo e(route('admin.sellers.product-list',[$seller['id']])); ?>"
                                           class="btn text--primary bg-soft--primary font-weight-bold px-3 py-1 mb-0 fz-12">
                                            <?php echo e($seller->product->count()); ?>

                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo e(route('admin.sellers.order-list',[$seller['id']])); ?>"
                                            class="btn text-info bg-soft-info font-weight-bold px-3 py-1 fz-12 mb-0">
                                            <?php echo e($seller->orders->where('seller_is','seller')->where('order_type','default_type')->count()); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a title="<?php echo e(translate('view')); ?>"
                                                class="btn btn-outline-info btn-sm square-btn"
                                                href="<?php echo e(route('admin.sellers.view',$seller->id)); ?>">
                                                <i class="tio-invisible"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-center justify-content-md-end">
                            <!-- Pagination -->
                            <?php echo $sellers->links(); ?>

                        </div>
                    </div>

                    <?php if(count($sellers)==0): ?>
                        <div class="text-center p-4">
                            <img class="mb-3 w-160" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg" alt="Image Description">
                            <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/seller/index.blade.php ENDPATH**/ ?>