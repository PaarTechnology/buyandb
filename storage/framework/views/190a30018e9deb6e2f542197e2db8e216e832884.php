<?php $__env->startSection('title', translate('order_Transactions')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid ">
        <!-- Page Title -->
        <div class="mb-4">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(asset('/public/assets/back-end/img/order_report.png')); ?>" alt="">
                <?php echo e(translate('transaction_report')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Inlile Menu -->
        <?php echo $__env->make('admin-views.report.transaction-report-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Inlile Menu -->
        <div class="card mb-2">
            <div class="card-body">
                <h4 class="mb-3"><?php echo e(translate('filter_Data')); ?></h4>
                <form action="#" id="form-data" method="GET" class="w-100">
                    <div class="row  gx-2 gy-3 align-items-center text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>">
                        <div class="col-sm-6 col-md-3">
                            <div class="">
                                <select class="form-control __form-control" name="status">
                                    <option class="text-center" value="0" disabled>
                                        ---<?php echo e(translate('select_status')); ?>---
                                    </option>
                                    <option class="text-capitalize"
                                            value="all" <?php echo e($status == 'all'? 'selected' : ''); ?> ><?php echo e(translate('all_status')); ?> </option>
                                    <option class="text-capitalize"
                                            value="disburse" <?php echo e($status == 'disburse'? 'selected' : ''); ?> ><?php echo e(translate('disburse')); ?> </option>
                                    <option class="text-capitalize"
                                            value="hold" <?php echo e($status == 'hold'? 'selected' : ''); ?>><?php echo e(translate('hold')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="">
                                <select class="js-select2-custom form-control __form-control" name="seller_id">
                                    <option class="text-center" value="all" <?php echo e($seller_id == 'all' ? 'selected' : ''); ?>>
                                        <?php echo e(translate('all')); ?>

                                    </option>
                                    <option class="text-center" value="inhouse" <?php echo e($seller_id == 'inhouse' ? 'selected' : ''); ?>>
                                        <?php echo e(translate('inhouse')); ?>

                                    </option>
                                    <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option class="text-left text-capitalize"
                                                value="<?php echo e($seller->id); ?>" <?php echo e($seller->id == $seller_id ? 'selected' : ''); ?>>
                                            <?php echo e($seller->f_name.' '.$seller->l_name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="">
                                <select class="js-select2-custom form-control __form-control" name="customer_id">
                                    <option class="text-center" value="all" <?php echo e($customer_id == 'all' ? 'selected' : ''); ?>>
                                        <?php echo e(translate('all_customer')); ?>

                                    </option>
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option class="text-left text-capitalize"
                                                value="<?php echo e($customer->id); ?>" <?php echo e($customer->id == $customer_id ? 'selected' : ''); ?>>
                                            <?php echo e($customer->f_name.' '.$customer->l_name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <select class="form-control __form-control" name="date_type" id="date_type">
                                <option value="this_year" <?php echo e($date_type == 'this_year'? 'selected' : ''); ?>><?php echo e(translate('this_Year')); ?></option>
                                <option value="this_month" <?php echo e($date_type == 'this_month'? 'selected' : ''); ?>><?php echo e(translate('this_Month')); ?></option>
                                <option value="this_week" <?php echo e($date_type == 'this_week'? 'selected' : ''); ?>><?php echo e(translate('this_Week')); ?></option>
                                <option value="custom_date" <?php echo e($date_type == 'custom_date'? 'selected' : ''); ?>><?php echo e(translate('custom_Date')); ?></option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-3" id="from_div">
                            <div class="form-floating">
                                <input type="date" name="from" value="<?php echo e($from); ?>" id="from_date" class="form-control __form-control">
                                <label><?php echo e(translate('start_date')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3" id="to_div">
                            <div class="form-floating">
                                <input type="date" value="<?php echo e($to); ?>" name="to" id="to_date" class="form-control __form-control">
                                <label><?php echo e(translate('end_date')); ?></label>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-end gap-2 pt-0">
                            <button type="submit" class="btn btn--primary px-4 min-w-120 __h-45px" onclick="formUrlChange(this)"
                                    data-action="<?php echo e(url()->current()); ?>">
                                <?php echo e(translate('filter')); ?>

                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="store-report-content mb-2">
            <div class="left-content">
                <div class="left-content-card">
                    <img src="<?php echo e(asset('/public/assets/back-end/img/cart.svg')); ?>" alt="">
                    <div class="info">
                        <h4 class="subtitle"><?php echo e($order_data['total_orders']); ?></h4>
                        <h6 class="subtext"><?php echo e(translate('total_Orders')); ?></h6>
                    </div>
                    <div class="coupon__discount w-100 text-right d-flex justify-content-between">
                        <div class="text-center">
                            <strong class="text-primary"><?php echo e($order_data['in_house_orders']); ?></strong>
                            <div class="d-flex">
                                <span><?php echo e(translate('in_House Orders')); ?></span>
                            </div>
                        </div>
                        <div class="text-center">
                            <strong class="text-success"><?php echo e($order_data['seller_orders']); ?></strong>
                            <div class="d-flex">
                                <span><?php echo e(translate('seller_Orders')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="<?php echo e(asset('/public/assets/back-end/img/products.svg')); ?>" alt="">
                    <div class="coupon__discount w-100 text-right d-flex justify-content-between">
                        <div class="text-center">
                            <strong class="text-primary"><?php echo e($order_data['total_in_house_products']); ?></strong>
                            <div class="d-flex">
                                <span><?php echo e(translate('in_House Products')); ?></span>
                            </div>
                        </div>
                        <div class="text-center">
                            <strong class="text-success"><?php echo e($order_data['total_seller_products']); ?></strong>
                            <div class="d-flex">
                                <span><?php echo e(translate('seller_Products')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="<?php echo e(asset('/public/assets/back-end/img/stores.svg')); ?>" alt="">
                    <div class="info">
                        <h4 class="subtitle"><?php echo e($order_data['total_stores']); ?></h4>
                        <h6 class="subtext"><?php echo e(translate('total_Stores')); ?></h6>
                    </div>
                </div>
            </div>
            <div class="center-chart-area">
                <div class="center-chart-header">
                    <h3 class="title"><?php echo e(translate('order_Statistics')); ?></h3>
                </div>
                <canvas id="updatingData" class="store-center-chart"
                        data-hs-chartjs-options='{
                "type": "bar",
                "data": {
                  "labels": [<?php echo e('"'.implode('","', array_keys($order_transaction_chart['order_amount'])).'"'); ?>],
                  "datasets": [{
                    "label": "<?php echo e(translate('total_order_amount')); ?>",
                    "data": [<?php echo e('"'.implode('","', array_values($order_transaction_chart['order_amount'])).'"'); ?>],
                    "backgroundColor": "#a2ceee",
                    "hoverBackgroundColor": "#0177cd",
                    "borderColor": "#a2ceee"
                  }]
                },
                "options": {
                  "scales": {
                    "yAxes": [{
                      "gridLines": {
                        "color": "#e7eaf3",
                        "drawBorder": false,
                        "zeroLineColor": "#e7eaf3"
                      },
                      "ticks": {
                        "beginAtZero": true,
                        "fontSize": 12,
                        "fontColor": "#97a4af",
                        "fontFamily": "Open Sans, sans-serif",
                        "padding": 5,
                        "postfix": " <?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?>"
                      }
                    }],
                    "xAxes": [{
                      "gridLines": {
                        "display": false,
                        "drawBorder": false
                      },
                      "ticks": {
                        "fontSize": 12,
                        "fontColor": "#97a4af",
                        "fontFamily": "Open Sans, sans-serif",
                        "padding": 5
                      },
                      "categoryPercentage": 0.3,
                      "maxBarThickness": "10"
                    }]
                  },
                  "cornerRadius": 5,
                  "tooltips": {
                    "prefix": " ",
                    "hasIndicator": true,
                    "mode": "index",
                    "intersect": false
                  },
                  "hover": {
                    "mode": "nearest",
                    "intersect": true
                  }
                }
              }'>
                </canvas>
            </div>
            <div class="right-content">
                <!-- Dognut Pie -->
                <div class="card h-100 bg-white payment-statistics-shadow">
                    <div class="card-header border-0 ">
                        <h5 class="card-title">
                            <span><?php echo e(translate('payment_Statistics')); ?></span>
                        </h5>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="position-relative pie-chart">
                            <div id="dognut-pie" class="label-hide"></div>
                            <!-- Total Orders -->
                            <div class="total--orders">
                                <h3><?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?><?php echo e(\App\CPU\BackEndHelper::format_currency(\App\CPU\BackEndHelper::usd_to_currency($payment_data['total_payment']))); ?></h3>
                                <span><?php echo e(translate('completed_payments')); ?></span>
                            </div>
                            <!-- Total Orders -->
                        </div>
                        <div class="apex-legends">
                            <div class="before-bg-004188">
                                <span><?php echo e(translate('cash_payments')); ?> (<?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($payment_data['cash_payment']))); ?>)</span>
                            </div>
                            <div class="before-bg-0177CD">
                                <span><?php echo e(translate('digital_payments')); ?> (<?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($payment_data['digital_payment']))); ?>) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            </div>
                            <div class="before-bg-A2CEEE">
                                <span><?php echo e(translate('wallet')); ?> (<?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($payment_data['wallet_payment']))); ?>)</span>
                            </div>
                            <div class="before-bg-CDE6F5">
                                <span><?php echo e(translate('offline_payments')); ?> (<?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($payment_data['offline_payment']))); ?>)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dognut Pie -->
            </div>
        </div>
        <div class="card">
            <div class="px-3 py-4">
                <div class="d-flex flex-wrap gap-3 align-items-center">
                    <h4 class="mb-0 mr-auto">
                        <?php echo e(translate('total_Transactions')); ?>

                        <span class="badge badge-soft-dark radius-50 fz-12"><?php echo e($transactions->total()); ?></span>
                    </h4>
                    <form action="<?php echo e(url()->full()); ?>" method="GET" class="mb-0">
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-custom">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tio-search"></i>
                                </div>
                            </div>
                            <input type="hidden" name="date_type" value="<?php echo e($date_type); ?>">
                            <input type="hidden" name="from" value="<?php echo e($from); ?>">
                            <input type="hidden" name="to" value="<?php echo e($to); ?>">
                            <input type="hidden" name="seller_id" value="<?php echo e($seller_id); ?>">
                            <input type="hidden" name="status" value="<?php echo e($status); ?>">
                            <input type="hidden" name="customer_id" value="<?php echo e($customer_id); ?>">
                            <input id="datatableSearch_" type="search" name="search" class="form-control"
                                   placeholder="<?php echo e(translate('search_by_orders_id')); ?>"
                                   aria-label="Search orders"
                                   value="<?php echo e($search); ?>"
                                   required>
                            <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                        </div>
                        <!-- End Search -->
                    </form>
                    <div>
                        <a href="<?php echo e(route('admin.transaction.order-transaction-summary-pdf', ['date_type'=>request('date_type'), 'seller_id'=>request('seller_id'), 'customer_id'=>request('customer_id'), 'status'=>request('status'), 'from'=>request('from'), 'to'=>request('to')])); ?>" class="btn btn-outline--primary text-nowrap btn-block">
                            <i class="tio-file-text"></i>
                            <?php echo e(translate('download_PDF')); ?>

                        </a>
                    </div>
                    <div>
                        <button type="button" class="btn btn-outline--primary text-nowrap btn-block"
                                data-toggle="dropdown">
                            <i class="tio-download-to"></i>
                            <?php echo e(translate('export')); ?>

                            <i class="tio-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a class="dropdown-item"
                                   href="<?php echo e(route('admin.transaction.order-transaction-export-excel', ['date_type'=>request('date_type'), 'seller_id'=>request('seller_id'), 'customer_id'=>request('customer_id'), 'status'=>request('status'), 'from'=>request('from'), 'to'=>request('to')])); ?>"  >
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
                       style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                       class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100 __table">
                    <thead class="thead-light thead-50 text-capitalize">
                    <tr>
                        <th><?php echo e(translate('SL')); ?></th>
                        <th><?php echo e(translate('order_id')); ?></th>
                        <th><?php echo e(translate('shop_name')); ?></th>
                        <th><?php echo e(translate('customer_name')); ?></th>
                        <th><?php echo e(translate('total_product_amount')); ?></th>
                        <th><?php echo e(translate('product_discount')); ?></th>
                        <th><?php echo e(translate('coupon_discount')); ?></th>
                        <th><?php echo e(translate('discounted_amount')); ?></th>
                        <th><?php echo e(translate('VAT/TAX')); ?></th>
                        <th><?php echo e(translate('shipping_charge')); ?></th>
                        <th><?php echo e(translate('order_amount')); ?></th>
                        <th><?php echo e(translate('delivered_by')); ?></th>
                        <th><?php echo e(translate('admin_discount')); ?></th>
                        <th><?php echo e(translate('seller_discount')); ?></th>
                        <th><?php echo e(translate('admin_commission')); ?></th>
                        <th><?php echo e(translate('admin_net_income')); ?></th>
                        <th><?php echo e(translate('seller_net_income')); ?></th>
                        <th><?php echo e(translate('payment_method')); ?></th>
                        <th><?php echo e(translate('payment_Status')); ?></th>
                        <th class="text-center"><?php echo e(translate('action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($transaction->order): ?>
                            <tr>
                                <td><?php echo e($transactions->firstItem()+$key); ?></td>
                                <td>
                                    <a class="title-color" href="<?php echo e(route('admin.orders.details',['id'=>$transaction['order_id']])); ?>"><?php echo e($transaction['order_id']); ?></a>
                                </td>
                                <td>
                                    <?php if($transaction['seller_is'] == 'admin'): ?>
                                        <?php echo e(\App\CPU\Helpers::get_business_settings('company_name')); ?>

                                    <?php else: ?>
                                        <?php if(isset($transaction->seller->shop)): ?>
                                            <?php echo e($transaction->seller->shop->name); ?>

                                        <?php else: ?>
                                            <?php echo e(translate('not_found')); ?>

                                        <?php endif; ?>
                                    <?php endif; ?>

                                </td>
                                <td>
                                    <?php if(!$transaction->order->is_guest && isset($transaction->customer)): ?>
                                        <a href="<?php echo e(route('admin.customer.view',[$transaction->customer['id']])); ?>"
                                           class="title-color hover-c1 d-flex align-items-center gap-10">
                                            <?php echo e($transaction->customer->f_name); ?> <?php echo e($transaction->customer->l_name); ?>

                                        </a>
                                    <?php elseif($transaction->order->is_guest): ?>
                                        <?php echo e(translate('guest_customer')); ?>

                                    <?php else: ?>
                                        <?php echo e(translate('not_found')); ?>

                                    <?php endif; ?>
                                </td>
                                <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction->order_details[0]->order_details_sum_price))); ?></td>
                                <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction->order_details[0]->order_details_sum_discount))); ?></td>
                                <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction->order->discount_amount))); ?></td>
                                <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction->order_details[0]->order_details_sum_price - $transaction->order_details[0]->order_details_sum_discount - (isset($transaction->order->coupon) && $transaction->order->coupon->coupon_type != 'free_delivery'?$transaction->order->discount_amount:0)))); ?></td>
                                <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction['tax']))); ?></td>
                                <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction->order->shipping_cost))); ?></td>
                                <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction->order->order_amount))); ?></td>
                                <td><?php echo e($transaction['delivered_by']); ?></td>
                                <td>
                                    <?php ($admin_coupon_discount = ($transaction->order->coupon_discount_bearer == 'inhouse' && $transaction->order->discount_type == 'coupon_discount') ? $transaction->order->discount_amount : 0); ?>
                                    <?php ($admin_shipping_discount = ($transaction->order->free_delivery_bearer=='admin' && $transaction->order->is_shipping_free) ? $transaction->order->extra_discount : 0); ?>
                                    <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($admin_coupon_discount+$admin_shipping_discount))); ?>

                                </td>
                                <td>
                                    <?php ($seller_coupon_discount = ($transaction->order->coupon_discount_bearer == 'seller' && $transaction->order->discount_type == 'coupon_discount') ? $transaction->order->discount_amount : 0); ?>
                                    <?php ($seller_shipping_discount = ($transaction->order->free_delivery_bearer=='seller' && $transaction->order->is_shipping_free) ? $transaction->order->extra_discount : 0); ?>
                                    <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($seller_coupon_discount + $seller_shipping_discount))); ?>

                                </td>
                                <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction['admin_commission']))); ?></td>
                                <td>
                                    <?php
                                        $admin_net_income = 0;
                                        if($transaction['seller_is'] == 'admin'){
                                            $admin_net_income += $transaction['order_amount'] + $transaction['tax'];
                                        }
                                        if(isset($transaction->order->delivery_man) && $transaction->order->delivery_man->seller_id == '0'){
                                            $admin_net_income += $transaction['delivery_charge'];
                                        }
                                        $admin_net_income += $transaction['admin_commission'];

                                        if($transaction['seller_is'] == 'seller'){
                                            if($transaction->order->shipping_responsibility == 'inhouse_shipping'){
                                                $admin_net_income -= $transaction->order->coupon_discount_bearer == 'inhouse' ? $admin_coupon_discount : 0;
                                                $admin_net_income += ($transaction->order->coupon_discount_bearer == 'seller' && $transaction->order->coupon->coupon_type == 'free_delivery') ? $seller_coupon_discount:0;
                                                $admin_net_income += ($transaction->order->free_delivery_bearer == 'seller') ? $seller_shipping_discount:0;

                                            }elseif($transaction->order->shipping_responsibility == 'sellerwise_shipping'){
                                                $admin_net_income -= $transaction->order->coupon_discount_bearer == 'inhouse' ? $admin_coupon_discount : 0;
                                                $admin_net_income -= $transaction->order->free_delivery_bearer == 'admin' ? $admin_shipping_discount : 0;
                                            }
                                        }
                                    ?>
                                    <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($admin_net_income))); ?>

                                </td>
                                <td>
                                    <?php
                                        $seller_net_income = 0;
                                        if(isset($transaction->order->delivery_man) && $transaction->order->delivery_man->seller_id != '0'){
                                            $seller_net_income += $transaction['delivery_charge'];
                                        }

                                        if($transaction['seller_is'] == 'seller'){
                                            $seller_net_income += $transaction['order_amount'] + $transaction['tax'] - $transaction['admin_commission'];
                                        }

                                        if($transaction['seller_is'] == 'seller'){
                                            if($transaction->order->shipping_responsibility == 'inhouse_shipping'){
                                                $seller_net_income += $transaction->order->coupon_discount_bearer == 'inhouse' ? $admin_coupon_discount : 0;
                                                $seller_net_income -= ($transaction->order->coupon_discount_bearer == 'seller' && $transaction->order->coupon->coupon_type == 'free_delivery') ? $admin_coupon_discount:0;
                                                $seller_net_income -= ($transaction->order->free_delivery_bearer == 'seller') ? $admin_shipping_discount:0;

                                            }elseif($transaction->order->shipping_responsibility == 'sellerwise_shipping'){
                                                $seller_net_income += $transaction->order->coupon_discount_bearer == 'inhouse' ? $admin_coupon_discount : 0;
                                                $seller_net_income += $transaction->order->free_delivery_bearer == 'admin' ? $admin_shipping_discount : 0;
                                                $seller_shipping_discount = 0;
                                            }
                                        }
                                    ?>
                                    <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($seller_net_income-$seller_shipping_discount))); ?>

                                </td>
                                <td><?php echo e(str_replace('_',' ',$transaction['payment_method'])); ?></td>
                                <td>
                                    <div class="text-center">
                                        <span class="badge <?php echo e($transaction['status'] == 'disburse' ? 'badge-soft-success' : 'badge-soft-warning'); ?>">
                                            <?php echo e(translate(str_replace('_',' ',$transaction['status']))); ?>

                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="<?php echo e(route('admin.transaction.pdf-order-wise-transaction', ['order_id'=>$transaction->order_id])); ?>" class="btn btn-outline-success square-btn btn-sm">
                                            <i class="tio-download-to"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
                <?php if(count($transactions)==0): ?>
                    <div class="text-center p-4">
                        <img class="mb-3 w-160" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg"
                             alt="Image Description">
                        <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="table-responsive mt-4">
                <div class="px-4 d-flex justify-content-lg-end">
                    <!-- Pagination -->
                    <?php echo e($transactions->links()); ?>

                </div>
            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<!-- Chart JS -->
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/chart.js.extensions/chartjs-extensions.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js">
    </script>
