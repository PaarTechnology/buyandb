<div class="inline-page-menu my-4">
    <ul class="list-unstyled">
        <li class="<?php echo e(Request::is('admin/transaction/order-transaction-list') ?'active':''); ?>"><a href="<?php echo e(route('admin.transaction.order-transaction-list')); ?>"><?php echo e(translate('order_Transactions')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/transaction/expense-transaction-list') ?'active':''); ?>"><a href="<?php echo e(route('admin.transaction.expense-transaction-list')); ?>"><?php echo e(translate('expense_Transactions')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/transaction/refund-transaction-list') ?'active':''); ?>"><a href="<?php echo e(route('admin.transaction.refund-transaction-list')); ?>"><?php echo e(translate('refund_Transactions')); ?></a></li>
    </ul>
</div>
<?php /**PATH /home/buyandb/public_html/resources/views/admin-views/report/transaction-report-inline-menu.blade.php ENDPATH**/ ?>