<?php $__env->startSection('title', translate('inhouse_product_sale Report')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">

        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(asset('/public/assets/back-end/img/inhouse_sale.png')); ?>" alt="">
                <?php echo e(translate('inhouse_sale')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <form class="w-100" action="<?php echo e(route('admin.report.inhoue-product-sale')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row gy-2 align-items-center">
                                <div class="col-sm-9">
                                    <div class="d-flex align-items-center gap-10">
                                        <label for="exampleInputEmail1" class="title-color mb-0"><?php echo e(translate('category')); ?></label>
                                        <select
                                            class="js-select2-custom form-control"
                                            name="category_id">
                                            <option value="all"><?php echo e(translate('all')); ?></option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($c['id']); ?>" <?php echo e($category_id==$c['id']? 'selected': ''); ?>>
                                                    <?php echo e($c['name']); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn--primary btn-block">
                                        <?php echo e(translate('filter')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                        <table class="table table-hover table-borderless table-thead-bordered table-align-middle card-table w-100">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(translate('SL')); ?> </th>
                                <th>
                                    <?php echo e(translate('product_Name')); ?>

                                </th>
                                <th class="text-center">
                                    <?php echo e(translate('total_Sale')); ?>

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($data['name']); ?></td>
                                    <td class="text-center"><?php echo e($data->order_delivered->sum('qty')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-lg-end">
                            <!-- Pagination -->
                            <?php echo $products->links(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Stats -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('script_2'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/report/inhouse-product-sale.blade.php ENDPATH**/ ?>