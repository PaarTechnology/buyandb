<?php $__env->startSection('title', translate('support_Ticket')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">

        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(asset('/public/assets/back-end/img/support_ticket.png')); ?>" alt="">
                <?php echo e(translate('support_ticket')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Support ticket inbox -->
        <div class="card card-chat justify-content-between">
            <!--  Message Header -->
            <div class="card-header flex-wrap gap-3">
                <?php $__currentLoopData = $supportTicket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $userDetails = \App\User::where('id', $ticket['customer_id'])->first();
                $conversations = \App\Model\SupportTicketConv::where('support_ticket_id', $ticket['id'])->orderBy('id','desc')->get();
                $admin = \App\Model\Admin::get();
                ?>
                <div class="media d-flex gap-3">
                    <img class="rounded-circle avatar" src="<?php echo e(asset('storage/app/public/profile')); ?>/<?php echo e(isset($userDetails)?$userDetails['image']:''); ?>"
                            onerror="this.src='<?php echo e(asset('public/assets/back-end/img/image-place-holder.png')); ?>'"
                            alt="<?php echo e(isset($userDetails)?$userDetails['name']:'not found'); ?>"/>
                    <div class="media-body">
                        <h6 class="font-size-md mb-1"><?php echo e(isset($userDetails)?$userDetails['f_name'].' '.$userDetails['l_name']:'not found'); ?></h6>
                        <div class="fz-12"><?php echo e(isset($userDetails)?$userDetails['phone']:''); ?></div>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-wrap gap-3">
                    <div class="type font-weight-bold bg-soft--primary c1 px-2 rounded"><?php echo e(translate(str_replace('_',' ',$ticket['type']))); ?></div>
                    <div class="priority d-flex flex-wrap align-items-center gap-3">
                        <span class="title-color"><?php echo e(translate('priority')); ?>:</span>
                        <span class="font-weight-bold badge-soft-info rounded px-2"><?php echo e(translate(str_replace('_',' ',$ticket['priority']))); ?></span>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- End Profile -->
            </div>
            <!-- End Inbox Message Header -->

            <div class="messaging p-3">
                <div class="inbox_msg">
                    <!-- Message Body -->
                    <div class="mesgs">
                        <div class="msg_history d-flex flex-column-reverse pr-2 overflow-x-hidden" id="show_msg">

                            <?php $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($message['admin_id']): ?>
                                    <div class="outgoing_msg">
                                        <div class="sent_msg">
                                            <div class="received_withd_msg">
                                                <?php if($message->admin_message): ?>
                                                <div class="d-flex justify-content-end">
                                                    <p class="bg-chat rounded px-3 py-2 mb-1 w-max-content">
                                                        <?php echo e($message->admin_message); ?>

                                                    </p>
                                                </div>
                                                <?php endif; ?>

                                                <?php if(json_decode($message['attachment']) !=null): ?>
                                                    <div class="row g-2 flex-wrap pt-1 justify-content-end">
                                                        <?php $__currentLoopData = json_decode($message['attachment']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="col-6 col-md-2 position-relative img_row<?php echo e($index); ?>">
                                                                <a data-lightbox="mygallery" href="<?php echo e(asset("storage/app/public/support-ticket/".$photo)); ?>"
                                                                   class="aspect-1 overflow-hidden d-block border rounded">
                                                                    <img onerror="this.src=' <?php echo e(asset('public/assets/back-end/img/image-place-holder.png')); ?>'"
                                                                         src="<?php echo e(asset('storage/app/public/support-ticket/'.$photo)); ?>"
                                                                         alt="" class="img-fit">
                                                                </a>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                <?php endif; ?>

                                                <span class="time_date fz-12 pt-2 d-flex justify-content-end"> <?php echo e($message->created_at->format('h:i A')); ?>    |    <?php echo e($message->created_at->format('M d')); ?> </span>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="incoming_msg">
                                        <div class="received_msg p-2">
                                            <?php if($message->customer_message): ?>
                                            <div class="d-flex justify-content-start">
                                                <p class="bg-chat rounded px-3 py-2 mb-1 w-max-content">
                                                    <?php echo e($message->customer_message); ?>

                                                </p>
                                            </div>
                                            <?php endif; ?>

                                            <?php if(json_decode($message['attachment']) !=null): ?>
                                                <div class="row g-2 flex-wrap pt-1 justify-content-start">
                                                    <?php $__currentLoopData = json_decode($message['attachment']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-6 col-md-2 position-relative img_row<?php echo e($index); ?>">
                                                            <a data-lightbox="mygallery" href="<?php echo e(asset("storage/app/public/chatting/".$photo)); ?>"
                                                               class="aspect-1 overflow-hidden d-block border rounded">
                                                                <img onerror="this.src=' <?php echo e(asset('public/assets/back-end/img/image-place-holder.png')); ?>'"
                                                                     src="<?php echo e(asset('storage/app/public/chatting/'.$photo)); ?>"
                                                                     alt="" class="img-fit">
                                                            </a>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php endif; ?>

                                            <span class="time_date fz-12 d-flex justify-content-start pt-2"> <?php echo e($message->created_at->format('h:i A')); ?>    |    <?php echo e($message->created_at->format('M d')); ?> </span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <div class="incoming_msg">
                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <?php if($ticket->description): ?>
                                            <div class="d-flex justify-content-start">
                                                <p class="bg-c1 text-white rounded px-3 py-2 mb-1 w-max-content">
                                                    <?php echo e($ticket->description); ?>

                                                </p>
                                            </div>
                                        <?php endif; ?>

                                        <?php if(json_decode($ticket['attachment']) !=null): ?>
                                            <div class="row g-2 flex-wrap pt-1">
                                                <?php $__currentLoopData = json_decode($ticket['attachment']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-6 col-md-2 position-relative img_row<?php echo e($index); ?>">
                                                        <a data-lightbox="mygallery" href="<?php echo e(asset("storage/app/public/support-ticket/".$photo)); ?>"
                                                           class="aspect-1 overflow-hidden d-block border rounded">
                                                            <img onerror="this.src=' <?php echo e(asset('public/assets/back-end/img/image-place-holder.png')); ?>'"
                                                                 src="<?php echo e(asset('storage/app/public/support-ticket/'.$photo)); ?>"
                                                                 alt="" class="img-fit">
                                                        </a>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>

                                        <span class="time_date fz-12 pt-2 d-flex justify-content-start"> <?php echo e($ticket->created_at->format('h:i A')); ?>    |    <?php echo e($ticket->created_at->format('M d')); ?> </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="type_msg">
                            <div class="input_msg_write">
                                <?php $__currentLoopData = $supportTicket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <form class="needs-validation" href="<?php echo e(route('admin.support-ticket.replay',$reply['id'])); ?>" method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($reply['id']); ?>">
                                    <input type="hidden" name="adminId" value="1">

                                    <h5 class="pt-2 pb-1 d-flex mx-1"><?php echo e(translate('leave_a_Message')); ?></h5>
                                    <div class="position-relative d-flex align-items-center">
                                        <?php if(theme_root_path() == "default"): ?>
                                            <label class="py-0 px-3 d-flex align-items-center m-0 cursor-pointer position-absolute">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                                    <path d="M18.1029 1.83203H3.89453C2.75786 1.83203 1.83203 2.75786 1.83203 3.89453V18.1029C1.83203 19.2395 2.75786 20.1654 3.89453 20.1654H18.1029C19.2395 20.1654 20.1654 19.2395 20.1654 18.1029V3.89453C20.1654 2.75786 19.2395 1.83203 18.1029 1.83203ZM3.89453 3.20703H18.1029C18.4814 3.20703 18.7904 3.51595 18.7904 3.89453V12.7642L15.2539 9.2277C15.1255 9.09936 14.9514 9.02603 14.768 9.02603H14.7653C14.5819 9.02603 14.405 9.09936 14.2776 9.23136L10.3204 13.25L8.65845 11.5945C8.53011 11.4662 8.35595 11.3929 8.17261 11.3929C7.9957 11.3654 7.81053 11.4662 7.6822 11.6009L3.20703 16.1705V3.89453C3.20703 3.51595 3.51595 3.20703 3.89453 3.20703ZM3.21253 18.1304L8.17903 13.0575L13.9375 18.7904H3.89453C3.52603 18.7904 3.22811 18.4952 3.21253 18.1304ZM18.1029 18.7904H15.8845L11.2948 14.2189L14.7708 10.6898L18.7904 14.7084V18.1029C18.7904 18.4814 18.4814 18.7904 18.1029 18.7904Z" fill="#1455AC"/>
                                                    <path d="M8.12834 9.03012C8.909 9.03012 9.54184 8.39728 9.54184 7.61662C9.54184 6.83597 8.909 6.20312 8.12834 6.20312C7.34769 6.20312 6.71484 6.83597 6.71484 7.61662C6.71484 8.39728 7.34769 9.03012 8.12834 9.03012Z" fill="#1455AC"/>
                                                </svg>
                                                <input type="file" id="msgfilesValue" class="h-100 position-absolute w-100 " hidden multiple  accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                            </label>
                                        <?php endif; ?>

                                        <textarea class="form-control <?php echo e(theme_root_path() == "default" ? 'pl-8':''); ?>" id="msgInputValue" name="replay"
                                                  type="text" placeholder="<?php echo e(translate('write_your_message_here')); ?>" ></textarea>
                                    </div>


                                    <div class="mt-3 d-flex justify-content-between">
                                        <div class="">
                                            <div class="d-flex gap-3 flex-wrap filearray"></div>
                                            <div id="selected-files-container"></div>
                                        </div>

                                        <div>
                                            <button class="aSend btn btn--primary" type="submit" id="msgSendBtn"><?php echo e(translate('send_Reply')); ?></button>
                                        </div>
                                    </div>
                                </form>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Message Body -->
                </div>
            </div>

        </div>
        <!-- end-->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('public/assets/back-end/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/back-end/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo e(asset('public/assets/back-end/js/demo/datatables-demo.js')); ?>"></script>
    <script src="<?php echo e(asset('public/assets/back-end/js/croppie.js')); ?>"></script>

    <script>
        let selectedFiles = [];
        $(document).on('ready', () => {
            $("#msgfilesValue").on('change', function () {
                for (let i = 0; i < this.files.length; ++i) {
                    selectedFiles.push(this.files[i]);
                }
                // Display the selected files
                displaySelectedFiles();
            });

            function displaySelectedFiles() {
                /*start*/
                const container = document.getElementById("selected-files-container");
                container.innerHTML = ""; // Clear previous content
                selectedFiles.forEach((file, index) => {
                    const input = document.createElement("input");
                    input.type = "file";
                    input.name = `image[${index}]`;
                    input.classList.add(`image_index${index}`);
                    input.hidden = true;
                    container.appendChild(input);
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
                $(".filearray").empty(); // Clear previous user input
                for (let i = 0; i < selectedFiles.length; ++i) {
                    let filereader = new FileReader();
                    let $uploadDiv = jQuery.parseHTML("<div class='upload_img_box'><span class='img-clear'><i class='tio-clear'></i></span><img src='' alt=''></div>");

                    filereader.onload = function () {
                        // Set the src attribute of the img tag within the created div
                        $($uploadDiv).find('img').attr('src', this.result);
                        let imageData = this.result;
                    };

                    filereader.readAsDataURL(selectedFiles[i]);
                    $(".filearray").append($uploadDiv);
                    // Attach a click event handler to the "tio-clear" icon to remove the associated div and file from the array
                    $($uploadDiv).find('.img-clear').on('click', function () {
                        $(this).closest('.upload_img_box').remove();

                        selectedFiles.splice(i, 1);
                        $('.image_index'+i).remove();
                    });
                }
            }
        });
    </script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/support-ticket/singleView.blade.php ENDPATH**/ ?>