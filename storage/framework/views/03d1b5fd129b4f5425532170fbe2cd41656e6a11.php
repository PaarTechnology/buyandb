<form action="<?php echo e(route('admin.pos.order')); ?>" id='order_place' method="post" >
    <?php echo csrf_field(); ?>
<div id="cart">
    <div class="table-responsive pos-cart-table border">
        <table class="table table-align-middle m-0">
            <thead class="text-capitalize bg-light">
                <tr>
                    <th class="border-0 min-w-120"><?php echo e(translate('item')); ?></th>
                    <th class="border-0"><?php echo e(translate('qty')); ?></th>
                    <th class="border-0"><?php echo e(translate('price')); ?></th>
                    <th class="border-0 text-center"><?php echo e(translate('delete')); ?></th>
                </tr>
            </thead>
            <tbody>
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
                $include_tax = 0;
            ?>
            <?php if(session()->has($cart_id) && count(session()->get($cart_id)) > 0): ?>
                <?php
                    $cart = session()->get($cart_id);
                    if(isset($cart['tax']))
                    {
                        $tax = $cart['tax'];
                    }
                    if(isset($cart['discount']))
                    {
                        $discount = $cart['discount'];
                        $discount_type = $cart['discount_type'];
                    }
                    if (isset($cart['ext_discount'])) {
                        $ext_discount = $cart['ext_discount'];
                        $ext_discount_type = $cart['ext_discount_type'];
                    }
                    if(isset($cart['coupon_discount']))
                    {
                        $coupon_discount = $cart['coupon_discount'];
                    }
                ?>
                <?php $__currentLoopData = session()->get($cart_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(is_array($cartItem)): ?>
                    <?php
                        $product = \App\Model\Product::find($cartItem['id']);

                        //tax calculation
                        $tax_calculate = \App\CPU\Helpers::tax_calculation($cartItem['price'], $product['tax'], $product['tax_type'])*$cartItem['quantity'];
                        $total_tax_show += $cartItem['tax_model'] != 'include' ? $tax_calculate : 0;
                        $total_tax += $product['tax_model']=='include' ? 0:$tax_calculate;

                        if($product->tax_model == 'include'){
                            $include_tax += \App\CPU\Helpers::tax_calculation($cartItem['price'], $product['tax'], $product['tax_type'])*$cartItem['quantity'];
                        }

                        $product_subtotal = $cartItem['price']*$cartItem['quantity'];
                        $subtotal += $product_subtotal;

                        $discount_on_product += ($cartItem['discount']*$cartItem['quantity']);
                    ?>

                <tr>
                    <td>
                        <div class="media align-items-center gap-10">
                            <img class="avatar avatar-sm" src="<?php echo e(asset('storage/app/public/product/thumbnail')); ?>/<?php echo e($cartItem['image']); ?>"
                                    onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img2.jpg')); ?>'" alt="<?php echo e($cartItem['name']); ?> image">
                            <div class="media-body">
                                <h5 class="text-hover-primary mb-0">
                                    <?php echo e(Str::limit($cartItem['name'], 12)); ?>

                                    <?php if($cartItem['tax_model'] == 'include'): ?>
                                        <span class="ml-2" data-toggle="tooltip" data-placement="top" title="<?php echo e(translate('tax_included')); ?>">
                                            <img class="info-img" src="<?php echo e(asset('/public/assets/back-end/img/info-circle.svg')); ?>" alt="img">
                                        </span>
                                    <?php endif; ?>
                                </h5>
                                <small><?php echo e(Str::limit($cartItem['variant'], 20)); ?></small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <input type="number" data-key="<?php echo e($key); ?>" class="form-control qty" value="<?php echo e($cartItem['quantity']); ?>" min="1" onkeyup="updateQuantity('<?php echo e($cartItem['id']); ?>',this.value,event,'<?php echo e($cartItem['variant']); ?>')">
                    </td>
                    <td>
                        <div>
                            <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($product_subtotal))); ?>

                        </div> <!-- price-wrap .// -->
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="javascript:removeFromCart(<?php echo e($key); ?>)" class="btn btn-sm rounded-circle">
                                <img src="<?php echo e(asset('public/assets/back-end/img/icons/pos-delete-icon.svg')); ?>" alt="">
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php
        $total = $subtotal;
        $discount_amount = $discount_on_product;
        $total -= $discount_amount;

        $extra_discount = $ext_discount;
        $extra_discount_type = $ext_discount_type;
        if($extra_discount_type == 'percent' && $extra_discount > 0){
            $extra_discount =  (($subtotal-$include_tax)*$extra_discount) / 100;
        }
        if($extra_discount) {
            $total -= $extra_discount;
        }

        $total_tax_amount= $total_tax_show;
    ?>
    <div class="pt-4">
        <dl>
            <div class="d-flex gap-2 justify-content-between">
                <dt class="title-color text-capitalize font-weight-normal"><?php echo e(translate('sub_total')); ?> : </dt>
                <dd><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($subtotal))); ?></dd>
            </div>

            <div class="d-flex gap-2 justify-content-between">
                <dt class="title-color text-capitalize font-weight-normal"><?php echo e(translate('product_Discount')); ?> :</dt>
                <dd><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency(round($discount_amount,2)))); ?></dd>
            </div>

            <div class="d-flex gap-2 justify-content-between">
                <dt class="title-color text-capitalize font-weight-normal"><?php echo e(translate('extra_Discount')); ?> :</dt>
                <dd>
                    <button id="extra_discount" class="btn btn-sm p-0" type="button" data-toggle="modal" data-target="#add-discount">
                        <i class="tio-edit"></i>
                    </button>
                    <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($extra_discount))); ?>

                </dd>
            </div>

            <div class="d-flex justify-content-between">
                <dt class="title-color gap-2 text-capitalize font-weight-normal"><?php echo e(translate('coupon_Discount')); ?> :</dt>
                <dd>
                    <button id="coupon_discount" class="btn btn-sm p-0" type="button" data-toggle="modal" data-target="#add-coupon-discount">
                        <i class="tio-edit"></i>
                    </button>
                    <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($coupon_discount))); ?>

                </dd>
            </div>

            <div class="d-flex gap-2 justify-content-between">
                <dt class="title-color text-capitalize font-weight-normal"><?php echo e(translate('tax')); ?> : </dt>
                <dd><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency(round($total_tax_amount,2)))); ?></dd>
            </div>

            <div class="d-flex gap-2 border-top justify-content-between pt-2">
                <dt class="title-color text-capitalize font-weight-bold title-color"><?php echo e(translate('total')); ?> : </dt>
                <dd class="font-weight-bold title-color"><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency(round($total+$total_tax-$coupon_discount, 2)))); ?></dd>
            </div>
        </dl>

        <div class="form-group col-12">
            <input type="hidden" class="form-control" name="amount" min="0" step="0.01"
                    value="<?php echo e(\App\CPU\BackEndHelper::usd_to_currency($total+$total_tax-$coupon_discount)); ?>"
                    readonly>
        </div>
        <div class="pt-4 mb-4">
            <div class="title-color d-flex mb-2"><?php echo e(translate('paid_By')); ?>:</div>
            <ul class="list-unstyled option-buttons">
                <li>
                    <input type="radio" id="cash" value="cash" name="type" hidden checked>
                    <label for="cash" class="btn btn--bordered btn--bordered-black px-4 mb-0"><?php echo e(translate('cash')); ?></label>
                </li>
                <li>
                    <input type="radio" value="card" id="card" name="type" hidden>
                    <label for="card" class="btn btn--bordered btn--bordered-black px-4 mb-0"><?php echo e(translate('card')); ?></label>
                </li>

                <?php ($wallet_status = \App\CPU\Helpers::get_business_settings('wallet_status') ?? 0); ?>
                <?php if($wallet_status): ?>
                <li class="<?php echo e((explode('-',session('current_user'))[0]=='wc') ? 'd-none':''); ?>">
                    <input type="radio" value="wallet" id="wallet" name="type" hidden>
                    <label for="wallet" class="btn btn--bordered btn--bordered-black px-4 mb-0"><?php echo e(translate('wallet')); ?></label>
                </li>
                <?php endif; ?>
            </ul>
        </div>


    </div>
    <div class="d-flex gap-2 justify-content-between align-items-center pt-3 bottom-sticky-btns">
        <?php ($order_place_status = 0); ?>
        <?php if(session()->has($cart_id) && count(session()->get($cart_id)) > 0): ?>
            <?php $__currentLoopData = session()->get($cart_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(is_array($cartItem)): ?>
                    <?php ($order_place_status = 1); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <?php if($order_place_status): ?>
            <span class="btn btn-danger btn-block" onclick="emptyCart()">
                <i class="fa fa-times-circle"></i>
                <?php echo e(translate('cancel_Order')); ?>

            </span>

            <button id="submit_order" type="button" class="btn btn--primary btn-block m-0" data-toggle="modal" data-target="#paymentModal"  onclick="form_submit()">
                <i class="fa fa-shopping-bag"></i>
                <?php echo e(translate('place_Order')); ?>

            </button>
        <?php else: ?>
            <span class="btn btn-danger btn-block empty_alert_show" onclick="empty_alert_show()">
                <i class="fa fa-times-circle"></i>
                <?php echo e(translate('cancel_Order')); ?>

            </span>
            <button type="button" class="btn btn--primary btn-block m-0" onclick="empty_alert_show()">
                <i class="fa fa-shopping-bag"></i>
                <?php echo e(translate('place_Order')); ?>

            </button>
        <?php endif; ?>

    </div>
</div>

</form>

<?php $__env->startPush('script_2'); ?>
<script>
    $('#type_ext_dis').on('change', function (){
        let type = $('#type_ext_dis').val();
        if(type === 'amount'){
            $('#dis_amount').attr('placeholder', 'Ex: 500');
        }else if(type === 'percent'){
            $('#dis_amount').attr('placeholder', 'Ex: 10%');
        }
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/buyandb/public_html/resources/views/admin-views/pos/_cart.blade.php ENDPATH**/ ?>