<?php $__env->startSection('title', translate('order_Details')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-4">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('/public/assets/back-end/img/all-orders.png')); ?>" alt="">
                <?php echo e(translate('order_Details')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <div class="row gy-3" id="printableArea">
            <div class="col-lg-8">
                <!-- Card -->
                <div class="card h-100">
                    <!-- Body -->
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-10 justify-content-between mb-4">
                            <div class="d-flex flex-column gap-10">
                                <h4 class="text-capitalize"><?php echo e(translate('Order_ID')); ?>  #<?php echo e($order['id']); ?></h4>
                                <div class="">
                                    <?php echo e(date('d M, Y , h:i A',strtotime($order['created_at']))); ?>

                                </div>
                                <?php if($linked_orders->count() >0): ?>
                                    <div class="d-flex flex-wrap gap-10">
                                        <div class="color-caribbean-green-soft font-weight-bold d-flex align-items-center rounded py-1 px-2"> <?php echo e(translate('linked_orders')); ?> (<?php echo e($linked_orders->count()); ?>) : </div>
                                        <?php $__currentLoopData = $linked_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linked): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(route('admin.orders.details',[$linked['id']])); ?>"
                                            class="btn color-caribbean-green text-white rounded py-1 px-2"><?php echo e($linked['id']); ?></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="text-sm-right">
                                <div class="d-flex flex-wrap gap-10 justify-content-end">
                                    <!-- order verificaiton button-->
                                    <?php if(count($order->verification_images)>0 && $order->verification_status ==1): ?>
                                        <div>
                                            <button class="btn btn--primary px-4" data-toggle="modal" data-target="#order_verification_modal"><i
                                                class="tio-verified"></i> <?php echo e(translate('order_verification')); ?>

                                            </button>
                                        </div>
                                    <?php endif; ?>
                                    <!-- order verificaiton button-->
                                    <?php if(isset($shipping_address['latitude']) && isset($shipping_address['longitude'])): ?>
                                    <div class="">
                                            <button class="btn btn--primary px-4" data-toggle="modal" data-target="#locationModal"><i
                                                    class="tio-map"></i> <?php echo e(translate('show_locations_on_map')); ?></button>
                                    </div>
                                    <?php endif; ?>

                                    <a class="btn btn--primary px-4" target="_blank"
                                        href=<?php echo e(route('admin.orders.generate-invoice',[$order['id']])); ?>>
                                        <img src="<?php echo e(asset('public/assets/back-end/img/icons/uil_invoice.svg')); ?>" alt="" class="mr-1">
                                        <?php echo e(translate('print_Invoice')); ?>

                                    </a>
                                </div>
                                <div class="d-flex flex-column gap-2 mt-3">
                                    <!-- Order status -->
                                    <div class="order-status d-flex justify-content-sm-end gap-10 text-capitalize">
                                        <span class="title-color"><?php echo e(translate('status')); ?>: </span>
                                        <?php if($order['order_status']=='pending'): ?>
                                            <span class="badge color-caribbean-green-soft font-weight-bold radius-50 d-flex align-items-center py-1 px-2"><?php echo e(translate(str_replace('_',' ',$order['order_status']))); ?></span>
                                        <?php elseif($order['order_status']=='failed'): ?>
                                            <span class="badge badge-danger font-weight-bold radius-50 d-flex align-items-center py-1 px-2"><?php echo e(translate(str_replace('_',' ',$order['order_status'] == 'failed' ? 'Failed to Deliver' : ''))); ?>

                                            </span>
                                        <?php elseif($order['order_status']=='processing' || $order['order_status']=='out_for_delivery'): ?>
                                            <span class="badge badge-soft-warning font-weight-bold radius-50 d-flex align-items-center py-1 px-2">
                                                <?php echo e(translate(str_replace('_',' ',$order['order_status'] == 'processing' ? 'Packaging' : $order['order_status']))); ?>

                                            </span>
                                        <?php elseif($order['order_status']=='delivered' || $order['order_status']=='confirmed'): ?>
                                            <span class="badge badge-soft-success font-weight-bold radius-50 d-flex align-items-center py-1 px-2">
                                                <?php echo e(translate(str_replace('_',' ',$order['order_status']))); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="badge badge-soft-danger font-weight-bold radius-50 d-flex align-items-center py-1 px-2">
                                                <?php echo e(translate(str_replace('_',' ',$order['order_status']))); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Payment Method -->
                                    <div class="payment-method d-flex justify-content-sm-end gap-10 text-capitalize">
                                        <span class="title-color"><?php echo e(translate('payment_Method')); ?> :</span>
                                        <strong><?php echo e(translate($order['payment_method'])); ?></strong>
                                    </div>

                                    <!-- reference-code -->
                                    <?php if($order->payment_method != 'cash_on_delivery' && $order->payment_method != 'pay_by_wallet' && !isset($order->offline_payments)): ?>
                                        <div class="reference-code d-flex justify-content-sm-end gap-10 text-capitalize">
                                            <span class="title-color"><?php echo e(translate('reference_Code')); ?> :</span>
                                            <strong><?php echo e(str_replace('_',' ',$order['transaction_ref'])); ?> <?php echo e($order->payment_method == 'offline_payment' ? '('.$order->payment_by.')':''); ?></strong>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Payment Status -->
                                    <div class="payment-status d-flex justify-content-sm-end gap-10">
                                        <span class="title-color"><?php echo e(translate('payment_Status')); ?>:</span>
                                        <?php if($order['payment_status']=='paid'): ?>
                                            <span class="text-success payment-status-span font-weight-bold">
                                                <?php echo e(translate('paid')); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="text-danger payment-status-span font-weight-bold">
                                                <?php echo e(translate('unpaid')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <?php if(\App\CPU\Helpers::get_business_settings('order_verification')): ?>
                                        <span class="ml-2 ml-sm-3">
                                            <b>
                                                <?php echo e(translate('order_verification_code')); ?> : <?php echo e($order['verification_code']); ?>

                                            </b>
                                        </span>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <!-- Order Note -->
                            <?php if($order->order_note !=null): ?>
                            <div class="mt-2 mb-5 w-100 d-block">
                                <div class="gap-10">
                                    <h4><?php echo e(translate('order_Note')); ?>:</h4>
                                    <div class="text-justify"><?php echo e($order->order_note); ?></div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="table-responsive datatable-custom">
                            <table class="table fz-12 table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                                <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th><?php echo e(translate('SL')); ?></th>
                                    <th><?php echo e(translate('item_details')); ?></th>
                                    <th><?php echo e(translate('item_price')); ?></th>
                                    <th><?php echo e(translate('tax')); ?></th>
                                    <th><?php echo e(translate('item_discount')); ?></th>
                                    <th><?php echo e(translate('total_price')); ?></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php ($item_price=0); ?>
                                <?php ($total_price=0); ?>
                                <?php ($subtotal=0); ?>
                                <?php ($total=0); ?>
                                <?php ($shipping=0); ?>
                                <?php ($discount=0); ?>
                                <?php ($tax=0); ?>
                                <?php ($row=0); ?>

                                <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($detail->product_all_status): ?>
                                        <tr>
                                            <td><?php echo e(++$row); ?></td>
                                            <td>
                                                <div class="media align-items-center gap-10">
                                                    <img class="avatar avatar-60 rounded"
                                                         onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img2.jpg')); ?>'"
                                                         src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($detail->product_all_status['thumbnail']); ?>"
                                                         alt="Image Description">
                                                    <div>
                                                        <h6 class="title-color"><?php echo e(substr($detail->product_all_status['name'],0,30)); ?><?php echo e(strlen($detail->product_all_status['name'])>10?'...':''); ?></h6>
                                                        <div><strong><?php echo e(translate('qty')); ?> :</strong> <?php echo e($detail['qty']); ?></div>
                                                        <div>
                                                            <strong><?php echo e(translate('unit_price')); ?> :</strong>
                                                            <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($detail['price']+($detail->tax_model =='include' ? $detail['tax']:0)))); ?>

                                                            <?php if($detail->tax_model =='include'): ?>
                                                                (<?php echo e(translate('tax_incl.')); ?>)
                                                            <?php else: ?>
                                                                (<?php echo e(translate('tax').":".($detail->product_all_status->tax)); ?><?php echo e($detail->product_all_status->tax_type ==="percent" ? '%' :''); ?>)
                                                            <?php endif; ?>

                                                        </div>
                                                        <?php if($detail->variant): ?>
                                                            <div><strong><?php echo e(translate('variation')); ?> :</strong> <?php echo e($detail['variant']); ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php if($detail->product_all_status->digital_product_type == 'ready_after_sell'): ?>
                                                    <button type="button" class="btn btn-sm btn--primary mt-2" title="File Upload" data-toggle="modal" data-target="#fileUploadModal-<?php echo e($detail->id); ?>" onclick="modalFocus('fileUploadModal-<?php echo e($detail->id); ?>')">
                                                        <i class="tio-file-outlined"></i> <?php echo e(translate('file')); ?>

                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($detail['price']*$detail['qty']))); ?>

                                            </td>
                                            <td>
                                                <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($detail['tax']))); ?>

                                            </td>

                                            <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($detail['discount']))); ?></td>

                                            <?php ($subtotal=$detail['price']*$detail['qty']+$detail['tax']-$detail['discount']); ?>
                                            <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($subtotal))); ?></td>
                                        </tr>
                                        <?php ($item_price+=$detail['price']*$detail['qty']); ?>
                                        <?php ($discount+=$detail['discount']); ?>
                                        <?php ($tax+=$detail['tax']); ?>
                                        <?php ($total+=$subtotal); ?>
                                        <!-- End Media -->
                                    <?php endif; ?>
                                    <?php ($sellerId=$detail->seller_id); ?>

                                    <?php if(isset($detail->product_all_status->digital_product_type) && $detail->product_all_status->digital_product_type == 'ready_after_sell'): ?>
                                        <?php ($product_details = json_decode($detail->product_details)); ?>
                                        <div class="modal fade" id="fileUploadModal-<?php echo e($detail->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form action="<?php echo e(route('admin.orders.digital-file-upload-after-sell')); ?>" method="post" enctype="multipart/form-data">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="modal-body">
                                                            <?php if($detail->digital_file_after_sell): ?>
                                                                <div class="mb-4">
                                                                    <?php echo e(translate('uploaded_file')); ?> :
                                                                    <a href="<?php echo e(asset('storage/app/public/product/digital-product/'.$detail->digital_file_after_sell)); ?>"
                                                                       class="btn btn-success btn-sm" title="Download" download><i class="tio-download"></i> <?php echo e(translate('download')); ?></a>
                                                                </div>
                                                            <?php else: ?>
                                                                <h4 class="text-center"><?php echo e(translate('file_not_found')); ?>!</h4>
                                                            <?php endif; ?>
                                                            <?php if(($product_details->added_by == 'admin') && $detail->seller_id == 1): ?>
                                                            <div class="inputDnD">
                                                                <div class="form-group inputDnD input_image input_image_edit rounded-lg"  data-title="<?php echo e(translate('drag_&_drop_file_or_browse_file')); ?>" data-title="<?php echo e(translate('drag_&_drop_file_or_browse_file')); ?>">
                                                                    <input type="file" name="digital_file_after_sell" class="form-control-file text--primary font-weight-bold" id="inputFile" accept=".jpg, .jpeg, .png, .gif, .zip, .pdf" onchange="readUrl(this)">
                                                                </div>
                                                            </div>
                                                                <div class="mt-1 text-info"><?php echo e(translate('file_type')); ?>: jpg, jpeg, png, gif, zip, pdf</div>
                                                                <input type="hidden" value="<?php echo e($detail->id); ?>" name="order_id">
                                                            <?php else: ?>
                                                                <h4 class="mt-3 text-center"><?php echo e(translate('admin_have_no_permission_for_sellers_digital_product_upload')); ?></h4>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(translate('close')); ?></button>
                                                            <?php if(($product_details->added_by == 'admin') && $detail->seller_id == 1): ?>
                                                                <button type="submit" class="btn btn--primary"><?php echo e(translate('upload')); ?></button>
                                                            <?php endif; ?>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <?php ($shipping=$order['shipping_cost']); ?>
                        <?php ($coupon_discount=$order['discount_amount']); ?>
                        <hr />
                        <div class="row justify-content-md-end mb-3">
                            <div class="col-md-9 col-lg-8">
                                <dl class="row gy-1 text-sm-right">
                                    <dt class="col-5"><?php echo e(translate('item_price')); ?></dt>
                                    <dd class="col-6 title-color">
                                        <strong><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($item_price))); ?></strong>
                                    </dd>
                                    <dt class="col-5 text-capitalize"><?php echo e(translate('item_discount')); ?></dt>
                                    <dd class="col-6 title-color">
                                        - <strong><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($discount))); ?></strong>
                                    </dd>
                                    <dt class="col-5 text-capitalize"><?php echo e(translate('sub_total')); ?></dt>
                                    <dd class="col-6 title-color">
                                        <strong><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($item_price-$discount))); ?></strong>
                                    </dd>
                                    <dt class="col-5"><?php echo e(translate('coupon_discount')); ?></dt>
                                    <dd class="col-6 title-color">
                                        - <strong><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($coupon_discount))); ?></strong>
                                    </dd>
                                    <dt class="col-5 text-uppercase"><?php echo e(translate('vat')); ?>/<?php echo e(translate('tax')); ?></dt>
                                    <dd class="col-6 title-color">
                                        <strong><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($tax))); ?></strong>
                                    </dd>
                                    <dt class="col-5 text-capitalize"><?php echo e(translate('delivery_fee')); ?></dt>
                                    <dd class="col-6 title-color">
                                        <strong><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($shipping))); ?></strong>
                                    </dd>

                                    <?php ($delivery_fee_discount = 0); ?>
                                    <?php if($order['is_shipping_free']): ?>
                                        <dt class="col-5"><?php echo e(translate('delivery_fee_discount')); ?> (<?php echo e(translate($order['free_delivery_bearer'])); ?> <?php echo e(translate('bearer')); ?>)</dt>
                                        <dd class="col-6 title-color">
                                            + <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($shipping))); ?>

                                        </dd>
                                        <?php ($delivery_fee_discount = $shipping); ?>
                                        <?php ($total += $delivery_fee_discount); ?>
                                    <?php endif; ?>

                                    <?php if($order['coupon_discount_bearer'] == 'inhouse' && !in_array($order['coupon_code'], [0, NULL])): ?>
                                        <dt class="col-5"><?php echo e(translate('coupon_discount')); ?> (<?php echo e(translate('admin_bearer')); ?>)</dt>
                                        <dd class="col-6 title-color">
                                            + <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($coupon_discount))); ?>

                                        </dd>
                                        <?php ($total += $coupon_discount); ?>
                                    <?php endif; ?>

                                    <dt class="col-5"><strong><?php echo e(translate('total')); ?></strong></dt>
                                    <dd class="col-6 title-color">
                                        <strong><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($total+$shipping-$coupon_discount -$delivery_fee_discount))); ?></strong>
                                    </dd>
                                </dl>
                                <!-- End Row -->
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>

            <div class="col-lg-4 d-flex flex-column gap-3">
                
                <?php if($order->payment_method == 'offline_payment' && isset($order->offline_payments)): ?>
                <div class="card">
                    <!-- Body -->
                    <div class="card-body">
                        <div class="d-flex gap-2 align-items-center justify-content-between mb-4">
                            <h4 class="d-flex gap-2">
                                <img src="<?php echo e(asset('/public/assets/back-end/img/product_setup.png')); ?>" alt="" width="20">
                                <?php echo e(translate('Payment_Information')); ?>

                            </h4>
                        </div>

                        <div>
                            <table>
                                <tbody>
                                    <tr>
                                        <td><?php echo e(translate('payment_Method')); ?></td>
                                        <td class="py-1 px-2">:</td>
                                        <td><strong><?php echo e(translate($order['payment_method'])); ?></strong></td>
                                    </tr>
                                    <?php $__currentLoopData = json_decode($order->offline_payments->payment_info); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset($item) && $key != 'method_id'): ?>
                                            <tr>
                                                <td><?php echo e(translate($key)); ?></td>
                                                <td class="py-1 px-2">:</td>
                                                <td><strong><?php echo e($item); ?></strong></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <?php if(isset($order->payment_note) && $order->payment_method == 'offline_payment'): ?>
                            <div class="payment-status mt-3">
                                <h4><?php echo e(translate('payment_Note')); ?>:</h4>
                                <p class="text-justify">
                                    <?php echo e($order->payment_note); ?>

                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- End Body -->
                </div>
                <?php endif; ?>

                <!-- Order & Shipping Info Card -->
                <div class="card">
                    <div class="card-body text-capitalize d-flex flex-column gap-4">
                        <div class="d-flex flex-column align-items-center gap-2">
                            <h4 class="mb-0 text-center"><?php echo e(translate('order_&_Shipping_Info')); ?></h4>
                        </div>

                        <div class="">
                            <label class="font-weight-bold title-color fz-14"><?php echo e(translate('change_order_status')); ?></label>
                            <select name="order_status" onchange="order_status(this.value)"
                                    class="status form-control" data-id="<?php echo e($order['id']); ?>">

                                <option
                                    value="pending" <?php echo e($order->order_status == 'pending'?'selected':''); ?> > <?php echo e(translate('pending')); ?></option>
                                <option
                                    value="confirmed" <?php echo e($order->order_status == 'confirmed'?'selected':''); ?> > <?php echo e(translate('confirmed')); ?></option>
                                <option
                                    value="processing" <?php echo e($order->order_status == 'processing'?'selected':''); ?> ><?php echo e(translate('packaging')); ?> </option>
                                <option class="text-capitalize"
                                        value="out_for_delivery" <?php echo e($order->order_status == 'out_for_delivery'?'selected':''); ?> ><?php echo e(translate('out_for_delivery')); ?> </option>
                                <option
                                    value="delivered" <?php echo e($order->order_status == 'delivered'?'selected':''); ?> ><?php echo e(translate('delivered')); ?> </option>
                                <option
                                    value="returned" <?php echo e($order->order_status == 'returned'?'selected':''); ?> > <?php echo e(translate('returned')); ?></option>
                                <option
                                    value="failed" <?php echo e($order->order_status == 'failed'?'selected':''); ?> ><?php echo e(translate('failed_to_Deliver')); ?> </option>
                                <option
                                    value="canceled" <?php echo e($order->order_status == 'canceled'?'selected':''); ?> ><?php echo e(translate('canceled')); ?> </option>
                            </select>
                        </div>

                        <!-- Payment Status -->
                        <div class="d-flex justify-content-between align-items-center gap-10 form-control h-auto flex-wrap">
                            <span class="title-color">
                                <?php echo e(translate('payment_status')); ?>

                            </span>
                            <div class="d-flex justify-content-end min-w-100 align-items-center gap-2">
                                <span class="text--primary font-weight-bold"><?php echo e($order->payment_status=='paid' ? translate('paid'):translate('unpaid')); ?></span>
                                <label class="switcher payment-status-text">
                                    <input class="switcher_input payment_status"  type="checkbox" name="status" value="<?php echo e($order->payment_status); ?>"
                                   <?php echo e($order->payment_status=='paid' ? 'checked':''); ?> >
                                    <span class="switcher_control switcher_control_add"></span>
                                </label>
                            </div>

                        </div>

                        <?php if($physical_product): ?>
                        <ul class="list-unstyled list-unstyled-py-4">
                            <li>
                                <?php if($order->shipping_type == 'order_wise'): ?>
                                    <label class="font-weight-bold title-color fz-14">
                                        <?php echo e(translate('shipping_Method')); ?>

                                        (<?php echo e($order->shipping ? translate(str_replace('_',' ',$order->shipping->title)) :translate('no_shipping_method_selected')); ?>)
                                    </label>
                                <?php endif; ?>

                                <select class="form-control text-capitalize" name="delivery_type" onchange="choose_delivery_type(this.value)">
                                    <option value="0">
                                        <?php echo e(translate('choose_delivery_type')); ?>

                                    </option>

                                    <option value="self_delivery" <?php echo e($order->delivery_type=='self_delivery'?'selected':''); ?>>
                                        <?php echo e(translate('by_self_delivery_man')); ?>

                                    </option>
                                    <option value="third_party_delivery" <?php echo e($order->delivery_type=='third_party_delivery'?'selected':''); ?> >
                                        <?php echo e(translate('by_third_party_delivery_service')); ?>

                                    </option>
                                </select>
                            </li>

                            <li class="choose_delivery_man">
                                <label class="font-weight-bold title-color fz-14">
                                    <?php echo e(translate('delivery_man')); ?>

                                </label>
                                <select class="form-control text-capitalize js-select2-custom" name="delivery_man_id" onchange="addDeliveryMan(this.value)">
                                    <option
                                        value="0"><?php echo e(translate('select')); ?></option>
                                    <?php $__currentLoopData = $delivery_men; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveryMan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            value="<?php echo e($deliveryMan['id']); ?>" <?php echo e($order['delivery_man_id']==$deliveryMan['id']?'selected':''); ?>>
                                            <?php echo e($deliveryMan['f_name'].' '.$deliveryMan['l_name'].' ('.$deliveryMan['phone'].' )'); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <?php if(isset($order->delivery_man)): ?>
                                    <div class="p-2 bg-light rounded mt-4">
                                        <div class="media m-1 gap-3">
                                            <img class="avatar rounded-circle"
                                                onerror="this.src='<?php echo e(asset('public/assets/back-end/img/image-place-holder.png')); ?>'"
                                                src="<?php echo e(asset('storage/app/public/profile/'.isset($order->delivery_man->image) ?? '')); ?>"
                                                alt="Image">
                                            <div class="media-body">
                                                <h5 class="mb-1"><?php echo e(isset($order->delivery_man) ? $order->delivery_man->f_name.' '.$order->delivery_man->l_name :''); ?></h5>
                                                <a href="tel:<?php echo e(isset($order->delivery_man) ? $order->delivery_man->phone : ''); ?>" class="fz-12 title-color"><?php echo e(isset($order->delivery_man) ? $order->delivery_man->phone :''); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="p-2 bg-light rounded mt-4">
                                        <div class="media m-1 gap-3">
                                            <img class="avatar rounded-circle"
                                                onerror="this.src='<?php echo e(asset('public/assets/back-end/img/image-place-holder.png')); ?>'"
                                                src="<?php echo e(asset('public/assets/back-end/img/delivery-man.png')); ?>"
                                                alt="Image">
                                            <div class="media-body">
                                                <h5 class="mt-3"><?php echo e(translate('no_delivery_man_assigned')); ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </li>
                            <?php if(isset($order->delivery_man)): ?>
                                <li class="choose_delivery_man">
                                    <label class="font-weight-bold title-color fz-14">
                                        <?php echo e(translate('deliveryman_will_get')); ?> (<?php echo e(session('currency_symbol')); ?>)
                                    </label>
                                    <input type="number" id="deliveryman_charge" onkeyup="amountDateUpdate(this, event)" value="<?php echo e($order->deliveryman_charge); ?>" name="deliveryman_charge" class="form-control" placeholder="Ex: 20" required>
                                </li>
                                <li class="choose_delivery_man">
                                    <label class="font-weight-bold title-color fz-14">
                                        <?php echo e(translate('expected_delivery_date')); ?>

                                    </label>
                                    <input type="date" onchange="amountDateUpdate(this, event)" value="<?php echo e($order->expected_delivery_date); ?>" name="expected_delivery_date" id="expected_delivery_date" class="form-control" required>
                                </li>
                            <?php endif; ?>

                            <li class="mt-1" id="by_third_party_delivery_service_info">
                                <div class="p-2 bg-light rounded">
                                    <div class="media m-1 gap-3">
                                        <img class="avatar rounded-circle"
                                            onerror="this.src='<?php echo e(asset('public/assets/back-end/img/image-place-holder.png')); ?>'"
                                            src="<?php echo e(asset('public/assets/back-end/img/third-party-delivery.png')); ?>"
                                            alt="Image">
                                        <div class="media-body">
                                            <h5 class=""><?php echo e(isset($order->delivery_service_name) ? $order->delivery_service_name :translate('not_assign_yet')); ?></h5>
                                            <span class="fz-12 title-color"><?php echo e(translate('track_ID')); ?> :  <?php echo e($order->third_party_delivery_tracking_id); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Customer Info Card -->
                <?php if(!$order->is_guest && $order->customer): ?>
                <div class="card">
                    <!-- Body -->
                    <div class="card-body">
                        <div class="d-flex gap-2 align-items-center justify-content-between mb-4">
                            <h4 class="d-flex gap-2">
                                <img src="<?php echo e(asset('/public/assets/back-end/img/seller-information.png')); ?>" alt="">
                                <?php echo e(translate('customer_information')); ?>

                            </h4>
                        </div>
                        <div class="media flex-wrap gap-3">
                            <div class="">
                                <img class="avatar rounded-circle avatar-70"
                                        onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                        src="<?php echo e(asset('storage/app/public/profile/'.$order->customer->image)); ?>"
                                        alt="Image">
                            </div>
                            <div class="media-body d-flex flex-column gap-1">
                                <span class="title-color"><strong><?php echo e($order->customer['f_name'].' '.$order->customer['l_name']); ?> </strong></span>
                                <span class="title-color"> <strong><?php echo e(\App\Model\Order::where('customer_id',$order['customer_id'])->count()); ?></strong> <?php echo e(translate('orders')); ?></span>
                                <span class="title-color break-all"><strong><?php echo e($order->customer['phone']); ?></strong></span>
                                <span class="title-color break-all"><?php echo e($order->customer['email']); ?></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Body -->
                </div>
                <?php endif; ?>
                <!-- End Card -->

                <!-- Shipping Address Card -->
                <?php if($physical_product): ?>
                <div class="card">
                    <!-- Body -->
                    <?php ($shipping_address=json_decode($order['shipping_address_data'])); ?>
                    <?php if($shipping_address): ?>
                        <div class="card-body">
                            <div class="d-flex gap-2 align-items-center justify-content-between mb-4">
                                <h4 class="d-flex gap-2">
                                    <img src="<?php echo e(asset('/public/assets/back-end/img/seller-information.png')); ?>" alt="">
                                    <?php echo e(translate('shipping_address')); ?>

                                </h4>

                                <button class="btn btn-outline-primary btn-sm square-btn" title="Edit" data-toggle="modal" data-target="#shippingAddressUpdateModal">
                                    <i class="tio-edit"></i>
                                </button>
                            </div>

                            <div class="d-flex flex-column gap-2">
                                <div>
                                    <span><?php echo e(translate('name')); ?> :</span>
                                    <strong><?php echo e($shipping_address->contact_person_name); ?></strong> <?php echo e($order->is_guest ? '('. translate('guest_customer') .')':''); ?>

                                </div>
                                <div>
                                    <span><?php echo e(translate('contact')); ?> :</span>
                                    <strong><?php echo e($shipping_address->phone); ?></strong>
                                </div>
                                <?php if($order->is_guest && $shipping_address->email): ?>
                                <div>
                                    <span><?php echo e(translate('email')); ?> :</span>
                                    <strong><?php echo e($shipping_address->email); ?></strong>
                                </div>
                                <?php endif; ?>
                                <div>
                                    <span><?php echo e(translate('city')); ?> :</span>
                                    <strong><?php echo e($shipping_address->city); ?></strong>
                                </div>
                                <div>
                                    <span><?php echo e(translate('zip_code')); ?> :</span>
                                    <strong><?php echo e($shipping_address->zip); ?></strong>
                                </div>
                                <div class="d-flex align-items-start gap-2">
                                    <!-- <span><?php echo e(translate('address')); ?> :</span> -->
                                    <img src="<?php echo e(asset('/public/assets/back-end/img/location.png')); ?>" alt="">
                                    <?php echo e($shipping_address->address  ?? translate('empty')); ?>

                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span><?php echo e(translate('no_shipping_address_found')); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- End Body -->
                </div>
                <?php endif; ?>
                <!-- End Card -->

                <!-- Billing Address Card -->
                <!--<div class="card">-->
                    <!-- Body -->
                <!--    <?php ($billing=json_decode($order['billing_address_data'])); ?>-->
                <!--    <?php if($billing): ?>-->
                <!--        <div class="card-body">-->
                <!--            <div class="d-flex gap-2 align-items-center justify-content-between mb-4">-->
                <!--                <h4 class="d-flex gap-2">-->
                <!--                    <img src="<?php echo e(asset('/public/assets/back-end/img/seller-information.png')); ?>" alt="">-->
                <!--                    <?php echo e(translate('billing_address')); ?>-->
                <!--                </h4>-->

                <!--                <button class="btn btn-outline-primary btn-sm square-btn" title="Edit" data-toggle="modal" data-target="#billingAddressUpdateModal">-->
                <!--                    <i class="tio-edit"></i>-->
                <!--                </button>-->
                <!--            </div>-->
                <!--            <div class="d-flex flex-column gap-2">-->
                <!--                <div>-->
                <!--                    <span><?php echo e(translate('name')); ?> :</span>-->
                <!--                    <strong><?php echo e($billing->contact_person_name); ?></strong> <?php echo e($order->is_guest ? '('. translate('guest_customer') .')':''); ?>-->
                <!--                </div>-->
                <!--                <div>-->
                <!--                    <span><?php echo e(translate('contact')); ?> :</span>-->
                <!--                    <strong><?php echo e($billing->phone); ?></strong>-->
                <!--                </div>-->
                <!--                <?php if($order->is_guest && $billing->email): ?>-->
                <!--                <div>-->
                <!--                    <span><?php echo e(translate('email')); ?> :</span>-->
                <!--                    <strong><?php echo e($billing->email); ?></strong>-->
                <!--                </div>-->
                <!--                <?php endif; ?>-->
                <!--                <div>-->
                <!--                    <span><?php echo e(translate('city')); ?> :</span>-->
                <!--                    <strong><?php echo e($billing->city); ?></strong>-->
                <!--                </div>-->
                <!--                <div>-->
                <!--                    <span><?php echo e(translate('zip_code')); ?> :</span>-->
                <!--                    <strong><?php echo e($billing->zip); ?></strong>-->
                <!--                </div>-->
                <!--                <div class="d-flex align-items-start gap-2">-->
                                    <!-- <span><?php echo e(translate('address')); ?> :</span> -->
                <!--                    <img src="<?php echo e(asset('/public/assets/back-end/img/location.png')); ?>" alt="">-->
                <!--                    <?php echo e($billing->address); ?>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    <?php else: ?>-->
                <!--        <div class="card-body">-->
                <!--            <div class="media align-items-center">-->
                <!--                <span><?php echo e(translate('no_billing_address_found')); ?></span>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    <?php endif; ?>-->
                    <!-- End Body -->
                <!--</div>-->
                <!-- End Card -->

                <!-- Shop Info Card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="d-flex gap-2 mb-4">
                            <img src="<?php echo e(asset('/public/assets/back-end/img/shop-information.png')); ?>" alt="">
                            <?php echo e(translate('shop_Information')); ?>

                        </h4>

                        <div class="media">
                            <?php if($order->seller_is == 'admin'): ?>
                                <div class="mr-3">
                                    <img class="avatar rounded avatar-70 img-fit-contain" onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                         src="<?php echo e(asset("storage/app/public/company/$company_web_logo")); ?>" alt="">
                                </div>

                                <div class="media-body d-flex flex-column gap-2">
                                    <h5><?php echo e($company_name); ?></h5>
                                    <span class="title-color"><strong><?php echo e($total_delivered); ?></strong> <?php echo e(translate('orders_Served')); ?></span>
                                </div>
                            <?php else: ?>
                                <?php if(!empty($order->seller->shop)): ?>
                                    <div class="mr-3">
                                        <img class="avatar rounded avatar-70 img-fit-contain" onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                             src="<?php echo e(asset('storage/app/public/shop')); ?>/<?php echo e($order->seller->shop->image); ?>" alt="">
                                    </div>
                                    <div class="media-body d-flex flex-column gap-2">
                                        <h5><?php echo e($order->seller->shop->name); ?></h5>
                                        <span class="title-color"><strong><?php echo e($total_delivered); ?></strong> <?php echo e(translate('orders_Served')); ?></span>
                                        <span class="title-color"> <strong><?php echo e($order->seller->shop->contact); ?></strong></span>
                                        <div class="d-flex align-items-start gap-2">
                                            <img src="<?php echo e(asset('/public/assets/back-end/img/location.png')); ?>" class="mt-1" alt="">
                                            <?php echo e($order->seller->shop->address); ?>

                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <span><?php echo e(translate('no_data_found')); ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Row -->
    </div>

    <!-- order verificaiton modal-->
    <?php if(count($order->verification_images)>0): ?>
        <div class="modal fade" id="order_verification_modal" tabindex="-1" aria-labelledby="order_verification_modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header pb-4">
                        <h3 class="mb-0"><?php echo e(translate('order_verification_images')); ?></h3>
                        <button type="button" class="btn-close border-0" data-dismiss="modal" aria-label="Close"><i class="tio-clear"></i></button>
                    </div>
                    <div class="modal-body px-4 px-sm-5 pt-0">
                        <div class="d-flex flex-column align-items-center gap-2">
                            <div class="row gx-2">
                                <?php $__currentLoopData = $order->verification_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-4 col-sm-6 ">
                                        <div class="mb-2 mt-2 border-1">
                                            <img src="<?php echo e(asset("storage/app/public/delivery-man/verification-image/".$image->image)); ?>"
                                            class="w-100"
                                            onerror="this.src='<?php echo e(asset('public/assets/back-end/img/image-place-holder.png')); ?>'"
                                            >
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12">
                                    <div class="d-flex justify-content-end gap-3">
                                        <button type="button" class="btn btn-secondary px-5" data-dismiss="modal"><?php echo e(translate('close')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- end order verificaiton modal-->

    <!-- Shipping Address Update Modal -->
    <div class="modal fade" id="shippingAddressUpdateModal" tabindex="-1" aria-labelledby="shippingAddressUpdateModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header pb-4">
                    <h3 class="mb-0 text-center w-100"><?php echo e(translate('shipping_address')); ?></h3>
                    <button type="button" class="btn-close border-0" data-dismiss="modal" aria-label="Close"><i class="tio-clear"></i></button>
                </div>
                <div class="modal-body px-4 px-sm-5 pt-0">
                    <form action="<?php echo e(route('admin.orders.address-update')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="d-flex flex-column align-items-center gap-2">
                            <input name="address_type" value="shipping" hidden>
                            <input name="order_id" value="<?php echo e($order->id); ?>" hidden>
                            <div class="row gx-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="title-color"><?php echo e(translate('contact_person_name')); ?></label>
                                        <input type="text" name="name" id="name" class="form-control" value="<?php echo e($shipping_address? $shipping_address->contact_person_name : ''); ?>" placeholder="<?php echo e(translate('ex')); ?>: <?php echo e(translate('john_doe')); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_number" class="title-color"><?php echo e(translate('phone_number')); ?></label>
                                        <input type="tel" name="phone_number" id="phone_number" value="<?php echo e($shipping_address ? $shipping_address->phone  : ''); ?>" class="form-control" placeholder="<?php echo e(translate('ex')); ?>:32416436546" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country" class="title-color"><?php echo e(translate('country')); ?></label>
                                        <select name="country" id="country" class="form-control">
                                            <?php $__empty_1 = true; $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option value="<?php echo e($country['name']); ?>" <?php echo e(isset($shipping_address) && $country['name'] == $shipping_address->country ? 'selected'  : ''); ?>><?php echo e($country['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <option value=""><?php echo e(translate('No_country_to_deliver')); ?></option>
                                            <?php endif; ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="city" class="title-color"><?php echo e(translate('city')); ?></label>
                                        <input type="text" name="city" id="city" value="<?php echo e($shipping_address ? $shipping_address->city : ''); ?>" class="form-control" placeholder="<?php echo e(translate('ex')); ?>:<?php echo e(translate('dhaka')); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="zip_code" class="title-color"><?php echo e(translate('zip')); ?></label>
                                        <?php if($zip_restrict_status == 1): ?>
                                            <select name="zip"  class="form-control" data-live-search="true" required>
                                                <?php $__empty_1 = true; $__currentLoopData = $zip_codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <option value="<?php echo e($code->zipcode); ?>"<?php echo e(isset($shipping_address) && $code->zipcode == $shipping_address->zip ? 'selected'  : ''); ?>><?php echo e($code->zipcode); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <option value=""><?php echo e(translate('No_zip_to_deliver')); ?></option>
                                                <?php endif; ?>
                                            </select>
                                        <?php else: ?>
                                            <input type="text" class="form-control" value="<?php echo e($shipping_address ? $shipping_address->zip  : ''); ?>" id="zip" name="zip" placeholder="<?php echo e(translate('ex')); ?>: 1216" <?php echo e($shipping_address?'required':''); ?>>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="address" class="title-color"><?php echo e(translate('address')); ?></label>
                                        <textarea name="address" id="address" name="address" rows="3" class="form-control" placeholder="<?php echo e(translate('ex')); ?> : <?php echo e(translate('street_1,_street_2,_street_3,_street_4')); ?>"><?php echo e($shipping_address ? $shipping_address->address : ''); ?></textarea>
                                    </div>
                                </div>
                                <input type="hidden" id="latitude"
                                    name="latitude" class="form-control d-inline"
                                    placeholder="<?php echo e(translate('Ex')); ?> : -94.22213" value="<?php echo e($shipping_address->latitude ?? 0); ?>" required readonly>
                                <input type="hidden"
                                    name="longitude" class="form-control"
                                    placeholder="<?php echo e(translate('Ex')); ?> : 103.344322" id="longitude" value="<?php echo e($shipping_address->longitude??0); ?>" required readonly>
                                <!--End -->
                                <div class="col-12 ">
                                    <input id="pac-input" class="form-control rounded __map-input mt-1" title="<?php echo e(translate('search_your_location_here')); ?>" type="text" placeholder="<?php echo e(translate('search_here')); ?>"/>
                                    <div class="dark-support rounded w-100 __h-200px mb-5" id="location_map_canvas_shipping"></div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-end gap-3">
                                        <button type="button" class="btn btn-secondary px-5" data-dismiss="modal"><?php echo e(translate('cancel')); ?></button>
                                        <button type="submit" class="btn btn--primary px-5"><?php echo e(translate('update')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <?php if($billing): ?>
    <!-- Billing Address Update Modal -->
    <div class="modal fade" id="billingAddressUpdateModal" tabindex="-1" aria-labelledby="billingAddressUpdateModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header pb-4">
                    <h3 class="mb-0 text-center w-100"><?php echo e(translate('billing_address')); ?></h3>
                    <button type="button" class="btn-close border-0" data-dismiss="modal" aria-label="Close"><i class="tio-clear"></i></button>
                </div>
                <div class="modal-body px-4 px-sm-5 pt-0">
                    <div class="d-flex flex-column align-items-center gap-2">
                        <form action="<?php echo e(route('admin.orders.address-update')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="d-flex flex-column align-items-center gap-2">
                                <input name="address_type" value="billing" hidden>
                                <input name="order_id" value="<?php echo e($order->id); ?>" hidden>
                                <div class="row gx-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="title-color"><?php echo e(translate('contact_person_name')); ?></label>
                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo e($billing? $billing->contact_person_name : ''); ?>" placeholder="<?php echo e(translate('ex')); ?>: <?php echo e(translate('john_doe')); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_number" class="title-color"><?php echo e(translate('phone_number')); ?></label>
                                            <input type="tel" name="phone_number" id="phone_number" value="<?php echo e($billing ? $billing->phone  : ''); ?>" class="form-control" placeholder="<?php echo e(translate('ex')); ?>:32416436546" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country" class="title-color"><?php echo e(translate('country')); ?></label>
                                            <select name="country" id="country" class="form-control">
                                                <?php $__empty_1 = true; $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <option value="<?php echo e($country['name']); ?>" <?php echo e(isset($billing) && $country['name'] == $billing->country ? 'selected'  : ''); ?>><?php echo e($country['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <option value=""><?php echo e(translate('No_country_to_deliver')); ?></option>
                                                <?php endif; ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="city" class="title-color"><?php echo e(translate('city')); ?></label>
                                            <input type="text" name="city" id="city" value="<?php echo e($billing ? $billing->city : ''); ?>" class="form-control" placeholder="<?php echo e(translate('ex')); ?>:<?php echo e(translate('dhaka')); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="zip_code" class="title-color"><?php echo e(translate('zip')); ?></label>
                                            <?php if($zip_restrict_status == 1): ?>
                                                <select name="zip"  class="form-control" data-live-search="true" required>
                                                    <?php $__empty_1 = true; $__currentLoopData = $zip_codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <option value="<?php echo e($code->zipcode); ?>"<?php echo e(isset($billing) && $code->zipcode == $billing->zip ? 'selected'  : ''); ?>><?php echo e($code->zipcode); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <option value=""><?php echo e(translate('no_zip_to_deliver')); ?></option>
                                                    <?php endif; ?>
                                                </select>
                                            <?php else: ?>
                                                <input type="text" class="form-control" value="<?php echo e($billing ? $billing->zip  : ''); ?>" id="zip" name="zip" placeholder="<?php echo e(translate('ex')); ?>: 1216" <?php echo e($billing?'required':''); ?>>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="address" class="title-color"><?php echo e(translate('address')); ?></label>
                                            <textarea name="address" id="billing_address"  rows="3" class="form-control" placeholder="<?php echo e(translate('ex')); ?> : <?php echo e(translate('street_1,_street_2,_street_3,_street_4')); ?>"><?php echo e($billing ? $billing->address : ''); ?></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" id="billing_latitude"
                                        name="latitude" class="form-control d-inline"
                                        placeholder="<?php echo e(translate('ex')); ?> : -94.22213" value="<?php echo e($billing->latitude ?? 0); ?>" required readonly>
                                    <input type="hidden"
                                        name="longitude" class="form-control"
                                        placeholder="<?php echo e(translate('ex')); ?> : 103.344322" id="billing_longitude" value="<?php echo e($billing->longitude ?? 0); ?>" required readonly>
                                    <!--End -->
                                    <div class="col-12 ">
                                        <!-- search -->
                                        <input id="billing-pac-input" class="form-control rounded __map-input mt-1" title="<?php echo e(translate('search_your_location_here')); ?>" type="text" placeholder="<?php echo e(translate('search_here')); ?>"/>
                                        <!-- search -->
                                        <div class="rounded w-100 __h-200px mb-5" id="location_map_canvas_billing"></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-end gap-3">
                                            <button type="button" class="btn btn-secondary px-5" data-dismiss="modal"><?php echo e(translate('cancel')); ?></button>
                                            <button type="submit" class="btn btn--primary px-5"><?php echo e(translate('update')); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    <?php endif; ?>

    <!-- Show locations on map Modal -->
    <div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"
                        id="locationModalLabel"><?php echo e(translate('location_Data')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 modal_body_map">
                            <div class="location-map" id="location-map">
                                <div class="w-100 __h-400px" id="location_map_canvas"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Show third party delivery info Modal -->
    <div class="modal" id="third_party_delivery_service_modal" role="dialog" tabindex="-1" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(translate('update_third_party_delivery_info')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="<?php echo e(route('admin.orders.update-deliver-info')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="order_id" value="<?php echo e($order['id']); ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for=""><?php echo e(translate('delivery_service_name')); ?></label>
                                        <input class="form-control" type="text" name="delivery_service_name" value="<?php echo e($order['delivery_service_name']); ?>" id="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><?php echo e(translate('tracking_id')); ?> (<?php echo e(translate('optional')); ?>)</label>
                                        <input class="form-control" type="text" name="third_party_delivery_tracking_id" value="<?php echo e($order['third_party_delivery_tracking_id']); ?>" id="">
                                    </div>
                                    <button class="btn btn--primary" type="submit"><?php echo e(translate('update')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <!-- payment status change -->
    <script>
        $(document).on('click','.payment_status', function (e) {
            e.preventDefault();
            var id = <?php echo e($order->id); ?>;
            var value = $(this).val();
            Swal.fire({
                title: '<?php echo e(translate("are_you_sure_change_this")); ?>?',
                text: "<?php echo e(translate('you_will_not_be_able_to_revert_this')); ?>!",
                showCancelButton: true,
                confirmButtonColor: '#377dff',
                cancelButtonColor: 'secondary',
                confirmButtonText: '<?php echo e(translate("yes_change_it")); ?>!',
                cancelButtonText: '<?php echo e(translate("cancel")); ?>',
            }).then((result) => {
                if(value == 'paid'){
                    value = 'unpaid'
                }else{
                    value = 'paid'
                }
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.orders.payment-status')); ?>",
                        method: 'POST',
                        data: {
                            "id": id,
                            "payment_status": value
                        },
                        success: function (data) {
                            if(data.customer_status==0)
                            {
                                toastr.warning('<?php echo e(translate("account_has_been_deleted_you_can_not_change_the_status")); ?>!');
                                location.reload();
                            }else
                            {

                                toastr.success('<?php echo e(translate("status_change_successfully")); ?>');
                                location.reload();
                            }
                        }
                    });
                }
            })
        });


        function order_status(status) {
            <?php if($order['order_status']=='delivered'): ?>
            Swal.fire({
                title: '<?php echo e(translate("Order_is_already_delivered_and_transaction_amount_has_been_disbursed_changing_status_can_be_the_reason_of_miscalculation")); ?>!',
                text: "<?php echo e(translate('think_before_you_proceed')); ?>.",
                showCancelButton: true,
                confirmButtonColor: '#377dff',
                cancelButtonColor: 'secondary',
                confirmButtonText: '<?php echo e(translate("yes_change_it")); ?>!',
                cancelButtonText: '<?php echo e(translate("cancel")); ?>',
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.orders.status')); ?>",
                        method: 'POST',
                        data: {
                            "id": '<?php echo e($order['id']); ?>',
                            "order_status": status
                        },
                        success: function (data) {

                            if (data.success == 0) {
                                toastr.success('<?php echo e(translate("order_is_already_delivered_you_can_not_change_it")); ?> !!');
                                location.reload();
                            } else {

                                if(data.payment_status == 0){
                                    toastr.warning('<?php echo e(translate("before_delivered_you_need_to_make_payment_status_paid")); ?>!');
                                    location.reload();
                                }else if(data.customer_status==0)
                                {
                                    toastr.warning('<?php echo e(translate("account_has_been_deleted_you_can_not_change_the_status")); ?>!');
                                    location.reload();
                                }
                                else{
                                    toastr.success('<?php echo e(translate("status_change_successfully")); ?>!');
                                    location.reload();
                                }
                            }

                        }
                    });
                }
            })
            <?php else: ?>
            Swal.fire({
                title: '<?php echo e(translate("are_you_sure_change_this")); ?>?',
                text: "<?php echo e(translate('you_will_not_be_able_to_revert_this')); ?>!",
                showCancelButton: true,
                confirmButtonColor: '#377dff',
                cancelButtonColor: 'secondary',
                confirmButtonText: '<?php echo e(translate("yes_change_it")); ?>!',
                cancelButtonText: '<?php echo e(translate("cancel")); ?>',
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.orders.status')); ?>",
                        method: 'POST',
                        data: {
                            "id": '<?php echo e($order['id']); ?>',
                            "order_status": status
                        },
                        success: function (data) {
                            if (data.success == 0) {
                                toastr.success('<?php echo e(translate("order_is_already_delivered_you_can_not_change_it")); ?> !!');
                                 location.reload();
                            } else {
                                if(data.payment_status == 0){
                                    toastr.warning('<?php echo e(translate("before_delivered_you_need_to_make_payment_status_paid")); ?>!');
                                     location.reload();
                                }else if(data.customer_status==0)
                                {
                                    toastr.warning('<?php echo e(translate("account_has_been_deleted_you_can_not_change_the_status")); ?>!');
                                     location.reload();
                                }else{
                                    toastr.success('<?php echo e(translate("status_change_successfully")); ?>!');
                                     location.reload();
                                }
                            }

                        }
                    });
                }
            })
            <?php endif; ?>
        }
    </script>
    <!-- end payment status change -->

    <!-- delivery type -->
    <script>
        $( document ).ready(function() {
            let delivery_type = '<?php echo e($order->delivery_type); ?>';


            if(delivery_type === 'self_delivery'){
                $('.choose_delivery_man').show();
                $('#by_third_party_delivery_service_info').hide();
            }else if(delivery_type === 'third_party_delivery')
            {
                $('.choose_delivery_man').hide();
                $('#by_third_party_delivery_service_info').show();
            }else{
                $('.choose_delivery_man').hide();
                $('#by_third_party_delivery_service_info').hide();
            }
        });
    </script>
    <!-- end delivery type -->

    <!-- Choose delivery type -->
    <script>
        function choose_delivery_type(val)
        {

            if(val==='self_delivery')
            {
                $('.choose_delivery_man').show();
                $('#by_third_party_delivery_service_info').hide();
            }else if(val==='third_party_delivery'){
                $('.choose_delivery_man').hide();
                $('#deliveryman_charge').val(null);
                $('#expected_delivery_date').val(null);
                $('#by_third_party_delivery_service_info').show();
                $('#third_party_delivery_service_modal').modal("show");
            }else{
                $('.choose_delivery_man').hide();
                $('#by_third_party_delivery_service_info').hide();
            }

        }
    </script>
     <!-- End Choose delivery type -->
     <!-- Add delivery man -->
    <script>
        function addDeliveryMan(id) {
            $.ajax({
                type: "GET",
                url: '<?php echo e(url('/')); ?>/admin/orders/add-delivery-man/<?php echo e($order['id']); ?>/' + id,
                data: {
                    'order_id': '<?php echo e($order['id']); ?>',
                    'delivery_man_id': id
                },
                success: function (data) {
                    // console.log(data);
                    if (data.status == true) {
                        toastr.success('<?php echo e(translate("delivery_man_successfully_assigned_or_changed")); ?>', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        location.reload();
                    } else {
                        toastr.error('<?php echo e(translate("deliveryman_man_can_not_assign_or_change_in_that_status")); ?>', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }
                },
                error: function () {
                    toastr.error('<?php echo e(translate("add_valid_data")); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        }

        function last_location_view() {
            toastr.warning('<?php echo e(translate("only_available_when_order_is_out_for_delivery")); ?>!', {
                CloseButton: true,
                ProgressBar: true
            });
        }

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        function waiting_for_location() {
            toastr.warning('<?php echo e(translate("waiting_for_location")); ?>', {
                CloseButton: true,
                ProgressBar: true
            });
        }

        function amountDateUpdate(t, e){
            let field_name = $(t).attr('name');
            let field_val = $(t).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.orders.amount-date-update')); ?>",
                method: 'POST',
                data: {
                    'order_id': '<?php echo e($order['id']); ?>',
                    'field_name': field_name,
                    'field_val': field_val
                },
                success: function (data) {
                    if (data.status == true) {
                        toastr.success('<?php echo e(translate("deliveryman_charge_add_successfully")); ?>', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    } else {
                        toastr.error('<?php echo e(translate("failed_to_add_deliveryman_charge")); ?>', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }
                },
                error: function () {
                    toastr.error('Add valid data', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        }
    </script>
    <!-- End add delivery man function-->

    <!--shipping address map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(\App\CPU\Helpers::get_business_settings('map_api_key')); ?>&callback=map_callback_fucntion&libraries=places&v=3.49" defer></script>
    <script>
        /* shipping address  map */
        function initAutocomplete() {
            var myLatLng = { lat: <?php echo e($shipping_address->latitude??'-33.8688'); ?>, lng: <?php echo e($shipping_address->longitude??'151.2195'); ?> };

            const map = new google.maps.Map(document.getElementById("location_map_canvas_shipping"), {
                center: { lat: <?php echo e($shipping_address->latitude??'-33.8688'); ?>, lng: <?php echo e($shipping_address->longitude??'151.2195'); ?> },
                zoom: 13,
                mapTypeId: "roadmap",
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
            });

            marker.setMap( map );
            var geocoder = geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function (mapsMouseEvent) {
                var coordinates = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
                var coordinates = JSON.parse(coordinates);
                var latlng = new google.maps.LatLng( coordinates['lat'], coordinates['lng'] ) ;
                marker.setPosition( latlng );
                map.panTo( latlng );

                document.getElementById('latitude').value = coordinates['lat'];
                document.getElementById('longitude').value = coordinates['lng'];

                geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
                            document.getElementById('address').value = results[1].formatted_address;
                            console.log(results[1].formatted_address);
                        }
                    }
                });
            });

            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });
            let markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var mrkr = new google.maps.Marker({
                        map,
                        title: place.name,
                        position: place.geometry.location,
                    });

                    google.maps.event.addListener(mrkr, "click", function (event) {
                        document.getElementById('latitude').value = this.position.lat();
                        document.getElementById('longitude').value = this.position.lng();

                    });

                    markers.push(mrkr);

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        };

        $(document).on("keydown", "input", function(e) {
            if (e.which==13) e.preventDefault();
        });
        /* end shipping address   map*/

        /* billing address  map */
        function billing_map() {
            var myLatLng = { lat: <?php echo e($billing->latitude??'-33.8688'); ?>, lng: <?php echo e($billing->longitude??'151.2195'); ?> };

            const map = new google.maps.Map(document.getElementById("location_map_canvas_billing"), {
                center: { lat: <?php echo e($billing->latitude??'-33.8688'); ?>, lng: <?php echo e($billing->longitude??'151.2195'); ?> },
                zoom: 13,
                mapTypeId: "roadmap",
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
            });

            marker.setMap( map );
            var geocoder = geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function (mapsMouseEvent) {
                var coordinates = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
                var coordinates = JSON.parse(coordinates);
                var latlng = new google.maps.LatLng( coordinates['lat'], coordinates['lng'] ) ;
                marker.setPosition( latlng );
                map.panTo( latlng );

                document.getElementById('billing_latitude').value = coordinates['lat'];
                document.getElementById('billing_longitude').value = coordinates['lng'];

                geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
                            document.getElementById('billing_address').value = results[1].formatted_address;
                            console.log(results[1].formatted_address);
                        }
                    }
                });
            });

            // Create the search box and link it to the UI element.
            const input = document.getElementById("billing-pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });
            let markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var mrkr = new google.maps.Marker({
                        map,
                        title: place.name,
                        position: place.geometry.location,
                    });

                    google.maps.event.addListener(mrkr, "click", function (event) {
                        document.getElementById('latitude').value = this.position.lat();
                        document.getElementById('longitude').value = this.position.lng();

                    });

                    markers.push(mrkr);

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        };
        $(document).on("keydown", "input", function(e) {
            if (e.which==13) e.preventDefault();
        });


        /* end billing address map  */
        /* show location map */
        function show_location_map(){
            var myLatLng = { lat: <?php echo e($shipping_address->latitude??'null'); ?>, lng: <?php echo e($shipping_address->longitude??'null'); ?> };

            const map = new google.maps.Map(document.getElementById("location_map_canvas"), {
                center: { lat: <?php echo e($shipping_address->latitude??'null'); ?>, lng: <?php echo e($shipping_address->longitude??'null'); ?> },
                zoom: 13,
                mapTypeId: "roadmap",
            });

            <?php if($shipping_address && isset($shipping_address)): ?>
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(<?php echo e($shipping_address->latitude); ?>, <?php echo e($shipping_address->longitude); ?>),
                map: map,
                title: "<?php echo e($order->customer['f_name']??""); ?> <?php echo e($order->customer['l_name']??""); ?>",
                icon: "<?php echo e(asset('public/assets/front-end/img/customer_location.png')); ?>"
            });

            google.maps.event.addListener(marker, 'click', (function (marker) {
                return function () {
                    infowindow.setContent("<div class='float-left'><img class='__inline-5' src='<?php echo e(asset('storage/app/public/profile/')); ?><?php echo e($order->customer->image??""); ?>'></div><div class='float-right __p-10'><b><?php echo e($order->customer->f_name??""); ?> <?php echo e($order->customer->l_name??""); ?></b><br/><?php echo e($shipping_address->address??""); ?></div>");
                    infowindow.open(map, marker);
                }
            })(marker));
            locationbounds.extend(marker.getPosition());
            <?php endif; ?>
            google.maps.event.addListenerOnce(map, 'idle', function () {
                map.fitBounds(locationbounds);
            });

        }
       /*End Show location on map*/

       /* Map Callback function */
        function map_callback_fucntion(){
            initAutocomplete();
            billing_map();
            show_location_map();
        }
        /* End Map Callback function */

        /* File upload for digital product */
        function readUrl(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    let imgData = e.target.result;
                    let imgName = input.files[0].name;
                    input.closest('[data-title]').setAttribute("data-title", imgName);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        /* End File upload for digital product */
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/order/order-details.blade.php ENDPATH**/ ?>