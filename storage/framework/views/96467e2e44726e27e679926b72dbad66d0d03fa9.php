<?php $__env->startSection('title',translate('order_Details')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <style>
        .page-item.active .page-link {
            background-color: <?php echo e($web_config['primary_color']); ?>              !important;
        }

        .amount {
            margin- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 60px;

        }

        .w-49{
            width: 49% !important
        }

        a {
            color: <?php echo e($web_config['primary_color']); ?>;
        }

        @media (max-width: 360px) {
            .for-glaxy-mobile {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 6px;
            }

        }

        @media (max-width: 600px) {

            .for-glaxy-mobile {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 6px;
            }

            .order_table_info_div_2 {
                text-align: <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>          !important;
            }

             {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 16px;
            }

            . {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 16px;
            }

            .amount {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 0px;
            }

        }

        .btn-square {
            border-radius: 5px !important;
            border: 1px solid #E9F3FF;
            width: 40px;
            height: 40px;
            min-width: 40px;
            display: grid;
            place-items: center;
            padding: 0.5rem;
            color: #0286ff;
            line-height: 1;
            font-size: 1rem;
        }

        .bg-soft-danger {
            background-color: #FFF4F3;
        }

        .calculation-table th,
        .calculation-table td {
            padding: 0.5rem;
        }

        @media (min-width: 1200px) {
            .gap-xl-30 {
                gap: 30px !important;
            }
        }

        .nav-menu {
            display: flex;
        }
        .nav-menu > * {
            border: none;
            border-bottom: 2px solid transparent;
            background-color: transparent;
            padding: .5rem 0;
            color: #9B9B9B;
        }
        .nav-menu > *.active {
            border-color: #1455AC;
            color: #1455AC;
            font-weight: 700;
        }
        .h-40px {
            height: 40px !important;
        }

        .top-1 {
            top: .5rem;
        }
        .left-1 {
            left: .5rem;
        }
    </style>
    <style>
        .rating {
            --dir: right;
            --fill: #1455AC;
            --fillbg: rgba(100, 100, 100, 0.15);
            --star: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 17.25l-6.188 3.75 1.641-7.031-5.438-4.734 7.172-0.609 2.813-6.609 2.813 6.609 7.172 0.609-5.438 4.734 1.641 7.031z"/></svg>');
            --stars: 5;
            --starsize: 2.5rem;
            --symbol: var(--star);
            --value: 1;
            --w: calc(var(--stars) * var(--starsize));
            --x: calc(100% * (var(--value) / var(--stars)));
            block-size: var(--starsize);
            inline-size: var(--w);
            position: relative;
            touch-action: manipulation;
            -webkit-appearance: none;
        }
        [dir="rtl"] .rating {
            --dir: left;
        }
        .rating::-moz-range-track {
            background: linear-gradient(to var(--dir), var(--fill) 0 var(--x), var(--fillbg) 0 var(--x));
            block-size: 100%;
            mask: repeat left center/var(--starsize) var(--symbol);
        }
        .rating::-webkit-slider-runnable-track {
            background: linear-gradient(to var(--dir), var(--fill) 0 var(--x), var(--fillbg) 0 var(--x));
            block-size: 100%;
            mask: repeat left center/var(--starsize) var(--symbol);
            -webkit-mask: repeat left center/var(--starsize) var(--symbol);
        }
        .rating::-moz-range-thumb {
            height: var(--starsize);
            opacity: 0;
            width: var(--starsize);
        }
        .rating::-webkit-slider-thumb {
            height: var(--starsize);
            opacity: 0;
            width: var(--starsize);
            -webkit-appearance: none;
        }
        .rating, .rating-label {
            display: block;
            font-family: ui-sans-serif, system-ui, sans-serif;
        }
        .rating-label {
            margin-block-end: 1rem;
        }

        /* NO JS */
        .rating--nojs::-moz-range-track {
            background: var(--fillbg);
        }
        .rating--nojs::-moz-range-progress {
            background: var(--fill);
            block-size: 100%;
            mask: repeat left center/var(--starsize) var(--star);
        }
        .rating--nojs::-webkit-slider-runnable-track {
            background: var(--fillbg);
        }
        .rating--nojs::-webkit-slider-thumb {
            background-color: var(--fill);
            box-shadow: calc(0rem - var(--w)) 0 0 var(--w) var(--fill);
            opacity: 1;
            width: 1px;
        }
        [dir="rtl"] .rating--nojs::-webkit-slider-thumb {
            box-shadow: var(--w) 0 0 var(--w) var(--fill);
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="container pb-5 mb-2 mb-md-4 mt-3 rtl __inline-47 text-start">
    <div class="row g-3">
        <!-- Sidebar-->
            <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Content -->
            <section class="col-lg-9">
                <?php echo $__env->make('web-views.users-profile.account-details.partial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Seller Info -->
                <div class="bg-sm-white mt-3">
                    <div class="p-sm-3 d-flex flex-column gap-3 pb-md-5">
                        <?php ($review_count = 0); ?>
                        <?php $__currentLoopData = $order->order_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($order_details->product): ?>
                                <?php if(isset($order_details->product->reviews_by_customer[0])): ?>
                                    <?php ($review_count++); ?>
                                    <div class="border rounded bg-white p-3">
                                        <div class="media gap-3">
                                            <div class="position-relative">
                                                <img class="d-block review-item-img" onclick="location.href='<?php echo e(route('product',$order_details->product['slug'])); ?>'"
                                                    onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                    src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($order_details->product['thumbnail']); ?>"
                                                    alt="VR Collection" width="100">

                                                <?php if($order_details->product->discount > 0): ?>
                                                    <span class="price-discount badge badge-primary position-absolute top-1 left-1">
                                                        <?php if($order_details->product->discount_type == 'percent'): ?>
                                                            <?php echo e(round($order_details->product->discount)); ?>%
                                                        <?php elseif($order_details->product->discount_type =='flat'): ?>
                                                            <?php echo e(\App\CPU\Helpers::currency_converter($order_details->product->discount)); ?>

                                                        <?php endif; ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="media-body">
                                                <a href="<?php echo e(route('product',[$order_details->product['slug']])); ?>">
                                                    <h6 class="mb-1 review-item-title">
                                                        <?php echo e(Str::limit($order_details->product['name'],40)); ?>

                                                    </h6>
                                                </a>
                                                <?php if($order_details->variant): ?>
                                                    <div><small class="text-muted"><?php echo e(translate('variant')); ?> : <?php echo e($order_details->variant); ?></small></div>
                                                <?php endif; ?>
                                                <br>
                                                <div class="d-flex justify-content-end justify-content-sm-start">
                                                    <button type="button" class="btn btn-sm rounded btn-warning" data-toggle="modal" data-target="#submitReviewModal<?php echo e($order_details->id); ?>"><i class="tio-star-half"></i><?php echo e(translate('update_review')); ?></button>
                                                </div>
                                            </div>
                                        </div>

                                        <?php echo $__env->make('layouts.front-end.partials.modal._review',['id'=>$order_details->id,'order_details'=>$order_details], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                        <div class="mt-4">
                                            <div class="d-flex justify-content-between gap-2 mb-3">
                                                <h6 class="d-flex gap-2 mb-0 review-item-title"><span><?php echo e(number_format($order_details->product->reviews_by_customer[0]->rating ,1)); ?><i class="tio-star-half text-warning text-capitalize"></i></span> <?php echo e(translate('my_review')); ?></h6>
                                                <div class="text-muted fs-12"><?php echo e(isset($order_details->product->reviews_by_customer[0]) ? date('M d , Y h:i A',strtotime($order_details->product->reviews_by_customer[0]->updated_at)) : ''); ?></div>
                                            </div>
                                            <p class="fs-12"><?php echo e(isset($order_details->product->reviews_by_customer[0]) ? $order_details->product->reviews_by_customer[0]->comment:''); ?></p>
                                            <?php if(isset($order_details->product->reviews_by_customer[0]) && $order_details->product->reviews_by_customer[0]->attachment && $order_details->product->reviews_by_customer[0]->attachment != []): ?>
                                                <?php if(json_decode($order_details->product->reviews_by_customer[0]->attachment) != []): ?>
                                                <div class="mt-3">
                                                    <div class="d-flex gap-2 flex-wrap">
                                                        <?php $__currentLoopData = json_decode($order_details->product->reviews_by_customer[0]->attachment); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <a data-lightbox="mygallery" href="<?php echo e(asset('storage/app/public/review')); ?>/<?php echo e($photo); ?>">
                                                            <img class="border rounded border-primary-light" onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                                src="<?php echo e(asset('storage/app/public/review')); ?>/<?php echo e($photo); ?>"
                                                                alt="VR Collection" width="60">
                                                        </a>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                               <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($review_count == 0): ?>
                        <div class="text-center pt-5 text-capitalize">
                            <img class="mb-3" src="<?php echo e(asset('public/assets/front-end/img/icons/empty-review.svg')); ?>" alt="">
                            <p class="opacity-60 mt-3 text-capitalize"><?php echo e(translate('no_review_found')); ?>!</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('public/assets/front-end/js/spartan-multi-image-picker.js')); ?>"></script>
<script type="text/javascript">

    function showInstaImage(link) {
        $("#attachment-view").attr("src", link);
        $('#show-modal-view').modal('toggle')
    }

    let reviewselectedFiles = [];
    $(document).on('ready', () => {
        $(".reviewfilesValue").on('change', function () {
            for (let i = 0; i < this.files.length; ++i) {
                reviewselectedFiles.push(this.files[i]);
            }
            let pre_container = $(this).closest('.upload_images_area');
            // Display the selected files
            reviewfilesValuedisplaySelectedFiles(pre_container);
        });

        function reviewfilesValuedisplaySelectedFiles(pre_container = null) {
            /*start*/
            let container;
            if(pre_container == null) {
                container = document.getElementsByClassName("selected-files-container");
            }else {
                container = pre_container.find('.selected-files-container');
            }
            container.innerHTML = ""; // Clear previous content
            reviewselectedFiles.forEach((file, index) => {
                const input = document.createElement("input");
                input.type = "file";
                input.name = `fileUpload[${index}]`;
                input.classList.add(`image_index${index}`);
                input.hidden = true;
                container.append(input);
                /*BlobPropertyBag :
                / This type represents a collection of object properties and does not have an
                / explicit JavaScript representation.
                */
                const blob = new Blob([file], { type: file.type });
                const file_obj = new File([file],file.name);
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file_obj);
                input.files = dataTransfer.files;
            });
            /*end */
            pre_container.find(".filearray").empty(); // Clear previous user input
            for (let i = 0; i < reviewselectedFiles.length; ++i) {
                let filereader = new FileReader();
                let uploadDiv = jQuery.parseHTML("<div class='upload_img_box'><span class='img-clear'><i class='tio-clear'></i></span><img src='' alt=''></div>");

                filereader.onload = function () {
                    // Set the src attribute of the img tag within the created div
                    let imageData = this.result;
                    $(uploadDiv).find('img').attr('src', imageData);
                };

                filereader.readAsDataURL(reviewselectedFiles[i]);
                pre_container.find(".filearray").append(uploadDiv);
                // Attach a click event handler to the "tio-clear" icon to remove the associated div and file from the array
                $(uploadDiv).find('.img-clear').on('click', function () {
                    $(this).closest('.upload_img_box').remove();

                    reviewselectedFiles.splice(i, 1);
                    $('.image_index'+i).remove();
                });
            }
        }
    });
</script>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/themes/default/web-views/users-profile/account-details/reviews.blade.php ENDPATH**/ ?>