<!-- Chart JS -->

    <!-- Apex Charts -->
    <script src="<?php echo e(asset('/public/assets/back-end/js/apexcharts.js')); ?>"></script>
    <!-- Apex Charts -->

    <script>
        $(document).ready(function () {
            $('.js-select2-custom').select2();
        });

        $('#from_date,#to_date').change(function () {
            let fr = $('#from_date').val();
            let to = $('#to_date').val();
            if(fr != ''){
                $('#to_date').attr('required','required');
            }
            if(to != ''){
                $('#from_date').attr('required','required');
            }
            if (fr != '' && to != '') {
                if (fr > to) {
                    $('#from_date').val('');
                    $('#to_date').val('');
                    toastr.error('Invalid date range!', Error, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            }

        })

        $("#date_type").change(function() {
            let val = $(this).val();
            $('#from_div').toggle(val === 'custom_date');
            $('#to_div').toggle(val === 'custom_date');

            if(val === 'custom_date'){
                $('#from_date').attr('required','required');
                $('#to_date').attr('required','required');
            }else{
                $('#from_date').val(null).removeAttr('required')
                $('#to_date').val(null).removeAttr('required')
            }
        }).change();


    </script>



<?php $__env->stopPush(); ?>


<?php $__env->startPush('script_2'); ?>
    <!-- Dognut Pie Chart -->
    <script>
        var options = {
            series: [
                <?php echo e(\App\CPU\BackEndHelper::usd_to_currency($payment_data['digital_payment'])); ?>,
                <?php echo e(\App\CPU\BackEndHelper::usd_to_currency($payment_data['cash_payment'])); ?>,
                <?php echo e(\App\CPU\BackEndHelper::usd_to_currency($payment_data['wallet_payment'])); ?>,
                <?php echo e(\App\CPU\BackEndHelper::usd_to_currency($payment_data['offline_payment'])); ?>

            ],
            chart: {
                width: 320,
                type: 'donut',
            },
            labels: [
                '<?php echo e(translate('digital_payment')); ?> (<?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?><?php echo e(\App\CPU\BackEndHelper::format_currency(\App\CPU\BackEndHelper::usd_to_currency($payment_data['digital_payment']))); ?>)',
                '<?php echo e(translate('cash_payment')); ?> (<?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?><?php echo e(\App\CPU\BackEndHelper::format_currency(\App\CPU\BackEndHelper::usd_to_currency($payment_data['cash_payment']))); ?>)',
                '<?php echo e(translate('wallet_payment')); ?> (<?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?><?php echo e(\App\CPU\BackEndHelper::format_currency(\App\CPU\BackEndHelper::usd_to_currency($payment_data['wallet_payment']))); ?>)',
                '<?php echo e(translate('offline_payments')); ?> (<?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?><?php echo e(\App\CPU\BackEndHelper::format_currency(\App\CPU\BackEndHelper::usd_to_currency($payment_data['offline_payment']))); ?>)',
            ],
            dataLabels: {
                enabled: false,
                style: {
                    colors: ['#004188', '#004188', '#004188', '#7b94a4']
                }
            },
            responsive: [{
                breakpoint: 1650,
                options: {
                    chart: {
                        width: 260
                    },
                }
            }],
            colors: ['#004188', '#0177CD', '#0177CD', '#7b94a4'],
            fill: {
                colors: ['#004188', '#A2CEEE', '#0177CD', '#7b94a4']
            },
            legend: {
                show: false
            },
        };

        var chart = new ApexCharts(document.querySelector("#dognut-pie"), options);
        chart.render();
    </script>
    <!-- Dognut Pie Chart -->




    <script>
        // Bar Charts
        Chart.plugins.unregister(ChartDataLabels);

        $('.js-chart').each(function() {
            $.HSCore.components.HSChartJS.init($(this));
        });

        var updatingChart = $.HSCore.components.HSChartJS.init($('#updatingData'));

        $('.js-data-example-ajax').select2({
            ajax: {
                url: '<?php echo e(url('/')); ?>/admin/store/get-stores',
                data: function(params) {
                    return {
                        q: params.term, // search term
                        // all:true,
                        <?php if(isset($zone)): ?>
                            zone_ids: [<?php echo e($zone->id); ?>],
                        <?php endif; ?>
                        page: params.page
                    };
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                __port: function(params, success, failure) {
                    var $request = $.ajax(params);

                    $request.then(success);
                    $request.fail(failure);

                    return $request;
                }
            }
        });


    </script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/transaction/order-list.blade.php ENDPATH**/ ?>