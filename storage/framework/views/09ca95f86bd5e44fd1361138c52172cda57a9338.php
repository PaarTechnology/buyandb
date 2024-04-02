<?php $__env->startSection('title', translate('coupon_Add')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('public/assets/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/back-end/css/custom.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('/public/assets/back-end/img/coupon_setup.png')); ?>" alt="">
                <?php echo e(translate('coupon_setup')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.coupon.store-coupon')); ?>" method="post">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="name" class="title-color font-weight-medium d-flex"><?php echo e(translate('coupon_type')); ?></label>
                                    <select class="form-control" id="coupon_type" name="coupon_type" required>
                                        <option disabled selected><?php echo e(translate('select_coupon_type')); ?></option>
                                        <option value="discount_on_purchase"><?php echo e(translate('discount_on_Purchase')); ?></option>
                                        <option value="free_delivery"><?php echo e(translate('free_Delivery')); ?></option>
                                        <option value="first_order"><?php echo e(translate('first_Order')); ?></option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="name" class="title-color font-weight-medium d-flex"><?php echo e(translate('coupon_title')); ?></label>
                                    <input type="text" name="title" class="form-control" value="<?php echo e(old('title')); ?>" id="title"
                                           placeholder="<?php echo e(translate('title')); ?>" required>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="name" class="title-color font-weight-medium text-capitalize"><?php echo e(translate('coupon_code')); ?></label>
                                        <a href="javascript:void(0)" class="float-right c1 fz-12" onclick="generateCode()"><?php echo e(translate('generate_code')); ?></a>
                                    </div>
                                    <input type="text" name="code" value=""
                                           class="form-control" id="code"
                                           placeholder="<?php echo e(translate('ex')); ?>: EID100" required>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group first_order">
                                    <label for="name" class="title-color font-weight-medium d-flex"><?php echo e(translate('coupon_bearer')); ?></label>
                                    <select class="form-control" name="coupon_bearer" id="coupon_bearer" >
                                        <option disabled selected><?php echo e(translate('select_coupon_bearer')); ?></option>
                                        <option value="seller"><?php echo e(translate('seller')); ?></option>
                                        <option value="inhouse"><?php echo e(translate('admin')); ?></option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group coupon_by first_order">
                                    <label for="name" class="title-color font-weight-medium d-flex"><?php echo e(translate('seller')); ?></label>
                                    <select class="js-example-basic-multiple js-states js-example-responsive form-control" name="seller_id" id="seller_wise_coupon">
                                        <option disabled selected><?php echo e(translate('select_seller')); ?></option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group coupon_type first_order">
                                    <label for="name" class="title-color font-weight-medium d-flex"><?php echo e(translate('customer')); ?></label>
                                    <select class="js-example-basic-multiple js-states js-example-responsive form-control" name="customer_id" >
                                        <option disabled selected><?php echo e(translate('select_customer')); ?></option>
                                        <option value="0"><?php echo e(translate('all_customer')); ?></option>
                                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->f_name. ' '. $customer->l_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group first_order">
                                    <label
                                        for="exampleFormControlInput1" class="title-color font-weight-medium d-flex"><?php echo e(translate('limit_for_same_user')); ?></label>
                                    <input type="number" name="limit" value="<?php echo e(old('limit')); ?>" min="0" id="coupon_limit" class="form-control"
                                           placeholder="<?php echo e(translate('ex')); ?>: 10">
                                </div>
                                <div class="col-md-6 col-lg-4 form-group free_delivery">
                                    <label for="name" class="title-color font-weight-medium d-flex"><?php echo e(translate('discount_type')); ?></label>
                                    <select id="discount_type" class="form-control w-100" name="discount_type"
                                            onchange="checkDiscountType(this.value)">
                                        <option value="amount"><?php echo e(translate('amount')); ?></option>
                                        <option value="percentage"><?php echo e(translate('percentage')); ?> (%)</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group free_delivery">
                                    <label for="name" class="title-color font-weight-medium d-flex"><?php echo e(translate('discount_Amount')); ?> <span id="discount_percent"> (%)</span></label>
                                    <input type="number" min="1" max="1000000" name="discount" value="<?php echo e(old('discount')); ?>" class="form-control"
                                           id="discount"
                                           placeholder="<?php echo e(translate('ex')); ?> : 500">
                                </div>
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="name" class="title-color font-weight-medium d-flex"><?php echo e(translate('minimum_purchase')); ?> ($)</label>
                                    <input type="number" min="1" max="1000000" name="min_purchase" value="<?php echo e(old('min_purchase')); ?>" class="form-control"
                                        id="minimum purchase"
                                        placeholder="<?php echo e(translate('ex')); ?> : 100">
                                </div>
                                <div class="col-md-6 col-lg-4 form-group free_delivery" id="max-discount">
                                    <label for="name" class="title-color font-weight-medium d-flex"><?php echo e(translate('maximum_discount')); ?> ($)</label>
                                    <input type="number" min="1" max="1000000" name="max_discount" value="<?php echo e(old('max_discount')); ?>"
                                        class="form-control" id="maximum discount"
                                        placeholder="<?php echo e(translate('ex')); ?> : 5000" >
                                </div>
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="name" class="title-color font-weight-medium d-flex"><?php echo e(translate('start_date')); ?></label>
                                    <input id="start_date" type="date" name="start_date" value="<?php echo e(old('start_date')); ?>" class="form-control"
                                        placeholder="<?php echo e(translate('start_date')); ?>" required>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="name" class="title-color font-weight-medium d-flex"><?php echo e(translate('expire_date')); ?></label>
                                    <input id="expire_date" type="date" name="expire_date" value="<?php echo e(old('expire_date')); ?>" class="form-control"
                                        placeholder="<?php echo e(translate('expire_date')); ?>" required>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end flex-wrap gap-10">
                                <button type="reset" class="btn btn-secondary px-4"><?php echo e(translate('reset')); ?></button>
                                <button type="submit" class="btn btn--primary px-4"><?php echo e(translate('submit')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-20">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="d-flex flex-wrap  gap-3 align-items-center">
                            <h5 class="mb-0 text-capitalize d-flex gap-2 mr-auto">
                                <?php echo e(translate('coupon_list')); ?>

                                <span class="badge badge-soft-dark radius-50 fz-12 ml-1"><?php echo e($cou->total()); ?></span>
                            </h5>
                            <form action="<?php echo e(url()->current()); ?>" method="GET">
                                <div class="input-group input-group-merge input-group-custom">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tio-search"></i>
                                        </div>
                                    </div>
                                    <input id="datatableSearch_" type="search" name="search" class="form-control"
                                        placeholder="<?php echo e(translate('search_by_Title_or_Code_or_Discount_Type')); ?>"
                                        value="<?php echo e($search); ?>" aria-label="Search orders" required>
                                    <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                                </div>
                            </form>
                            <div>
                                <button type="button" class="btn btn-outline--primary text-nowrap btn-block" data-toggle="dropdown">
                                    <i class="tio-download-to"></i>
                                    <?php echo e(translate('export')); ?>

                                    <i class="tio-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-item"
                                           href="<?php echo e(route('admin.coupon.export',['search'=>$search])); ?>"  >
                                            <img width="14" src="<?php echo e(asset('/public/assets/back-end/img/excel.png')); ?>" alt="">
                                            <?php echo e(translate('excel')); ?>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="datatable"
                                class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table <?php echo e(Session::get('direction') === 'rtl' ? 'text-right' : 'text-left'); ?>">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(translate('SL')); ?></th>
                                <th><?php echo e(translate('coupon')); ?></th>
                                <th><?php echo e(translate('coupon_type')); ?></th>
                                <th><?php echo e(translate('duration')); ?></th>
                                <th><?php echo e(translate('user_limit')); ?></th>
                                <th><?php echo e(translate('discount_bearer')); ?></th>
                                <th><?php echo e(translate('status')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $cou; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td ><?php echo e($cou->firstItem() + $k); ?></td>
                                    <td>
                                        <div><?php echo e(substr($c['title'],0,20)); ?></div>
                                        <strong><?php echo e(translate('code')); ?>: <?php echo e($c['code']); ?></strong>
                                    </td>
                                    <td class="text-capitalize"><?php echo e(translate(str_replace('_',' ',$c['coupon_type']))); ?></td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-1">
                                            <span><?php echo e(date('d M, y',strtotime($c['start_date']))); ?> - </span>
                                            <span><?php echo e(date('d M, y',strtotime($c['expire_date']))); ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <span><?php echo e(translate('limit')); ?>: <strong><?php echo e($c['limit']); ?>,</strong></span>
                                        <span class="ml-1"><?php echo e(translate('used')); ?>: <strong><?php echo e($c['order_count']); ?></strong></span>
                                    </td>
                                    <td><?php echo e($c['coupon_bearer'] == 'inhouse' ? 'admin':$c['coupon_bearer']); ?></td>
                                    <td>
                                        <form action="<?php echo e(route('admin.coupon.status',[$c['id'],$c->status?0:1])); ?>" method="GET" id="coupon_status<?php echo e($c['id']); ?>_form" class="coupon_status_form">
                                            <label class="switcher">
                                                <input type="checkbox" class="switcher_input" id="coupon_status<?php echo e($c['id']); ?>" name="status" value="1" <?php echo e($c->status == 1 ? 'checked':''); ?> onclick="toogleStatusModal(event,'coupon_status<?php echo e($c['id']); ?>','coupon-status-on.png','coupon-status-off.png','<?php echo e(translate('Want_to_Turn_ON_Coupon_Status')); ?>','<?php echo e(translate('Want_to_Turn_OFF_Coupon_Status')); ?>',`<p><?php echo e(translate('if_enabled_this_coupon_will_be_available_on_the_website_and_customer_app')); ?></p>`,`<p><?php echo e(translate('if_disabled_this_coupon_will_be_hidden_from_the_website_and_customer_app')); ?></p>`)">
                                                <span class="switcher_control"></span>
                                            </label>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-10 justify-content-center">
                                            <button class="btn btn-outline--primary square-btn btn-sm mr-1" onclick="get_details(this)" data-id="<?php echo e($c['id']); ?>" data-toggle="modal" data-target="#exampleModalCenter">
                                                <img src="<?php echo e(asset('/public/assets/back-end/img/eye.svg')); ?>" class="svg" alt="">
                                            </button>
                                            <a class="btn btn-outline--primary btn-sm edit"
                                            href="<?php echo e(route('admin.coupon.update',[$c['id']])); ?>"
                                            title="<?php echo e(translate('edit')); ?>"
                                            >
                                                <i class="tio-edit"></i>
                                            </a>
                                            <a class="btn btn-outline-danger btn-sm delete"
                                                href="javascript:"
                                                onclick="form_alert('coupon-<?php echo e($c['id']); ?>','<?php echo e(translate('want_to_delete_this_coupon?')); ?>')"
                                                title="<?php echo e(translate('delete')); ?>"
                                                >
                                                <i class="tio-delete"></i>
                                            </a>
                                            <form action="<?php echo e(route('admin.coupon.delete',[$c['id']])); ?>"
                                                method="post" id="coupon-<?php echo e($c['id']); ?>">
                                                <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="modal fade" id="quick-view" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered coupon-details" role="document">
                                <div class="modal-content" id="quick-view-modal">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-lg-end">
                            <!-- Pagination -->
                            <?php echo e($cou->links()); ?>

                        </div>
                    </div>

                    <?php if(count($cou)==0): ?>
                        <div class="text-center p-4">
                            <img class="mb-3 w-160" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg"
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
<script>

    $(document).ready(function() {
            generateCode();

            $('#discount_percent').hide();
            let discount_type = $('#discount_type').val();
            if (discount_type == 'amount') {
                $('#max-discount').hide()
            } else if (discount_type == 'percentage') {
                $('#max-discount').show()
            }

            $('#start_date').attr('min',(new Date()).toISOString().split('T')[0]);
            $('#expire_date').attr('min',(new Date()).toISOString().split('T')[0]);
        });

        $("#start_date").on("change", function () {
            $('#expire_date').attr('min',$(this).val());
        });

        $("#expire_date").on("change", function () {
            $('#start_date').attr('max',$(this).val());
        });

        function get_details(t){
            let id = $(t).data('id')

            $.ajax({
                type: 'GET',
                url: '<?php echo e(route('admin.coupon.quick-view-details')); ?>',
                data: {
                    id: id
                },
                beforeSend: function () {
                    $('#loading').fadeIn();
                },
                success: function (data) {
                    $('#loading').fadeOut();
                    $('#quick-view').modal('show');
                    $('#quick-view-modal').empty().html(data.view);
                }
            });
        }

        function checkDiscountType(val) {
            if (val == 'amount') {
                $('#max-discount').hide()
            } else if (val == 'percentage') {
                $('#max-discount').show()
            }
        }

        function  generateCode(){
            let code = Math.random().toString(36).substring(2,12);
            $('#code').val(code)
        }


</script>

    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/select2.min.js"></script>
    <script>
        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });
    </script>

    <!-- Page level plugins -->
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/demo/datatables-demo.js"></script>

<script>
    $('#discount_type').on('change', function (){
        let type = $('#discount_type').val();
        if(type === 'amount'){
            $('#discount').attr({
                'placeholder': 'Ex: 500',
                "max":"1000000"
            });
            $('#discount_percent').hide();
        }else if(type === 'percentage'){
            $('#discount').attr({
                "max":"100",
                "placeholder":"Ex: 10%"
            });
            $('#discount_percent').show();
        }
    });
    $('#coupon_bearer').on('change', function (){
        let coupon_bearer = $('#coupon_bearer').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '<?php echo e(route('admin.coupon.ajax-get-seller')); ?>',
            data: {
                coupon_bearer: coupon_bearer
            },
            success: function (result) {
                $("#seller_wise_coupon").html(result);
            }
        });
    });

    $('#coupon_type').on('change', function (){
        let discount_type = $('#discount_type').val();
        let type = $('#coupon_type').val();

        if(type === 'free_delivery'){
            if (discount_type === 'amount') {
                $('.first_order').show();
                $('.free_delivery').hide();
            } else if (discount_type === 'percentage') {
                $('.first_order').show();
                $('.free_delivery').hide();
            }
        }else if(type === 'first_order'){
            if (discount_type === 'amount') {
                $('.free_delivery').show();
                $('.first_order').hide();
                $('#max-discount').hide()
            } else if (discount_type === 'percentage') {
                $('.free_delivery').show();
                $('.first_order').hide();
                $('#max-discount').show()
            }
        }else{
            if (discount_type === 'amount') {
                $('.first_order').show();
                $('.free_delivery').show();
                $('#max-discount').hide()
            } else if (discount_type === 'percentage') {
                $('.first_order').show();
                $('.free_delivery').show();
                $('#max-discount').show()
            }
        }
    });

    $('.coupon_status_form').on('submit', function(event){
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: $(this).attr('action'),
                method: 'GET',
                data: $(this).serialize(),
                success: function (data) {
                    toastr.success(data.message);
                }
            });
        });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/coupon/add-new.blade.php ENDPATH**/ ?>