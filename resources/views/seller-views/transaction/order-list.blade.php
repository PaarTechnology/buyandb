@extends('layouts.back-end.app-seller')
@section('title', translate('order_Transactions'))
@section('content')
    <div class="content container-fluid ">
        <!-- Page Title -->
        <div class="mb-4">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="{{asset('/public/assets/back-end/img/order_report.png')}}" alt="">
                {{translate('transaction_report')}}
            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Inlile Menu -->
        @include('seller-views.transaction.transaction-report-inline-menu')
        <!-- End Inlile Menu -->

        <div class="card mb-2">
            <div class="card-body">
                <h4 class="mb-3">{{translate('filter_Data')}}</h4>
                <form action="#" id="form-data" method="GET" class="w-100">
                    <div class="row  gx-2 gy-3 align-items-center text-{{Session::get('direction') === "rtl" ? 'right' : 'left'}}">
                        <div class="col-sm-6 col-md-3">
                            <div class="">
                                <select class="form-control __form-control" name="status">
                                    <option class="text-center" value="0" disabled>
                                        ---{{translate('select_status')}}---
                                    </option>
                                    <option class="text-capitalize"
                                            value="all" {{ $status == 'all'? 'selected' : '' }} >{{translate('all')}} </option>
                                    <option class="text-capitalize"
                                            value="disburse" {{ $status == 'disburse'? 'selected' : '' }} >{{translate('disburse')}} </option>
                                    <option class="text-capitalize"
                                            value="hold" {{ $status == 'hold'? 'selected' : '' }}>{{translate('hold')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="">
                                <select class="js-select2-custom form-control __form-control" name="customer_id">
                                    <option class="text-center" value="all" {{ $customer_id == 'all' ? 'selected' : '' }}>
                                        {{translate('all_customer')}}
                                    </option>
                                    @foreach($customers as $customer)
                                        <option class="text-left text-capitalize"
                                                value="{{ $customer->id }}" {{ $customer->id == $customer_id ? 'selected' : '' }}>
                                            {{ $customer->f_name.' '.$customer->l_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <select class="form-control __form-control" name="date_type" id="date_type">
                                <option value="this_year" {{ $date_type == 'this_year'? 'selected' : '' }}>{{translate('this_Year')}}</option>
                                <option value="this_month" {{ $date_type == 'this_month'? 'selected' : '' }}>{{translate('this_Month')}}</option>
                                <option value="this_week" {{ $date_type == 'this_week'? 'selected' : '' }}>{{translate('this_Week')}}</option>
                                <option value="custom_date" {{ $date_type == 'custom_date'? 'selected' : '' }}>{{translate('custom_Date')}}</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-3" id="from_div">
                            <div class="form-floating">
                                <input type="date" name="from" value="{{$from}}" id="from_date" class="form-control __form-control">
                                <label>{{translate('start_date')}}</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3" id="to_div">
                            <div class="form-floating">
                                <input type="date" value="{{$to}}" name="to" id="to_date" class="form-control __form-control">
                                <label>{{translate('end_date')}}</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-2 d-flex gap-2">
                            <button type="submit" class="btn btn--primary px-4 min-w-120 __h-45px" onclick="formUrlChange(this)"
                                    data-action="{{ url()->current() }}">
                                {{translate('filter')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="store-report-content mb-2">
            <div class="left-content">
                <div class="left-content-card">
                    <img src="{{asset('/public/assets/back-end/img/cart.svg')}}" alt="">
                    <div class="info">
                        <h4 class="subtitle">{{ $product_data['total_products'] }}</h4>
                        <h6 class="subtext">{{translate('total_Products')}}</h6>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="{{asset('/public/assets/back-end/img/products.svg')}}" alt="">
                    <div class="info">
                        <h4 class="subtitle">{{ $product_data['active_products'] }}</h4>
                        <h6 class="subtext">{{translate('active_Products')}}</h6>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="{{asset('/public/assets/back-end/img/inactive-product.svg')}}" alt="">
                    <div class="info">
                        <h4 class="subtitle">{{ $product_data['inactive_products'] }}</h4>
                        <h6 class="subtext">{{translate('inactive_Products')}}</h6>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="{{asset('/public/assets/back-end/img/pending_products.svg')}}" alt="">
                    <div class="info">
                        <h4 class="subtitle">{{ $product_data['pending_products'] }}</h4>
                        <h6 class="subtext">{{translate('pending_Products')}}</h6>
                    </div>
                </div>
            </div>
            <div class="center-chart-area">
                <div class="center-chart-header">
                    <h3 class="title">{{translate('order_Statistics')}}</h3>
                </div>
                <canvas id="updatingData" class="store-center-chart"
                        data-hs-chartjs-options='{
                "type": "bar",
                "data": {
                  "labels": [{{ '"'.implode('","', array_keys($order_transaction_chart['order_amount'])).'"' }}],
                  "datasets": [{
                    "label": "{{translate('total_order_amount')}}",
                    "data": [{{ '"'.implode('","', array_values($order_transaction_chart['order_amount'])).'"' }}],
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
                        "postfix": " {{ \App\CPU\BackEndHelper::currency_symbol() }}"
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
                            <span>{{translate('payment_Statistics')}}</span>
                        </h5>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="position-relative pie-chart">
                            <div id="dognut-pie" class="label-hide"></div>
                            <!-- Total Orders -->
                            <div class="total--orders">
                                <h3>{{ \App\CPU\BackEndHelper::currency_symbol() }}{{ \App\CPU\BackEndHelper::format_currency(\App\CPU\BackEndHelper::usd_to_currency($payment_data['total_payment'])) }}</h3>
                                <span>{{translate('completed_payments')}}</span>
                            </div>
                            <!-- Total Orders -->
                        </div>
                        <div class="apex-legends">
                            <div class="before-bg-004188">
                                <span>{{translate('cash_payments')}} ({{ \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($payment_data['cash_payment'])) }})</span>
                            </div>
                            <div class="before-bg-0177CD">
                                <span>{{translate('digital_payments')}} ({{ \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($payment_data['digital_payment'])) }}) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            </div>
                            <div class="before-bg-A2CEEE">
                                <span>{{translate('wallet')}} ({{ \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($payment_data['wallet_payment'])) }})</span>
                            </div>
                            <div class="before-bg-CDE6F5">
                                <span>{{translate('offline_payments')}} ({{ \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($payment_data['offline_payment'])) }})</span>
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
                        {{translate('total_Transactions')}}
                        <span class="badge badge-soft-dark radius-50 fz-12">{{ $transactions->total() }}</span>
                    </h4>
                    <form action="{{ url()->full() }}" method="GET" class="mb-0">
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-custom">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tio-search"></i>
                                </div>
                            </div>
                            <input id="datatableSearch_" type="search" name="search" class="form-control"
                                   placeholder="{{ translate('search_by_orders_id_or_transaction_ID')}}"
                                   aria-label="Search orders"
                                   value="{{ $search }}"
                                   required>
                            <button type="submit" class="btn btn--primary">{{ translate('search')}}</button>
                        </div>
                        <!-- End Search -->
                    </form>
                    <div>
                        <a href="{{ route('seller.transaction.order-transaction-summary-pdf', ['date_type'=>request('date_type'), 'customer_id'=>request('customer_id'), 'status'=>request('status'), 'from'=>request('from'), 'to'=>request('to'), 'search'=>request('search')]) }}" class="btn btn-outline--primary text-nowrap btn-block">
                            <i class="tio-file-text"></i>
                            {{translate('download_PDF')}}
                        </a>
                    </div>
                    <div>
                        <button type="button" class="btn btn-outline--primary text-nowrap btn-block"
                                data-toggle="dropdown">
                            <i class="tio-download-to"></i>
                            {{translate('export')}}
                            <i class="tio-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a class="dropdown-item"
                                   href="{{ route('seller.transaction.order-transaction-export-excel', ['date_type'=>request('date_type'), 'customer_id'=>request('customer_id'), 'search'=>request('search'), 'status'=>request('status'), 'from'=>request('from'), 'to'=>request('to')]) }}"  >{{translate('excel')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="datatable"
                       style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                       class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100 __table">
                    <thead class="thead-light thead-50 text-capitalize">
                    <tr>
                        <th>{{translate('SL')}}</th>
                        <th>{{translate('order_id')}}</th>
                        <th>{{translate('customer_name')}}</th>
                        <th>{{translate('total_product_amount')}}</th>
                        <th>{{translate('product_discount')}}</th>
                        <th>{{translate('coupon_discount')}}</th>
                        <th>{{translate('discounted_amount')}}</th>
                        <th>{{translate('VAT/TAX')}}</th>
                        <th>{{translate('shipping_charge')}}</th>
                        <th>{{translate('order_amount')}}</th>
                        <th>{{translate('delivered_by')}}</th>
                        <th>{{translate('admin_discount')}}</th>
                        <th>{{translate('seller_discount') }}</th>
                        <th>{{translate('admin_commission') }}</th>
                        <th>{{translate('seller_net_income')}}</th>
                        <th>{{translate('payment_method')}}</th>
                        <th>{{translate('payment_Status')}}</th>
                        <th class="text-center">{{translate('action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $key=>$transaction)
                        @if($transaction->order)
                            <tr>
                                <td>{{$transactions->firstItem()+$key}}</td>
                                <td>
                                    <a  class="title-color hover-c1" href="{{route('seller.orders.details',$transaction['order_id'])}}">{{$transaction['order_id']}}</a>
                                </td>
                                <td>
                                    @if (!$transaction->order->is_guest && isset($transaction->customer))
                                        {{ $transaction->customer->f_name}} {{ $transaction->customer->l_name }}
                                    @elseif($transaction->order->is_guest)
                                        {{translate('guest_customer')}}
                                    @else
                                        {{translate('not_found')}}
                                    @endif
                                </td>
                                <td>{{ \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction->order_details[0]->order_details_sum_price)) }}</td>
                                <td>{{ \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction->order_details[0]->order_details_sum_discount))}}</td>
                                <td>{{ \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction->order->discount_amount)) }}</td>
                                <td>{{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction->order_details[0]->order_details_sum_price - $transaction->order_details[0]->order_details_sum_discount - (isset($transaction->order->coupon) && $transaction->order->coupon->coupon_type != 'free_delivery'?$transaction->order->discount_amount:0)))}}</td>
                                <td>{{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction['tax']))}}</td>
                                <td>{{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction->order->shipping_cost))}}</td>
                                <td>{{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction->order->order_amount))}}</td>
                                <td>{{$transaction['delivered_by']}}</td>
                                <td>
                                    @php($admin_coupon_discount = ($transaction->order->coupon_discount_bearer == 'inhouse' && $transaction->order->discount_type == 'coupon_discount') ? $transaction->order->discount_amount : 0)
                                    @php($admin_shipping_discount = ($transaction->order->free_delivery_bearer=='admin' && $transaction->order->is_shipping_free) ? $transaction->order->extra_discount : 0)
                                    {{ \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($admin_coupon_discount+$admin_shipping_discount)) }}
                                </td>
                                <td>
                                    @php($seller_coupon_discount = ($transaction->order->coupon_discount_bearer == 'seller' && $transaction->order->discount_type == 'coupon_discount') ? $transaction->order->discount_amount : 0)
                                    @php($seller_shipping_discount = ($transaction->order->free_delivery_bearer=='seller' && $transaction->order->is_shipping_free) ? $transaction->order->extra_discount : 0)
                                    {{ \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($seller_coupon_discount + $seller_shipping_discount)) }}
                                </td>
                                <td>{{\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction['admin_commission']))}}</td>
                                <td>
                                    <?php
                                        $seller_net_income = 0;
                                        if(isset($transaction->order->delivery_man) && $transaction->order->delivery_man->seller_id != '0'){
                                            $seller_net_income += $transaction['delivery_charge'];
                                        }
                                        if($transaction['seller_is'] == 'seller'){
                                            $seller_net_income += $transaction['order_amount'] + $transaction['tax'] - $transaction['admin_commission'];
                                        }

                                        // new
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
                                    {{ \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($seller_net_income-$seller_shipping_discount)) }}
                                </td>
                                <td>{{str_replace('_',' ',$transaction['payment_method'])}}</td>
                                <td>
                                    <div class="text-center">
                                        <span class="badge {{ $transaction['status'] == 'disburse' ? 'badge-soft-success' : 'badge-soft-warning' }}">
                                            {{translate(str_replace('_',' ',$transaction['status']))}}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('seller.transaction.pdf-order-wise-transaction', ['order_id'=>$transaction->order_id]) }}" class="btn btn-outline-success square-btn btn-sm">
                                            <i class="tio-download-to"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach

                    </tbody>
                </table>
                @if(count($transactions)==0)
                    <div class="text-center p-4">
                        <img class="mb-3 w-160" src="{{asset('public/assets/back-end')}}/svg/illustrations/sorry.svg"
                             alt="Image Description">
                        <p class="mb-0">{{ translate('no_data_to_show')}}</p>
                    </div>
                @endif
            </div>

            <div class="table-responsive mt-4">
                <div class="px-4 d-flex justify-content-lg-end">
                    <!-- Pagination -->
                    {{$transactions->links()}}
                </div>
            </div>

        </div>

    </div>
