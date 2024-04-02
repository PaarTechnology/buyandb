<?php $__env->startSection('title', translate('earning_Reports')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(asset('/public/assets/back-end/img/earning_report.png')); ?>" alt="">
                <?php echo e(translate('earning_Reports')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Inlile Menu -->
        <?php echo $__env->make('admin-views.report.earning-report-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Inlile Menu -->

        <div class="card mb-2">
            <div class="card-body">
                <form action="" id="form-data" method="GET">
                    <h4 class="mb-3"><?php echo e(translate('filter_Data')); ?></h4>
                    <div class="row gy-3 gx-2 align-items-center text-left">
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
                                <label><?php echo e(ucwords(translate('start_date'))); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3" id="to_div">
                            <div class="form-floating">
                                <input type="date" value="<?php echo e($to); ?>" name="to" id="to_date" class="form-control">
                                <label><?php echo e(ucwords(translate('end_date'))); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <button type="submit" class="btn btn--primary px-4 w-100">
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
                        <h4 class="subtitle"><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency(array_sum($earning_data['total_earning_statistics'])))); ?></h4>
                        <h6 class="subtext"><?php echo e(translate('total_earnings')); ?></h6>
                    </div>
                    <div class="coupon__discount w-100 text-right d-flex justify-content-between">
                        <div class="text-center">
                            <strong class="text-danger break-all"><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($earning_data['total_commission']))); ?></strong>
                            <div><?php echo e(translate('commission')); ?></div>
                        </div>
                        <div class="text-center">
                            <strong class="text-primary break-all"><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($earning_data['total_inhouse_earning']))); ?></strong>
                            <div><?php echo e(translate('in_House')); ?></div>
                        </div>
                        <div class="text-center">
                            <strong class="text-success break-all"><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($earning_data['total_shipping_earn']))); ?></strong>
                            <div>
                                <?php echo e(translate('shipping')); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="<?php echo e(asset('/public/assets/back-end/img/products.svg')); ?>" alt="">
                    <div class="info">
                        <h4 class="subtitle"><?php echo e($earning_data['total_in_house_products']); ?></h4>
                        <h6 class="subtext"><?php echo e(translate('total_In_House_Products')); ?></h6>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="<?php echo e(asset('/public/assets/back-end/img/stores.svg')); ?>" alt="">
                    <div class="info">
                        <h4 class="subtitle"><?php echo e($earning_data['total_stores']); ?></h4>
                        <h6 class="subtext"><?php echo e(translate('total_Shop')); ?></h6>
                    </div>
                </div>
            </div>
            <div class="center-chart-area">
                <div class="center-chart-header">
                    <h3 class="title"><?php echo e(translate('earning_Statistics')); ?></h3>
                </div>
                <canvas id="updatingData" class="store-center-chart"
                    data-hs-chartjs-options='{
                "type": "bar",
                "data": {
                  "labels": [<?php echo e('"'.implode('","', array_keys($earning_data['total_earning_statistics'])).'"'); ?>],
                  "datasets": [
                  {
                    "label": "<?php echo e(translate('total_Earnings')); ?>",
                    "data": [<?php echo e('"'.implode('","', array_values($earning_data['total_earning_statistics'])).'"'); ?>],
                    "backgroundColor": "#a2ceee",
                    "hoverBackgroundColor": "#0177cd",
                    "borderColor": "#a2ceee"
                  }
                  ]
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
                                <span><?php echo e(translate('payments_Amount')); ?></span>
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
            <div class="card-header border-0">
                <div class="d-flex flex-wrap w-100 gap-3 align-items-center">
                    <h4 class="mb-0 mr-auto">
                        <?php echo e(translate('total_Earnings')); ?>

                        <span class="badge badge-soft-dark radius-50 fz-12"><?php echo e(count($inhouse_earn)); ?></span>
                    </h4>
                    <div>
                        <button type="button" class="btn btn-outline--primary text-nowrap btn-block"
                                data-toggle="dropdown">
                            <i class="tio-download-to"></i>
                            <?php echo e(translate('export')); ?>

                            <i class="tio-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('admin.report.admin-earning-excel-export', ['date_type'=>$date_type, 'from'=>$from, 'to'=>$to])); ?>">
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
                        class="table __table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                    <thead class="thead-light thead-50 text-capitalize">
                    <tr>
                        <th><?php echo e(translate('SL')); ?></th>
                        <th><?php echo e(translate('duration')); ?></th>
                        <th><?php echo e(translate('in-House_Earning')); ?></th>
                        <th><?php echo e(translate('commission_Earning')); ?></th>
                        <th><?php echo e(translate('earn_From_Shipping')); ?></th>
                        <th><?php echo e(translate('discount_Given')); ?></th>
                        <th><?php echo e(translate('VAT/TAX')); ?></th>
                        <th><?php echo e(translate('refund_Given')); ?></th>
                        <th><?php echo e(translate('total_Earning')); ?></th>
                        <th class="text-center"><?php echo e(translate('action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php ($i=1); ?>
                    <?php $__currentLoopData = $inhouse_earn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$earning): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php ($inhouse_earning = $earning-$total_tax[$key]); ?>
                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($key); ?></td>
                            <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($inhouse_earning))); ?></td>
                            <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($admin_commission_earn[$key]))); ?></td>
                            <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($shipping_earn[$key]))); ?></td>
                            <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($discount_given[$key]))); ?></td>
                            <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($total_tax[$key]))); ?></td>
                            <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($refund_given[$key]))); ?></td>
                            <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($inhouse_earning+$admin_commission_earn[$key]+$total_tax[$key]+$shipping_earn[$key]-$discount_given[$key]-$refund_given[$key]))); ?></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <form action="<?php echo e(route('admin.report.admin-earning-duration-download-pdf')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="duration" value="<?php echo e($key); ?>">
                                        <input type="hidden" name="inhouse_earning" value="<?php echo e($inhouse_earning); ?>">
                                        <input type="hidden" name="admin_commission" value="<?php echo e($admin_commission_earn[$key]); ?>">
                                        <input type="hidden" name="shipping_earn" value="<?php echo e($shipping_earn[$key]); ?>">
                                        <input type="hidden" name="discount_given" value="<?php echo e($discount_given[$key]); ?>">
                                        <input type="hidden" name="total_tax" value="<?php echo e($total_tax[$key]); ?>">
                                        <input type="hidden" name="refund_given" value="<?php echo e($refund_given[$key]); ?>">
                                        <input type="hidden" name="total_earning" value="<?php echo e($inhouse_earning+$admin_commission_earn[$key]+$shipping_earn[$key]+$total_tax[$key]-$discount_given[$key]-$refund_given[$key]); ?>">
                                        <button type="submit" class="btn btn-outline-success square-btn btn-sm"><i class="tio-download-to"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(count($inhouse_earn)==0): ?>
                        <tr>
                            <td colspan="9">
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
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('script_2'); ?>

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



    <!-- Dognut Pie Chart -->
    <script>
        var options = {
            series: [
                <?php echo e(\App\CPU\BackEndHelper::usd_to_currency($payment_data['cash_payment'])); ?>,
                <?php echo e(\App\CPU\BackEndHelper::usd_to_currency($payment_data['digital_payment'])); ?>,
                <?php echo e(\App\CPU\BackEndHelper::usd_to_currency($payment_data['wallet_payment'])); ?>,
                <?php echo e(\App\CPU\BackEndHelper::usd_to_currency($payment_data['offline_payment'])); ?>

            ],

            chart: {
                width: 320,
                type: 'donut',
            },
            labels: [
                '<?php echo e(translate('cash_Payments')); ?> (<?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?><?php echo e(\App\CPU\BackEndHelper::format_currency(\App\CPU\BackEndHelper::usd_to_currency($payment_data['cash_payment']))); ?>)',
                '<?php echo e(translate('digital_Payments')); ?> (<?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?><?php echo e(\App\CPU\BackEndHelper::format_currency(\App\CPU\BackEndHelper::usd_to_currency($payment_data['digital_payment']))); ?>)',
                '<?php echo e(translate('wallet_Payments')); ?> (<?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?><?php echo e(\App\CPU\BackEndHelper::format_currency(\App\CPU\BackEndHelper::usd_to_currency($payment_data['wallet_payment']))); ?>)',
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


<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/report/admin-earning.blade.php ENDPATH**/ ?>