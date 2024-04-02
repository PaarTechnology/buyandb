<?php $__env->startSection('title', translate('employee_details')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('/public/assets/back-end/img/employee.png')); ?>" width="20" alt="">
                <?php echo e(translate('employee_details')); ?>

            </h2>
        </div>
        <!-- End Page Title -->
        <div class="card mt-3">
            <div class="card-body">
                <h3 class="mb-3 text-primary">#<?php echo e(translate('EMP')); ?> <?php echo e($employee['id']); ?></h3>

                <div class="row g-2">
                    <div class="col-lg-7 col-xl-8">
                        <div class="media align-items-center flex-wrap flex-sm-nowrap gap-3">
                            <img width="250" class="rounded" onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img1.jpg')); ?>'"
                            src="<?php echo e(asset('storage/app/public/admin')); ?>/<?php echo e($employee['image']); ?>" alt="Image Description">
                            <div class="media-body">
                                <div class="text-capitalize mb-4">
                                    <h4 class="mb-2"><?php echo e($employee->name); ?></h4>
                                    <p><?php echo e(isset($employee->role) ? $employee->role->name : translate('role_not_found')); ?></p>
                                </div>

                                <ul class="d-flex flex-column gap-3 px-0">
                                    <li class="d-flex gap-2 align-items-center">
                                        <i class="tio-call"></i>
                                        <a href="tel:<?php echo e($employee->phone); ?>" class="text-dark"><?php echo e($employee->phone); ?></a>
                                    </li>
                                    <li class="d-flex gap-2 align-items-center">
                                        <i class="tio-email"></i>
                                        <a href="mailto:<?php echo e($employee->email); ?>" class="text-dark"><?php echo e($employee->email); ?></a>
                                    </li>
                                    

                                    <?php if(!empty($employee->identify_type)): ?>
                                        <li class="d-flex gap-2 align-items-center">
                                            <i class="tio-credit-card"></i>
                                            <span class="text-dark text-uppercase">
                                                <?php echo e($employee->identify_type); ?> - <?php echo e(isset($employee->identify_number)?$employee->identify_number: translate('identify_number_not_found')); ?></span>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-4">
                        <div class="bg-primary-light rounded p-3">
                            <div class="bg-white rounded p-3">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="tio-calendar-month"></i>
                                    <span class="text-dark"><?php echo e(translate('join')); ?>: <?php echo e(date('d/m/Y',strtotime($employee->created_at))); ?></span>
                                </div>
                            </div>
                            <div class="bg-white rounded p-3 mt-3">
                                <div class="d-flex justify-content-between gap-3">
                                    <div class="d-flex flex-column gap-4">
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="tio-account-square-outlined"></i>
                                            <h6 class="text-dark mb-0 text-capitalize"><?php echo e(translate('access_abailable')); ?>:</h6>
                                        </div>
                                        <?php if(isset($employee->role)): ?>
                                            <div class="tags d-flex gap-2 flex-wrap">
                                                <?php $__currentLoopData = json_decode($employee->role->module_access); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <span class="badge bg-primary-light text-capitalize"><?php echo e(str_replace('_' ,' ',$value)); ?></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <a href="<?php echo e(route('admin.employee.update',[$employee['id']])); ?>">
                                        <i class="tio-edit"data-toggle="tooltip" data-placement="top" title="<?php echo e(translate('you_can_create_or_edit_role_form_employee_role_setup')); ?>"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-end">
                            <a href="<?php echo e(route('admin.employee.update',[$employee['id']])); ?>" class="btn btn--primary px-5">
                                <i class="tio-edit"></i>
                                <?php echo e(translate('edit')); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).on('change', '.switcher_input', function () {
            let id = $(this).attr("id");

            let status = 0;
            if (jQuery(this).prop("checked") === true) {
                status = 1;
            }

            Swal.fire({
                title: '<?php echo e(translate('are_you_sure')); ?>?',
                text: '<?php echo e(translate('want_to_change_status')); ?>',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: '<?php echo e(translate('no')); ?>',
                confirmButtonText: '<?php echo e(translate('yes')); ?>',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(url('/')); ?>/admin/employee/status",
                        method: 'POST',
                        data: {
                            id: id,
                            status: status
                        },
                        success: function () {
                            toastr.success('<?php echo e(translate('status_updated_successfully')); ?>');
                        }
                    });
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/employee/view.blade.php ENDPATH**/ ?>