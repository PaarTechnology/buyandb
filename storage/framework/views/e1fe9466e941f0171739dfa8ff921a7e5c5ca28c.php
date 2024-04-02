<?php $__env->startSection('title',translate('order_Details')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <style>
        .page-item.active .page-link {
            background-color: <?php echo e($web_config['primary_color']); ?>              !important;
        }

        .amount {
            margin-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 60px;
        }

        .w-49{
            width: 49% !important
        }

        a {
            color: <?php echo e($web_config['primary_color']); ?>;
        }

        @media (max-width: 360px) {
            .for-glaxy-mobile {
                margin-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 6px;
            }

        }

        @media (max-width: 600px) {

            .for-glaxy-mobile {
                margin-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 6px;
            }

            .order_table_info_div_2 {
                text-align: <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>          !important;
            }

            .spandHeadO {
                margin-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 16px;
            }

            .spanTr {
                margin-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 16px;
            }

            .amount {
                margin-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 0px;
            }

        }

        .btn-square {
            border-radius: 5px !important;
            border: 1px solid #E9F3FF;
            width: 40px;
            height: 40px;
            min-width: 40px;
            display: grid;
            place-items: center;
            padding: 0.5rem;
            color: #0286ff;
            line-height: 1;
            font-size: 1rem;
        }

        .bg-soft-danger {
            background-color: #FFF4F3;
        }

        .calculation-table th,
        .calculation-table td {
            padding: 0.5rem;
        }

        @media (min-width: 1200px) {
            .gap-xl-30 {
                gap: 30px !important;
            }
        }

        .nav-menu {
            display: flex;
        }
        .nav-menu > * {
            border: none;
            border-bottom: 2px solid transparent;
            background-color: transparent;
            padding: .5rem 0;
            color: #9B9B9B;
        }
        .nav-menu > *.active {
            border-color: #1455AC;
            color: #1455AC;
            font-weight: 700;
        }
        .h-40px {
            height: 40px !important;
        }

        .top-1 {
            top: .5rem;
        }
        .left-1 {
            left: .5rem;
        }
    </style>
    <style>
        .rating {
            --dir: right;
            --fill: #1455AC;
            --fillbg: rgba(100, 100, 100, 0.15);
            --star: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 17.25l-6.188 3.75 1.641-7.031-5.438-4.734 7.172-0.609 2.813-6.609 2.813 6.609 7.172 0.609-5.438 4.734 1.641 7.031z"/></svg>');
            --stars: 5;
            --starsize: 2.5rem;
            --symbol: var(--star);
            --value: 1;
            --w: calc(var(--stars) * var(--starsize));
            --x: calc(100% * (var(--value) / var(--stars)));
            block-size: var(--starsize);
            inline-size: var(--w);
            position: relative;
            touch-action: manipulation;
            -webkit-appearance: none;
        }
        [dir="rtl"] .rating {
            --dir: left;
        }
        .rating::-moz-range-track {
            background: linear-gradient(to var(--dir), var(--fill) 0 var(--x), var(--fillbg) 0 var(--x));
            block-size: 100%;
            mask: repeat left center/var(--starsize) var(--symbol);
        }
        .rating::-webkit-slider-runnable-track {
            background: linear-gradient(to var(--dir), var(--fill) 0 var(--x), var(--fillbg) 0 var(--x));
            block-size: 100%;
            mask: repeat left center/var(--starsize) var(--symbol);
            -webkit-mask: repeat left center/var(--starsize) var(--symbol);
        }
        .rating::-moz-range-thumb {
            height: var(--starsize);
            opacity: 0;
            width: var(--starsize);
        }
        .rating::-webkit-slider-thumb {
            height: var(--starsize);
            opacity: 0;
            width: var(--starsize);
            -webkit-appearance: none;
        }
        .rating, .rating-label {
            display: block;
            font-family: ui-sans-serif, system-ui, sans-serif;
        }
        .rating-label {
            margin-block-end: 1rem;
        }

        /* NO JS */
        .rating--nojs::-moz-range-track {
            background: var(--fillbg);
        }
        .rating--nojs::-moz-range-progress {
            background: var(--fill);
            block-size: 100%;
            mask: repeat left center/var(--starsize) var(--star);
        }
        .rating--nojs::-webkit-slider-runnable-track {
            background: var(--fillbg);
        }
        .rating--nojs::-webkit-slider-thumb {
            background-color: var(--fill);
            box-shadow: calc(0rem - var(--w)) 0 0 var(--w) var(--fill);
            opacity: 1;
            width: 1px;
        }
        [dir="rtl"] .rating--nojs::-webkit-slider-thumb {
            box-shadow: var(--w) 0 0 var(--w) var(--fill);
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page Content-->
    <div class="container pb-5 mb-2 mb-md-4 mt-3 rtl __inline-47"
         style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
        <div class="row g-3">
            <!-- Sidebar-->
            <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Content -->
            <section class="col-lg-9">
                <?php echo $__env->make('web-views.users-profile.account-details.partial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="bg-white border-lg rounded mobile-full">
                    <div class="p-lg-3 p-0">
                        <div class="d-flex justify-content-between gap-2 flex-wrap mb-3">
                            <div class="d-flex gap-3 flex-wrap">
                                <?php if($order->order_type == 'default_type' && \App\CPU\Helpers::get_business_settings('order_verification')): ?>
                                    <div class="bg-light rounded py-2 px-3 d-flex align-items-center">
                                            <div class="fs-14 text-capitalize">
                                                <?php echo e(translate('order_verification_code')); ?> : <strong class="text-base"><?php echo e($order['verification_code']); ?></strong>
                                            </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($order->order_type == 'POS'): ?>
                                    <span  class="pos-btn bg-light hover-none border border-primary-light"><?php echo e(translate('POS_Order')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="d-flex align-items-start gap-2">
                                <button type="button" class="btn btn-square d-none d-md-block" onclick="location.href='<?php echo e(route('generate-invoice',[$order->id])); ?>'">
                                    <img src="<?php echo e(asset('public/assets/front-end/img/icons/downloads.png')); ?>">
                                </button>
                                <?php if($order->order_status=='delivered'): ?>
                                    <button class="btn btn--primary btn-sm h-40px rounded text_capitalize d-none d-md-block" onclick="order_again(<?php echo e($order->id); ?>)">
                                        <?php echo e(translate('reorder')); ?>

                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card border-sm">
                            <div class="p-lg-3">
                                <div class="border-lg rounded payment mb-lg-3 table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <thead>
                                            <tr class="order_table_tr">
                                                <td class="order_table_td">
                                                    <div class="">
                                                        <div class="_1 py-2 d-flex justify-content-between align-items-center">
                                                            <h6 class="font-weight-bold text-capitalize"><?php echo e(translate('payment_info')); ?></h6>
                                                            <button type="button" class="btn btn-square d-sm-none" onclick="location.href='<?php echo e(route('generate-invoice',[$order->id])); ?>'">
                                                                <img src="<?php echo e(asset('public/assets/front-end/img/icons/downloads.png')); ?>">
                                                            </button>
                                                        </div>
                                                        <div class="fs-12">
                                                            <span class="text-muted text-capitalize"><?php echo e(translate('payment_status')); ?></span> : <span class="text-<?php echo e($order['payment_status'] == 'paid' ? 'success' : 'danger'); ?> text-capitalize"><?php echo e($order['payment_status']); ?></span>
                                                        </div>
                                                        <div class="mt-2 fs-12">
                                                            <span class="text-muted text-capitalize"><?php echo e(translate('payment_method')); ?></span> : <span class="text-primary text-capitalize"><?php echo e(translate($order['payment_method'])); ?></span>
                                                        </div>
                                                        <?php if($order->payment_method == 'offline_payment' && isset($order->offline_payments)): ?>
                                                            <button type="button" class="btn bg-light border border-primary-light mt-3 rounded-pill btn-sm text-capitalize" data-toggle="modal" data-target="#verifyViewModal"><?php echo e(translate('see_payment_details')); ?></button>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                                <?php if( $order->order_type == 'default_type'): ?>
                                                    <?php ($shipping=json_decode($order['shipping_address_data'])); ?>
                                                    <?php if($shipping): ?>
                                                        <td class="order_table_td">
                                                            <div class="">
                                                                <div class=" py-2">
                                                                    <h6 class="font-weight-bold text-capitalize"><?php echo e(translate('shipping_address')); ?>: </h6>
                                                                </div>
                                                                <div class="">
                                                                <span class="text-capitalize fs-12">
                                                                    <span class="text-capitalize">
                                                                        <span class="min-w-60px"><?php echo e(translate('name')); ?></span> :&nbsp; <?php echo e($shipping->contact_person_name); ?>

                                                                    </span>
                                                                    <br>
                                                                    <span class="text-capitalize">
                                                                        <span class="min-w-60px"><?php echo e(translate('phone')); ?></span> :&nbsp; <?php echo e($shipping->phone); ?>,
                                                                    </span>
                                                                    <br>
                                                                    <span class="text-capitalize">
                                                                        <span class="min-w-60px"> <?php echo e(translate('address')); ?></span> :&nbsp;
                                                                        <?php echo e($shipping->address); ?>,
                                                                        <?php echo e($shipping->city); ?>

                                                                        , <?php echo e($shipping->zip); ?>

                                                                    </span>
                                                                </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    <?php endif; ?>
                                                    <td class="order_table_td">
                                                        <div class="">
                                                            <div class=" py-2">
                                                                <h6 class="font-weight-bold text-capitalize"><?php echo e(translate('billing_address')); ?>: </h6>
                                                            </div>
                                                            <div class="">
                                                            <?php ($billing=json_decode($order['billing_address_data'])); ?>
                                                            <span class="text-capitalize fs-12">
                                                                <?php if($billing): ?>
                                                                    <span class="text-capitalize">
                                                                        <span class="min-w-60px"><?php echo e(translate('name')); ?></span> : &nbsp;<?php echo e($billing->contact_person_name); ?>

                                                                    </span>
                                                                    <br>
                                                                    <span class="text-capitalize">
                                                                        <span class="min-w-60px"><?php echo e(translate('phone')); ?></span> : &nbsp;<?php echo e($billing->phone); ?>,
                                                                    </span>
                                                                    <br>
                                                                    <span class="text-capitalize">
                                                                        <span class="min-w-60px"> <?php echo e(translate('address')); ?></span> :&nbsp;
                                                                        <?php echo e($billing->address); ?>,
                                                                        <?php echo e($billing->city); ?>

                                                                        , <?php echo e($billing->zip); ?>

                                                                    </span>
                                                                <?php else: ?>
                                                                    <span class="text-capitalize">
                                                                        <span class="min-w-60px"><?php echo e(translate('name')); ?></span> : &nbsp;<?php echo e($shipping->contact_person_name); ?>

                                                                    </span>
                                                                    <br>
                                                                    <span class="text-capitalize">
                                                                        <span class="min-w-60px"><?php echo e(translate('phone')); ?></span> :&nbsp; <?php echo e($shipping->phone); ?>,
                                                                    </span>
                                                                    <br>
                                                                    <span class="text-capitalize">
                                                                        <span class="min-w-60px"> <?php echo e(translate('address')); ?></span> :&nbsp;
                                                                        <?php echo e($shipping->address); ?>,
                                                                        <?php echo e($shipping->city); ?>

                                                                        , <?php echo e($shipping->zip); ?>

                                                                    </span>
                                                                <?php endif; ?>
                                                            </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div class="payment mb-3 table-responsive d-none d-lg-block">
                                    <table class="table table-borderless" style="min-width:600px">
                                        <thead class="thead-light text-capitalize">
                                            <tr>
                                                <th><?php echo e(translate('order_details')); ?></th>
                                                <th><?php echo e(translate('qty')); ?></th>
                                                <th class="text-right"><?php echo e(translate('price')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php ($product=json_decode($detail->product_details,true)); ?>
                                                <?php if($product): ?>
                                                    <tr>
                                                        <td class="for-tab-img" >
                                                            <div class="media gap-3 align-items-center">
                                                                <div class="position-relative">
                                                                    <?php if($product['discount'] > 0): ?>
                                                                        <span class="for-discoutn-value px-1">
                                                                            <?php if($product['discount_type'] == 'percent'): ?>
                                                                            <?php echo e(round($product['discount'],(!empty($decimal_point_settings) ? $decimal_point_settings: 0))); ?>%
                                                                        <?php elseif($product['discount_type'] =='flat'): ?>
                                                                            <?php echo e(\App\CPU\Helpers::currency_converter($product['discount'])); ?>

                                                                            <?php endif; ?> <?php echo e(translate('off')); ?>

                                                                        </span>
                                                                    <?php endif; ?>

                                                                    <?php if($detail->product_all_status): ?>
                                                                        <img class="d-block" onclick="location.href='<?php echo e(route('product',$product['slug'])); ?>'"
                                                                             onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                                             src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($detail->product_all_status['thumbnail']); ?>"
                                                                             alt="VR Collection" width="100">
                                                                    <?php else: ?>
                                                                        <img class="d-block" onclick="location.href='<?php echo e(route('product',$product['slug'])); ?>'"
                                                                             onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                                             src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                                                                             alt="VR Collection" width="100">
                                                                    <?php endif; ?>
                                                                </div>

                                                                <div class="media-body">
                                                                    <a href="<?php echo e(route('product',[$product['slug']])); ?>">
                                                                        <?php echo e(isset($product['name']) ? Str::limit($product['name'],40) : ''); ?>

                                                                    </a>
                                                                    <?php if($detail->refund_request == 1): ?>
                                                                        <small> (<?php echo e(translate('refund_pending')); ?>) </small> <br>
                                                                    <?php elseif($detail->refund_request == 2): ?>
                                                                        <small> (<?php echo e(translate('refund_approved')); ?>) </small> <br>
                                                                    <?php elseif($detail->refund_request == 3): ?>
                                                                        <small> (<?php echo e(translate('refund_rejected')); ?>) </small> <br>
                                                                    <?php elseif($detail->refund_request == 4): ?>
                                                                        <small> (<?php echo e(translate('refund_refunded')); ?>) </small> <br>
                                                                    <?php endif; ?><br>
                                                                    <?php if($detail->variant): ?>
                                                                        <small>
                                                                            <span><?php echo e(translate('variant')); ?> : </span>
                                                                            <?php echo e($detail->variant); ?>

                                                                        </small>
                                                                    <?php endif; ?>

                                                                    <div class="d-flex flex-wrap gap-2 mt-2">
                                                                        <?php if($detail->product && $order->payment_status == 'paid' && $detail->product->digital_product_type == 'ready_product'): ?>
                                                                            <a class="btn btn-sm rounded btn--primary" onclick="digital_product_download('<?php echo e(route('digital-product-download', $detail->id)); ?>')" href="javascript:"><?php echo e(translate('download')); ?> <i class="tio-download-from-cloud"></i></a>
                                                                        <?php elseif($detail->product && $order->payment_status == 'paid' && $detail->product->digital_product_type == 'ready_after_sell'): ?>
                                                                            <?php if($detail->digital_file_after_sell): ?>
                                                                                <a class="btn btn-sm rounded btn--primary" onclick="digital_product_download('<?php echo e(route('digital-product-download', $detail->id)); ?>')" href="javascript:"><?php echo e(translate('download')); ?> <i class="tio-download-from-cloud"></i></a>
                                                                            <?php else: ?>

                                                                                <span class="" data-toggle="tooltip" data-placement="top" title="<?php echo e(translate('product_not_uploaded_yet')); ?>">
                                                                                    <a class="btn btn-sm rounded btn--primary disabled"><?php echo e(translate('download')); ?> <i class="tio-download-from-cloud"></i></a>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                        <?php
                                                                            $refund_day_limit = \App\CPU\Helpers::get_business_settings('refund_day_limit');
                                                                            $order_details_date = $detail->created_at;
                                                                            $current = \Carbon\Carbon::now();
                                                                            $length = $order_details_date->diffInDays($current);
                                                                        ?>

                                                                        <?php if($order->order_type == 'default_type'): ?>
                                                                            <?php if($order->order_status=='delivered'): ?>
                                                                                <?php if(isset($detail->product)): ?>
                                                                                    <button type="button" class="btn btn-sm rounded btn-warning" data-toggle="modal" data-target="#submitReviewModal<?php echo e($detail->id); ?>">
                                                                                        <?php if(isset($detail->product->reviews_by_customer[0])): ?>
                                                                                            <i class="tio-star-half"></i><?php echo e(translate('Update_Review')); ?>

                                                                                        <?php else: ?>
                                                                                            <i class="tio-star-half"></i><?php echo e(translate('review')); ?>

                                                                                        <?php endif; ?>
                                                                                    </button>
                                                                                <?php endif; ?>

                                                                                <?php if($detail->refund_request !=0): ?>
                                                                                    <button type="button" class="btn btn-sm rounded btn--primary" onclick="refund_details('<?php echo e(route('refund-details',['id'=>$detail->id])); ?>')" ><?php echo e(translate('refund_details')); ?></button>
                                                                                <?php endif; ?>
                                                                                <?php if( $length <= $refund_day_limit && $detail->refund_request == 0): ?>
                                                                                    <button class="btn btn-sm rounded btn--primary"  data-toggle="modal" data-target="#refundModal<?php echo e($detail->id); ?>"><?php echo e(translate('refund')); ?></button>
                                                                                <?php endif; ?>
                                                                            <?php endif; ?>
                                                                            <!--=====-->
                                                                        <?php endif; ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="pl-2">
                                                                <span class="word-nobreak font-weight-bold"><?php echo e($detail->qty); ?></span>
                                                            </div>
                                                        </td>
                                                        <td class="text-right">
                                                            <span class="font-weight-bold amount"><?php echo e(\App\CPU\Helpers::currency_converter($detail->price)); ?> </span>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        
                        <div class="pt-2 d-flex flex-column gap-2 d-lg-none">
                            <hr>
                            <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php ($product=json_decode($detail->product_details,true)); ?>
                                <?php if($product): ?>
                                    <div class="bg-white border rounded p-3">
                                        <div class="d-flex justify-content-between gap-3">
                                            <div class="for-tab-img" >
                                                <div class="media flex-wrap gap-2">
                                                    <div class="position-relative">
                                                        <?php if($product['discount'] > 0): ?>
                                                            <span class="for-discoutn-value px-1">
                                                                <?php if($product['discount_type'] == 'percent'): ?>
                                                                <?php echo e(round($product['discount'],(!empty($decimal_point_settings) ? $decimal_point_settings: 0))); ?>%
                                                            <?php elseif($product['discount_type'] =='flat'): ?>
                                                                <?php echo e(\App\CPU\Helpers::currency_converter($product['discount'])); ?>

                                                                <?php endif; ?> <?php echo e(translate('off')); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                        <img class="d-block" onclick="location.href='<?php echo e(route('product',$product['slug'])); ?>'"
                                                            onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                            src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                                                            alt="VR Collection" width="80">
                                                    </div>

                                                    <div class="media-body">
                                                        <a href="<?php echo e(route('product',[$product['slug']])); ?>" class="fs-14">
                                                            <?php echo e(isset($product['name']) ? Str::limit($product['name'],40) : ''); ?>

                                                        </a>
                                                        <?php if($detail->refund_request == 1): ?>
                                                            <small> (<?php echo e(translate('refund_pending')); ?>) </small>
                                                        <?php elseif($detail->refund_request == 2): ?>
                                                            <small> (<?php echo e(translate('refund_approved')); ?>) </small>
                                                        <?php elseif($detail->refund_request == 3): ?>
                                                            <small> (<?php echo e(translate('refund_rejected')); ?>) </small>
                                                        <?php elseif($detail->refund_request == 4): ?>
                                                            <small> (<?php echo e(translate('refund_refunded')); ?>) </small>
                                                        <?php endif; ?><br>
                                                        <span class="d-flex justify-content-between">
                                                            <?php if($detail->variant): ?>
                                                                <small>
                                                                    <span class="text-muted"><?php echo e(translate('variant')); ?> : </span>
                                                                    <?php echo e($detail->variant); ?>

                                                                </small>
                                                            <?php endif; ?>
                                                            <small>
                                                                <span class="text-muted"><?php echo e(translate('qty')); ?> : </span>
                                                                <?php echo e($detail->qty); ?>

                                                            </small>
                                                        </span>

                                                        <small class="d-flex align-items-center gap-2">
                                                            <div class="text-nowrap text-muted"> <?php echo e(translate('price')); ?> : </div>
                                                            <div class="font-weight-bold amount"><?php echo e(\App\CPU\Helpers::currency_converter($detail->price)); ?> </div>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end flex-wrap gap-2 mt-2">
                                            <?php if($detail->product && $order->payment_status == 'paid' && $detail->product->digital_product_type == 'ready_product'): ?>
                                                <a class="btn btn-sm rounded btn--primary" onclick="digital_product_download('<?php echo e(route('digital-product-download', $detail->id)); ?>')" href="javascript:"><?php echo e(translate('download')); ?> <i class="tio-download-from-cloud"></i></a>
                                            <?php elseif($detail->product && $order->payment_status == 'paid' && $detail->product->digital_product_type == 'ready_after_sell'): ?>
                                                <?php if($detail->digital_file_after_sell): ?>
                                                    <a class="btn btn-sm rounded btn--primary" onclick="digital_product_download('<?php echo e(route('digital-product-download', $detail->id)); ?>')" href="javascript:"><?php echo e(translate('download')); ?> <i class="tio-download-from-cloud"></i></a>
                                                <?php else: ?>

                                                    <span class="" data-toggle="tooltip" data-placement="top" title="<?php echo e(translate('product_not_uploaded_yet')); ?>">
                                                        <a class="btn btn-sm rounded btn--primary disabled"><?php echo e(translate('download')); ?> <i class="tio-download-from-cloud"></i></a>
                                                    </span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php
                                                $refund_day_limit = \App\CPU\Helpers::get_business_settings('refund_day_limit');
                                                $order_details_date = $detail->created_at;
                                                $current = \Carbon\Carbon::now();
                                                $length = $order_details_date->diffInDays($current);
                                            ?>

                                            <?php if($order->order_type == 'default_type'): ?>
                                                <?php if($order->order_status=='delivered'): ?>
                                                <?php if(isset($detail->product)): ?>
                                                    <button type="button" class="btn btn-sm rounded btn-warning" data-toggle="modal" data-target="#submitReviewModal<?php echo e($detail->id); ?>">
                                                        <?php if(isset($detail->product->reviews_by_customer[0])): ?>
                                                            <i class="tio-star-half"></i><?php echo e(translate('Update_Review')); ?>

                                                        <?php else: ?>
                                                            <i class="tio-star-half"></i><?php echo e(translate('review')); ?>

                                                        <?php endif; ?>
                                                    </button>
                                                <?php endif; ?>
                                                    <?php if($detail->refund_request !=0): ?>
                                                        <button type="button" class="btn btn-sm rounded btn--primary" onclick="refund_details('<?php echo e(route('refund-details',['id'=>$detail->id])); ?>')" ><?php echo e(translate('refund_details')); ?></button>
                                                    <?php endif; ?>
                                                    <?php if( $length <= $refund_day_limit && $detail->refund_request == 0): ?>
                                                    <button class="btn btn-sm rounded btn--primary"  data-toggle="modal" data-target="#refundModal<?php echo e($detail->id); ?>"><?php echo e(translate('refund')); ?></button>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                                <!--=====-->
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <hr>
                        </div>

                        <!--Calculation-->
                        <?php ($summary=\App\CPU\OrderManager::order_summary($order)); ?>
                        <?php
                            if ($order['extra_discount_type'] == 'percent') {
                                $extra_discount = ($summary['subtotal'] / 100) * $order['extra_discount'];
                            } else {
                                $extra_discount = $order['extra_discount'];
                            }
                        ?>
                        <div class="row d-flex justify-content-end mt-2">
                            <div class="col-md-8 col-lg-5">
                                <div class="bg-white border-sm rounded">
                                    <div class="card-body ">
                                        <table class="calculation-table table table-borderless mb-0">
                                            <tbody class="totals">
                                                <tr>
                                                    <td>
                                                        <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"><span
                                                                class="product-qty "><?php echo e(translate('item')); ?></span></div>
                                                    </td>
                                                    <td>
                                                        <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>">
                                                            <span><?php echo e($order->total_qty); ?></span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"><span
                                                                class="product-qty "><?php echo e(translate('subtotal')); ?></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>">
                                                            <span><?php echo e(\App\CPU\Helpers::currency_converter($summary['subtotal'])); ?></span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"><span
                                                                class="product-qty "><?php echo e(translate('tax_fee')); ?></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>">
                                                            <span><?php echo e(\App\CPU\Helpers::currency_converter($summary['total_tax'])); ?></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php if($order->order_type == 'default_type'): ?>
                                                    <tr>
                                                        <td>
                                                            <div
                                                                class="text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"><span
                                                                    class="product-qty "><?php echo e(translate('shipping_Fee')); ?></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>">
                                                                <span><?php echo e(\App\CPU\Helpers::currency_converter($summary['total_shipping_cost'] - ($order['is_shipping_free'] ? $order['extra_discount'] : 0))); ?></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>

                                                <tr>
                                                    <td>
                                                        <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"><span
                                                                class="product-qty "><?php echo e(translate('discount_on_product')); ?></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>">
                                                            <span>- <?php echo e(\App\CPU\Helpers::currency_converter($summary['total_discount_on_product'])); ?></span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"><span
                                                                class="product-qty "><?php echo e(translate('coupon_discount')); ?></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>">
                                                            <span>- <?php echo e(\App\CPU\Helpers::currency_converter($order->discount_amount)); ?></span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <?php if($order->order_type != 'default_type'): ?>
                                                    <tr>
                                                        <td>
                                                            <div
                                                                class="text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"><span
                                                                    class="product-qty "><?php echo e(translate('extra_discount')); ?></span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>">
                                                                <span>- <?php echo e(\App\CPU\Helpers::currency_converter($extra_discount)); ?></span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>

                                                <tr class="border-top">
                                                    <td>
                                                        <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"><span
                                                                class="font-weight-bold"><strong><?php echo e(translate('total')); ?></strong></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>">
                                                            <span class="font-weight-bold amount "><?php echo e(\App\CPU\Helpers::currency_converter($order->order_amount)); ?></span>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <?php if($order['order_status']=='pending'): ?>
                                            <button class="btn btn-block bg-soft-danger text-danger mt-3" onclick="route_alert('<?php echo e(route('order-cancel',[$order->id])); ?>','<?php echo e(translate('want_to_cancel_this_order?')); ?>','order-cancel')"><?php echo e(translate('cancel_order')); ?></button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php ($product=json_decode($detail->product_details,true)); ?>
        <?php if($product): ?>
            <?php echo $__env->make('layouts.front-end.partials.modal._review',['id'=>$detail->id,'order_details'=>$detail], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('layouts.front-end.partials.modal._refund',['id'=>$detail->id,'order_details'=>$detail,'order'=>$order,'product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- Bottom Sticky Part -->
    <?php if($order->order_status=='delivered'): ?>
        <div class="bottom-sticky_offset"></div>
        <div class="bottom-sticky_ele bg-white d-md-none p-3 ">
            <button class="btn btn--primary w-100 text_capitalize" onclick="order_again(<?php echo e($order->id); ?>)">
                <?php echo e(translate('reorder')); ?>

            </button>
        </div>
    <?php endif; ?>

    <!-- Verify View Modal -->
    <?php if($order->payment_method == 'offline_payment' && isset($order->offline_payments)): ?>
        <div class="modal fade" id="verifyViewModal" tabindex="-1" aria-labelledby="verifyViewModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content rtl">
                    <div class="modal-header d-flex justify-content-end  border-0 pb-0">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true" class="tio-clear"></span>
                        </button>
                    </div>

                    <div class="modal-body pt-0">
                        <h5 class="mb-3 text-center text-capitalize"><?php echo e(translate('payment_verification')); ?></h5>

                        <div class="shadow-sm rounded p-3">
                            <h6 class="mb-3 text-capitalize"><?php echo e(translate('customer_information')); ?></h6>

                            <div class="d-flex flex-column gap-2 fs-12">
                                <div class="d-flex align-items-center gap-2">
                                    <span><?php echo e(translate('name')); ?></span>:
                                    <span class="text-dark"> <a class="text-body text-capitalize" href="Javascript:"> <?php echo e($order->customer->f_name ?? transalte('name_not_found')); ?>&nbsp;<?php echo e($order->customer->l_name ?? ''); ?>  </a>  </span>
                                </div>

                                <div class="d-flex align-items-center gap-2">
                                    <span><?php echo e(translate('phone')); ?></span>:
                                    <span class="text-dark"><?php echo e($order->customer->phone ?? translate('number_not_found')); ?></span>
                                </div>
                            </div>

                            <div class="mt-5">
                                <h6 class="mb-3 text-capitalize"><?php echo e(translate('payment_information')); ?></h6>

                                <div class="d-flex flex-column gap-2 fs-12">

                                    <?php $__currentLoopData = json_decode($order->offline_payments->payment_info); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($key != 'method_id'): ?>
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="text-capitalize"><?php echo e(translate($key)); ?></span>:
                                                <span class="text-dark"> <a class="text-body text-capitalize" href="#"> <?php echo e($value); ?>  </a>  </span>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- refund details -->
    <div class="modal fade" id="refund_details_modal" tabindex="-1" aria-labelledby="refundRequestModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h6 class="text-center text-capitalize m-0 flex-grow-1"><?php echo e(translate('refund_details')); ?></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body d-flex flex-column gap-3" id="refund_details_field">

                </div>
            </div>
        </div>
    </div>
    <!-- refund details -->
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        function review_message() {
            toastr.info('<?php echo e(translate('you_can_review_after_the_product_is_delivered!')); ?>', {
                CloseButton: true,
                ProgressBar: true
            });
        }

        function refund_message() {
            toastr.info('<?php echo e(translate('you_can_refund_request_after_the_product_is_delivered!')); ?>', {
                CloseButton: true,
                ProgressBar: true
            });
        }
    </script>
    <script>
        $('#chat-form').on('submit', function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: '<?php echo e(route('messages_store')); ?>',
                data: $('#chat-form').serialize(),
                success: function (respons) {

                    toastr.success('<?php echo e(translate('send_successfully')); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                    $('#chat-form').trigger('reset');
                }
            });

        });
    </script>

    <script src="<?php echo e(asset('public/assets/front-end/js/spartan-multi-image-picker.js')); ?>"></script>
    <script type="text/javascript">
        
        
        
        
        
        
        
        
        
        
        
        

        
        

        
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        

        
        
        
        
        
        
        
        
        
        
        

        
        

        
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        


        function showInstaImage(link) {
            $("#attachment-view").attr("src", link);
            $('#show-modal-view').modal('toggle')
        }


        function refund_details(route){
            $.get(route,(response)=>{
                $("#refund_details_field").html(response);
                $('#refund_details_modal').modal().show();
            })
        }

    </script>

    <script>
        function digital_product_download(link)
        {
            $.ajax({
                type: "GET",
                url: link,
                responseType: 'blob',
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    if (data.status == 1 && data.file_path) {
                        const a = document.createElement('a');
                        a.href = data.file_path;
                        a.download = data.file_name;
                        a.style.display = 'none';
                        document.body.appendChild(a);
                        a.click();
                        window.URL.revokeObjectURL(data.file_path);

                    }
                },
                error: function () {

                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        }
    </script>

    <script>
        let selectedFiles = [];
        $(document).on('ready', () => {
            $(".msgfilesValue").on('change', function () {
                for (let i = 0; i < this.files.length; ++i) {
                    selectedFiles.push(this.files[i]);
                }
                let pre_container = $(this).closest('.upload_images_area');
                // Display the selected files
                displaySelectedFiles(pre_container);
            });

            function displaySelectedFiles(pre_container = null) {
                /*start*/
                let container;
                if(pre_container == null) {
                    container = document.getElementsByClassName("selected-files-container");
                }else {
                    container = pre_container.find('.selected-files-container');
                }
                container.innerHTML = ""; // Clear previous content
                selectedFiles.forEach((file, index) => {
                    const input = document.createElement("input");
                    input.type = "file";
                    input.name = `images[${index}]`;
                    input.classList.add(`image_index${index}`);
                    input.hidden = true;
                    container.append(input);
                    /*BlobPropertyBag :
                    / This type represents a collection of object properties and does not have an
                    / explicit JavaScript representation.
                    */
                    const blob = new Blob([file], { type: file.type });
                    const file_obj = new File([file],file.name);
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file_obj);
                    input.files = dataTransfer.files;
                });
                /*end */
                pre_container.find(".filearray").empty(); // Clear previous user input
                for (let i = 0; i < selectedFiles.length; ++i) {
                    let filereader = new FileReader();
                    let uploadDiv = jQuery.parseHTML("<div class='upload_img_box'><span class='img-clear'><i class='tio-clear'></i></span><img src='' alt=''></div>");

                    filereader.onload = function () {
                        // Set the src attribute of the img tag within the created div
                        let imageData = this.result;
                        $(uploadDiv).find('img').attr('src', imageData);
                    };

                    filereader.readAsDataURL(selectedFiles[i]);
                    pre_container.find(".filearray").append(uploadDiv);
                    // Attach a click event handler to the "tio-clear" icon to remove the associated div and file from the array
                    $(uploadDiv).find('.img-clear').on('click', function () {
                        $(this).closest('.upload_img_box').remove();

                        selectedFiles.splice(i, 1);
                        $('.image_index'+i).remove();
                    });
                }
            }
        });
    </script>

    <script>
        let reviewselectedFiles = [];
        $(document).on('ready', () => {
            $(".reviewfilesValue").on('change', function () {
                for (let i = 0; i < this.files.length; ++i) {
                    reviewselectedFiles.push(this.files[i]);
                }
                let pre_container = $(this).closest('.upload_images_area');
                // Display the selected files
                reviewfilesValuedisplaySelectedFiles(pre_container);
            });

            function reviewfilesValuedisplaySelectedFiles(pre_container = null) {
                /*start*/
                let container;
                if(pre_container == null) {
                    container = document.getElementsByClassName("selected-files-container");
                }else {
                    container = pre_container.find('.selected-files-container');
                }
                container.innerHTML = ""; // Clear previous content
                reviewselectedFiles.forEach((file, index) => {
                    const input = document.createElement("input");
                    input.type = "file";
                    input.name = `fileUpload[${index}]`;
                    input.classList.add(`image_index${index}`);
                    input.hidden = true;
                    container.append(input);
                    /*BlobPropertyBag :
                    / This type represents a collection of object properties and does not have an
                    / explicit JavaScript representation.
                    */
                    const blob = new Blob([file], { type: file.type });
                    const file_obj = new File([file],file.name);
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file_obj);
                    input.files = dataTransfer.files;
                });
                /*end */
                pre_container.find(".filearray").empty(); // Clear previous user input
                for (let i = 0; i < reviewselectedFiles.length; ++i) {
                    let filereader = new FileReader();
                    let uploadDiv = jQuery.parseHTML("<div class='upload_img_box'><span class='img-clear'><i class='tio-clear'></i></span><img src='' alt=''></div>");

                    filereader.onload = function () {
                        // Set the src attribute of the img tag within the created div
                        let imageData = this.result;
                        $(uploadDiv).find('img').attr('src', imageData);
                    };

                    filereader.readAsDataURL(reviewselectedFiles[i]);
                    pre_container.find(".filearray").append(uploadDiv);
                    // Attach a click event handler to the "tio-clear" icon to remove the associated div and file from the array
                    $(uploadDiv).find('.img-clear').on('click', function () {
                        $(this).closest('.upload_img_box').remove();

                        reviewselectedFiles.splice(i, 1);
                        $('.image_index'+i).remove();
                    });
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/themes/default/web-views/users-profile/account-order-details.blade.php ENDPATH**/ ?>