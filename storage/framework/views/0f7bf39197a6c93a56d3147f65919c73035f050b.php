<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(ucwords('invoice')); ?></title>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">
    <style media="all">
        * {
            margin: 0;
            padding: 0;
            line-height: 1.3;
            font-family: sans-serif;
            color: #333542;
        }

        /* IE 6 */
        * html .footer {
            position: absolute;
            top: expression((0-(footer.offsetHeight)+(document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight)+(ignoreMe = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop))+'px');
        }

        body {
            font-size: .75rem;
        }

        img {
            max-width: 100%;
        }

        .customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        table {
            width: 100%;
        }

        table thead th {
            padding: 8px;
            font-size: 11px;
            text-align: left;
        }

        table tbody th,
        table tbody td {
            padding: 8px;
            /*font-size: 11px;*/
        }

        table.fz-12 thead th {
            font-size: 12px;
        }

        table.fz-12 tbody th,
        table.fz-12 tbody td {
            font-size: 12px;
        }

        table.customers thead th {
            background-color: #0177CD;
            color: #fff;
        }

        table.customers tbody th,
        table.customers tbody td {
            background-color: #FAFCFF;
        }

        table.calc-table th {
            text-align: left;
        }

        table.calc-table td {
            text-align: right;
        }
        table.calc-table td.text-left {
            text-align: left;
        }

        .table-total {
            font-family: Arial, Helvetica, sans-serif;
        }


        .text-left {
            text-align: left !important;
        }

        .pb-2 {
            padding-bottom: 8px !important;
        }

        .pb-3 {
            padding-bottom: 16px !important;
        }

        .text-right {
            text-align: right !important;
        }

        table th.text-right {
            text-align: right !important;
        }

        @media  print {
            table th.text-right {
                text-align: right !important;
            }
        }

        .content-position {
            padding: 15px 40px;
        }

        .content-position-y {
            padding: 0px 40px;
        }

        .text-white {
            color: white !important;
        }

        .bs-0 {
            border-spacing: 0;
        }
        .text-center {
            text-align: center;
        }
        .mb-1 {
            margin-bottom: 4px !important;
        }
        .mb-2 {
            margin-bottom: 8px !important;
        }
        .mb-4 {
            margin-bottom: 24px !important;
        }
        .mb-30 {
            margin-bottom: 30px !important;
        }
        .px-10 {
            padding-left: 10px;
            padding-right: 10px;
        }
        .fz-14 {
            font-size: 14px;
        }
        .fz-12 {
            font-size: 12px;
        }
        .fz-10 {
            font-size: 10px;
        }
        .font-normal {
            font-weight: 400;
        }
        .font-weight-normal {
            font-weight: normal;
        }
        .border-dashed-top {
            border-top: 1px dashed #ddd;
        }
        .font-weight-bold {
            font-weight: 700;
        }
        .bg-light {
            background-color: #F7F7F7;
        }
        .py-30 {
            padding-top: 30px;
            padding-bottom: 30px;
        }
        .py-4 {
            padding-top: 24px;
            padding-bottom: 24px;
        }
        .d-flex {
            display: flex;
        }
        .gap-2 {
            gap: 8px;
        }
        .flex-wrap {
            flex-wrap: wrap;
        }
        .align-items-center {
            align-items: center;
        }
        .justify-content-center {
            justify-content: center;
        }
        a {
            color: rgba(0, 128, 245, 1);
        }
        .p-1 {
            padding: 4px !important;
        }
        .h2 {
            font-size: 1.5em;
            margin-block-start: 0.83em;
            margin-block-end: 0.83em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
        }

        .h4 {
            margin-block-start: 1.33em;
            margin-block-end: 1.33em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
        }

    </style>
</head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
<?php
    use App\Model\BusinessSetting;
    $company_phone =BusinessSetting::where('type', 'company_phone')->first()->value;
    $company_email =BusinessSetting::where('type', 'company_email')->first()->value;
    $company_name =BusinessSetting::where('type', 'company_name')->first()->value;
    $company_web_logo =BusinessSetting::where('type', 'company_web_logo')->first()->value;
    $company_mobile_logo =BusinessSetting::where('type', 'company_mobile_logo')->first()->value;
