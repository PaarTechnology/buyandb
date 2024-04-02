<?php
    $view_hold_orders_status = 0;
    if (session()->has('cart_name') && count(session()->get('cart_name')) > 0 ){
        foreach (session()->get('cart_name') as $key=>$single_cart){
            if (session()->has($single_cart) && count(session($single_cart)) > 1)
            {
                $view_hold_orders_status = 1;
            }
        }
    }

?>

<?php if($view_hold_orders_status): ?>
<div class="table-responsive datatable-custom custom-scrollbar-pos">
    <table class="table table-hover table-thead-bordered table-nowrap table-align-middle card-table w-100 min-h-300" style="text-align: left;">
        <thead class="thead-light thead-50 text-capitalize">
            <tr>
                <th><?php echo e(translate('SL')); ?></th>
                <th><?php echo e(translate('date')); ?></th>
                <th><?php echo e(translate('customer_info')); ?></th>
                <th><?php echo e(translate('quantity')); ?></th>
                <th><?php echo e(translate('total_amount')); ?></th>
                <th class="text-center"><?php echo e(translate('action')); ?></th>
            </tr>
        </thead>

        <tbody>
            <?php if(session()->has('cart_name') && count(session()->get('cart_name')) > 0 ): ?>
                <?php ($total_hold_orders=1); ?>
                <?php $__currentLoopData = session()->get('cart_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$single_cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(session()->has($single_cart) && count(session($single_cart)) > 1): ?>
                    <?php ($customer_id = explode('-', strval($single_cart))[1]); ?>
                    <?php ($customer_data = \App\User::where('id', $customer_id)->first()); ?>

                        <?php if(explode('-',$single_cart)[0]=='wc'): ?>
                            <?php ($customer_name = 'Walking Customer'); ?>
                            <?php ($customer_phone = ''); ?>
                        <?php else: ?>
                            <?php ($customer_name = $customer_data->f_name.' '.$customer_data->l_name ?? ''); ?>
                            <?php ($customer_phone = $customer_data->phone); ?>
                        <?php endif; ?>


                        <?php if(isset($customer) && $customer !== '' ? strpos(strtolower($customer_name), strtolower($customer)) !== false : $customer_name): ?>
                        <tr>
                            <td><?php echo e($total_hold_orders); ?></td>
                            <?php $total_hold_orders++;?>
                            <td>
                                <?php if(isset(session()->get($single_cart)['add_to_cart_time'])): ?>
                                    <div><?php echo e(session()->get($single_cart)['add_to_cart_time']->format('d/m/Y') ?? 'N/a'); ?></div>
                                    <div><?php echo e(session()->get($single_cart)['add_to_cart_time']->format('h:m A') ?? ''); ?></div>
                                <?php else: ?>
                                    <div><?php echo e(translate('now')); ?></div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div><?php echo e($customer_name); ?></div>
                                <a href="tel:<?php echo e($customer_phone ?? ''); ?>" class="text-dark"><?php echo e($customer_phone ?? ''); ?></a>
                            </td>
                            <td>
                                <div class="table-items">
                                    <div class="cursor-pointer">
                                        <?php
                                        $numberOfNestedArrays = 0;

                                        if(session()->has($single_cart))
                                        {
                                            foreach (session()->get($single_cart) as $item) {
                                                if (is_array($item)) {
                                                    $numberOfNestedArrays++;
                                                    }
                                                }
                                            }
                                        ?>

                                        <?php echo e($numberOfNestedArrays); ?> <?php echo e(translate('items')); ?>

                                    </div>

                                    <?php
                                        $subtotal = 0;
                                        $addon_price = 0;
                                        $tax = 0;
                                        $discount = 0;
                                        $discount_type = 'amount';
                                        $discount_on_product = 0;
                                        $total_tax = 0;
                                        $total_tax_show = 0;
                                        $ext_discount = 0;
                                        $ext_discount_type = 'amount';
                                        $coupon_discount =0;
                                    ?>

                                    <?php if(session()->has($single_cart) && count(session()->get($single_cart)) > 0): ?>

                                    <div class="bg-white p-0 box-shadow table-items-popup">

                                        <?php $__currentLoopData = session()->get($single_cart); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(is_array($cartItem)): ?>
                                        <?php
                                            $product = \App\Model\Product::find($cartItem['id']);

                                            //tax calculation
                                            $tax_calculate = \App\CPU\Helpers::tax_calculation($cartItem['price'], $product['tax'], $product['tax_type'])*$cartItem['quantity'];
                                            $total_tax_show += $cartItem['tax_model'] != 'include' ? $tax_calculate : 0;
                                            $total_tax += $product['tax_model']=='include' ? 0:$tax_calculate;

                                            $product_subtotal = $cartItem['price']*$cartItem['quantity'];
                                            $subtotal += $product_subtotal;

                                            $discount_on_product += ($cartItem['discount']*$cartItem['quantity']);
                                        ?>
                                        <div class="p-3 border-bottom rounded d-flex justify-content-between gap-2">
                                            <div class="media gap-2">
                                                <img width="40" src="<?php echo e(asset('storage/app/public/product/thumbnail')); ?>/<?php echo e($cartItem['image']); ?>" onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img2.jpg')); ?>'">
                                                <div class="media-body">
                                                    <h6 class="text-truncate"> <?php echo e(Str::limit($cartItem['name'], 12 )); ?></h6>
                                                    <div class="text-muted"><?php echo e(translate('qty')); ?>: <?php echo e($cartItem['quantity']); ?></div>
                                                </div>
                                            </div>
                                            <h5><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($product_subtotal))); ?></h5>
                                        </div>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                    <?php
                                        $ext_discount = session()->get($single_cart)['ext_discount'] ?? 0;
                                        $ext_discount_type = session()->get($single_cart)['ext_discount_type'] ?? 'amount';
                                    ?>

                                    <?php endif; ?>
                                </div>
                            </td>

                            <?php
                                $total = $subtotal;
                                $discount_amount = $discount_on_product;
                                $total -= $discount_amount;

                                $extra_discount = $ext_discount;
                                $extra_discount_type = $ext_discount_type;
                                if($extra_discount_type == 'percent' && $extra_discount > 0){
                                    $extra_discount =  (($subtotal)*$extra_discount) / 100;
                                }
                                if($extra_discount) {
                                    $total -= $extra_discount;
                                }

                                $total_tax_amount= $total_tax_show;
                            ?>

                            <td>
                                <?php if(($total+$total_tax-$coupon_discount) != $subtotal): ?>
                                    <del><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency(round($subtotal, 2)))); ?></del>
                                <?php endif; ?>
                                <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency(round($total+$total_tax-$coupon_discount, 2)))); ?></td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <button type="button" class="btn btn-soft-warning" onclick="cart_change('<?php echo e($single_cart); ?>')"><?php echo e(translate('resume')); ?></button>
                                    <button type="button" class="btn btn-soft-danger" onclick="cancel_customer_order('<?php echo e($single_cart); ?>')"><?php echo e(translate('cancel_order')); ?></button>
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </tbody>
    </table>
</div>
<?php else: ?>
    <div class="d-flex align-items-center justify-content-center ">
        <div>
            <img src="<?php echo e(asset('public/assets/back-end/img/icons/product.svg')); ?>" alt="">
            <h4 class="text-muted text-center mt-4"><?php echo e(translate('No_Order_Found')); ?></h4>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/buyandb/public_html/resources/views/admin-views/pos/_view-hold-orders.blade.php ENDPATH**/ ?>