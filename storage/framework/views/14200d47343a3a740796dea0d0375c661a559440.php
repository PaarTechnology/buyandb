<?php $__env->startSection('title', translate('product_Report')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">

        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex gap-2 align-items-center">
                <img width="20" src="<?php echo e(asset('/public/assets/back-end/img/seller_sale.png')); ?>" alt="">
                <?php echo e(translate('product_Report')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Inlile Menu -->
        <?php echo $__env->make('admin-views.report.product-report-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Inlile Menu -->

        <div class="card mb-2">
            <div class="card-body">
                <form action="" id="form-data" method="GET">
                    <h4 class="mb-3"><?php echo e(translate('filter_Data')); ?></h4>
                    <div class="row gx-2 gy-3 align-items-center text-left">
                        <div class="col-sm-6 col-md-3">
                            <select
                                class="js-select2-custom form-control text-ellipsis"
                                name="seller_id">
                                <option value="all" <?php echo e($seller_id == 'all' ? 'selected' : ''); ?>><?php echo e(translate('all')); ?></option>
                                <option value="in_house" <?php echo e($seller_id == 'in_house' ? 'selected' : ''); ?>><?php echo e(translate('in-House')); ?></option>
                                <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($seller['id']); ?>" <?php echo e($seller_id == $seller['id'] ? 'selected' : ''); ?>>
                                        <?php echo e($seller['f_name']); ?> <?php echo e($seller['l_name']); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <select class="js-select2-custom form-control __form-control" name="category_id" id="cat_id">
                                <option value="all" <?php echo e($category_id == 'all' ? 'selected' : ''); ?>><?php echo e(translate('all_category')); ?></option>
                                <?php $__currentLoopData = \App\Model\Category::where(['position'=>0])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category['id']); ?>" <?php echo e($category_id == $category['id'] ? 'selected' : ''); ?>><?php echo e($category['default_name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="">
                                <select
                                    class="form-control"
                                    name="sort">
                                    <option value="ASC" <?php echo e($sort == 'ASC' ? 'selected' : ''); ?>><?php echo e(translate('stock_sort_by_(low_to_high)')); ?></option>
                                    <option value="DESC" <?php echo e($sort == 'DESC' ? 'selected' : ''); ?>><?php echo e(translate('stock_sort_by_(high_to_low)')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <button type="submit" class="btn btn--primary w-100">
                                <?php echo e(translate('filter')); ?>

                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex flex-wrap w-100 gap-3 align-items-center">
                    <h4 class="mb-0 mr-auto">
                        <?php echo e(translate('total_Products')); ?>

                        <span class="badge badge-soft-dark radius-50 fz-12"><?php echo e($products->total()); ?></span>
                    </h4>
                    <form action="" method="GET">
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-custom">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tio-search"></i>
                                </div>
                            </div>
                            <input type="hidden" value="<?php echo e($seller_id); ?>" name="seller_id">
                            <input type="hidden" value="<?php echo e($category_id); ?>" name="category_id">
                            <input type="hidden" value="<?php echo e($sort); ?>" name="sort">
                            <input id="datatableSearch_" type="search" name="search" class="form-control"
                                   placeholder="<?php echo e(translate('search_Product_Name')); ?>" aria-label="Search orders" value="<?php echo e($search); ?>">
                            <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                        </div>
                        <!-- End Search -->
                    </form>
                    <div>
                        <button type="button" class="btn btn-outline--primary text-nowrap btn-block" data-toggle="dropdown">
                            <i class="tio-download-to"></i>
                            <?php echo e(translate('export')); ?>

                            <i class="tio-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('admin.stock.product-stock-export', ['sort' => request('sort'), 'category_id' => request('category_id'), 'seller_id' => request('seller_id'), 'search' => request('search')])); ?>">
                                    <img width="14" src="<?php echo e(asset('/public/assets/back-end/img/excel.png')); ?>" alt="">
                                    <?php echo e(translate('excel')); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive" id="products-table">
                    <table class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100 <?php echo e(Session::get('direction') === "rtl" ? 'text-right' : 'text-left'); ?>">
                        <thead class="thead-light thead-50 text-capitalize">
                        <tr>
                            <th><?php echo e(translate('SL')); ?></th>
                            <th>
                                <?php echo e(translate('product_Name')); ?>

                            </th>
                            <th>
                                <?php echo e(translate('last_Updated_Stock')); ?>

                            </th>
                            <th class="text-center">
                                <?php echo e(translate('current_Stock')); ?>

                            </th>
                            <th class="text-center">
                                <?php echo e(translate('status')); ?>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td scope="row"><?php echo e($products->firstItem()+$key); ?></td>
                                <td>
                                    <div class="p-name">
                                        <a href="<?php echo e(route('admin.product.view',[$data['id']])); ?>" class="media align-items-center gap-2 title-color">
                                            <span><?php echo e(\Illuminate\Support\Str::limit($data['name'],20)); ?></span>
                                        </a>
                                    </div>
                                </td>
                                <td><?php echo e(date('d M Y, h:i:s a', $data['updated_at'] ? strtotime($data['updated_at']) : null)); ?></td>
                                <td class="text-center"><?php echo e($data['current_stock']); ?></td>
                                <td>
                                    <div class="text-center">
                                        <?php if($data['current_stock'] >= $stock_limit): ?>
                                            <span class="badge __badge badge-soft-success"><?php echo e(translate('in-Stock')); ?></span>
                                        <?php elseif($data['current_stock']  <= 0): ?>
                                            <span class="badge __badge badge-soft-warning"><?php echo e(translate('out_of_Stock')); ?></span>
                                        <?php elseif($data['current_stock'] < $stock_limit): ?>
                                            <span class="badge __badge badge-soft--primary"><?php echo e(translate('soon_Stock_Out')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($products)==0): ?>
                            <tr>
                                <td colspan="5">
                                    <div class="text-center p-4">
                                        <img class="mb-3 w-160" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg"
                                             alt="Image Description">
                                        <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive mt-4">
                    <div class="px-4 d-flex justify-content-center justify-content-md-end">
                        <!-- Pagination -->
                        <?php echo $products->links(); ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Stats -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/report/product-stock.blade.php ENDPATH**/ ?>