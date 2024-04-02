<style>
    .dashed-hr{
        border-bottom: 2px dashed #dddddd;
        display: block;
        margin: 10px 0;
    }
    @page  {
        size: auto;
        margin: 0 15px !important;
    }
    @media  print {
        * {
            color: #000000 !important;
            font-weight: 500 !important;
        }
        h2,h3,h4,h5,h6{
            font-weight: 700 !important;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #000000;
            border-collapse: collapse;
        }

        .table td, .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #000000
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 1px solid #000000
        }

        .table tbody + tbody {
            border-top: 1px solid #000000
        }

        .table-sm td, .table-sm th {
            padding: .3rem
        }

        .table-bordered {
            border: 1px solid #000000
        }

        .table-bordered td, .table-bordered th {
            border: 1px solid #000000
        }

        .table-bordered thead td, .table-bordered thead th {
            border-bottom-width: 1px
        }
        .text-left {
            text-align: left !important;
        }
        .text-right {
            text-align: right !important;
        }
        .pl--0 {
            padding-left: 0 !important;
        }
        .pr--0 {
            padding-right: 0 !important;
        }
    }
</style>

<div style="width:363px">
    <div class="text-center pt-4 mb-3">
        <h2 style="line-height: 1"><?php echo e(\App\Model\BusinessSetting::where(['type'=>'company_name'])->first()->value); ?></h2>
        
        <h5 style="font-size: 16px;font-weight: lighter;line-height: 1">
            <?php echo e(ucfirst('phone')); ?>

            : <?php echo e(\App\Model\BusinessSetting::where(['type'=>'company_phone'])->first()->value); ?>

        </h5>
    </div>

    <span class="dashed-hr"></span>
    <div class="row mt-3">
        <div class="col-6">
            <h5><?php echo e(ucfirst('order ID')); ?> : <?php echo e($order['id']); ?></h5>
        </div>
        <div class="col-6">
            <h5 style="font-weight: lighter">
                <?php echo e(date('d/M/Y h:i a',strtotime($order['created_at']))); ?>

            </h5>
        </div>
        <?php if($order->customer): ?>
            <div class="col-12">
                <h5><?php echo e(ucfirst('customer Name')); ?> : <?php echo e($order->customer['f_name'].' '.$order->customer['l_name']); ?></h5>
                <?php if($order->customer->id !=0): ?>
                    <h5><?php echo e(ucfirst('phone')); ?> : <?php echo e($order->customer['phone']); ?></h5>
                <?php endif; ?>

            </div>
        <?php endif; ?>
    </div>
    <h5 class="text-uppercase"></h5>
    <span class="dashed-hr"></span>
    <table class="table table-bordered mt-3 text-left" style="width: calc(100% - 1px) !important">
        <thead>
        <tr>
            <th class="pl--0"><?php echo e(ucfirst('QTY')); ?></th>
            <th class="text-left"><?php echo e(ucfirst('DESC')); ?></th>
            <th class="text-right pr--0"><?php echo e(ucfirst('price')); ?></th>
        </tr>
        </thead>

        <tbody>
        <?php ($sub_total=0); ?>
        <?php ($total_tax=0); ?>
        <?php ($total_dis_on_pro=0); ?>
        <?php ($product_price=0); ?>
        <?php ($total_product_price=0); ?>
        <?php ($ext_discount=0); ?>
        <?php ($coupon_discount=0); ?>
        <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($detail->product): ?>

                <tr>
                    <td class="pl--0">
                        <?php echo e($detail['qty']); ?>

                    </td>
                    <td class="text-left">
                        <span> <?php echo e(Str::limit($detail->product['name'], 200)); ?></span><br>
                        <?php if(count(json_decode($detail['variation'],true))>0): ?>
                            <strong><u><?php echo e(ucfirst('variation')); ?> : </u></strong>
                            <?php $__currentLoopData = json_decode($detail['variation'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 =>$variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="font-size-sm text-body" style="color: black!important;">
                                    <span><?php echo e(ucfirst($key1)); ?> :  </span>
                                    <span
                                        class="font-weight-bold"><?php echo e($variation); ?> </span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>



                        <?php echo e(ucfirst('discount')); ?> : <?php echo e(\App\CPU\Helpers::currency_converter(round($detail['discount'],2))); ?>

                    </td>
                    <td class="text-right pr--0">
                        <?php ($amount=($detail['price']*$detail['qty'])-$detail['discount']); ?>
                        <?php ($product_price = $detail['price']*$detail['qty']); ?>
                        <?php echo e(\App\CPU\Helpers::currency_converter(round($amount,2))); ?>

                    </td>
                </tr>
                <?php ($sub_total+=$amount); ?>
                <?php ($total_product_price+=$product_price); ?>
                <?php ($total_tax+=$detail['tax']); ?>

            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <span class="dashed-hr"></span>
    <?php


        if ($order['extra_discount_type'] == 'percent') {
            $ext_discount = ($total_product_price / 100) * $order['extra_discount'];
        } else {
            $ext_discount = $order['extra_discount'];
        }
        if(isset($order['discount_amount'])){
            $coupon_discount =$order['discount_amount'];
        }
    ?>
    <table style="color: black!important; width: 100%!important">
        <tr>
            <td colspan="2"></td>
            <td class="text-right"><?php echo e(ucfirst('items_Price')); ?>:</td>
            <td class="text-right"><?php echo e(\App\CPU\Helpers::currency_converter(round($sub_total,2))); ?></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td class="text-right"><?php echo e(ucfirst('tax')); ?> / <?php echo e(ucfirst('VAT')); ?>:</td>
            <td class="text-right"><?php echo e(\App\CPU\Helpers::currency_converter(round($total_tax,2))); ?></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td class="text-right"><?php echo e(ucfirst('subtotal')); ?>:</td>
            <td class="text-right"><?php echo e(\App\CPU\Helpers::currency_converter(round($sub_total+$total_tax,2))); ?></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td class="text-right"><?php echo e(ucfirst('extra_discount')); ?>:</td>
            <td class="text-right"><?php echo e(\App\CPU\Helpers::currency_converter(round($ext_discount,2))); ?></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td class="text-right"><?php echo e(ucfirst('coupon_discount')); ?>:</td>
            <td class="text-right"><?php echo e(\App\CPU\Helpers::currency_converter(round($coupon_discount,2))); ?></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td class="text-right" style="font-size: 20px"><?php echo e(ucfirst('total')); ?>:</td>
            <td class="text-right" style="font-size: 20px"><?php echo e(\App\CPU\Helpers::currency_converter(round($order->order_amount,2))); ?></td>
        </tr>
    </table>


    <div class="d-flex flex-row justify-content-between border-top">
        <span><?php echo e(ucfirst('paid by')); ?>: <?php echo e(ucfirst($order->payment_method)); ?></span>
    </div>
    <span class="dashed-hr"></span>
    <h5 class="text-center pt-3">
        """<?php echo e(ucfirst('THANK YOU')); ?>"""
    </h5>
    <span class="dashed-hr"></span>
</div>
<?php /**PATH /home/buyandb/public_html/resources/views/admin-views/pos/order/invoice.blade.php ENDPATH**/ ?>