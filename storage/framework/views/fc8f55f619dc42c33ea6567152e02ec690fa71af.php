 

<?php $__env->startSection('title',translate('deliveryman_List')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">

        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('/public/assets/back-end/img/deliveryman.png')); ?>" width="20" alt="">
                <?php echo e(translate('delivery_man')); ?> <span class="badge badge-soft-dark radius-50 fz-12"><?php echo e($delivery_men->count()); ?></span>
            </h2>
        </div>
        <!-- End Page Title -->

        <div class="row">
            <div class="col-sm-12 mb-3">
                <!-- Card -->
                <div class="card">
                    <!-- Header -->
                    <div class="px-3 py-4">
                        <div class="d-flex justify-content-between gap-10 flex-wrap align-items-center">
                            <div class="">
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <!-- Search -->
                                    <div class="input-group input-group-merge input-group-custom">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                                placeholder="<?php echo e(translate('search')); ?>" aria-label="Search" value="<?php echo e($search); ?>" required>
                                        <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>

                                    </div>
                                    <!-- End Search -->
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
                                            <a type="submit" class="dropdown-item d-flex align-items-center gap-2 " href="<?php echo e(route('admin.delivery-man.export',['search' => $search])); ?>">
                                                <img width="14" src="<?php echo e(asset('/public/assets/back-end/img/excel.png')); ?>" alt="">
                                                <?php echo e(translate('excel')); ?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <a href="<?php echo e(route('admin.delivery-man.add')); ?>" class="btn btn--primary text-nowrap">
                                    <i class="tio-add"></i>
                                    <?php echo e(translate('add_Delivery_Man')); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <div class="table-responsive datatable-custom">
                        <table class="table table-hover table-borderless table-thead-bordered table-align-middle card-table <?php echo e(Session::get('direction') === 'rtl' ? 'text-right' : 'text-left'); ?>">
                            <thead class="thead-light thead-50 text-capitalize table-nowrap">
                            <tr>
                                <th><?php echo e(translate('SL')); ?></th>
                                <th><?php echo e(translate('name')); ?></th>
                                <th><?php echo e(translate('contact info')); ?></th>
                                <th><?php echo e(translate('total_Orders')); ?></th>
                                <th><?php echo e(translate('rating')); ?></th>
                                <th class="text-center"><?php echo e(translate('status')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>

                            <tbody id="set-rows">
                            <?php $__empty_1 = true; $__currentLoopData = $delivery_men; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($delivery_men->firstitem()+$key); ?></td>
                                    <td>
                                        <div class="media align-items-center gap-10">
                                            <img class="rounded-circle avatar avatar-lg"
                                                 onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img1.jpg')); ?>'"
                                                 src="<?php echo e(asset('storage/app/public/delivery-man')); ?>/<?php echo e($dm['image']); ?>">
                                            <div class="media-body">
                                                <a title="Earning Statement"
                                                   class="title-color hover-c1"
                                                   href="<?php echo e(route('admin.delivery-man.earning-statement-overview', ['id' => $dm['id']])); ?>">
                                                    <?php echo e($dm['f_name'].' '.$dm['l_name']); ?>

                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column gap-1">
                                            <div><a class="title-color hover-c1" href="mailto:<?php echo e($dm['email']); ?>"><strong><?php echo e($dm['email']); ?></strong></a></div>
                                            <a class="title-color hover-c1" href="tel:+<?php echo e($dm['country_code']); ?><?php echo e($dm['phone']); ?>">+<?php echo e($dm['country_code'].' '. $dm['phone']); ?></a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.orders.list', ['all', 'delivery_man_id' => $dm['id']])); ?>" class="badge fz-14 badge-soft--primary">
                                            <span><?php echo e($dm->orders_count); ?></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.delivery-man.rating', ['id' => $dm['id']])); ?>" class="badge fz-14 badge-soft-info">
                                            <span><?php echo e(isset($dm->rating[0]->average) ? number_format($dm->rating[0]->average, 2, '.', ' ') : 0); ?> <i class="tio-star"></i> </span>
                                        </a>
                                    </td>
                                    <td>

                                        <form action="<?php echo e(route('admin.delivery-man.status-update')); ?>" method="post" id="deliveryman_status<?php echo e($dm['id']); ?>_form" class="deliveryman_status_form">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($dm['id']); ?>">
                                            <label class="switcher mx-auto">
                                                <input type="checkbox" class="switcher_input" id="deliveryman_status<?php echo e($dm['id']); ?>" name="status" value="1" <?php echo e($dm->is_active == 1 ? 'checked':''); ?> onclick="toogleStatusModal(event,'deliveryman_status<?php echo e($dm['id']); ?>','deliveryman-status-on.png','deliveryman-status-off.png','<?php echo e(translate('Want_to_Turn_ON_Deliveryman_Status')); ?>','<?php echo e(translate('Want_to_Turn_OFF_Deliveryman_Status')); ?>',`<p><?php echo e(translate('if_enabled_this_deliveryman_can_log_in_to_the_system_and_deliver_products')); ?></p>`,`<p><?php echo e(translate('if_disabled_this_deliveryman_cannot_log_in_to_the_system_and_deliver_any_products')); ?></p>`)">
                                                <span class="switcher_control"></span>
                                            </label>
                                        </form>

                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center gap-10">
                                            <a  class="btn btn-outline--primary btn-sm edit"
                                                title="<?php echo e(translate('edit')); ?>"
                                                href="<?php echo e(route('admin.delivery-man.edit',[$dm['id']])); ?>">
                                                <i class="tio-edit"></i></a>
                                            <a title="Earning Statement"
                                               class="btn btn-outline-info btn-sm square-btn"
                                               href="<?php echo e(route('admin.delivery-man.earning-statement-overview', ['id' => $dm['id']])); ?>">
                                                <i class="tio-money"></i>
                                            </a>
                                            <a class="btn btn-outline-danger btn-sm delete" href="javascript:"
                                                onclick="form_alert('delivery-man-<?php echo e($dm['id']); ?>','<?php echo e(translate('want_to_remove_this_information?')); ?>')"
                                                title="<?php echo e(translate('delete')); ?>">
                                                <i class="tio-delete"></i>
                                            </a>
                                            <form action="<?php echo e(route('admin.delivery-man.delete',[$dm['id']])); ?>"
                                                    method="post" id="delivery-man-<?php echo e($dm['id']); ?>">
                                                <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7">
                                        <div class="text-center p-4">
                                            <img class="mb-3 w-160" src="<?php echo e(asset('public/assets/back-end/svg/illustrations/sorry.svg')); ?>" alt="Image Description">
                                            <p class="mb-0"><?php echo e(translate('no_delivery_man_found')); ?></p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-lg-end">
                            <!-- Pagination -->
                            <?php echo $delivery_men->links(); ?>

                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        $('.deliveryman_status_form').on('submit', function(event){
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.delivery-man.status-update')); ?>",
                method: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    toastr.success('<?php echo e(translate("status_updated_successfully")); ?>');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/delivery-man/list.blade.php ENDPATH**/ ?>