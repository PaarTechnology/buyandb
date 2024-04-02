<?php $__env->startSection('title', translate('customer_List')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">

        <!-- Page Title -->
        <div class="mb-4">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(asset('/public/assets/back-end/img/customer.png')); ?>" alt="">
                <?php echo e(translate('customer_list')); ?>

                <span class="badge badge-soft-dark radius-50"><?php echo e(\App\User::count()); ?></span>
            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="px-3 py-4">
                <div class="row gy-2 align-items-center">
                    <div class="col-sm-8 col-md-6 col-lg-4">
                        <!-- Search -->
                        <form action="<?php echo e(url()->current()); ?>" method="GET">
                            <div class="input-group input-group-merge input-group-custom">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input id="datatableSearch_" type="search" name="search" class="form-control"
                                       placeholder="<?php echo e(translate('search_by_Name_or_Email_or_Phone')); ?>"
                                       aria-label="Search orders" value="<?php echo e($search); ?>">
                                <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                            </div>
                        </form>
                        <!-- End Search -->
                    </div>
                    <div class="col-sm-4 col-md-6 col-lg-8 mb-2 mb-sm-0">
                        <div class="d-flex justify-content-sm-end">
                            <button type="button" class="btn btn-outline--primary" data-toggle="dropdown">
                                <i class="tio-download-to"></i>
                                <?php echo e(translate('export')); ?>

                                <i class="tio-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a class="dropdown-item" href="<?php echo e(route('admin.customer.export',['search'=>request('search')])); ?>">
                                        <img width="14" src="<?php echo e(asset('/public/assets/back-end/img/excel.png')); ?>" alt="">
                                        <?php echo e(translate('excel')); ?>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table
                    style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                    class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                    <thead class="thead-light thead-50 text-capitalize">
                    <tr>
                        <th><?php echo e(translate('SL')); ?></th>
                        <th><?php echo e(translate('customer_name')); ?></th>
                        <th><?php echo e(translate('contact_info')); ?></th>
                        <th><?php echo e(translate('total_Order')); ?> </th>
                        <th class="text-center"><?php echo e(translate('block')); ?> / <?php echo e(translate('unblock')); ?></th>
                        <th class="text-center"><?php echo e(translate('action')); ?></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($customers->firstItem()+$key); ?>

                            </td>
                            <td>
                                <a href="<?php echo e(route('admin.customer.view',[$customer['id']])); ?>"
                                   class="title-color hover-c1 d-flex align-items-center gap-10">
                                    <img src="<?php echo e(asset('storage/app/public/profile')); ?>/<?php echo e($customer->image); ?>"
                                         onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img1.jpg')); ?>'"
                                         class="avatar rounded-circle" alt="" width="40">
                                    <?php echo e(\Illuminate\Support\Str::limit($customer['f_name']." ".$customer['l_name'],20)); ?>

                                </a>
                            </td>
                            <td>
                                <div class="mb-1">
                                    <strong><a class="title-color hover-c1" href="mailto:<?php echo e($customer->email); ?>"><?php echo e($customer->email); ?></a></strong>

                                </div>
                                <a class="title-color hover-c1" href="tel:<?php echo e($customer->phone); ?>"><?php echo e($customer->phone); ?></a>

                            </td>
                            <td>
                                <label class="btn text-info bg-soft-info font-weight-bold px-3 py-1 mb-0 fz-12">
                                    <?php echo e($customer->orders->count()); ?>

                                </label>
                            </td>

                            <td>
                                <form action="<?php echo e(route('admin.customer.status-update')); ?>" method="post" id="customer_status<?php echo e($customer['id']); ?>_form" class="customer_status_form">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($customer['id']); ?>">
                                    <label class="switcher mx-auto">
                                        <input type="checkbox" class="switcher_input" id="customer_status<?php echo e($customer['id']); ?>" name="status" value="1" <?php echo e($customer['is_active'] == 1 ? 'checked':''); ?> onclick="toogleStatusModal(event,'customer_status<?php echo e($customer['id']); ?>','customer-block-on.png','customer-block-off.png','<?php echo e(translate('Want_to_Unlock')); ?> <?php echo e($customer['f_name'].' '.$customer['l_name']); ?>','<?php echo e(translate('Want_to_Block')); ?> <?php echo e($customer['f_name'].' '.$customer['l_name']); ?>',`<p><?php echo e(translate('if_enabled_this_customer_will_be_unblocked_and_can_log_in_to_this_system_again')); ?></p>`,`<p><?php echo e(translate('if_disabled_this_customer_will_be_blocked_and_cannot_log_in_to_this_system')); ?></p>`)">
                                        <span class="switcher_control"></span>
                                    </label>
                                </form>
                            </td>

                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a title="<?php echo e(translate('view')); ?>"
                                       class="btn btn-outline-info btn-sm square-btn"
                                       href="<?php echo e(route('admin.customer.view',[$customer['id']])); ?>">
                                        <i class="tio-invisible"></i>
                                    </a>
                                    <?php if($customer['id'] != '0'): ?>
                                    <a title="<?php echo e(translate('delete')); ?>"
                                       class="btn btn-outline-danger btn-sm delete square-btn" href="javascript:"
                                       onclick="form_alert('customer-<?php echo e($customer['id']); ?>','<?php echo e(translate('want_to_delete_this_customer').'?'); ?>')">
                                        <i class="tio-delete"></i>
                                    </a>
                                    <?php endif; ?>
                                </div>
                                <form action="<?php echo e(route('admin.customer.delete',[$customer['id']])); ?>"
                                        method="post" id="customer-<?php echo e($customer['id']); ?>">
                                    <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                </form>
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
                    <?php echo $customers->links(); ?>

                </div>
            </div>

            <?php if(count($customers)==0): ?>
                <div class="text-center p-4">
                    <img class="mb-3 w-160" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg"
                         alt="Image Description">
                    <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                </div>
        <?php endif; ?>
        <!-- End Footer -->
        </div>
        <!-- End Card -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        $('.customer_status_form').on('submit', function(event){
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    toastr.success("<?php echo e(translate('status_updated_successfully')); ?>");
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/customer/list.blade.php ENDPATH**/ ?>