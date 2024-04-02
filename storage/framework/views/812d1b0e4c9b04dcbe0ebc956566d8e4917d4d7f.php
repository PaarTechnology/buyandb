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
                    <div class="mt-4">
                        <div class="flex-start">
                            <div class="mx-1"><h4><i class="tio-shop-outlined"></i></h4></div>
                            <div><?php echo e(translate('seller_request_for_open_a_shop.')); ?></div>
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
                        <a class="nav-link active"
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
                </ul>
                <!-- End Nav -->
            </div>
            <!-- End Nav Scroller -->
        </div>
        <!-- End Page Header-->

        <div class="tab-content">
            <div class="tab-pane fade show active" id="product">
                <div class="row pt-2">
                    <div class="col-md-12">
                        <div class="card h-100">
                            <div class="px-3 py-4">
                                <h5 class="mb-0 d-flex align-items-center gap-2">
                                    <?php echo e(translate('products')); ?>

                                    <span class="badge badge-soft-dark radius-50 fz-12"><?php echo e($products->total()); ?></span>
                                </h5>
                            </div>

                            <div class="table-responsive datatable-custom">
                                <table id="columnSearchDatatable"
                                       style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                       class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                                    <thead class="thead-light thead-50 text-capitalize">
                                    <tr>
                                        <th><?php echo e(translate('SL')); ?></th>
                                        <th><?php echo e(translate('product Name')); ?></th>
                                        <th><?php echo e(translate('purchase_price')); ?></th>
                                        <th><?php echo e(translate('selling_price')); ?></th>
                                        <th class="text-center"><?php echo e(translate('featured')); ?></th>
                                        <th class="text-center"><?php echo e(translate('active_status')); ?></th>
                                        <th class="text-center"><?php echo e(translate('action')); ?></th>
                                    </tr>
                                    </thead>

                                    <tbody id="set-rows">
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($products->firstItem()+$k); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.product.view',[$p['id']])); ?>"
                                                   class="title-color hover-c1">
                                                    <?php echo e(substr($p['name'],0,20)); ?><?php echo e(strlen($p['name'])>20?'...':''); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($p['purchase_price']))); ?>

                                            </td>
                                            <td>
                                                <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($p['unit_price']))); ?>

                                            </td>
                                            <td>
                                                <form action="<?php echo e(route('admin.product.featured-status')); ?>" method="post" id="product_featured<?php echo e($p['id']); ?>_form" class="product_featured_form">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="id" value="<?php echo e($p['id']); ?>">
                                                    <label class="switcher mx-auto">
                                                        <input type="checkbox" class="switcher_input" id="product_featured<?php echo e($p['id']); ?>" name="status" value="1" <?php echo e($p['featured'] == 1 ? 'checked':''); ?> onclick="toogleStatusModal(event,'product_featured<?php echo e($p['id']); ?>','product-status-on.png','product-status-off.png','<?php echo e(translate('Want_to_Add')); ?> <?php echo e($p['name']); ?> <?php echo e(translate('to_the_featured_section')); ?>','<?php echo e(translate('Want_to_Remove')); ?> <?php echo e($p['name']); ?> <?php echo e(translate('to_the_featured_section')); ?>',`<p><?php echo e(translate('if_enabled_this_product_will_be_shown_in_the_featured_product_on_the_website_and_customer_app')); ?></p>`,`<p><?php echo e(translate('if_disabled_this_product_will_be_removed_from_the_featured_product_section_of_the_website_and_customer_app')); ?></p>`)">
                                                        <span class="switcher_control"></span>
                                                    </label>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="<?php echo e(route('admin.product.status-update')); ?>" method="post" id="product_status<?php echo e($p['id']); ?>_form" class="product_status_form">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="id" value="<?php echo e($p['id']); ?>">
                                                    <label class="switcher mx-auto">
                                                        <input type="checkbox" class="switcher_input" id="product_status<?php echo e($p['id']); ?>" name="status" value="1" <?php echo e($p['status'] == 1 ? 'checked':''); ?> onclick="toogleStatusModal(event,'product_status<?php echo e($p['id']); ?>','product-status-on.png','product-status-off.png','<?php echo e(translate('Want_to_Turn_ON')); ?> <?php echo e($p['name']); ?> <?php echo e(translate('status')); ?>','<?php echo e(translate('Want_to_Turn_OFF')); ?> <?php echo e($p['name']); ?> <?php echo e(translate('status')); ?>',`<p><?php echo e(translate('if_enabled_this_product_will_be_available_on_the_website_and_customer_app')); ?></p>`,`<p><?php echo e(translate('if_disabled_this_product_will_be_hidden_from_the_website_and_customer_app')); ?></p>`)">
                                                        <span class="switcher_control"></span>
                                                    </label>
                                                </form>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-10">
                                                    <a class="btn btn-outline--primary btn-sm square-btn"
                                                       href="<?php echo e(route('admin.product.edit',[$p['id']])); ?>">
                                                        <i class="tio-edit"></i>
                                                    </a>
                                                    <a class="btn btn-outline-danger btn-sm square-btn"
                                                       href="javascript:"
                                                       onclick="form_alert('product-<?php echo e($p['id']); ?>','<?php echo e(translate('Want_to_delete_this_item')); ?> ?')">
                                                        <i class="tio-delete"></i>
                                                    </a>
                                                </div>
                                                <form action="<?php echo e(route('admin.product.delete',[$p['id']])); ?>"
                                                        method="post" id="product-<?php echo e($p['id']); ?>">
                                                    <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="table-responsive mt-4">
                                <div class="px-4 d-flex justify-content-lg-end">
                                    <!-- Pagination -->
                                    <?php echo e($products->links()); ?>

                                </div>
                            </div>

                            <?php if(count($products)==0): ?>
                                <div class="text-center p-4">
                                    <img class="mb-3 w-160"
                                         src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg"
                                         alt="Image Description">
                                    <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });

        $('.product_status_form').on('submit', function(event){
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.product.status-update')); ?>",
                method: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    if(data.success == true) {
                        toastr.success('<?php echo e(translate("status_updated_successfully")); ?>');
                    }
                    else if(data.success == false) {
                        toastr.error('<?php echo e(translate("Status_updated_failed.")); ?> <?php echo e(translate("Product_must_be_approved")); ?>');
                        setTimeout(function(){
                            location.reload();
                        }, 2000);
                    }
                }
            });
        });

        $('.product_featured_form').on('submit', function(event){
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.product.featured-status')); ?>",
                method: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    toastr.success('<?php echo e(translate("featured_status_updated_successfully")); ?>');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/seller/view/product.blade.php ENDPATH**/ ?>