<?php $__env->startSection('title', translate('category')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 d-flex gap-10">
                <img src="<?php echo e(asset('/public/assets/back-end/img/brand-setup.png')); ?>" alt="">
                <?php echo e(translate('category_Setup')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                        <form action="<?php echo e(route('admin.category.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php ($language=\App\Model\BusinessSetting::where('type','pnc_language')->first()); ?>
                            <?php ($language = $language->value ?? null); ?>
                            <?php ($default_lang = 'en'); ?>
                            <?php ($default_lang = json_decode($language)[0]); ?>
                            <ul class="nav nav-tabs w-fit-content mb-4">
                                <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item text-capitalize">
                                        <a class="nav-link lang_link <?php echo e($lang == $default_lang? 'active':''); ?>"
                                           href="#"
                                           id="<?php echo e($lang); ?>-link"><?php echo e(ucfirst(\App\CPU\Helpers::get_language_name($lang)).'('.strtoupper($lang).')'); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div>
                                        <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-group <?php echo e($lang != $default_lang ? 'd-none':''); ?> lang_form"
                                            id="<?php echo e($lang); ?>-form">
                                            <label class="title-color"><?php echo e(translate('category_Name')); ?><span class="text-danger">*</span> (<?php echo e(strtoupper($lang)); ?>)</label>
                                            <input type="text" name="name[]" class="form-control"
                                                placeholder="<?php echo e(translate('new_Category')); ?>" <?php echo e($lang == $default_lang? 'required':''); ?>>
                                        </div>
                                        <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>">
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <input name="position" value="0" class="d-none">
                                    </div>
                                    <div class="form-group">
                                        <label class="title-color" for="priority"><?php echo e(translate('priority')); ?>

                                            <span>
                                            <i class="tio-info-outined" title="<?php echo e(translate('the_lowest_number_will_get_the_highest_priority')); ?>"></i>
                                            </span>
                                        </label>

                                        <select class="form-control" name="priority" id="" required>
                                            <option disabled selected><?php echo e(translate('set_Priority')); ?></option>
                                            <?php for($i = 0; $i <= 10; $i++): ?>
                                            <option
                                            value="<?php echo e($i); ?>" ><?php echo e($i); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="from_part_2">
                                        <label class="title-color"><?php echo e(translate('category_Logo')); ?></label>
                                        <span class="text-info"><span class="text-danger">*</span> <?php echo e(THEME_RATIO[theme_root_path()]['Category Image']); ?></span>
                                        <div class="custom-file text-left">
                                            <input type="file" name="image" id="customFileEg1"
                                                class="custom-file-input"
                                                accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*"
                                                required>
                                            <label class="custom-file-label"
                                                for="customFileEg1"><?php echo e(translate('choose_File')); ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 mt-lg-0 from_part_2">
                                    <div class="form-group">
                                        <center>
                                            <img
                                                class="upload-img-view"
                                                id="viewer"
                                                src="<?php echo e(asset('public/assets/back-end/img/900x400/img1.jpg')); ?>"
                                                alt="image"/>
                                        </center>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2 justify-content-end">
                                <button type="reset" id="reset" class="btn btn-secondary"><?php echo e(translate('reset')); ?></button>
                                <button type="submit" class="btn btn--primary"><?php echo e(translate('submit')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-20" id="cate-table">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="row align-items-center">
                            <div class="col-sm-4 col-md-6 col-lg-8 mb-2 mb-sm-0">
                                <h5 class="text-capitalize d-flex gap-1">
                                    <?php echo e(translate('category_list')); ?>

                                    <span class="badge badge-soft-dark radius-50 fz-12"><?php echo e($categories->total()); ?></span>
                                </h5>
                            </div>
                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <!-- Search -->
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-custom input-group-merge">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="" type="search" name="search" class="form-control"
                                            placeholder="<?php echo e(translate('search_here')); ?>" value="<?php echo e($search); ?>" required>
                                        <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                            class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                            <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th><?php echo e(translate('ID')); ?></th>
                                    <th class="text-center"><?php echo e(translate('category_Image')); ?></th>
                                    <th><?php echo e(translate('name')); ?></th>
                                    <th><?php echo e(translate('priority')); ?></th>
                                    <th class="text-center"><?php echo e(translate('home_category_status')); ?></th>
                                    <th class="text-center"><?php echo e(translate('action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td ><?php echo e($category['id']); ?></td>
                                    <td class="text-center">
                                        <img class="rounded" width="64"
                                                onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                src="<?php echo e(asset('storage/app/public/category')); ?>/<?php echo e($category['icon']); ?>">
                                    </td>
                                    <td><?php echo e($category['defaultname']); ?></td>
                                    <td>
                                        <?php echo e($category['priority']); ?>

                                    </td>
                                    <td class="text-center">

                                        <form action="<?php echo e(route('admin.category.status')); ?>" method="post" id="category_status<?php echo e($category['id']); ?>_form" class="category_status_form">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($category['id']); ?>">
                                            <label class="switcher mx-auto">
                                                <input type="checkbox" class="switcher_input" id="category_status<?php echo e($category['id']); ?>" name="home_status" value="1" <?php echo e($category->home_status == 1 ? 'checked':''); ?> onclick="toogleStatusModal(event,'category_status<?php echo e($category['id']); ?>','category-status-on.png','category-status-off.png','<?php echo e(translate('Want_to_Turn_ON')); ?> <?php echo e($category['defaultname']); ?> <?php echo e(translate('Category_status')); ?>','<?php echo e(translate('Want_to_Turn_OFF')); ?> <?php echo e($category['defaultname']); ?> <?php echo e(translate('Category_status')); ?>',`<p><?php echo e(translate('if_enabled_this_category_it_will_be_visible_from_the_category_wise_product_section_in_the_website_and_customer_app_in_the_homepage')); ?></p>`,`<p><?php echo e(translate('if_disabled_this_category_it_will_be_hidden_from_the_category_wise_product_section_in_the_website_and_customer_app_in_the_homepage')); ?></p>`)">
                                                <span class="switcher_control"></span>
                                            </label>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-10">
                                            <a class="btn btn-outline-info btn-sm square-btn"
                                                title="<?php echo e(translate('edit')); ?>"
                                                href="<?php echo e(route('admin.category.edit',[$category['id']])); ?>">
                                                <i class="tio-edit"></i>
                                            </a>
                                            <a class="btn btn-outline-danger btn-sm delete square-btn"
                                                title="<?php echo e(translate('delete')); ?>"
                                                id="<?php echo e($category['id']); ?>">
                                                <i class="tio-delete"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="table-responsive mt-4">
                        <div class="d-flex justify-content-lg-end">
                            <!-- Pagination -->
                            <?php echo e($categories->links()); ?>

                        </div>
                    </div>
                    <?php if(count($categories)==0): ?>
                        <div class="text-center p-4">
                            <img class="mb-3 w-160" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg" alt="Image Description">
                            <p class="mb-0"><?php echo e(translate('no_data_found')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
    <script>
        $(".lang_link").click(function (e) {
            e.preventDefault();
            $(".lang_link").removeClass('active');
            $(".lang_form").addClass('d-none');
            $(this).addClass('active');

            let form_id = this.id;
            let lang = form_id.split("-")[0];
            console.log(lang);
            $("#" + lang + "-form").removeClass('d-none');
            if (lang == '<?php echo e($default_lang); ?>') {
                $(".from_part_2").removeClass('d-none');
            } else {
                $(".from_part_2").addClass('d-none');
            }
        });

        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>

    <script>
        $('.category_status_form').on('submit', function(event){
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.category.status')); ?>",
                method: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    if(data.success == true) {
                        toastr.success("<?php echo e(translate('status_updated_successfully')); ?>");
                    }
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            Swal.fire({
                title: "<?php echo e(translate('are_you_sure')); ?> ?",
                text: "<?php echo e(translate('you_will_not_be_able_to_revert_this')); ?> !",
                showCancelButton: true,
                type: 'warning',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "<?php echo e(translate('yes_delete_it')); ?> !",
                cancelButtonText: '<?php echo e(translate("cancel")); ?>',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.category.delete')); ?>",
                        method: 'POST',
                        data: {id: id},
                        success: function () {
                            toastr.success("<?php echo e(translate('category_deleted_successfully.')); ?>");
                            location.reload();
                        }
                    });
                }
            })
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/category/view.blade.php ENDPATH**/ ?>