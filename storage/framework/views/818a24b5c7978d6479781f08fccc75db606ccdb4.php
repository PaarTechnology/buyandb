<?php $__env->startSection('title', translate('payment_Method')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('/public/assets/back-end/img/3rd-party.png')); ?>" alt="">
                <?php echo e(translate('3rd_party')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Inlile Menu -->
        <?php echo $__env->make('admin-views.business-settings.third-party-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Inlile Menu -->

        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo e(route('admin.business-settings.payment-method.update')); ?>"
                        style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                        method="post">
                    <?php echo csrf_field(); ?>
                    <h5 class="mb-4 text-uppercase d-flex text-capitalize"><?php echo e(translate('payment_methods')); ?></h5>

                    <div class="row">
                        <?php ($cash_on_delivery=\App\CPU\Helpers::get_business_settings('cash_on_delivery')); ?>
                        <?php if(isset($cash_on_delivery)): ?>
                        <div class="col-xl-4 col-sm-6">
                            <div class="form-group">
                                <div class="d-flex justify-content-between align-items-center gap-10 form-control">
                                    <span class="title-color">
                                        <?php echo e(translate('cash_on_delivery')); ?>

                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="top" title="<?php echo e(translate('if_enabled,_the_cash_on_delivery_option_will_be_available_on_the_system._Customers_can_use_COD_as_a_payment_option')); ?>.">
                                            <img width="16" src="<?php echo e(asset('/public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                        </span>
                                    </span>

                                    <label class="switcher" for="cash_on_delivery">
                                        <input type="checkbox" class="switcher_input" name="cash_on_delivery"
                                        onclick="toogleStatusModal(event,'cash_on_delivery','cod-on.png','cod-on.png',
                                        '<?php echo e(translate('want_to_Turn_ON_the_Cash_On_Delivery_option')); ?>?','<?php echo e(translate('want_to_Turn_OFF_the_Cash_On_Delivery_option')); ?>?',
                                        `<p><?php echo e(translate('if_enabled_customers_can_select_Cash_on_Delivery_as_a_payment_method_during_checkout')); ?></p>`,
                                        `<p><?php echo e(translate('if_disabled_the Cash_on_Delivery_payment_method_will_be_hidden_from_the_checkout_page')); ?></p>`)"
                                         id="cash_on_delivery" value="1" <?php echo e($cash_on_delivery['status']==1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php ($digital_payment=\App\CPU\Helpers::get_business_settings('digital_payment')); ?>
                        <?php if(isset($digital_payment)): ?>

                        <div class="col-xl-4 col-sm-6">
                            <div class="form-group">
                                <div class="d-flex justify-content-between align-items-center gap-10 form-control">
                                    <span class="title-color">
                                        <?php echo e(translate('digital_payment')); ?>

                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="top" title="<?php echo e(translate('if_enabled,_customers_can_choose_digital_payment_options_during_the_checkout_process')); ?>">
                                            <img width="16" src="<?php echo e(asset('/public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                        </span>
                                    </span>

                                    <label class="switcher" for="digital_payment">
                                        <input type="checkbox" class="switcher_input" name="digital_payment"
                                        onclick="toogleStatusModal(event,'digital_payment','digital-paymet-on.png','digital-payment-off.png',
                                        '<?php echo e(translate('want_to_Turn_ON_the_Digital_Payment_option')); ?>?','<?php echo e(translate('want_to_Turn_OFF_the_Digital_Payment_option')); ?>?',
                                        `<p><?php echo e(translate('if_enabled_customers_can_select_Digital_Payment_during_checkout')); ?></p>`,
                                        `<p><?php echo e(translate('if_disabled_Digital_Payment_options_will_be_hidden_from_the_checkout_page')); ?></p>`)"
                                        id="digital_payment" value="1" <?php echo e($digital_payment['status']==1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php ($offline_payment=\App\CPU\Helpers::get_business_settings('offline_payment')); ?>
                        <?php if(isset($offline_payment)): ?>

                        <div class="col-xl-4 col-sm-6">
                            <div class="form-group">
                                <div class="d-flex justify-content-between align-items-center gap-10 form-control">
                                    <span class="title-color">
                                        <?php echo e(translate('offline_payment')); ?>

                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="top" title="<?php echo e(translate('offline_Payment_allows_customers_to_use_external_payment_methods._They_must_share_payment_details_with_the_seller_afterward._Admin_can_set_whether_customers_can_make_offline_payments_by_enabling/disabling_this_button.
                                        ')); ?>">
                                            <img width="16" src="<?php echo e(asset('/public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                        </span>
                                    </span>

                                    <label class="switcher" for="offline_payment">
                                        <input type="checkbox" class="switcher_input" name="offline_payment"
                                        onclick="toogleStatusModal(event,'offline_payment','digital-paymet-on.png','digital-payment-off.png',
                                        '<?php echo e(translate('want_to_Turn_ON_the_Offline_Payment_option')); ?>?','<?php echo e(translate('want_to_Turn_OFF_the_Offline_Payment_option')); ?>?',
                                        `<p><?php echo e(translate('if_enabled_customers_can_pay_through_external_payment_methods')); ?></p>`,
                                        `<p><?php echo e(translate('if_disabled_customers_have_to_use_the_system-added_payment_gateways')); ?></p>`)"
                                         id="offline_payment" value="1" <?php echo e($offline_payment['status']==1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn--primary px-5 text-uppercase"><?php echo e(translate('save')); ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php if($payment_gateway_published_status): ?>
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body d-flex justify-content-around">
                        <h4 class="text-danger bg-transparent">
                            <i class="tio-info-outined"></i>
                            <?php echo e(translate('Your current payment settings are disabled, because you have enabled
                            payment gateway addon, To visit your currently active payment gateway settings please follow
                            the link.')); ?>

                        </h4>
                        <span>
                            <a href="<?php echo e(!empty($payment_url) ? $payment_url : ''); ?>" class="btn btn-outline-primary"><i class="tio-settings mr-1"></i><?php echo e(translate('settings')); ?></a>
                        </span>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- payment getway -->
        <div class="row gy-3" id="payment-gatway-cards">
            <?php $__currentLoopData = $payment_gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">
                    <div class="card">
                        <form action="<?php echo e(route('admin.business-settings.payment-method.addon-payment-set')); ?>" method="POST"
                              id="<?php echo e($payment->key_name); ?>-form" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="card-header d-flex flex-wrap align-content-around">
                                <h5>
                                    <span class="text-uppercase"><?php echo e(str_replace('_',' ',$payment->key_name)); ?></span>
                                </h5>

                                <?php ($additional_data = $payment['additional_data'] != null ? json_decode($payment['additional_data']) : []); ?>

                                <?php
                                    if ($additional_data != null){
                                        $img_path = asset('storage/app/public/payment_modules/gateway_image/'. $additional_data->gateway_image ?? '');
                                    }else{
                                        $img_path = asset('/public/assets/back-end/img/modal/payment-methods/'.$payment->key_name.'.png');
                                    }
                                ?>

                                <label class="switcher show-status-text">
                                    <input class="switcher_input" type="checkbox" name="status" value="1"
                                    onclick="paymentMethodStatusModal(event,'<?php echo e($payment->key_name); ?>','<?php echo e($img_path); ?>',
                                    '<?php echo e(translate('want_to_Turn_ON_')); ?><?php echo e(str_replace('_',' ',$payment->key_name)); ?><?php echo e(translate('_as_the_Digital_Payment_method')); ?>?','<?php echo e(translate('want_to_Turn_OFF_')); ?><?php echo e(str_replace('_',' ',$payment->key_name)); ?><?php echo e(translate('_as_the_Digital_Payment_method')); ?>??',
                                    `<p><?php echo e(translate('if_enabled_customers_can_use_this_payment_method')); ?></p>`,
                                    `<p><?php echo e(translate('if_disabled_this_payment_method_will_be_hidden_from_the_checkout_page')); ?></p>`)"
                                        id="<?php echo e($payment->key_name); ?>" <?php echo e($payment['is_active']==1?'checked':''); ?>>

                                    <span class="switcher_control" data-ontitle="<?php echo e(translate('on')); ?>" data-offtitle="<?php echo e(translate('off')); ?>"></span>
                                </label>
                            </div>


                            <div class="card-body">
                                <div class="payment--gateway-img">
                                    <img style="height: 80px" id="gateway_img<?php echo e($payment->key_name); ?>"
                                         src="<?php echo e(asset('storage/app/public/payment_modules/gateway_image')); ?>/<?php echo e($additional_data != null ? $additional_data->gateway_image : ''); ?>"
                                         onerror="this.src='<?php echo e(asset('public/assets/back-end/img/payment-gateway-placeholder.png')); ?>'"
                                         alt="public">
                                </div>

                                <input name="gateway" value="<?php echo e($payment->key_name); ?>" class="d-none">

                                <?php ($mode=$payment->live_values['mode']); ?>
                                <div class="form-group" style="margin-bottom: 10px">
                                    <select class="js-example-responsive form-control" name="mode">
                                        <option value="live" <?php echo e($mode=='live'?'selected':''); ?>><?php echo e(translate('live')); ?></option>
                                        <option value="test" <?php echo e($mode=='test'?'selected':''); ?>><?php echo e(translate('test')); ?></option>
                                    </select>
                                </div>

                                <?php ($skip=['gateway','mode','status']); ?>

                                <?php $__currentLoopData = $payment->live_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!in_array($key,$skip)): ?>
                                        <?php if($payment->key_name === 'paystack' && $key == 'callback_url'): ?>
                                            <div class="form-group" style="margin-bottom: 10px">
                                                <label for="exampleFormControlInput1"
                                                       class="form-label"><?php echo e(ucwords(str_replace('_',' ',$key))); ?></label>

                                                <div class="d-flex">
                                                    <span class="form-control" id="id_paystack"><?php echo e(url('/')); ?>/payment/paystack/callback</span>
                                                    <span class="btn btn--primary text-nowrap"
                                                          onclick="copyToClipboard('#id_paystack')"><i
                                                            class="tio-copy"></i> <?php echo e(\App\CPU\translate('Copy_URI')); ?></span>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-group" style="margin-bottom: 10px">
                                                <label for="exampleFormControlInput1"
                                                       class="form-label"><?php echo e(ucwords(str_replace('_',' ',$key))); ?>

                                                    <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control"
                                                       name="<?php echo e($key); ?>"
                                                       placeholder="<?php echo e(ucwords(str_replace('_',' ',$key))); ?> *"
                                                       value="<?php echo e(env('APP_ENV')=='demo'?'':$value); ?>">
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="form-group" style="margin-bottom: 10px">
                                    <label for="exampleFormControlInput1"
                                           class="form-label"><?php echo e(translate('payment_gateway_title')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"
                                           name="gateway_title"
                                           placeholder="<?php echo e(translate('payment_gateway_title')); ?>"
                                           value="<?php echo e($additional_data != null ? $additional_data->gateway_title : ''); ?>" required>
                                </div>

                                <div class="form-group" style="margin-bottom: 10px">
                                    <label for="exampleFormControlInput1"
                                           class="form-label"><?php echo e(translate('Choose_Logo')); ?> </label>
                                    <input type="file" class="form-control" name="gateway_image" accept=".jpg, .png, .jpeg|image/*"
                                    onchange="document.getElementById('gateway_img<?php echo e($payment->key_name); ?>').src = window.URL.createObjectURL(this.files[0])">
                                </div>

                                <div class="text-right" style="margin-top: 20px">
                                    <button type="submit" class="btn btn-primary px-5"><?php echo e(translate('save')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
            toastr.success("<?php echo e(translate('Copied_to_the_clipboard')); ?>");
        }
    </script>

    <script>
        function paymentMethodStatusModal(e, toggle_id, image, on_title, off_title, on_message, off_message) {
            e.preventDefault();

            $('#toggle-status-image').attr('src', image);
            if ($('#'+toggle_id).is(':checked')) {
                $('#toggle-status-title').empty().append(on_title);
                $('#toggle-status-message').empty().append(on_message);
                $('#toggle-status-ok-button').attr('toggle-ok-button', toggle_id);
                $('.toggle-modal-img-box .status-icon').attr('src', '<?php echo e(asset("/public/assets/back-end/img/modal/status-green.png")); ?>');
            } else {
                $('#toggle-status-title').empty().append(off_title);
                $('#toggle-status-message').empty().append(off_message);
                $('#toggle-status-ok-button').attr('toggle-ok-button', toggle_id);
                $('.toggle-modal-img-box .status-icon').attr('src', '<?php echo e(asset("/public/assets/back-end/img/modal/status-warning.png")); ?>');
            }
            $('#toggle-status-modal').modal('show');
        }
    </script>

    <script>
        <?php if($payment_gateway_published_status): ?>
            $('#payment-gatway-cards').find('input').each(function(){
                $(this).attr('disabled', true);
            });
            $('#payment-gatway-cards').find('select').each(function(){
                $(this).attr('disabled', true);
            });
            $('#payment-gatway-cards').find('.switcher_input').each(function(){
                $(this).removeAttr('checked', true);
            });
            $('#payment-gatway-cards').find('button').each(function(){
                $(this).attr('disabled', true);
            });
        <?php endif; ?>
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/business-settings/payment-method/index.blade.php ENDPATH**/ ?>