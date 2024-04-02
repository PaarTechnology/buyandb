<?php $__env->startSection('title', $product->name . ' barcode ' . date('Y/m/d')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/barcode.css" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row m-2 show-div pt-3">
        <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
            <!-- Page Title -->
            <div class="mb-3">
                <h2 class="h1 mb-0 text-capitalize d-flex gap-2">
                    <img src="<?php echo e(asset('/public/assets/back-end/img/inhouse-product-list.png')); ?>" alt="">
                    <?php echo e(translate('generate_barcode')); ?>

                </h2>
            </div>
            <!-- End Page Title -->

            <div class="card">
                <div class="py-4">
                    <div class="table-responsive">
                        <table style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                            class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                            <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th><?php echo e(translate('code')); ?></th>
                                    <th><?php echo e(translate('name')); ?></th>
                                    <th><?php echo e(translate('quantity')); ?></th>
                                    <th class="text-center"><?php echo e(translate('action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <form action="<?php echo e(url()->current()); ?>" method="GET">

                                        <th>
                                            <?php if($product->code): ?>
                                                <span>
                                                    <?php echo e($product->code); ?>

                                                </span>

                                            <?php else: ?>

                                                <a class="title-color hover-c1" href="<?php echo e(route('admin.product.edit',[$product['id']])); ?>">
                                                    <?php echo e(translate('update_your_product_code')); ?>

                                                </a>

                                            <?php endif; ?>
                                            </th>
                                        <th><?php echo e(Str::limit($product->name, 20)); ?></th>
                                        <th>
                                            <input id="limit" class="form-control" type="number" name="limit" min="1"
                                                value="<?php echo e($limit); ?>">
                                            <span
                                                class="text-danger mt-1 d-block"><?php echo e(translate('maximum_quantity_270')); ?></span>
                                        </th>

                                        <th>
                                            <div class="d-flex justify-content-center gap-2">
                                                <button class="btn btn-outline-info"
                                                    type="submit"><?php echo e(translate('generate_barcode')); ?></button>
                                                <a href="<?php echo e(route('admin.product.barcode', [$product['id']])); ?>"
                                                    class="btn btn-outline-danger"><?php echo e(translate('reset')); ?></a>
                                                <button type="button" id="print_bar" onclick="printDiv('printarea')"
                                                    class="btn btn-outline--primary "><?php echo e(translate('print')); ?></button>
                                            </div>
                                        </th>
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mt-5 p-4">
            <h1 class="style-one-br show-div2">
                <?php echo e(translate("this_page_is_for_A4_size_page_printer_so_it_will_not_be_visible_in_smaller_devices.")); ?>

            </h1>
        </div>
    </div>

    <div id="printarea" class="show-div pb-5">
        <?php if($limit): ?>
            <div class="barcodea4">
                <?php for($i = 0; $i < $limit; $i++): ?>
                    <?php if($i % 27 == 0 && $i != 0): ?>
            </div>
            <div class="barcodea4">
        <?php endif; ?>
        <div class="item style24">
            <span
                class="barcode_site text-capitalize"><?php echo e(\App\Model\BusinessSetting::where('type', 'company_name')->first()->value); ?></span>
            <span class="barcode_name text-capitalize"><?php echo e(Str::limit($product->name, 20)); ?></span>
            <div class="barcode_price text-capitalize">
                <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($product->unit_price))); ?>

            </div>

            <?php if($product->code !== null): ?>
                <div class="barcode_image"><?php echo DNS1D::getBarcodeHTML($product->code, 'C128'); ?></div>
                <div class="barcode_code text-capitalize"><?php echo e(translate('code')); ?> : <?php echo e($product->code); ?></div>
            <?php else: ?>
                <p class="text-danger"><?php echo e(translate('please_update_product_code')); ?></p>
            <?php endif; ?>
        </div>
        <?php endfor; ?>
    </div>
    <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script_2'); ?>
    <script src=<?php echo e(asset('public/assets/admin/js/global.js')); ?>></script>
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/product/barcode.blade.php ENDPATH**/ ?>