?>

<div class="first">
    <table class="content-position mb-30">
        <tr>
            <th class="p-0 text-left" style="font-size: 26px">
                <?php echo e(ucwords('order Invoice')); ?>

            </th>
            <th class="p-0 text-right">
                <img height="40" src="<?php echo e(asset("storage/app/public/company/$company_web_logo")); ?>" alt="">
            </th>
        </tr>

    </table>

    <table class="bs-0 mb-30 px-10">
        <tr>
            <th class="content-position-y text-left">
                <h4 class="text-uppercase mb-1 fz-14">
                    <?php echo e(ucwords('invoice')); ?> #<?php echo e($order->id); ?>

                </h4> <br>
                <h4 class="text-uppercase mb-1 fz-14">
                    <?php echo e(ucwords('shop Name')); ?>

                    : <?php echo e($order->seller_is == 'admin' ? $company_name : (isset($order->seller->shop) ? $order->seller->shop->name :  ucwords('not found'))); ?>

                </h4>
                <?php if($order['seller_is']!='admin' && isset($order['seller']->gst) != null): ?>
                    <h4 class="text-capitalize fz-12"><?php echo e(ucwords('GST')); ?>

                        : <?php echo e($order['seller']->gst); ?></h4>
                <?php endif; ?>
            </th>
            <th class="content-position-y text-right">
                <h4 class="fz-14"><?php echo e(ucwords('date')); ?> : <?php echo e(date('d-m-Y h:i:s a',strtotime($order['created_at']))); ?></h4>
            </th>
        </tr>
    </table>
</div>
<?php if($order->order_type == 'default_type'): ?>
    <div class="">
        <section>
            <table class="content-position-y fz-12">
                <tr>
                    <td class="font-weight-bold p-1">
                        <table>
                            <tr>
                                <td>
                                    <?php if($order->shipping_address_data): ?>
                                        <?php
                                            $shipping_address = json_decode($order->shipping_address_data)
                                        ?>
                                        <span class="h2" style="margin: 0px;"><?php echo e(ucwords('shipping to')); ?> </span>
                                        <div class="h4 montserrat-normal-600">
                                            <p style=" margin-top: 6px; margin-bottom:0px;"><?php echo e($shipping_address->contact_person_name); ?></p>
                                            <p style=" margin-top: 6px; margin-bottom:0px;"><?php echo e($shipping_address->phone); ?></p>
                                            <p style=" margin-top: 6px; margin-bottom:0px;"><?php echo e($shipping_address->address); ?></p>
                                            <p style=" margin-top: 6px; margin-bottom:0px;"><?php echo e($shipping_address->city); ?> <?php echo e($shipping_address->zip); ?> </p>
                                        </div>
                                    <?php else: ?>
                                        <span class="h2" style="margin: 0px;"><?php echo e(ucwords('customer info')); ?> </span>
                                        <div class="h4 montserrat-normal-600">
                                            <?php if($order->is_guest): ?>
                                                <p style=" margin-top: 6px; margin-bottom:0px;">Guest User</p>
                                            <?php else: ?>
                                                <p style=" margin-top: 6px; margin-bottom:0px;"><?php echo e($order->customer !=null? $order->customer['f_name'].' '.$order->customer['l_name']:'Name not found'); ?></p>
                                            <?php endif; ?>

                                            <?php if(isset($order->customer) && $order->customer['id']!=0): ?>
                                                <p style=" margin-top: 6px; margin-bottom:0px;"><?php echo e($order->customer !=null? $order->customer['email']: ucwords('email not found')); ?></p>
                                                <p style=" margin-top: 6px; margin-bottom:0px;"><?php echo e($order->customer !=null? $order->customer['phone']: ucwords('phone not found')); ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <?php endif; ?>
                                        </p>
                                </td>
                            </tr>
                        </table>
                    </td>

                    <td>
                        <table>
                            <tr>
                                <td class="text-right">
                                    <?php if(!$order->is_guest && $order->billingAddress): ?>
                                        <span class="h2" ><?php echo e(ucwords('billing address')); ?> </span>
                                        <div class="h4 montserrat-normal-600">
                                            <p class="font-weight-normal" style=" margin-top: 6px; margin-bottom:0px;"><?php echo e($order->billingAddress ? $order->billingAddress['contact_person_name'] : ""); ?></p>
                                            <p class="font-weight-normal" style=" margin-top: 6px; margin-bottom:0px;"><?php echo e($order->billingAddress ? $order->billingAddress['phone'] : ""); ?></p>
                                            <p class="font-weight-normal" style=" margin-top: 6px; margin-bottom:0px;"><?php echo e($order->billingAddress ? $order->billingAddress['address'] : ""); ?></p>
                                            <p class="font-weight-normal" style=" margin-top: 6px; margin-bottom:0px;"><?php echo e($order->billingAddress ? $order->billingAddress['city'] : ""); ?> <?php echo e($order->billingAddress ? $order->billingAddress['zip'] : ""); ?></p>
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </section>
    </div>
