<?php $__env->startSection('title',translate('order_Details')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <style>
        .page-item.active .page-link {
            background-color: <?php echo e($web_config['primary_color']); ?>              !important;
        }

        .amount {
            margin- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 60px;

        }

        .w-49{
            width: 49% !important
        }

        a {
            color: <?php echo e($web_config['primary_color']); ?>;
        }

        @media (max-width: 360px) {
            .for-glaxy-mobile {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 6px;
            }

        }

        @media (max-width: 600px) {

            .for-glaxy-mobile {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 6px;
            }

            .order_table_info_div_2 {
                text-align: <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>          !important;
            }

             {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 16px;
            }

            . {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 16px;
            }

            .amount {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 0px;
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
            
            <section class="col-lg-9">
                <?php echo $__env->make('web-views.users-profile.account-details.partial',['order'=>$orderDetails], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Progress-->
                <div class="card border-0">
                    <div class="card-body">
                        <div class="d-flex gap-3 flex-wrap mb-4">
                            <?php if($orderDetails->order_type == 'default_type' && \App\CPU\Helpers::get_business_settings('order_verification')): ?>
                                <div class="bg-light rounded py-2 px-3 d-flex align-items-center">
                                    <div class="fs-14">
                                        <?php echo e(translate('order_verification_code')); ?> : <strong class="text-base"><?php echo e($orderDetails['verification_code']); ?></strong>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($orderDetails->order_type == 'POS'): ?>
                                <button type="button" class="btn bg-light border border-primary-light"><?php echo e(translate('POS_Order')); ?></button>
                            <?php endif; ?>
                        </div>

                        <ul class="nav nav-tabs media-tabs nav-justified order-track-info">
                            <?php if($orderDetails['order_status']!='returned' && $orderDetails['order_status']!='failed' && $orderDetails['order_status']!='canceled'): ?>
                                <li class="nav-item">
                                    <div class="nav-link active-status">
                                        <div class="d-flex flex-sm-column gap-3 gap-sm-0">
                                            <div class="media-tab-media mx-sm-auto mb-3">
                                                <img src="<?php echo e(asset('/public/assets/front-end/img/track-order/order-placed.png')); ?>" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="text-sm-center">
                                                    <h6 class="media-tab-title text-nowrap mb-0 text-capitalize fs-14"><?php echo e(translate('order_placed')); ?></h6>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-sm-center gap-1 mt-2">
                                                    <img src="<?php echo e(asset('/public/assets/front-end/img/track-order/clock.png')); ?>" width="14" alt="">
                                                    <span class="text-muted fs-12"><?php echo e(date('h:i A, d M Y',strtotime($orderDetails->created_at))); ?></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>

                                <li class="nav-item ">
                                    <div class="nav-link <?php echo e(($orderDetails['order_status']=='confirmed') || ($orderDetails['order_status']=='processing') || ($orderDetails['order_status']=='processed') || ($orderDetails['order_status']=='out_for_delivery') || ($orderDetails['order_status']=='delivered')?'active-status' : ''); ?>">
                                        <div class="d-flex flex-sm-column gap-3 gap-sm-0">
                                            <div class="media-tab-media mb-3 mx-sm-auto">
                                                <img src="<?php echo e(asset('/public/assets/front-end/img/track-order/order-confirmed.png')); ?>" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="text-sm-center">
                                                    <h6 class="media-tab-title text-nowrap mb-0 text-capitalize fs-14"><?php echo e(translate('order_confirmed')); ?></h6>
                                                </div>
                                                <?php if(($orderDetails['order_status']=='confirmed') || ($orderDetails['order_status']=='processing') || ($orderDetails['order_status']=='processed') || ($orderDetails['order_status']=='out_for_delivery') || ($orderDetails['order_status']=='delivered') && \App\CPU\order_status_history($orderDetails['id'],'confirmed')): ?>
                                                    <div class="d-flex align-items-center justify-content-sm-center mt-2 gap-1">
                                                        <img src="<?php echo e(asset('/public/assets/front-end/img/track-order/clock.png')); ?>" width="14" alt="">
                                                        <span class="text-muted fs-12">
                                                            <?php echo e(date('h:i A, d M Y',strtotime(\App\CPU\order_status_history($orderDetails['id'],'confirmed')))); ?>

                                                        </span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <div class="nav-link <?php echo e(($orderDetails['order_status']=='processing') || ($orderDetails['order_status']=='processed') || ($orderDetails['order_status']=='out_for_delivery') || ($orderDetails['order_status']=='delivered')?'active-status' : ''); ?>">
                                        <div class="d-flex flex-sm-column gap-3 gap-sm-0">
                                            <div class="media-tab-media mb-3 mx-sm-auto">
                                                <img src="<?php echo e(asset('/public/assets/front-end/img/track-order/shipment.png')); ?>" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="text-sm-center">
                                                    <h6 class="media-tab-title text-nowrap mb-0 text-capitalize fs-14"><?php echo e(translate('preparing_shipment')); ?></h6>
                                                </div>
                                                <?php if( ($orderDetails['order_status']=='processing') || ($orderDetails['order_status']=='processed') || ($orderDetails['order_status']=='out_for_delivery') || ($orderDetails['order_status']=='delivered')  && \App\CPU\order_status_history($orderDetails['id'],'processing')): ?>
                                                    <div class="d-flex align-items-center justify-content-sm-center mt-2 gap-2">
                                                        <img src="<?php echo e(asset('/public/assets/front-end/img/track-order/clock.png')); ?>" width="14" alt="">
                                                        <span class="text-muted fs-12">
                                                            <?php echo e(date('h:i A, d M Y',strtotime(\App\CPU\order_status_history($orderDetails['id'],'processing')))); ?>

                                                        </span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="nav-link <?php echo e(($orderDetails['order_status']=='out_for_delivery') || ($orderDetails['order_status']=='delivered')?'active-status' : ''); ?>">
                                        <div class="d-flex flex-sm-column gap-3 gap-sm-0">
                                            <div class="media-tab-media mb-3 mx-sm-auto">
                                                <img src="<?php echo e(asset('/public/assets/front-end/img/track-order/on-the-way.png')); ?>" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="text-sm-center">
                                                    <h6 class="media-tab-title text-nowrap mb-0 fs-14"><?php echo e(translate('order_is_on_the_way')); ?></h6>
                                                </div>
                                                <?php if( ($orderDetails['order_status']=='out_for_delivery') || ($orderDetails['order_status']=='delivered') && \App\CPU\order_status_history($orderDetails['id'],'out_for_delivery')): ?>
                                                    <div class="d-flex align-items-center justify-content-sm-center mt-2 gap-2">
                                                        <img class="mx-1" src="<?php echo e(asset('/public/assets/front-end/img/track-order/clock.png')); ?>" width="14" alt="">
                                                        <span class="text-muted fs-12">
                                                            <?php echo e(date('h:i A, d M Y',strtotime(\App\CPU\order_status_history($orderDetails['id'],'out_for_delivery')))); ?>

                                                        </span>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="mt-1">
                                                        <span class="d-flex justify-content-sm-center text-nowrap">
                                                            <span class="text-muted fs-12 text-capitalize"><?php echo e(translate('your_deliveryman_is_coming')); ?></span>
                                                        </span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="nav-link <?php echo e(($orderDetails['order_status']=='delivered')?'active-status' : ''); ?>">
                                        <div class="d-flex flex-sm-column gap-3 gap-sm-0">
                                            <div class="media-tab-media mb-3 mx-sm-auto">
                                                <img src="<?php echo e(asset('/public/assets/front-end/img/track-order/delivered.png')); ?>" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="text-sm-center">
                                                    <h6 class="media-tab-title text-nowrap mb-0 fs-14"><?php echo e(translate('order_Shipped')); ?></h6>
                                                </div>
                                                <?php if(($orderDetails['order_status']=='delivered') && \App\CPU\order_status_history($orderDetails['id'],'delivered')): ?>
                                                    <div class="d-flex align-items-center justify-content-sm-center mt-2 gap-2">
                                                        <img src="<?php echo e(asset('/public/assets/front-end/img/track-order/clock.png')); ?>" width="14" alt="">
                                                        <span class="text-muted fs-12">
                                                            <?php echo e(date('h:i A, d M Y',strtotime(\App\CPU\order_status_history($orderDetails['id'],'delivered')))); ?>

                                                        </span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php elseif($orderDetails['order_status']=='returned'): ?>
                                    <li class="nav-item">
                                        <div class="nav-link text-center">
                                            <h1 class="text-warning text-capitalize"><?php echo e(translate('product_successfully_returned')); ?></h1>
                                        </div>
                                    </li>
                                <?php elseif($orderDetails['order_status']=='canceled'): ?>
                                <li class="nav-item">
                                    <div class="nav-link text-center">
                                        <h1 class="text-danger text-capitalize"><?php echo e(translate("your_order_has_been_canceled")); ?></h1>
                                    </div>
                                </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <div class="nav-link text-center">
                                        <h1 class="text-danger text-capitalize"><?php echo e(translate("sorry_we_can_not_complete_your_order")); ?></h1>
                                    </div>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/themes/default/web-views/users-profile/account-details/track-order.blade.php ENDPATH**/ ?>