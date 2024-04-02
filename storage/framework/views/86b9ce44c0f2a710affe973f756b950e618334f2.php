<div class="inline-page-menu my-4">
    <ul class="list-unstyled">
        <li class="<?php echo e(Request::is('admin/business-settings/web-config') ?'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.web-config.index')); ?>"><?php echo e(translate('business_settings')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/product-settings/inhouse-shop') ?'active':''); ?>"><a href="<?php echo e(route('admin.product-settings.inhouse-shop')); ?>"><?php echo e(translate('in-House_Shop')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/product-settings') ?'active':''); ?>"><a href="<?php echo e(route('admin.product-settings.index')); ?>"><?php echo e(translate('Product')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/order-settings/index') ?'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.order-settings.index')); ?>"><?php echo e(translate('Order')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/seller-settings') ?'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.seller-settings.index')); ?>"><?php echo e(translate('seller')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/customer/customer-settings') ?'active':''); ?>"><a href="<?php echo e(route('admin.customer.customer-settings')); ?>"><?php echo e(translate('customer')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/delivery-man-settings') ?'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.delivery-man-settings.index')); ?>"><?php echo e(translate('delivery_Man')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/shipping-method/setting') ?'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.shipping-method.setting')); ?>"><?php echo e(translate('shipping_Method')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/delivery-restriction') ? 'active':''); ?>"><a href="<?php echo e(route('admin.business-settings.delivery-restriction.index')); ?>"><?php echo e(translate('delivery_Restriction')); ?></a></li>
    </ul>
</div>
<?php /**PATH /home/buyandb/public_html/resources/views/admin-views/business-settings/business-setup-inline-menu.blade.php ENDPATH**/ ?>