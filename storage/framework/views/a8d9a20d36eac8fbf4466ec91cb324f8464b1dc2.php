<?php $__env->startSection('title', translate('withdraw_Request')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(asset('/public/assets/back-end/img/withdraw-icon.png')); ?>" alt="">
                <?php echo e(translate('withdraw_Request')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <h5>
                                    <?php echo e(translate('withdraw_Request_Table')); ?>

                                    <span class="badge badge-soft-dark radius-50 fz-12 ml-1"><?php echo e($withdraw_req->total()); ?></span>
                                </h5>
                                <form action="http://localhost/6valley/seller/product/list" method="GET">
                                </form>
                            </div>
                            <div class="col-lg-8 mt-3 mt-lg-0 d-flex gap-3 justify-content-lg-end">
                                <button type="button" class="btn btn-outline--primary text-nowrap" data-toggle="dropdown">
                                    <i class="tio-download-to"></i>
                                    <?php echo e(translate('export')); ?>

                                    <i class="tio-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('admin.delivery-man.withdraw-list-export')); ?>">
                                            <img width="14" src="<?php echo e(asset('/public/assets/back-end/img/excel.png')); ?>" alt="">
                                            <?php echo e(translate('excel')); ?>

                                        </a>
                                    </li>
                                    <div class="dropdown-divider"></div>
                                </ul>

                                <select name="delivery_withdraw_status_filter" onchange="status_filter(this.value)" class="custom-select min-w-120 max-w-200">
                                    <option value="all" <?php echo e(session()->has('delivery_withdraw_status_filter') && session('delivery_withdraw_status_filter') == 'all'?'selected':''); ?>><?php echo e(translate('all')); ?></option>
                                    <option value="approved" <?php echo e(session()->has('delivery_withdraw_status_filter') && session('delivery_withdraw_status_filter') == 'approved'?'selected':''); ?>><?php echo e(translate('approved')); ?></option>
                                    <option value="denied" <?php echo e(session()->has('delivery_withdraw_status_filter') && session('delivery_withdraw_status_filter') == 'denied'?'selected':''); ?>><?php echo e(translate('denied')); ?></option>
                                    <option value="pending" <?php echo e(session()->has('delivery_withdraw_status_filter') && session('delivery_withdraw_status_filter') == 'pending'?'selected':''); ?>><?php echo e(translate('pending')); ?></option>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="datatable"
                                style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(translate('SL')); ?></th>
                                <th><?php echo e(translate('amount')); ?></th>
                                <th><?php echo e(translate('name')); ?></th>
                                <th><?php echo e(translate('request_time')); ?></th>
                                <th class="text-center"><?php echo e(translate('status')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $withdraw_req; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$wr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td scope="row"><?php echo e($withdraw_req->firstItem()+$k); ?></td>
                                    <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($wr['amount']))); ?></td>

                                    <td>
                                        <?php if(isset($wr->delivery_men)): ?>
                                            <span class="title-color hover-c1"><?php echo e($wr->delivery_men->f_name . ' ' . $wr->delivery_men->l_name); ?></span>
                                        <?php else: ?>
                                        <span><?php echo e(translate('not_found')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(date_format( $wr->created_at, 'd-M-Y, h:i:s A')); ?></td>
                                    <td class="text-center">
                                        <?php if($wr->approved==0): ?>
                                            <label class="badge badge-soft-primary"><?php echo e(translate('pending')); ?></label>
                                        <?php elseif($wr->approved==1): ?>
                                            <label class="badge badge-soft-success"><?php echo e(translate('approved')); ?></label>
                                        <?php else: ?>
                                            <label class="badge badge-soft-danger"><?php echo e(translate('denied')); ?></label>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <?php if(isset($wr->delivery_men)): ?>
                                            <a href="<?php echo e(route('admin.delivery-man.withdraw-view',[$wr['id']])); ?>"
                                                class="btn btn-outline-info btn-sm square-btn"
                                                title="<?php echo e(translate('view')); ?>">
                                                <i class="tio-invisible"></i>
                                                </a>
                                            <?php else: ?>
                                            <a class="btn btn-outline-info btn-sm square-btn disabled" href="#">
                                                <i class="tio-invisible"></i>
                                            </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php if(count($withdraw_req)==0): ?>
                            <div class="text-center p-4">
                                <img class="mb-3 w-160"
                                        src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg"
                                        alt="Image Description">
                                <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                            </div>
                    <?php endif; ?>
                    </div>

                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-center justify-content-md-end">
                            <!-- Pagination -->
                            <?php echo e($withdraw_req->links()); ?>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script_2'); ?>
  <script>
      function status_filter(type) {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.post({
              url: '<?php echo e(route('admin.delivery-man.status-filter')); ?>',
              data: {
                  delivery_withdraw_status_filter: type
              },
              beforeSend: function () {
                  $('#loading').fadeIn();
              },
              success: function (data) {
                 location.reload();
              },
              complete: function () {
                  $('#loading').fadeOut();
              }
          });
      }
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/delivery-man/withdraw/withdraw_list.blade.php ENDPATH**/ ?>