<?php else: ?>
    <div class="row">
        <section>
            <table class="content-position-y" style="width: 100%">
                <tr>
                    <td class="text-center" valign="top">
                        <span class="h2" style="margin: 0px;"><?php echo e(ucwords('POS order')); ?> </span>

                    </td>

                </tr>
            </table>
        </section>
    </div>
<?php endif; ?>

<br>

<div>
    <div class="content-position-y">
        <table class="customers bs-0">
            <thead>
            <tr>
                <th><?php echo e(ucwords('no.')); ?></th>
                <th><?php echo e(ucwords('item description')); ?></th>
                <th>
                    <?php echo e(ucwords('unit price')); ?>

                </th>
                <th>
                    <?php echo e(ucwords('qty')); ?>

                </th>
                <th class="text-right">
                    <?php echo e(ucwords('total')); ?>

                </th>
            </tr>
            </thead>
            <?php
                $subtotal=0;
                $total=0;
                $sub_total=0;
                $total_tax=0;
                $total_shipping_cost=0;
                $total_discount_on_product=0;
                $extra_discount=0;
            ?>
            <tbody>
            <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $subtotal=($details['price'])*$details->qty ?>
                <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td>
                        <?php echo e($details['product']?$details['product']->name:''); ?>

                        <?php if($details['variant']): ?>
                            <br>
                            <?php echo e(ucwords('variation')); ?> : <?php echo e($details['variant']); ?>

                        <?php endif; ?>
                    </td>
                    <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($details['price']))); ?></td>
                    <td><?php echo e($details->qty); ?></td>
                    <td class="text-right"><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($subtotal))); ?></td>
                </tr>

                <?php
                    $sub_total+=$details['price']*$details['qty'];
                    $total_tax+=$details['tax'];
                    $total_shipping_cost+=$details->shipping ? $details->shipping->cost :0;
                    $total_discount_on_product+=$details['discount'];
                    $total+=$subtotal;
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php
if ($order['extra_discount_type'] == 'percent') {
    $extra_discount = ($sub_total / 100) * $order['extra_discount'];
} else {
    $extra_discount = $order['extra_discount'];
}

