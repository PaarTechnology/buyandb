<?php $__env->startSection('title', translate('withdraw_method_list')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <div class="page-title-wrap d-flex justify-content-between flex-wrap align-items-center gap-3 mb-3">
                <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                    <img width="20" src="<?php echo e(asset('/public/assets/back-end/img/withdraw-icon.png')); ?>" alt="">
                    <?php echo e(translate('withdraw_method_list')); ?>

                </h2>
                <a href="<?php echo e(route('admin.sellers.withdraw-method.create')); ?>" class="btn btn--primary">+ <?php echo e(translate('add_method')); ?></a>
            </div>
        </div>
        <!-- End Page Title -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="p-3">
                        <div class="row gy-1 align-items-center justify-content-between">
                            <div class="col-auto">
                                <h5>
                                <?php echo e(translate('methods')); ?>

                                    <span class="badge badge-soft-dark radius-50 fz-12 ml-1"> <?php echo e($withdrawal_methods->total()); ?></span>
                                </h5>
                            </div>
                            <div class="col-auto">
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-custom input-group-merge">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                               placeholder="<?php echo e(translate('search_Method_Name')); ?>" aria-label="Search orders"
                                               value="<?php echo e($search); ?>" required>
                                        <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                                    </div>
                                </form>
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
                                <th><?php echo e(translate('method_name')); ?></th>
                                <th><?php echo e(translate('method_fields')); ?></th>
                                <th class="text-center"><?php echo e(translate('active_status')); ?></th>
                                <th class="text-center"><?php echo e(translate('default_method')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $withdrawal_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$withdrawal_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($withdrawal_methods->firstitem()+$key); ?></td>
                                    <td><?php echo e($withdrawal_method['method_name']); ?></td>
                                    <td>
                                        <?php $__currentLoopData = $withdrawal_method['method_fields']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$method_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="badge badge-success opacity-75 fz-12 border border-white">
                                                <b><?php echo e(translate('name')); ?>:</b> <?php echo e(translate($method_field['input_name'])); ?> |
                                                <b><?php echo e(translate('type')); ?>:</b> <?php echo e($method_field['input_type']); ?> |
                                                <b><?php echo e(translate('placeholder')); ?>:</b> <?php echo e($method_field['placeholder']); ?> |
                                                <b><?php echo e(translate('is_Required')); ?>:</b> <?php echo e($method_field['is_required'] ? translate('yes') : translate('no')); ?>

                                            </span><br/>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>

                                        <form action="<?php echo e(route('admin.sellers.withdraw-method.status-update')); ?>" method="post" id="withdrawal_method_status<?php echo e($withdrawal_method['id']); ?>_form" class="withdrawal_method_status_form">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($withdrawal_method['id']); ?>">
                                            <label class="switcher mx-auto">
                                                <input type="checkbox" class="switcher_input" id="withdrawal_method_status<?php echo e($withdrawal_method['id']); ?>" name="status" value="1" <?php echo e($withdrawal_method['is_active'] == 1 ? 'checked':''); ?> onclick="toogleStatusModal(event,'withdrawal_method_status<?php echo e($withdrawal_method['id']); ?>','wallet-on.png','wallet-off.png','<?php echo e(translate('want_to_Turn_ON_This_Withdraw_Method')); ?>','<?php echo e(translate('want_to_Turn_OFF_This_Withdraw_Method')); ?>',`<p><?php echo e(translate('if_you_enable_this_Withdraw_method_will_be_shown_in_the_seller_app_and_seller_panel')); ?></p>`,`<p><?php echo e(translate('if_you_disable_this_Withdraw_method_will_not_be_shown_in_the_seller_app_and_seller_panel')); ?></p>`)">
                                                <span class="switcher_control"></span>
                                            </label>
                                        </form>

                                    </td>
                                    <td>
                                        <form action="<?php echo e(route('admin.sellers.withdraw-method.default-status-update')); ?>" method="post" id="withdrawal_method_default<?php echo e($withdrawal_method['id']); ?>_form" class="withdrawal_method_default_form">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($withdrawal_method['id']); ?>">
                                            <label class="switcher mx-auto">
                                                <input type="checkbox" class="switcher_input" id="withdrawal_method_default<?php echo e($withdrawal_method['id']); ?>" name="status" value="1" <?php echo e($withdrawal_method['is_default'] == 1 ? 'checked':''); ?> onclick="toogleStatusModal(event,'withdrawal_method_default<?php echo e($withdrawal_method['id']); ?>','wallet-on.png','wallet-off.png','<?php echo e(translate('want_to_Turn_ON_This_Withdraw_Method')); ?>','<?php echo e(translate('want_to_Turn_OFF_This_Withdraw_Method')); ?>',`<p><?php echo e(translate('if_you_enable_this_Withdraw_method_will_be_set_as_Default_Withdraw_Method_in_the_seller_app_and_seller_panel')); ?></p>`,`<p><?php echo e(translate('if_you_disable_this_Withdraw_method_will_be_remove_as_Default_Withdraw_Method_in_the_seller_app_and_seller_panel')); ?></p>`)">
                                                <span class="switcher_control"></span>
                                            </label>
                                        </form>
                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="<?php echo e(route('admin.sellers.withdraw-method.edit',[$withdrawal_method->id])); ?>"
                                               class="btn btn-outline--primary btn-sm square-btn">
                                                <i class="tio-edit"></i>
                                            </a>

                                            <?php if(!$withdrawal_method->is_default): ?>
                                                <a class="btn btn-outline-danger btn-sm square-btn" href="javascript:"
                                                   title="<?php echo e(translate('delete')); ?>"
                                                   onclick="form_alert('delete-<?php echo e($withdrawal_method->id); ?>','<?php echo e(translate('want_to_delete_this_item?')); ?>')">
                                                    <i class="tio-delete"></i>
                                                </a>
                                                <form action="<?php echo e(route('admin.sellers.withdraw-method.delete',[$withdrawal_method->id])); ?>"
                                                      method="post" id="delete-<?php echo e($withdrawal_method->id); ?>">
                                                    <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php if(count($withdrawal_methods)==0): ?>
                            <div class="text-center p-4">
                                <img class="mb-3 w-160"
                                        src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg"
                                        alt="Image Description">
                                <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                            </div>
                       <?php endif; ?>
                    </div>

                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-center justify-content-md-end">
                            <!-- Pagination -->
                            <?php echo e($withdrawal_methods->links()); ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script_2'); ?>
  <script>

        $('.withdrawal_method_default_form').on('submit', function(event){
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
                    if(data.success == true) {
                        toastr.success('<?php echo e(translate("default_Method_updated_successfully")); ?>');
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
                    }
                    else if(data.success == false) {
                        toastr.error('<?php echo e(translate("default_Method_updated_failed")); ?>');
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
                    }
                }
            });
        });

        $('.withdrawal_method_status_form').on('submit', function(event){
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
                    if(data.success == true) {
                        toastr.success('<?php echo e(translate("status_updated_successfully")); ?>');
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
                    }
                    else if(data.success == false) {
                        toastr.error('<?php echo e(translate("status_update_failed")); ?>');
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
                    }
                }
            });
        });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/seller/withdraw-methods-list.blade.php ENDPATH**/ ?>