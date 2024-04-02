<?php $__env->startSection('title',translate('add_new_delivery_man')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('/public/assets/back-end/img/add-new-delivery-man.png')); ?>" alt="">
                <?php echo e(translate('add_new_delivery_man')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Page Header -->
        <div class="row">
            <div class="col-12">

                <form action="<?php echo e(route('admin.delivery-man.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="card">
                        <!-- End Page Header -->
                        <div class="card-body">
                            <h5 class="mb-0 page-header-title d-flex align-items-center gap-2 border-bottom pb-3 mb-3">
                                <i class="tio-user"></i>
                                <?php echo e(translate('general_Information')); ?>

                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="title-color d-flex" for="f_name"><?php echo e(translate('first_Name')); ?></label>
                                        <input type="text" name="f_name" value="<?php echo e(old('f_name')); ?>" class="form-control" placeholder="<?php echo e(translate('first_Name')); ?>"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label class="title-color d-flex" for="exampleFormControlInput1"><?php echo e(translate('last_Name')); ?></label>
                                        <input value="<?php echo e(old('l_name')); ?>"  type="text" name="l_name" class="form-control" placeholder="<?php echo e(translate('last_Name')); ?>"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label class="title-color d-flex" for="exampleFormControlInput1"><?php echo e(translate('phone')); ?></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <select
                                                    class="js-example-basic-multiple js-states js-example-responsive form-control"
                                                    name="country_code" required>
                                                    <?php $__currentLoopData = $telephone_codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($code['code']); ?>" <?php echo e(old($code['code']) == $code['code']? 'selected' : ''); ?>><?php echo e($code['name']); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <input value="<?php echo e(old('phone')); ?>" type="text" name="phone" class="form-control" placeholder="<?php echo e(translate('ex')); ?> : 017********"
                                                   required>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="title-color d-flex" for="exampleFormControlInput1"><?php echo e(translate('identity_Type')); ?></label>
                                        <select name="identity_type" class="form-control">
                                            <option value="passport"><?php echo e(translate('passport')); ?></option>
                                            <option value="driving_license"><?php echo e(translate('driving_License')); ?></option>
                                            <option value="nid"><?php echo e(translate('nid')); ?></option>
                                            <option value="company_id"><?php echo e(translate('company_ID')); ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="title-color d-flex" for="exampleFormControlInput1"><?php echo e(translate('identity_Number')); ?></label>
                                        <input value="<?php echo e(old('identity_number')); ?>"  type="text" name="identity_number" class="form-control"
                                               placeholder="<?php echo e(translate('ex')); ?> : DH-23434-LS"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label class="title-color d-flex" for="exampleFormControlInput1"><?php echo e(translate('address')); ?></label>
                                        <div class="input-group mb-3">
                                            <textarea name="address" class="form-control" id="address" rows="1" placeholder="<?php echo e(translate('address')); ?>"><?php echo e(old('address')); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="title-color"><?php echo e(translate('deliveryman_image')); ?></label>
                                        <span class="text-info">* ( <?php echo e(translate('ratio')); ?> 1:1 )</span>
                                        <div class="custom-file">
                                            <input value="<?php echo e(old('image')); ?>" type="file" name="image" id="customFileEg1" class="custom-file-input"
                                                   accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" required>
                                            <label class="custom-file-label" for="customFileEg1"><?php echo e(translate('choose_File')); ?></label>
                                        </div>
                                        <center class="mt-4">
                                            <img class="upload-img-view" id="viewer"
                                                 src="<?php echo e(asset('public\assets\back-end\img\400x400\img2.jpg')); ?>" alt="delivery-man image"/>
                                        </center>


                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="title-color" for="exampleFormControlInput1"><?php echo e(translate('identity_image')); ?></label>
                                        <div>
                                            <div class="row" id="coba"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <!-- End Page Header -->
                        <div class="card-body">
                            <h5 class="mb-0 page-header-title d-flex align-items-center gap-2 border-bottom pb-3 mb-3">
                                <i class="tio-user"></i>
                                <?php echo e(translate('account_Information')); ?>

                            </h5>

                            <form action="<?php echo e(route('admin.delivery-man.store')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="title-color d-flex" for="exampleFormControlInput1"><?php echo e(translate('email')); ?></label>
                                            <input value="<?php echo e(old('email')); ?>" type="email" name="email" class="form-control" placeholder="<?php echo e(translate('ex')); ?> : ex@example.com"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="title-color d-flex" for="exampleFormControlInput1"><?php echo e(translate('password')); ?></label>
                                            <input type="text" name="password" class="form-control" placeholder="<?php echo e(translate('password_minimum_8_characters')); ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="title-color d-flex" for="exampleFormControlInput1"><?php echo e(translate('confirm_password')); ?></label>
                                            <input type="text" name="confirm_password" class="form-control" placeholder="<?php echo e(translate('password_minimum_8_characters')); ?>"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex gap-3 justify-content-end">
                                    <button type="reset" id="reset" class="btn btn-secondary px-4"><?php echo e(translate('reset')); ?></button>
                                    <button type="submit" class="btn btn--primary px-4"><?php echo e(translate('submit')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        $(".js-example-responsive").select2({
            width: 'resolve'
        });
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileEg1").change(function () {
            readURL(this);
        });
    </script>

    <script src="<?php echo e(asset('public/assets/back-end/js/spartan-multi-image-picker.js')); ?>"></script>
    <script type="text/javascript">
        $(function () {
            $("#coba").spartanMultiImagePicker({
                fieldName: 'identity_image[]',
                maxCount: 5,
                rowHeight: 'auto',
                groupClassName: 'col-6 col-lg-4',
                maxFileSize: '',
                placeholderImage: {
                    image: '<?php echo e(asset("public/assets/back-end/img/400x400/img2.jpg")); ?>',
                    width: '100%'
                },
                dropFileLabel: "Drop Here",
                onAddRow: function (index, file) {

                },
                onRenderedPreview: function (index) {

                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function (index, file) {
                    toastr.error('<?php echo e(translate("please_only_input_png_or_jpg_type_file")); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('<?php echo e(translate("file_size_too_big")); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/delivery-man/index.blade.php ENDPATH**/ ?>