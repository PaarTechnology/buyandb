<?php $__env->startSection('title', translate('delivery_Man_Review')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid"
         style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-10 mb-3">
            <!-- Page Title -->
            <div class="">
                <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                    <img src="<?php echo e(asset('/public/assets/back-end/img/deliveryman.png')); ?>" width="20" alt="">
                    <?php echo e($delivery_man['f_name']. ' '. $delivery_man['l_name']); ?>

                </h2>
            </div>
            <!-- End Page Title -->

            <div class="d-flex justify-content-end flex-wrap gap-10">
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn--primary">
                    <i class="tio-back-ui"></i> <?php echo e(translate('back')); ?>

                </a>
            </div>
        </div>

        <!-- Card -->
        <div class="card">
            <!-- Body -->
            <div class="card-body my-3">
                <div class="row align-items-md-center gx-md-5">
                    <div class="col-md-auto mb-3 mb-md-0">
                        <div class="d-flex align-items-center">
                            <img
                                class="avatar avatar-xxl avatar-4by3 <?php echo e(Session::get('direction') === "rtl" ? 'ml-4' : 'mr-4'); ?>"
                                onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                src="<?php echo e(asset('storage/app/public/delivery-man')); ?>/<?php echo e($delivery_man['image']); ?>"
                                alt="Image Description">
                            <div class="d-block">
                                <h4 class="display-2 text-dark mb-0">
                                    <?php echo e(number_format($average_setting, 2, '.', ' ')); ?>

                                </h4>
                                <p> <?php echo e(translate('of')); ?> <?php echo e($reviews->count()?? 0); ?> <?php echo e(translate('reviews')); ?>

                                    <span
                                        class="badge badge-soft-dark badge-pill <?php echo e(Session::get('direction') === "rtl" ? 'mr-1' : 'ml-1'); ?>"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md">
                        <ul class="list-unstyled list-unstyled-py-2 mb-0">
                            <!-- Review Ratings -->
                            <li class="d-flex align-items-center font-size-sm">
                                <span
                                    class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'); ?>"><?php echo e(translate('5')); ?> <?php echo e(translate('star')); ?></span>
                                <div class="progress flex-grow-1">
                                    <div class="progress-bar" role="progressbar"
                                         style="width: <?php echo e($total==0?0:($five/$total)*100); ?>%;"
                                         aria-valuenow="<?php echo e($total==0?0:($five/$total)*100); ?>"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'); ?>"><?php echo e($five); ?></span>
                            </li>
                            <!-- End Review Ratings -->

                            <!-- Review Ratings -->
                            <li class="d-flex align-items-center font-size-sm">
                                <span
                                    class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'); ?>"><?php echo e(translate('4')); ?> <?php echo e(translate('star')); ?></span>
                                <div class="progress flex-grow-1">
                                    <div class="progress-bar" role="progressbar"
                                         style="width: <?php echo e($total==0?0:($four/$total)*100); ?>%;"
                                         aria-valuenow="<?php echo e($total==0?0:($four/$total)*100); ?>"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'); ?>"><?php echo e($four); ?></span>
                            </li>
                            <!-- End Review Ratings -->

                            <!-- Review Ratings -->
                            <li class="d-flex align-items-center font-size-sm">
                                <span
                                    class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'); ?>"><?php echo e(translate('3')); ?> <?php echo e(translate('star')); ?></span>
                                <div class="progress flex-grow-1">
                                    <div class="progress-bar" role="progressbar"
                                         style="width: <?php echo e($total==0?0:($three/$total)*100); ?>%;"
                                         aria-valuenow="<?php echo e($total==0?0:($three/$total)*100); ?>"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span
                                    class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'); ?>"><?php echo e($three); ?></span>
                            </li>
                            <!-- End Review Ratings -->

                            <!-- Review Ratings -->
                            <li class="d-flex align-items-center font-size-sm">
                                <span
                                    class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'); ?>"><?php echo e(translate('2')); ?> <?php echo e(translate('star')); ?></span>
                                <div class="progress flex-grow-1">
                                    <div class="progress-bar" role="progressbar"
                                         style="width: <?php echo e($total==0?0:($two/$total)*100); ?>%;"
                                         aria-valuenow="<?php echo e($total==0?0:($two/$total)*100); ?>"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'); ?>"><?php echo e($two); ?></span>
                            </li>
                            <!-- End Review Ratings -->

                            <!-- Review Ratings -->
                            <li class="d-flex align-items-center font-size-sm">
                                <span
                                    class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'); ?>"><?php echo e(translate('1')); ?> <?php echo e(translate('star')); ?></span>
                                <div class="progress flex-grow-1">
                                    <div class="progress-bar" role="progressbar"
                                         style="width: <?php echo e($total==0?0:($one/$total)*100); ?>%;"
                                         aria-valuenow="<?php echo e($total==0?0:($one/$total)*100); ?>"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'); ?>"><?php echo e($one); ?></span>
                            </li>
                            <!-- End Review Ratings -->
                        </ul>
                    </div>

                </div>
            </div>
            <!-- End Body -->
        </div>
        <!-- End Card -->

        <div class="card card-body mt-3">
            <div class="row border-bottom pb-3 align-items-center mb-20">
                <div class="col-sm-4 col-md-6 col-lg-8 mb-2 mb-sm-0"></div>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <!-- Search -->
                    <form action="<?php echo e(url()->current()); ?>" method="GET">
                        <div class="input-group input-group-merge input-group-custom">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tio-search"></i>
                                </div>
                            </div>
                            <input id="datatableSearch_" type="search" name="search" class="form-control"
                                   placeholder="<?php echo e(translate('search_by_Order_ID')); ?>"
                                   aria-label="Search orders" value="<?php echo e($search); ?>" required>
                            <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                        </div>
                    </form>
                    <!-- End Search -->
                </div>
            </div>

            <form action="<?php echo e(url()->current()); ?>" method="GET">
                <div class="row gy-3 align-items-end">

                    <div class="col-md-3">
                        <div>
                            <label for="from" class="title-color d-flex"><?php echo e(translate('from')); ?></label>
                            <input type="date" name="from_date" id="from_date" value="<?php echo e($from_date); ?>"
                                   class="form-control"
                                   title="<?php echo e(translate('from_date')); ?>">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div>
                            <label for="to_date" class="title-color d-flex"><?php echo e(translate('to')); ?></label>
                            <input type="date" name="to_date" id="to_date" value="<?php echo e($to_date); ?>"
                                   class="form-control"
                                   title="<?php echo e(ucfirst(translate('to_date'))); ?>">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div>
                            <select class="form-control" name="rating">
                                <option value="" selected>
                                    --<?php echo e(translate('select_Rating')); ?>--
                                </option>
                                <option
                                    value="1" <?php echo e($rating==1 ? 'selected': ''); ?>><?php echo e(translate('1')); ?></option>
                                <option
                                    value="2" <?php echo e($rating==2 ? 'selected': ''); ?>><?php echo e(translate('2')); ?></option>
                                <option
                                    value="3" <?php echo e($rating==3 ? 'selected': ''); ?>><?php echo e(translate('3')); ?></option>
                                <option
                                    value="4" <?php echo e($rating==4 ? 'selected': ''); ?>><?php echo e(translate('4')); ?></option>
                                <option
                                    value="5" <?php echo e($rating==5 ? 'selected': ''); ?>><?php echo e(translate('5')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <button id="filter" type="submit" class="btn btn--primary btn-block filter">
                                <i class="tio-filter-list nav-icon"></i>
                                <?php echo e(translate('filter')); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Card -->
        <div class="card mt-3">
            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table
                    class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100"
                    style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                    <thead class="thead-light thead-50 text-capitalize">
                    <tr>
                        <th><?php echo e(translate('SL')); ?></th>
                        <th><?php echo e(translate('order_ID')); ?></th>
                        <th><?php echo e(translate('reviewer')); ?></th>
                        <th><?php echo e(translate('review')); ?></th>
                        <th><?php echo e(translate('date')); ?></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <?php echo e($reviews->firstItem()+$key); ?>

                            </td>
                            <td>
                                <a class="title-color"
                                   href="<?php echo e($review->order_id ? route('admin.orders.details',['id'=>$review->order_id]) : ''); ?>"><?php echo e($review->order_id); ?></a>
                            </td>
                            <td>
                                <a class="d-flex align-items-center"
                                   href="<?php echo e(route('admin.customer.view',[$review['customer_id']])); ?>">
                                    <div class="avatar avatar-circle">
                                        <img
                                            class="avatar-img"
                                            onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                            src="<?php echo e(asset('storage/app/public/profile/'.$review->customer->image)); ?>"
                                            alt="Image Description">
                                    </div>
                                    <div class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'); ?>">
                                    <span class="d-block h5 text-hover-primary mb-0"><?php echo e($review->customer['f_name']." ".$review->customer['l_name']); ?> <i
                                            class="tio-verified text-primary" data-toggle="tooltip" data-placement="top"
                                            title="Verified Customer"></i></span>
                                        <span
                                            class="d-block font-size-sm text-body"><?php echo e($review->customer->email??""); ?></span>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <div class="text-wrap">
                                    <div class="d-flex mb-2">
                                        <label class="badge badge-soft-info">
                                            <span><?php echo e($review->rating); ?> <i class="tio-star"></i> </span>
                                        </label>
                                    </div>
                                    <div class="content p-0">
                                        <?php if(strlen($review['comment']) > 200): ?>)
                                            <?php echo e(substr($review['comment'], 0, 200)); ?>

                                            <span id="show-more-<?php echo e($review->id); ?>" data-id="<?php echo e($review->id); ?>" onclick="toggle_btn(this)">...<a href="javascript:void(0)"><?php echo e(translate('show_more')); ?></a></span>

                                            <span id="show-more-content-<?php echo e($review->id); ?>" class="show-more-content">
                                            <?php echo e(substr($review['comment'], 200)); ?>

                                            <span id="show-less-<?php echo e($review->id); ?>" data-id="<?php echo e($review->id); ?>" onclick="toggle_btn(this)"><a href="javascript:void(0)"><?php echo e(translate('show_less')); ?></a></span>
                                        <?php else: ?>
                                            <?php echo e($review['comment']); ?>

                                        <?php endif; ?>
                                    </div>

                                </div>
                            </td>
                            <td>
                                <?php echo e(date('d M Y H:i:s',strtotime($review['updated_at']))); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4">
                                <div class="text-center p-4">
                                    <img class="mb-3 w-160"
                                         src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg"
                                         alt="Image Description">
                                    <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <div class="table-responsive mt-4">
                <div class="px-4 d-flex justify-content-lg-end">
                    <!-- Pagination -->
                    <?php echo e($reviews->links()); ?>

                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
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
    </script>

    <script>
        $("[class^=show-more-content]").hide();
        function toggle_btn(t) {
            let show_more = "#show-more-" + $(t).attr('data-id')
            let show_less = "#show-less-" + $(t).attr('data-id')
            let show_more_content = "#show-more-content-" + $(t).attr('data-id')

            if($(show_more).is(":visible")){
                $(show_more_content).show(100);
                $(show_less).show(100);
                $(t).hide(100);
            }else if($(show_less).is(":visible")){
                $(show_more_content).hide(100);
                $(show_more).show(100);
                $(t).hide(100);
            }
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/delivery-man/rating.blade.php ENDPATH**/ ?>