<?php $__env->startSection('title', translate('brand_List')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 d-flex gap-2">
                <img width="20" src="<?php echo e(asset('/public/assets/back-end/img/brand.png')); ?>" alt="">
                <?php echo e(translate('brand_List')); ?>

                <span class="badge badge-soft-dark radius-50 fz-14"><?php echo e($br->total()); ?></span>
            </h2>
        </div>
        <!-- End Page Title -->

        <div class="row mt-20">
            <div class="col-md-12">
                <div class="card">
                    <!-- Data Table Top -->
                    <div class="px-3 py-4">
                        <div class="row g-2 flex-grow-1">
                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <!-- Search -->
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-custom input-group-merge">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                            placeholder="<?php echo e(translate('search_by_name')); ?>" aria-label="Search by ID or name" value="<?php echo e($search); ?>" required>
                                        <button type="submit" class="btn btn--primary input-group-text"><?php echo e(translate('search')); ?></button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div>
                            <div class="col-sm-4 col-md-6 col-lg-8 d-flex justify-content-end">
                                <button type="button" class="btn btn-outline--primary" data-toggle="dropdown">
                                    <i class="tio-download-to"></i>
                                    <?php echo e(translate('export')); ?>

                                    <i class="tio-chevron-down"></i>
                                </button>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('admin.brand.export',['search'=>request('search')])); ?>">
                                            <img width="14" src="<?php echo e(asset('/public/assets/back-end/img/excel.png')); ?>" alt="">
                                            <?php echo e(translate('excel')); ?>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Data Table Top -->

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                                <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th><?php echo e(translate('SL')); ?></th>
                                    <th><?php echo e(translate('brand_Logo')); ?></th>
                                    <th><?php echo e(translate('name')); ?></th>
                                    <th><?php echo e(translate('total_Product')); ?></th>
                                    <th><?php echo e(translate('total_Order')); ?></th>
                                    <th class="text-center"><?php echo e(translate('status')); ?></th>
                                    <th class="text-center">
                                        <?php echo e(translate('action')); ?>

                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $br; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($br->firstItem()+$k); ?></td>
                                        <td>
                                            <img class="rounded avatar-60"
                                                 onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img2.jpg')); ?>'"
                                                 src="<?php echo e(asset('storage/app/public/brand')); ?>/<?php echo e($b['image']); ?>">
                                        </td>
                                        <td><?php echo e($b['defaultname']); ?></td>
                                        <td><?php echo e($b['brand_all_products_count']); ?></td>
                                        <td><?php echo e($b['brandAllProducts']->sum('order_details_count')); ?></td>
                                        <td>
                                            <form action="<?php echo e(route('admin.brand.status-update')); ?>" method="post" id="brand_status<?php echo e($b['id']); ?>_form" class="brand_status_form">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="id" value="<?php echo e($b['id']); ?>">
                                                <label class="switcher mx-auto">
                                                    <input type="checkbox" class="switcher_input" id="brand_status<?php echo e($b['id']); ?>" name="status" value="1" <?php echo e($b['status'] == 1 ? 'checked':''); ?> onclick="toogleStatusModal(event,'brand_status<?php echo e($b['id']); ?>','brand-status-on.png','brand-status-off.png','<?php echo e(translate('Want_to_Turn_ON')); ?> <?php echo e($b['defaultname']); ?> <?php echo e(translate('status')); ?>','<?php echo e(translate('Want_to_Turn_OFF')); ?> <?php echo e($b['defaultname']); ?> <?php echo e(translate('status')); ?>',`<p><?php echo e(translate('if_enabled_this_brand_will_be_available_on_the_website_and_customer_app')); ?></p>`,`<p><?php echo e(translate('if_disabled_this_brand_will_be_hidden_from_the_website_and_customer_app')); ?></p>`)">
                                                    <span class="switcher_control"></span>
                                                </label>
                                            </form>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a class="btn btn-outline-info btn-sm square-btn" title="<?php echo e(translate('edit')); ?>"
                                                href="<?php echo e(route('admin.brand.update',[$b['id']])); ?>">
                                                <i class="tio-edit"></i>
                                                </a>
                                                <a class="btn btn-outline-danger btn-sm delete square-btn" title="<?php echo e(translate('delete')); ?>"
                                                id="<?php echo e($b['id']); ?>">
                                                <i class="tio-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <div class="d-flex justify-content-lg-end">
                            <!-- Pagination -->
                            <?php echo e($br->links()); ?>

                        </div>
                    </div>
                    <?php if(count($br)==0): ?>
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
    <script>
        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            Swal.fire({
                title: "<?php echo e(translate('are_you_sure_delete_this_brand')); ?>?",
                text: "<?php echo e(translate('you_will_not_be_able_to_revert_this')); ?>!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "<?php echo e(translate('yes_delete_it')); ?>!",
                cancelButtonText: "<?php echo e(translate('cancel')); ?>",
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.brand.delete')); ?>",
                        method: 'POST',
                        data: {id: id},
                        success: function () {
                            toastr.success("<?php echo e(translate('brand_deleted_successfully')); ?>");
                            location.reload();
                        }
                    });
                }
            })
        });

        $('.brand_status_form').on('submit', function(event){
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.brand.status-update')); ?>",
                method: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    if (data.success == true) {
                        toastr.success("<?php echo e(translate('status_updated_successfully')); ?>");
                    } else {
                        toastr.error('<?php echo e(translate("status_updated_failed.")); ?> <?php echo e(translate("Product_must_be_approved")); ?>');
                        location.reload();
                    }
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/brand/list.blade.php ENDPATH**/ ?>