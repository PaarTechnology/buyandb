<?php $__env->startSection('title', translate('contact_List')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(asset('/public/assets/back-end/img/message.png')); ?>" alt="">
                <?php echo e(translate('customer_message')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <div class="row mt-20">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-sm-4 col-md-6 col-lg-8 mb-2 mb-sm-0">
                                <h5 class="d-flex gap-2 align-items-center">
                                    <?php echo e(translate('customer_message_table')); ?>

                                    <span
                                        class="badge badge-soft-dark radius-50 fz-12"><?php echo e($contacts->total()); ?></span>
                                </h5>
                            </div>
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
                                               placeholder="<?php echo e(translate('search_by_Name_or_Mobile_No_or_Email')); ?>"
                                               aria-label="Search orders" value="<?php echo e($search); ?>">
                                        <button type="submit"
                                                class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="datatable"
                               style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                               class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(translate('SL')); ?></th>
                                <th><?php echo e(translate('customer_Name')); ?></th>
                                <th><?php echo e(translate('contact_Info')); ?></th>
                                <th><?php echo e(translate('subject')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr style="background: <?php echo e($contact->seen==0?'rgba(215,214,214,0.56)':'white'); ?>">
                                    <td><?php echo e($contacts->firstItem()+$k); ?></td>
                                    <td><?php echo e($contact['name']); ?></td>
                                    <td>
                                        <div>
                                            <div><?php echo e($contact['mobile_number']); ?></div>
                                            <div><?php echo e($contact['email']); ?></div>
                                        </div>
                                    </td>
                                    <td class="text-wrap"><?php echo e($contact['subject']); ?></td>
                                    <td>
                                        <div class="d-flex gap-10 justify-content-center">
                                            <a title="<?php echo e(translate('view')); ?>"
                                               class="btn btn-outline-info btn-sm square-btn"
                                               href="<?php echo e(route('admin.contact.view',$contact->id)); ?>">
                                                <i class="tio-invisible"></i>
                                            </a>
                                            <a class="btn btn-outline-danger btn-sm delete"
                                               id="<?php echo e($contact['id']); ?>"
                                               title="<?php echo e(translate('delete')); ?>">
                                                <i class="tio-delete"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-lg-end">
                            <!-- Pagination -->
                            <?php echo e($contacts->links()); ?>

                        </div>
                    </div>

                    <?php if(count($contacts)==0): ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            Swal.fire({
                title: "<?php echo e(translate('are_you_sure_delete_this')); ?>?",
                text: "<?php echo e(translate('you_will_not_be_able_to_revert_this')); ?>!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "<?php echo e(translate('yes_delete_it')); ?>!",
                cancelButtonText: '<?php echo e(translate("cancel")); ?>',
                type: 'warning',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.contact.delete')); ?>",
                        method: 'POST',
                        data: {id: id},
                        success: function () {
                            toastr.success("<?php echo e(translate('contact_deleted_successfully')); ?>");
                            location.reload();
                        }
                    });
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/contacts/list.blade.php ENDPATH**/ ?>