<?php $__env->startSection('title', translate('support_Ticket')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/back-end/css/croppie.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(asset('/public/assets/back-end/img/support_ticket.png')); ?>" alt="">
                <?php echo e(translate('support_ticket')); ?>

                <span class="badge badge-soft-dark radius-50 fz-14"><?php echo e($tickets->total()); ?></span>
            </h2>
        </div>
        <!-- End Page Title -->

        <div class="row mt-20">
            <div class="col-md-12">
                <div class="">
                    <div class="px-3 py-4 mb-3 border-bottom">
                        <div class="d-flex flex-wrap justify-content-between gap-3 align-items-center">
                            <div class="">
                                <!-- Search -->
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-merge input-group-custom">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                               placeholder="<?php echo e(translate('search_Ticket_by_Subject_or_status')); ?>..."
                                               aria-label="Search orders" value="<?php echo e($search); ?>">
                                        <button type="submit"
                                                class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div>
                            <div class="">
                                <div class="d-flex flex-wrap flex-sm-nowrap gap-3 justify-content-end">
                                    <?php ($priority=request()->has('priority')?request()->input('priority'):''); ?>
                                    <select class="form-control border-color-c1 w-160"
                                            onchange="filter_tickets('priority',this.value)">
                                        <option value="all"><?php echo e(translate('all_Priority')); ?></option>
                                        <option value="low" <?php echo e($priority=='low'?'selected':''); ?>><?php echo e(translate('low')); ?></option>
                                        <option value="medium" <?php echo e($priority=='medium'?'selected':''); ?>><?php echo e(translate('medium')); ?></option>
                                        <option value="high" <?php echo e($priority=='high'?'selected':''); ?>><?php echo e(translate('high')); ?></option>
                                        <option value="urgent" <?php echo e($priority=='urgent'?'selected':''); ?>><?php echo e(translate('urgent')); ?></option>
                                    </select>

                                    <?php ($status=request()->has('status')?request()->input('status'):''); ?>
                                    <select class="form-control border-color-c1 w-160"
                                            onchange="filter_tickets('status',this.value)">
                                        <option value="all"><?php echo e(translate('all_Status')); ?></option>
                                        <option value="open" <?php echo e($status=='open'?'selected':''); ?>><?php echo e(translate('open')); ?></option>
                                        <option value="close" <?php echo e($status=='close'?'selected':''); ?>><?php echo e(translate('close')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="border-bottom mb-3 pb-3">
                            <div class="card">
                                <div
                                    class="card-body align-items-center d-flex flex-wrap justify-content-between gap-3 border-bottom">
                                    <div class="media gap-3">
                                        <img class="avatar avatar-lg"
                                             src="<?php echo e(asset('storage/app/public/profile')); ?>/<?php echo e($ticket->customer->image??""); ?>"
                                             onerror="this.src='<?php echo e(asset('public/assets/back-end/img/image-place-holder.png')); ?>'"
                                             alt="">
                                        <div class="media-body">
                                            <h6 class="mb-0 <?php echo e(Session::get('direction') === "rtl" ? 'text-right' : 'text-left'); ?>"><?php echo e($ticket->customer->f_name??""); ?> <?php echo e($ticket->customer->l_name??""); ?></h6>
                                            <div class="mb-2 fz-12 <?php echo e(Session::get('direction') === "rtl" ? 'text-right' : 'text-left'); ?>"><?php echo e($ticket->customer->email??""); ?></div>
                                            <div class="d-flex flex-wrap gap-2 align-items-center">
                                                <span
                                                    class="badge-soft-danger fz-12 font-weight-bold px-2 radius-50"><?php echo e(translate(str_replace('_',' ',$ticket->priority))); ?></span>
                                                <span
                                                    class="badge-soft-info fz-12 font-weight-bold px-2 radius-50"><?php echo e(translate(str_replace('_',' ',$ticket->status))); ?></span>
                                                <h6 class="mb-0"><?php echo e(translate(str_replace('_',' ',$ticket->type))); ?></h6>
                                                <div class="text-nowrap <?php echo e(Session::get('direction') === "rtl" ? 'pr-9' : 'pl-9'); ?>">
                                                    <?php if($ticket->created_at->diffInDays(\Carbon\Carbon::now()) < 7): ?>
                                                        <?php echo e(date('D h:i:A',strtotime($ticket->created_at))); ?>

                                                    <?php else: ?>
                                                        <?php echo e(date('d M Y h:i:A',strtotime($ticket->created_at))); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="<?php echo e(route('admin.support-ticket.status')); ?>" method="post" id="support_ticket<?php echo e($ticket['id']); ?>_form" class="support_ticket_form">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($ticket['id']); ?>">
                                        <label class="switcher mx-auto">
                                            <input type="checkbox" class="switcher_input" id="support_ticket<?php echo e($ticket['id']); ?>" name="status" value="<?php echo e($ticket['status'] == 'open' ? 'close':'open'); ?>" <?php echo e($ticket['status'] == 'open' ? 'checked':''); ?> onclick="toogleStatusModal(event,'support_ticket<?php echo e($ticket['id']); ?>','support-ticket-on.png','support-ticket-off.png','<?php echo e(translate('Want_to_Turn_ON_Support_Ticket_Status')); ?>','<?php echo e(translate('Want_to_Turn_OFF_Support_Ticket_Status')); ?>',`<p><?php echo e(translate('if_enabled_this_support_ticket_will_be_active')); ?></p>`,`<p><?php echo e(translate('if_disabled_this_support_ticket_will_be_inactive')); ?></p>`)">
                                            <span class="switcher_control"></span>
                                        </label>
                                    </form>
                                </div>
                                <div
                                    class="card-body align-items-center d-flex flex-wrap flex-md-nowrap justify-content-between gap-4">
                                    <div>
                                        <?php echo e($ticket->description); ?>

                                    </div>
                                    <div class="text-nowrap">
                                        <a class="btn btn--primary"
                                           href="<?php echo e(route('admin.support-ticket.singleTicket',$ticket['id'])); ?>">
                                            <i class="tio-open-in-new"></i> <?php echo e(translate('view')); ?>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="table-responsive mt-4">
                    <div class="px-4 d-flex justify-content-lg-end">
                        <!-- Pagination -->
                        <?php echo e($tickets->links()); ?>

                    </div>
                </div>

                <?php if(count($tickets)==0): ?>
                    <div class="text-center p-4">
                        <img class="mb-3 w-160"
                             src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg"
                             alt="Image Description">
                        <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('script'); ?>
        <!-- Page level plugins -->
            <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
            <script
                src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <script>
                // Call the dataTables jQuery plugin
                $(document).ready(function () {
                    $('#dataTable').DataTable();
                });
            </script>

            <!-- Page level custom scripts -->
            <script src="<?php echo e(asset('public/assets/back-end/js/croppie.js')); ?>"></script>
            <script>
                $('.support_ticket_form').on('submit', function(event){
                    event.preventDefault();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: $(this).attr('action'),
                        method: 'POST',
                        data: $(this).serialize(),
                        success: function (data) {
                            toastr.success("<?php echo e(translate('status_updated_successfully')); ?>");
                        }
                    });
                });

                function filter_tickets(param, value) {
                    let text = window.location;
                    let redirect_to = '';
                    let polished = removeURLParameter(text.toString(), param);
                    if (polished.includes('?')) {
                        redirect_to = polished + '&' + param + '=' + value;
                    } else {
                        redirect_to = polished + '?' + param + '=' + value;
                    }

                    location.href = redirect_to;
                }

                function removeURLParameter(url, parameter) {
                    var urlparts = url.split('?');
                    if (urlparts.length >= 2) {
                        var prefix = encodeURIComponent(parameter) + '=';
                        var pars = urlparts[1].split(/[&;]/g);
                        for (var i = pars.length; i-- > 0;) {
                            if (pars[i].lastIndexOf(prefix, 0) !== -1) {
                                pars.splice(i, 1);
                            }
                        }
                        return urlparts[0] + (pars.length > 0 ? '?' + pars.join('&') : '');
                    }
                    return url;
                }
            </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/support-ticket/view.blade.php ENDPATH**/ ?>