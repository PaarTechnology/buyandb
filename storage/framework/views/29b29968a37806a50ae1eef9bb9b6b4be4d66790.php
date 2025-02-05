<?php $__env->startSection('title', translate('banner')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
            <h2 class="h1 mb-1 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(asset('/public/assets/back-end/img/banner.png')); ?>" alt="">
                <?php echo e(translate('banner_Setup')); ?>

                <small>
                    <strong class="text--primary"> (<?php echo e(str_replace("_", " ", theme_root_path())); ?>)</strong>
                </small>
            </h2>
            <div class="btn-group">
                <div class="ripple-animation" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none" class="svg replaced-svg">
                        <path d="M9.00033 9.83268C9.23644 9.83268 9.43449 9.75268 9.59449 9.59268C9.75449 9.43268 9.83421 9.2349 9.83366 8.99935V5.64518C9.83366 5.40907 9.75366 5.21463 9.59366 5.06185C9.43366 4.90907 9.23588 4.83268 9.00033 4.83268C8.76421 4.83268 8.56616 4.91268 8.40616 5.07268C8.24616 5.23268 8.16644 5.43046 8.16699 5.66602V9.02018C8.16699 9.25629 8.24699 9.45074 8.40699 9.60352C8.56699 9.75629 8.76477 9.83268 9.00033 9.83268ZM9.00033 13.166C9.23644 13.166 9.43449 13.086 9.59449 12.926C9.75449 12.766 9.83421 12.5682 9.83366 12.3327C9.83366 12.0966 9.75366 11.8985 9.59366 11.7385C9.43366 11.5785 9.23588 11.4988 9.00033 11.4993C8.76421 11.4993 8.56616 11.5793 8.40616 11.7393C8.24616 11.8993 8.16644 12.0971 8.16699 12.3327C8.16699 12.5688 8.24699 12.7668 8.40699 12.9268C8.56699 13.0868 8.76477 13.1666 9.00033 13.166ZM9.00033 17.3327C7.84755 17.3327 6.76421 17.1138 5.75033 16.676C4.73644 16.2382 3.85449 15.6446 3.10449 14.8952C2.35449 14.1452 1.76088 13.2632 1.32366 12.2493C0.886437 11.2355 0.667548 10.1521 0.666992 8.99935C0.666992 7.84657 0.885881 6.76324 1.32366 5.74935C1.76144 4.73546 2.35505 3.85352 3.10449 3.10352C3.85449 2.35352 4.73644 1.7599 5.75033 1.32268C6.76421 0.88546 7.84755 0.666571 9.00033 0.666016C10.1531 0.666016 11.2364 0.884905 12.2503 1.32268C13.2642 1.76046 14.1462 2.35407 14.8962 3.10352C15.6462 3.85352 16.24 4.73546 16.6778 5.74935C17.1156 6.76324 17.3342 7.84657 17.3337 8.99935C17.3337 10.1521 17.1148 11.2355 16.677 12.2493C16.2392 13.2632 15.6456 14.1452 14.8962 14.8952C14.1462 15.6452 13.2642 16.2391 12.2503 16.6768C11.2364 17.1146 10.1531 17.3332 9.00033 17.3327ZM9.00033 15.666C10.8475 15.666 12.4206 15.0168 13.7195 13.7185C15.0184 12.4202 15.6675 10.8471 15.667 8.99935C15.667 7.15213 15.0178 5.57907 13.7195 4.28018C12.4212 2.98129 10.8481 2.33213 9.00033 2.33268C7.1531 2.33268 5.58005 2.98185 4.28116 4.28018C2.98227 5.57852 2.3331 7.15157 2.33366 8.99935C2.33366 10.8466 2.98283 12.4196 4.28116 13.7185C5.57949 15.0174 7.15255 15.6666 9.00033 15.666Z" fill="currentColor"></path>
                    </svg>
                </div>


                <div class="dropdown-menu dropdown-menu-right bg-aliceblue border border-color-primary-light p-4 dropdown-w-lg-30">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img width="20" src="<?php echo e(asset('/public/assets/back-end/img/note.png')); ?>" alt="">
                        <h5 class="text-primary mb-0"><?php echo e(translate('note')); ?></h5>
                    </div>
                    <p class="title-color font-weight-medium mb-0"><?php echo e(translate('currently_you_are_managing_banners_for_')); ?><?php echo e(ucwords(str_replace("_", " ", theme_root_path()))); ?>.<?php echo e(translate('these_saved_data_is_only_applicable_only_for_')); ?><?php echo e(ucwords(str_replace("_", " ", theme_root_path()))); ?>.<?php echo e(translate('if_you_change_theme_from_theme_setup_these_banners_will_not_be_shown_in_changed_theme._You_have_upload_all_the_banners_over_again _according_to_the_new_theme_ratio_and_sizes._If_you_switch_back_to_')); ?><?php echo e(ucwords(str_replace("_", " ", theme_root_path()))); ?><?php echo e(translate('_again_,_you_will_see_the_saved_data.')); ?></p>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Content Row -->
        <div class="row pb-4 d--none" id="main-banner"
             style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 text-capitalize"><?php echo e(translate('banner_form')); ?></h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.banner.store')); ?>" method="post" enctype="multipart/form-data"
                              class="banner_form">
                            <?php echo csrf_field(); ?>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="hidden" id="id" name="id">
                                    <div class="form-group">
                                        <label for="name"
                                               class="title-color text-capitalize"><?php echo e(translate('banner_type')); ?></label>
                                        <select class="js-example-responsive form-control w-100" name="banner_type" required id="banner_type_select">
                                            <option value="Main Banner"><?php echo e(translate('main_Banner')); ?></option>
                                            <option value="Popup Banner"><?php echo e(translate('popup_Banner')); ?></option>

                                            <?php if(theme_root_path() != 'theme_fashion'): ?>
                                                <option value="Footer Banner"><?php echo e(translate('footer_Banner')); ?></option>
                                                <option value="Main Section Banner"><?php echo e(translate('main_Section_Banner')); ?></option>
                                            <?php endif; ?>

                                            <?php if(theme_root_path() == 'theme_aster'): ?>
                                                <option value="Header Banner"><?php echo e(translate('header_Banner')); ?></option>
                                                <option value="Sidebar Banner"><?php echo e(translate('sidebar_Banner')); ?></option>
                                                <option value="Top Side Banner"><?php echo e(translate('top_Side_Banner')); ?></option>
                                            <?php endif; ?>

                                            <?php if(theme_root_path() == 'theme_fashion'): ?>
                                                <option value="Promo Banner Left"><?php echo e(translate('promo_banner_left')); ?></option>
                                                <option value="Promo Banner Middle Top"><?php echo e(translate('promo_banner_middle_top')); ?></option>
                                                <option value="Promo Banner Middle Bottom"><?php echo e(translate('promo_banner_middle_bottom')); ?></option>
                                                <option value="Promo Banner Right"><?php echo e(translate('promo_banner_right')); ?></option>
                                                <option value="Promo Banner Bottom"><?php echo e(translate('promo_banner_bottom')); ?></option>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="name" class="title-color text-capitalize"><?php echo e(translate('banner_URL')); ?></label>
                                        <input type="url" name="url" class="form-control" id="url" required placeholder="<?php echo e(translate('Enter_url')); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="resource_id"
                                               class="title-color text-capitalize"><?php echo e(translate('resource_type')); ?></label>
                                        <select onchange="display_data(this.value)"
                                                class="js-example-responsive form-control w-100"
                                                name="resource_type" required>
                                            <option value="product"><?php echo e(translate('product')); ?></option>
                                            <option value="category"><?php echo e(translate('category')); ?></option>
                                            <option value="shop"><?php echo e(translate('shop')); ?></option>
                                            <option value="brand"><?php echo e(translate('brand')); ?></option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-0" id="resource-product">
                                        <label for="product_id"
                                               class="title-color text-capitalize"><?php echo e(translate('product')); ?></label>
                                        <select class="js-example-responsive form-control w-100"
                                                name="product_id">
                                            <?php $__currentLoopData = \App\Model\Product::active()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($product['id']); ?>"><?php echo e($product['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group mb-0 d--none" id="resource-category">
                                        <label for="name"
                                               class="title-color text-capitalize"><?php echo e(translate('category')); ?></label>
                                        <select class="js-example-responsive form-control w-100"
                                                name="category_id">
                                            <?php $__currentLoopData = \App\CPU\CategoryManager::parents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category['id']); ?>"><?php echo e($category['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group mb-0 d--none" id="resource-shop">
                                        <label for="shop_id" class="title-color"><?php echo e(translate('shop')); ?></label>
                                        <select class="w-100 js-example-responsive form-control" name="shop_id">
                                            <?php $__currentLoopData = \App\Model\Shop::active()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($shop['id']); ?>"><?php echo e($shop['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group mb-0 d--none" id="resource-brand">
                                        <label for="brand_id"
                                               class="title-color text-capitalize"><?php echo e(translate('brand')); ?></label>
                                        <select class="js-example-responsive form-control w-100"
                                                name="brand_id">
                                            <?php $__currentLoopData = \App\Model\Brand::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($brand['id']); ?>"><?php echo e($brand['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <!-- For Theme Fashion - New input Field - Start -->
                                    <?php if(theme_root_path() == 'theme_fashion'): ?>
                                    <div class="form-group mt-4 input_field_for_main_banner">
                                        <label for="button_text" class="title-color text-capitalize"><?php echo e(translate('Button_Text')); ?></label>
                                        <input type="text" name="button_text" class="form-control" id="button_text" placeholder="<?php echo e(translate('Enter_button_text')); ?>">
                                    </div>
                                    <div class="form-group mt-4 mb-0 input_field_for_main_banner">
                                        <label for="background_color" class="title-color text-capitalize"><?php echo e(translate('background_color')); ?></label>
                                        <input type="color" name="background_color" class="form-control form-control_color w-100" id="background_color" value="#fee440">
                                    </div>
                                    <?php endif; ?>
                                    <!-- For Theme Fashion - New input Field - End -->

                                </div>
                                <div class="col-md-6 d-flex flex-column justify-content-center">
                                    <div>
                                        <center class="mx-auto">
                                            <div class="uploadDnD">
                                                <div class="form-group inputDnD input_image" data-title="<?php echo e('Drag and drop file or Browse file'); ?>">
                                                    <input type="file" name="image" class="form-control-file text--primary font-weight-bold" onchange="readUrl(this)" accept=".jpg, .png, .jpeg, .gif, .bmp, .webp |image/*">
                                                </div>
                                            </div>
                                        </center>
                                        <label for="name" class="title-color text-capitalize">
                                            <?php echo e(translate('banner_image')); ?>

                                        </label>
                                        <span class="title-color" id="theme_ratio">( <?php echo e(translate('ratio')); ?> 4:1 )</span>
                                        <p><?php echo e(translate('banner_Image_ratio_is_not_same_for_all_sections_in_website')); ?>. <?php echo e(translate('please_review_the_ratio_before_upload')); ?></p>
                                        <!-- For Theme Fashion - New input Field - Start -->
                                        <?php if(theme_root_path() == 'theme_fashion'): ?>
                                        <div class="form-group mt-4 input_field_for_main_banner">
                                            <label for="title" class="title-color text-capitalize"><?php echo e(translate('Title')); ?></label>
                                            <input type="text" name="title" class="form-control" id="title" placeholder="<?php echo e(translate('Enter_banner_title')); ?>">
                                        </div>
                                        <div class="form-group mb-0 input_field_for_main_banner">
                                            <label for="sub_title" class="title-color text-capitalize"><?php echo e(translate('Sub_Title')); ?></label>
                                            <input type="text" name="sub_title" class="form-control" id="sub_title" placeholder="<?php echo e(translate('Enter_banner_sub_title')); ?>">
                                        </div>
                                        <?php endif; ?>
                                        <!-- For Theme Fashion - New input Field - End -->

                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end flex-wrap gap-10">
                                    <button class="btn btn-secondary cancel px-4" type="reset"><?php echo e(translate('reset')); ?></button>
                                    <button id="add" type="submit"
                                            class="btn btn--primary px-4"><?php echo e(translate('save')); ?></button>
                                    <button id="update"
                                       class="btn btn--primary d--none text-white"><?php echo e(translate('update')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="banner-table">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="row align-items-center">
                            <div class="col-md-4 col-lg-6 mb-2 mb-md-0">
                                <h5 class="mb-0 text-capitalize d-flex gap-2">
                                    <?php echo e(translate('banner_table')); ?>

                                    <span
                                        class="badge badge-soft-dark radius-50 fz-12"><?php echo e($banners->total()); ?></span>
                                </h5>
                            </div>
                            <div class="col-md-8 col-lg-6">
                                <div class="row gy-2 gx-2 align-items-center text-left">
                                    <div class="col-sm-12 col-md-9">
                                        <form action="<?php echo e(url()->current()); ?>" method="GET">
                                            <div class="row gy-2 gx-2 align-items-center text-left">
                                                <div class="col-sm-12 col-md-9">
                                                    <select class="form-control __form-control" name="search" id="date_type">
                                                        <option value=""><?php echo e(translate('all')); ?></option>
                                                        <option value="Main Banner" <?php echo e($search == "Main Banner" ? 'selected':''); ?>><?php echo e(translate('main_Banner')); ?></option>
                                                        <option value="Popup Banner" <?php echo e($search == "Popup Banner" ? 'selected':''); ?>><?php echo e(translate('popup_Banner')); ?></option>

                                                        <?php if(theme_root_path() != 'theme_fashion'): ?>
                                                            <option value="Footer Banner" <?php echo e($search == "Footer Banner" ? 'selected':''); ?>><?php echo e(translate('footer_Banner')); ?></option>
                                                            <option value="Main Section Banner" <?php echo e($search == "Main Section Banner" ? 'selected':''); ?>><?php echo e(translate('main_Section_Banner')); ?></option>
                                                        <?php endif; ?>

                                                        <?php if(theme_root_path() == 'theme_aster'): ?>
                                                            <option value="Header Banner" <?php echo e($search == "Header Banner" ? 'selected':''); ?>><?php echo e(translate('header_Banner')); ?></option>
                                                            <option value="Sidebar Banner" <?php echo e($search == "Sidebar Banner" ? 'selected':''); ?>><?php echo e(translate('sidebar_Banner')); ?></option>
                                                            <option value="Top Side Banner" <?php echo e($search == "Top Side Banner" ? 'selected':''); ?>><?php echo e(translate('top_Side_Banner')); ?></option>
                                                        <?php endif; ?>
                                                        <?php if(theme_root_path() == 'theme_fashion'): ?>
                                                            <option value="Promo Banner Left" <?php echo e($search == "Promo Banner Left" ? 'selected':''); ?>><?php echo e(translate('promo_banner_left')); ?></option>
                                                            <option value="Promo Banner Middle Top" <?php echo e($search == "Promo Banner Middle Top" ? 'selected':''); ?>><?php echo e(translate('promo_banner_middle_top')); ?></option>
                                                            <option value="Promo Banner Middle Bottom" <?php echo e($search == "Promo Banner Middle Bottom" ? 'selected':''); ?>><?php echo e(translate('promo_banner_middle_bottom')); ?></option>
                                                            <option value="Promo Banner Right" <?php echo e($search == "Promo Banner Right" ? 'selected':''); ?>><?php echo e(translate('promo_banner_right')); ?></option>
                                                            <option value="Promo Banner Bottom" <?php echo e($search == "Promo Banner Bottom" ? 'selected':''); ?>><?php echo e(translate('promo_banner_bottom')); ?></option>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-md-3">
                                                    <button type="submit" class="btn btn--primary px-4 w-100 text-nowrap">
                                                        <?php echo e(translate('filter')); ?>

                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div id="banner-btn">
                                            <button id="main-banner-add" class="btn btn--primary text-nowrap text-capitalize">
                                                <i class="tio-add"></i>
                                                <?php echo e(translate('add_banner')); ?>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="columnSearchDatatable"
                               style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                               class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th class="pl-xl-5"><?php echo e(translate('SL')); ?></th>
                                <th><?php echo e(translate('image')); ?></th>
                                <th><?php echo e(translate('banner_type')); ?></th>
                                <th><?php echo e(translate('published')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>
                            <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                <tr id="data-<?php echo e($banner->id); ?>">
                                    <td class="pl-xl-5"><?php echo e($banners->firstItem()+$key); ?></td>
                                    <td>
                                        <img class="ratio-4:1" width="80"
                                             onerror="this.src='<?php echo e(asset('public/assets/front-end/img/placeholder.png')); ?>'"
                                             src="<?php echo e(asset('storage/app/public/banner')); ?>/<?php echo e($banner['photo']); ?>">
                                    </td>
                                    <td><?php echo e(translate(str_replace('_',' ',$banner->banner_type))); ?></td>
                                    <td>
                                        <form action="<?php echo e(route('admin.banner.status')); ?>" method="post" id="banner_status<?php echo e($banner['id']); ?>_form" class="banner_status_form">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($banner['id']); ?>">
                                            <label class="switcher">
                                                <input type="checkbox" class="switcher_input" id="banner_status<?php echo e($banner['id']); ?>" name="status" value="1" <?php echo e($banner['published'] == 1 ? 'checked':''); ?> onclick="toogleStatusModal(event,'banner_status<?php echo e($banner['id']); ?>','banner-status-on.png','banner-status-off.png','<?php echo e(translate('Want_to_Turn_ON')); ?> <?php echo e(translate(str_replace('_',' ',$banner->banner_type))); ?> <?php echo e(translate('status')); ?>','<?php echo e(translate('Want_to_Turn_OFF')); ?> <?php echo e(translate(str_replace('_',' ',$banner->banner_type))); ?> <?php echo e(translate('status')); ?>',`<p><?php echo e(translate('if_enabled_this_banner_will_be_available_on_the_website_and_customer_app')); ?></p>`,`<p><?php echo e(translate('if_disabled_this_banner_will_be_hidden_from_the_website_and_customer_app')); ?></p>`)">
                                                <span class="switcher_control"></span>
                                            </label>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-10 justify-content-center">
                                            <a class="btn btn-outline--primary btn-sm cursor-pointer edit"
                                               title="<?php echo e(translate('edit')); ?>"
                                               href="<?php echo e(route('admin.banner.edit',[$banner['id']])); ?>">
                                                <i class="tio-edit"></i>
                                            </a>
                                            <a class="btn btn-outline-danger btn-sm cursor-pointer delete"
                                               title="<?php echo e(translate('delete')); ?>"
                                               id="<?php echo e($banner['id']); ?>">
                                                <i class="tio-delete"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>

                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-lg-end">
                            <!-- Pagination -->
                            <?php echo e($banners->links()); ?>

                        </div>
                    </div>

                    <?php if(count($banners)==0): ?>
                        <div class="text-center p-4">
                            <img class="mb-3 w-160"
                                 src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg"
                                 alt="Image Description">
                            <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        function readUrl(input) {
            if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = (e) => {
                let imgData = e.target.result;
                let imgName = input.files[0].name;
                input.setAttribute("data-title", "");
                let img = new Image();
                img.onload = function() {
                    let imgWidth = img.naturalWidth;
                    let imgHeight = img.naturalHeight;
                    $('.input_image').css({
                        "background-image": `url('${imgData}')`,
                        "width": "100%",
                        "height": "auto",
                        backgroundPosition: "center",
                        backgroundSize: "contain",
                        backgroundRepeat: "no-repeat",
                        // aspectRatio: 4 / 1,
                    });
                    $('.input_image').addClass('hide-before-content')
                };
                img.src = imgData;
            }
            reader.readAsDataURL(input.files[0]);
        }
        }
    </script>
    <script>
        $(document).on('ready', function () {
            theme_wise_ration();
        });

        function theme_wise_ration(){
            let banner_type = $('#banner_type_select').val();
            let theme = '<?php echo e(theme_root_path()); ?>';
            let theme_ratio = <?php echo json_encode(THEME_RATIO); ?>;
            let get_ratio= theme_ratio[theme][banner_type];
            $('#theme_ratio').text(get_ratio);
        }

        $('#banner_type_select').on('change',function(){
            theme_wise_ration();
        });

        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            // dir: "rtl",
            width: 'resolve'
        });

        function display_data(data) {

            $('#resource-product').hide()
            $('#resource-brand').hide()
            $('#resource-category').hide()
            $('#resource-shop').hide()

            if (data === 'product') {
                $('#resource-product').show()
            } else if (data === 'brand') {
                $('#resource-brand').show()
            } else if (data === 'category') {
                $('#resource-category').show()
            } else if (data === 'shop') {
                $('#resource-shop').show()
            }
        }
    </script>

    <script>
        $('#main-banner-add').on('click', function () {
            $('#main-banner').show();
        });

        $('.cancel').on('click', function () {
            $('.banner_form').attr('action', "<?php echo e(route('admin.banner.store')); ?>");
            $('#main-banner').hide();
        });

        $('.banner_status_form').on('submit', function(event){
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.banner.status')); ?>",
                method: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    if (data == 1) {
                        toastr.success('<?php echo e(translate("banner_published_successfully")); ?>');
                    } else {
                        toastr.success('<?php echo e(translate("banner_unpublished_successfully")); ?>');
                    }
                }
            });
        });

        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            Swal.fire({
                title: "<?php echo e(translate('are_you_sure_delete_this_banner')); ?>?",
                text: "<?php echo e(translate('you_will_not_be_able_to_revert_this')); ?>!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '<?php echo e(translate("yes_delete_it")); ?>!',
                cancelButtonText: '<?php echo e(translate("cancel")); ?>',
                type: 'warning',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.banner.delete')); ?>",
                        method: 'POST',
                        data: {id: id},
                        success: function (response) {
                            console.log(response)
                            toastr.success('<?php echo e(translate("banner_deleted_successfully")); ?>');
                            $('#data-' + id).hide();
                        }
                    });
                }
            })
        });
    </script>
    <!-- Page level plugins -->
    <!-- New Added JS - Start -->
    <script>
        $('#banner_type_select').on('change',function(){
            let input_value = $(this).val();

            if (input_value == "Main Banner") {
                $('.input_field_for_main_banner').removeClass('d-none');
            } else {
                $('.input_field_for_main_banner').addClass('d-none');
            }
        });
    </script>
    <!-- New Added JS - End -->
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/banner/view.blade.php ENDPATH**/ ?>