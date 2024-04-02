<?php $__env->startSection('title',translate('emergency_Contact')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('/public/assets/back-end/img/add-new-delivery-man.png')); ?>" alt="">
                <?php echo e(translate('emergency_Contact')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">

                <form action="<?php echo e(route('admin.delivery-man.emergency-contact.add')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card">
                        <!-- End Page Header -->
                        <div class="card-body">
                            <h5 class="mb-0 page-header-title d-flex align-items-center gap-2 border-bottom pb-3 mb-3">
                                <i class="tio-user"></i>
                                <?php echo e(translate('add_New_Contact_Information')); ?>

                            </h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="title-color d-flex"
                                               for="f_name"><?php echo e(translate('contact_name')); ?></label>
                                        <input type="text" name="name" class="form-control"
                                               placeholder="<?php echo e(translate('contact_name')); ?>"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="title-color d-flex"
                                               for="exampleFormControlInput1"><?php echo e(translate('phone')); ?></label>
                                        <input type="number" name="phone" class="form-control"
                                               placeholder="<?php echo e(translate('ex')); ?> : 017***********"
                                               required>
                                    </div>
                                </div>

                            </div>
                            <div class="d-flex gap-3 justify-content-end">
                                <button type="reset" id="reset"
                                        class="btn btn-secondary px-4"><?php echo e(translate('reset')); ?></button>
                                <button type="submit"
                                        class="btn btn--primary px-4"><?php echo e(translate('submit')); ?></button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="card mt-3">
                        <div class="p-3">
                            <div class="row gy-1 align-items-center justify-content-between">
                                <div class="col-auto">
                                    <h5>
                                        <?php echo e(translate('contact_information_Table')); ?>

                                        <span
                                            class="badge badge-soft-dark radius-50 fz-12 ml-1"><?php echo e($contacts->count()); ?></span>
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="datatable" class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100 text-left">
                                <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th><?php echo e(translate('SL')); ?></th>
                                    <th class="text-center"><?php echo e(translate('name')); ?></th>
                                    <th class="text-center"><?php echo e(translate('phone')); ?></th>
                                    <th class="text-center"><?php echo e(translate('status')); ?></th>
                                    <th class="text-center"><?php echo e(translate('action')); ?></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                                    <td class="text-center text-capitalize"><?php echo e($contact->name); ?></td>
                                    <td class="text-center"><a class="title-color hover-c1" href="tel:<?php echo e($contact->phone); ?>"><?php echo e($contact->phone); ?></a></td>
                                    <td>
                                        <label class="mx-auto switcher">
                                                <input onchange="status_change(this)" type="checkbox" class="switcher_input status"
                                                       data-id="<?php echo e($contact->id); ?>" <?php echo e($contact->status == true?'checked':''); ?>>
                                                <span class="switcher_control"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-danger btn-sm delete mx-auto" href="javascript:"
                                           onclick="delete_contact('delete-contact-<?php echo e($contact->id); ?>','<?php echo e(translate('want_to_remove_this_information')); ?> ?')"
                                           title="<?php echo e(translate('delete')); ?>">
                                            <i class="tio-delete"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.delivery-man.emergency-contact.destroy')); ?>"
                                              method="post" id="delete-contact-<?php echo e($contact->id); ?>">
                                            <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                            <input type="hidden" name="id" value="<?php echo e($contact->id); ?>">
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5">
                                            <div class="text-center p-4">
                                                <img class="mb-3 w-160"
                                                     src="<?php echo e(asset('public/assets/back-end/svg/illustrations/sorry.svg')); ?>"
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
                                <?php echo e($contacts->links()); ?>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>

    <script>
        function status_change(t) {
            let id = $(t).data('id');
            let checked = $(t).prop("checked");
            let status = checked === true ? 1 : 0;

            Swal.fire({
                title: "<?php echo e(translate('are_you_sure')); ?>?",
                text: "<?php echo e(translate('want_to_change_status')); ?>?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: '<?php echo e(translate("no")); ?>',
                confirmButtonText: '<?php echo e(translate("yes")); ?>',
                reverseButtons: true
            }).then((result) => {
                    if (result.value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "<?php echo e(route('admin.delivery-man.emergency-contact.ajax-status-change')); ?>",
                            method: 'POST',
                            data: {
                                status: status,
                                id : id
                            },
                            success: function (data) {
                                console.log(data)
                                if (data.fail == 1) {
                                    toastr.error(data.message);
                                }
                                    toastr.success(data.message);
                            }
                        });
                    }
                }
            )
        }

    </script>

    <script>
        function delete_contact(id, message) {
            Swal.fire({
                title: "<?php echo e(translate('are_you_sure')); ?>?",
                text: message,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: '<?php echo e(translate("no")); ?>',
                confirmButtonText: '<?php echo e(translate("yes")); ?>',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $('#' + id).submit()
                }
            })
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/delivery-man/emergency-contact.blade.php ENDPATH**/ ?>