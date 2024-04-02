<?php $__env->startSection('title', translate('contact_View')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/css/select2.min.css" rel="stylesheet"/>
    <link href="<?php echo e(asset('public/assets/back-end/css/croppie.css')); ?>" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Heading -->
        <div class="container">
            <!-- Page Title -->
            <div class="mb-3">
                <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                    <img width="20" src="<?php echo e(asset('/public/assets/back-end/img/message.png')); ?>" alt="">
                    <?php echo e(translate('message_view')); ?>

                </h2>
            </div>
            <!-- End Page Title -->

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5 class="mb-0 text-capitalize d-flex">
                                <i class="tio-user-big"></i>
                                <?php echo e(translate('user_details')); ?>

                            </h5>
                            <form action="<?php echo e(route('admin.contact.update',$contact->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group d--none">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <h4><?php echo e(translate('feedback')); ?></h4>
                                            <textarea class="form-control" name="feedback" placeholder="<?php echo e(translate('please_send_a_Feedback')); ?>">
                                                <?php echo e($contact->feedback); ?>

                                            </textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="d-flex justify-content-end">
                                    <?php if($contact->seen==0): ?>
                                        <button type="submit" class="btn btn-success">
                                            <i class="tio-checkmark-circle"></i> <?php echo e(translate('check')); ?>

                                        </button>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-info" disabled>
                                            <i class="tio-checkmark-circle"></i> <?php echo e(translate('already_check')); ?>

                                        </button>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">

                            <div class="pl-2 d-flex gap-2 align-items-center mb-3">
                                <strong class=""><?php echo e($contact->subject); ?></strong>
                                <?php if($contact->seen==1): ?>
                                    <label class="badge badge-soft-info mb-0"><?php echo e(translate('seen')); ?></label>
                                <?php else: ?>
                                    <label class="badge badge-soft-info mb-0"><?php echo e(translate('not_Seen_Yet')); ?></label>
                                <?php endif; ?>
                            </div>
                            <table class="table table-user-information table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td><?php echo e(translate('name')); ?>:</td>
                                        <td><?php echo e($contact->name); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo e(translate('mobile_no')); ?>:</td>
                                        <td><?php echo e($contact->mobile_number); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo e(translate('email')); ?>:</td>
                                        <td><?php echo e($contact->email); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header justify-content-center">
                            <h5 class="mb-0 text-capitalize">
                                <?php echo e(translate('message_Log')); ?>

                            </h5>
                        </div>
                        <div class="card-body d-flex flex-column gap-2">
                            <div class="mb-3">
                                <h5 class="px-2 py-1 badge-soft-info rounded mb-3 d-flex"><?php echo e($contact->name); ?></h5>
                                <div class="flex-start mb-1">
                                    <strong class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"><?php echo e(translate('subject')); ?>: </strong>
                                    <div><strong><?php echo e($contact->subject); ?></strong></div>
                                </div>
                                <div class="flex-start">
                                    <strong class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"><?php echo e(translate('message')); ?>: </strong>
                                    <div><?php echo e($contact->message); ?></div>
                                </div>
                            </div>
                            <div>
                                <h5 class="px-2 py-1 badge-soft-warning rounded mb-3 d-flex"><?php echo e(translate('admin')); ?></h5>
                                <?php if($contact['reply']!=null): ?>
                                    <?php ($data=json_decode($contact['reply'],true)); ?>
                                    <div class="flex-start mb-1">
                                        <strong class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"><?php echo e(translate('subject')); ?>: </strong>
                                        <div><strong><?php echo e($data['subject']); ?></strong></div>
                                    </div>
                                    <div class="flex-start">
                                        <strong class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"><?php echo e(translate('message')); ?>: </strong>
                                        <div><?php echo e($data['body']); ?></div>
                                    </div>
                                <?php else: ?>
                                    <label class="badge badge-danger"><?php echo e(translate('no_reply')); ?>.</label>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body mt-3 mx-lg-4">
                            <div class="row " style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                                <div class="col-12">
                                    <center>
                                        <h3><?php echo e(translate('send_Mail')); ?></h3>
                                        <label class="badge-soft-danger px-1"><?php echo e(translate('configure_your_mail_setup_first')); ?>.</label>
                                    </center>


                                    <form action="<?php echo e(route('admin.contact.send-mail',$contact->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group mt-2">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="title-color"><?php echo e(translate('subject')); ?></label>
                                                    <input class="form-control" name="subject" required>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <label class="title-color"><?php echo e(translate('mail_Body')); ?></label>
                                                    <textarea class="form-control h-100" name="mail_body"
                                                              placeholder="<?php echo e(translate('please_send_a_Feedback')); ?>" required></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end pt-3 mt-5">
                                            <button type="submit" class="btn btn--primary px-4">
                                            <?php echo e(translate('send')); ?><i class="tio-send ml-2"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/contacts/view.blade.php ENDPATH**/ ?>