?>
<?php ($shipping=$order['shipping_cost']); ?>
<div class="content-position-y">
    <table class="fz-12">
        <tr>
            <th class="text-left" style="width: 60%">
                <h4 class="fz-12 mb-1"><?php echo e(ucwords('payment details')); ?></h4>
                <h5 class="fz-12 mb-1 font-weight-normal"><?php echo e(str_replace('_',' ',$order->payment_method)); ?></h5>
                <p class="fz-12 font-weight-normal"><?php echo e($order->payment_status); ?>

                    , <?php echo e(date('y-m-d',strtotime($order['created_at']))); ?></p>

                <?php if($order->delivery_type !=null): ?>
                    <h4 class="fz-12 mb-1"><?php echo e(ucwords('delivery_info')); ?> </h4>
                    <?php if($order->delivery_type == 'self_delivery'): ?>
                        <p class="fz-12 font-normal">
                            <span class="font-weight-normal">
                                <?php echo e(ucwords('self delivery')); ?>

                            </span>
                            <br>
                            <span class="font-weight-normal">
                                <?php echo e(ucwords('deliveryman name')); ?> : <?php echo e($order->delivery_man['f_name'].' '.$order->delivery_man['l_name']); ?>

                            </span>
                            <br>
                            <span class="font-weight-normal">
                                <?php echo e(ucwords('deliveryman phone')); ?> : <?php echo e($order->delivery_man['phone']); ?>

                            </span>
                        </p>
                    <?php else: ?>
                        <p>
                        <span class="font-weight-normal">
                            <?php echo e($order->delivery_service_name); ?>

                        </span>
                            <br>
                            <span class="font-weight-normal">
                            <?php echo e(ucwords('tracking id')); ?> : <?php echo e($order->third_party_delivery_tracking_id); ?>

                        </span>
                        </p>
                    <?php endif; ?>
                <?php endif; ?>
            </th>

            <th class="calc-table">
                <table>
                    <tbody>

                    <tr>
                        <td class="p-1 text-left"><b><?php echo e(ucwords('sub total')); ?></b></td>
                        <td class="p-1 text-right"><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($sub_total))); ?></td>

                    </tr>
                    <tr>
                        <td class="p-1 text-left"><b><?php echo e(ucwords('tax')); ?></b></td>
                        <td class="p-1 text-right"><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($total_tax))); ?></td>
                    </tr>
                    <?php if($order->order_type == 'default_type'): ?>
                        <tr>
                            <td class="p-1 text-left"><b><?php echo e(ucwords('shipping')); ?></b></td>
                            <td class="p-1 text-right"><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($shipping - ($order->is_shipping_free ? $order->extra_discount : 0)))); ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td class="p-1 text-left"><b><?php echo e(ucwords('coupon discount')); ?></b></td>
                        <td class="p-1 text-right">
                            - <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($order->discount_amount))); ?></td>
                    </tr>
                    <tr>
                        <td class="p-1 text-left"><b><?php echo e(ucwords('discount on product')); ?></b></td>
                        <td class="p-1 text-right">
                            - <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($total_discount_on_product))); ?></td>
                    </tr>
                    <?php if($order->order_type != 'default_type'): ?>
                        <tr>
                            <td class="p-1 text-left"><b><?php echo e(ucwords('extra discount')); ?></b></td>
                            <td class="p-1 text-right">
                                - <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($extra_discount))); ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td class="border-dashed-top font-weight-bold text-left"><b><?php echo e(ucwords('total')); ?></b></td>
                        <td class="border-dashed-top font-weight-bold text-right">
                            <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($order->order_amount))); ?>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </th>
        </tr>
    </table>
</div>
<br>
<br><br><br>

<div class="row">
    <section>
        <table>
            <tr>
                <th class="content-position-y bg-light py-4">
                    <div class="d-flex justify-content-center gap-2">
                        <div class="mb-2">
                            <i class="fa fa-phone"></i>
                            <?php echo e(ucwords('phone')); ?>

                            : <?php echo e(\App\Model\BusinessSetting::where('type','company_phone')->first()->value); ?>

                        </div>
                        <div class="mb-2">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <?php echo e(ucwords('email')); ?>

                            : <?php echo e($company_email); ?>

                        </div>
                    </div>
                    <div class="mb-2">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                        <?php echo e(ucwords('website')); ?>

                        : <?php echo e(url('/')); ?>

                    </div>
                    <div>
                        <?php echo e(ucwords('all copy right reserved © '.date('Y').' ').$company_name); ?>

                    </div>
                </th>
            </tr>
        </table>
    </section>
</div>

</body>
</html>
<?php /**PATH /home/buyandb/public_html/resources/themes/default/web-views/order/invoice.blade.php ENDPATH**/ ?>