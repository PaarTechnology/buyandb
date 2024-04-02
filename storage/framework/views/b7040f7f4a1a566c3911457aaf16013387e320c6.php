<?php $__env->startSection('title', translate('seller_product_sale_Report')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(asset('/public/assets/back-end/img/seller-reports.png')); ?>" alt="">
                <?php echo e(translate('seller_Reports')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <div class="card mb-2">
            <div class="card-body">
                <form action="" id="form-data" method="GET">
                    <h4 class="mb-3"><?php echo e(translate('filter_Data')); ?></h4>
                    <div class="row gx-2 gy-3 align-items-center text-left">
                        <div class="col-sm-6 col-md-3">
                            <select class="js-select2-custom form-control" name="seller_id">
                                <option value="all"><?php echo e(translate('all_sellers')); ?></option>
                                <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($seller['id']); ?>" <?php echo e($seller_id==$seller['id']?'selected':''); ?>>
                                        <?php echo e($seller['f_name']); ?> <?php echo e($seller['l_name']); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
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
                                <input type="date" name="from" value="<?php echo e($from); ?>" id="from_date" class="form-control">
                                <label><?php echo e(translate('start_date')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3" id="to_div">
                            <div class="form-floating">
                                <input type="date" value="<?php echo e($to); ?>" name="to" id="to_date" class="form-control">
                                <label><?php echo e(translate('end_date')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 filter-btn">
                            <button type="submit" class="btn btn--primary px-4 px-md-5">
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
                    <img src="<?php echo e(asset('/public/assets/back-end/img/products.svg')); ?>" alt="back-end/img">
                    <div class="info">
                        <h4 class="subtitle"><?php echo e($total_product); ?></h4>
                        <h6 class="subtext"><?php echo e(translate('products')); ?></h6>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="<?php echo e(asset('/public/assets/back-end/img/cart.svg')); ?>" alt="back-end/img">
                    <div class="info">
                        <h4 class="subtitle"><?php echo e($canceled_order+$ongoing_order+$delivered_order); ?></h4>
                        <h6 class="subtext"><?php echo e(translate('total_Orders')); ?></h6>
                    </div>
                    <div class="coupon__discount w-100 text-right d-flex justify-content-between">
                        <div class="text-center">
                            <strong class="text-danger"><?php echo e($canceled_order); ?></strong>
                            <div class="d-flex">
                                <span><?php echo e(translate('canceled')); ?></span>
                                <span class="ml-2" data-toggle="tooltip" data-placement="top" title="<?php echo e(translate('this_count_is_the_summation_of')); ?> <?php echo e(translate('failed_to_deliver')); ?>, <?php echo e(translate('canceled')); ?>, <?php echo e(translate('and')); ?> <?php echo e(translate('returned_orders')); ?>">
                                    <img class="info-img" src="<?php echo e(asset('/public/assets/back-end/img/info-circle.svg')); ?>" alt="img">
                                </span>
                            </div>
                        </div>
                        <div class="text-center">
                            <strong class="text-primary"><?php echo e($ongoing_order); ?></strong>
                            <div class="d-flex">
                                <span><?php echo e(translate('ongoing')); ?></span>
                                <span class="ml-2" data-toggle="tooltip" data-placement="top" title="<?php echo e(translate('this_count_is_the_summation_of')); ?> <?php echo e(translate('pending')); ?>, <?php echo e(translate('confirmed')); ?>, <?php echo e(translate('packaging')); ?>, <?php echo e(translate('out_for_delivery_orders')); ?>">
                                    <img class="info-img" src="<?php echo e(asset('/public/assets/back-end/img/info-circle.svg')); ?>" alt="img">
                                </span>
                            </div>
                        </div>
                        <div class="text-center">
                            <strong class="text-success"><?php echo e($delivered_order); ?></strong>
                            <div class="d-flex">
                                <span><?php echo e(translate('completed')); ?></span>
                                <span class="ml-2" data-toggle="tooltip" data-placement="top" title="<?php echo e(translate('this_count_is_the_summation_of_delivered_orders')); ?>">
                                    <img class="info-img" src="<?php echo e(asset('/public/assets/back-end/img/info-circle.svg')); ?>" alt="img">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="<?php echo e(asset('/public/assets/back-end/img/deliveryman.svg')); ?>" alt="back-end/img">
                    <div class="info">
                        <h4 class="subtitle">
                            <?php echo e($deliveryman); ?>

                        </h4>
                        <h6 class="subtext"><?php echo e(translate('total_Deliveryman')); ?></h6>
                    </div>
                </div>
            </div>
            <?php $__currentLoopData = array_values($chart_data['order_amount']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($chart_val[] = \App\CPU\BackEndHelper::usd_to_currency($amount)); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="center-chart-area">
                <div class="center-chart-header">
                    <h3 class="title"><?php echo e(translate('order_Statistics')); ?></h3>
                </div>
                <canvas id="updatingData" class="store-center-chart"
                        data-hs-chartjs-options='{
                "type": "bar",
                "data": {
                  "labels": [<?php echo e('"'.implode('","', array_keys($chart_data['order_amount'])).'"'); ?>],
                  "datasets": [{
                    "label": "<?php echo e(translate('total_order_amount')); ?>",
                    "data": [<?php echo e('"'.implode('","', $chart_val).'"'); ?>],
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
                <div class="card h-100 bg-white payment-statistics-shadow">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <div class="earning-statistics-content">
                            <img class="mb-4" src="<?php echo e(asset('/public/assets/back-end/img/earnings.svg')); ?>" alt="back-end/img">
                            <h6 class="subtitle"><?php echo e(translate('total_Shop_Earnings')); ?></h6>
                            <h3 class="title">
                                <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($total_store_earning))); ?>

                            </h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex flex-wrap w-100 gap-3 align-items-center">
                    <h4 class="mb-0 mr-auto">
                        <?php echo e(translate('total_Seller')); ?>

                        <span class="badge badge-soft-dark radius-50 fz-14"><?php echo e($orders->total()); ?></span>
                    </h4>
                    <form action="<?php echo e(url()->full()); ?>" method="GET" class="mb-0">
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-custom">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tio-search"></i>
                                </div>
                            </div>
                            <input type="hidden" name="seller_id" value="<?php echo e($seller_id); ?>">
                            <input type="hidden" name="date_type" value="<?php echo e($date_type); ?>">
                            <input type="hidden" name="from" value="<?php echo e($from); ?>">
                            <input type="hidden" name="to" value="<?php echo e($to); ?>">
                            <input id="datatableSearch_" type="search" value="<?php echo e($search); ?>" name="search" class="form-control" placeholder="Search by shop" aria-label="Search orders" required="">
                            <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                        </div>
                        <!-- End Search -->
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
                                   href="<?php echo e(route('admin.report.seller-report-excel', ['date_type'=>request('date_type'), 'seller_id'=>request('seller_id'),'from'=>request('from'), 'to'=>request('to'), 'search'=>request('search')])); ?>"  >
                                    <img width="14" src="<?php echo e(asset('/public/assets/back-end/img/excel.png')); ?>" alt="">
                                    <?php echo e(translate('excel')); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="datatable"
                           style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                           class="table __table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                        <thead class="thead-light thead-50 text-capitalize">
                        <tr>
                            <th><?php echo e(translate('SL')); ?></th>
                            <th><?php echo e(translate('seller-Info')); ?></th>
                            <th><?php echo e(translate('total_Order')); ?></th>
                            <th><?php echo e(translate('commission')); ?></th>
                            <th class="text-center"><?php echo e(translate('refund_Rate')); ?></th>
                            <th class="text-center"><?php echo e(translate('action')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($orders->firstItem()+$key); ?></td>
                                <td>
                                    <div>
                                        <?php if(isset($order->seller->shop)): ?>
                                            <a class="title-color" href="<?php echo e(route('admin.sellers.view', ['id' => $order->seller->id])); ?>">
                                                <h6 class="mb-1">
                                                    <?php echo e(\Str::limit($order->seller->shop->name, 20)); ?>

                                                </h6>
                                            </a>
                                        <?php else: ?>
                                            <?php echo e(translate('not_found')); ?>

                                        <?php endif; ?>

                                    </div>
                                </td>
                                <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($order->total_order_amount))); ?></td>
                                <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($order->total_admin_commission))); ?></td>
                                <td class="text-center">
                                    <?php
                                        $arr= array();
                                        if($refunds) {
                                            foreach ($refunds as $refund) {
                                                $arr += array(
                                                    $refund['payer_id'] => $refund['total_refund_amount']
                                                );
                                            }
                                        }
                                        if(array_key_exists($order->seller_id, $arr)){
                                            echo number_format(($arr[$order->seller_id]/$order->total_order_amount)*100, 2).'%';
                                        }else{
                                            echo '0%';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="<?php echo e(route('admin.sellers.view', [$order->seller_id])); ?>" class="btn btn-outline--primary square-btn btn-sm">
                                            <i class="tio-invisible"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($orders)==0): ?>
                            <tr>
                                <td colspan="7">
                                    <div class="text-center p-4">
                                        <img class="mb-3 w-160" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg"
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
                    <div class="px-4 d-flex justify-content-lg-end">
                        <!-- Pagination -->
                        <?php echo $orders->links(); ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Stats -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <!-- Chart JS -->
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/chart.js.extensions/chartjs-extensions.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js">
    </script>
    <!-- Chart JS -->
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script_2'); ?>

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
                $('.filter-btn').attr('class','filter-btn col-12 text-right');
            }else{
                $('#from_date').val(null).removeAttr('required')
                $('#to_date').val(null).removeAttr('required')
                $('.filter-btn').attr('class','col-sm-6 col-md-3 filter-btn');
            }
        }).change();

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/report/seller-product-sale.blade.php ENDPATH**/ ?>