@endsection

@push('script')
    <!-- Chart JS -->
    <script src="{{ asset('public/assets/back-end') }}/js/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('public/assets/back-end') }}/js/chart.js.extensions/chartjs-extensions.js"></script>
    <script src="{{ asset('public/assets/back-end') }}/js/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js">
    </script>
    <!-- Chart JS -->

    <!-- Apex Charts -->
    <script src="{{ asset('/public/assets/back-end/js/apexcharts.js') }}"></script>
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
                    toastr.error('{{ translate("invalid_date_range") }}!', Error, {
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



@endpush


@push('script_2')
    <!-- Dognut Pie Chart -->
    <script>
        var options = {
            series: [
                {{ \App\CPU\BackEndHelper::usd_to_currency($payment_data['digital_payment']) }},
                {{ \App\CPU\BackEndHelper::usd_to_currency($payment_data['cash_payment']) }},
                {{ \App\CPU\BackEndHelper::usd_to_currency($payment_data['wallet_payment']) }},
                {{ \App\CPU\BackEndHelper::usd_to_currency($payment_data['offline_payment']) }}
            ],
            chart: {
                width: 320,
                type: 'donut',
            },
            labels: [
                '{{translate('digital_payment')}} ({{ \App\CPU\BackEndHelper::currency_symbol() }}{{ \App\CPU\BackEndHelper::format_currency(\App\CPU\BackEndHelper::usd_to_currency($payment_data['digital_payment'])) }})',
                '{{translate('cash_payment')}} ({{ \App\CPU\BackEndHelper::currency_symbol() }}{{ \App\CPU\BackEndHelper::format_currency(\App\CPU\BackEndHelper::usd_to_currency($payment_data['cash_payment'])) }})',
                '{{translate('wallet_payment')}} ({{ \App\CPU\BackEndHelper::currency_symbol() }}{{ \App\CPU\BackEndHelper::format_currency(\App\CPU\BackEndHelper::usd_to_currency($payment_data['wallet_payment'])) }})',
                '{{translate('offline_payments')}} ({{ \App\CPU\BackEndHelper::currency_symbol() }}{{ \App\CPU\BackEndHelper::format_currency(\App\CPU\BackEndHelper::usd_to_currency($payment_data['offline_payment'])) }})',
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
    </script>


@endpush
