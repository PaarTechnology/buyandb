<?php $__env->startSection('title', translate('general_settings')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('public/assets/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/back-end/css/custom.css')); ?>" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('/public/assets/back-end/img/business-setup.png')); ?>" alt="">
                <?php echo e(translate('business_Setup')); ?>

            </h2>

            <div class="btn-group">
                <div class="ripple-animation" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none" class="svg replaced-svg">
                        <path d="M9.00033 9.83268C9.23644 9.83268 9.43449 9.75268 9.59449 9.59268C9.75449 9.43268 9.83421 9.2349 9.83366 8.99935V5.64518C9.83366 5.40907 9.75366 5.21463 9.59366 5.06185C9.43366 4.90907 9.23588 4.83268 9.00033 4.83268C8.76421 4.83268 8.56616 4.91268 8.40616 5.07268C8.24616 5.23268 8.16644 5.43046 8.16699 5.66602V9.02018C8.16699 9.25629 8.24699 9.45074 8.40699 9.60352C8.56699 9.75629 8.76477 9.83268 9.00033 9.83268ZM9.00033 13.166C9.23644 13.166 9.43449 13.086 9.59449 12.926C9.75449 12.766 9.83421 12.5682 9.83366 12.3327C9.83366 12.0966 9.75366 11.8985 9.59366 11.7385C9.43366 11.5785 9.23588 11.4988 9.00033 11.4993C8.76421 11.4993 8.56616 11.5793 8.40616 11.7393C8.24616 11.8993 8.16644 12.0971 8.16699 12.3327C8.16699 12.5688 8.24699 12.7668 8.40699 12.9268C8.56699 13.0868 8.76477 13.1666 9.00033 13.166ZM9.00033 17.3327C7.84755 17.3327 6.76421 17.1138 5.75033 16.676C4.73644 16.2382 3.85449 15.6446 3.10449 14.8952C2.35449 14.1452 1.76088 13.2632 1.32366 12.2493C0.886437 11.2355 0.667548 10.1521 0.666992 8.99935C0.666992 7.84657 0.885881 6.76324 1.32366 5.74935C1.76144 4.73546 2.35505 3.85352 3.10449 3.10352C3.85449 2.35352 4.73644 1.7599 5.75033 1.32268C6.76421 0.88546 7.84755 0.666571 9.00033 0.666016C10.1531 0.666016 11.2364 0.884905 12.2503 1.32268C13.2642 1.76046 14.1462 2.35407 14.8962 3.10352C15.6462 3.85352 16.24 4.73546 16.6778 5.74935C17.1156 6.76324 17.3342 7.84657 17.3337 8.99935C17.3337 10.1521 17.1148 11.2355 16.677 12.2493C16.2392 13.2632 15.6456 14.1452 14.8962 14.8952C14.1462 15.6452 13.2642 16.2391 12.2503 16.6768C11.2364 17.1146 10.1531 17.3332 9.00033 17.3327ZM9.00033 15.666C10.8475 15.666 12.4206 15.0168 13.7195 13.7185C15.0184 12.4202 15.6675 10.8471 15.667 8.99935C15.667 7.15213 15.0178 5.57907 13.7195 4.28018C12.4212 2.98129 10.8481 2.33213 9.00033 2.33268C7.1531 2.33268 5.58005 2.98185 4.28116 4.28018C2.98227 5.57852 2.3331 7.15157 2.33366 8.99935C2.33366 10.8466 2.98283 12.4196 4.28116 13.7185C5.57949 15.0174 7.15255 15.6666 9.00033 15.666Z" fill="currentColor"></path>
                    </svg>
                </div>


                <div class="dropdown-menu dropdown-menu-right bg-aliceblue border border-color-primary-light p-4 dropdown-w-lg">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img width="20" src="<?php echo e(asset('/public/assets/back-end/img/note.png')); ?>" alt="">
                        <h5 class="text-primary mb-0"><?php echo e(translate('note')); ?></h5>
                    </div>
                    <p class="title-color font-weight-medium mb-0"><?php echo e(translate('please_click_save_information_button_below_to_save_all_the_changes')); ?></p>
                </div>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Inlile Menu -->
        <?php echo $__env->make('admin-views.business-settings.business-setup-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Inlile Menu -->

        <div class="alert alert-danger d-none mb-3" role="alert">
            <?php echo e(translate('changing_some_settings_will_take_time_to_show_effect_please_clear_session_or_wait_for_60_minutes_else_browse_from_incognito_mode')); ?>

        </div>

        
        <div class="card mb-3">
            <div class="card-body">
                <form action="<?php echo e(route('admin.maintenance-mode')); ?>" method="get" id="maintenance_mode_form">
                    <?php echo csrf_field(); ?>
                <div class="border rounded border-color-c1 px-4 py-3 d-flex justify-content-between mb-1">
                    <?php ($config=\App\CPU\Helpers::get_business_settings('maintenance_mode')); ?>
                    <h5 class="mb-0 d-flex gap-1 c1">
                        <?php echo e(translate('maintenance_mode')); ?>

                    </h5>
                    <div class="position-relative">
                        <label class="switcher">
                            <input type="checkbox" class="switcher_input" id="maintenance_mode" <?php echo e(isset($config) && $config?'checked':''); ?> onclick="toogleStatusModal(event,'maintenance_mode','maintenance_mode-on.png','maintenance_mode-off.png','<?php echo e(translate('Want_to_enable_the_Maintenance_Mode')); ?>','<?php echo e(translate('Want_to_disable_the_Maintenance_Mode')); ?>',`<p><?php echo e(translate('if_enabled_all_your_apps_and_customer_website_will_be_temporarily_off')); ?></p>`,`<p><?php echo e(translate('if_disabled_all_your_apps_and_customer_website_will_be_functional')); ?></p>`)">
                            <span class="switcher_control"></span>
                        </label>
                    </div>
                </div>
                </form>
                <p>*<?php echo e(translate('by_turning_the').', "'.
                translate('Maintenance_Mode')); ?>" <?php echo e(translate('ON')); ?>, <?php echo e(translate('all_your_apps_and_customer_website_will_be_disabled_until_you_turn_this_mode_OFF')); ?>.<?php echo e(translate('only_the_Admin_Panel_&_Seller_Panel_will_be_functional')); ?></p>
            </div>
        </div>

        <form action="<?php echo e(route('admin.business-settings.update-info')); ?>" method="POST"
                enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <!-- Company Information -->
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0 text-capitalize d-flex gap-1">
                        <i class="tio-user-big"></i>
                        <?php echo e(translate('company_Information')); ?>

                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label
                                    class="title-color d-flex"><?php echo e(translate('company_Name')); ?></label>
                                <input class="form-control" type="text" name="company_name"
                                    value="<?php echo e($business_setting['company_name']); ?>"
                                    placeholder="New Business">
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex"><?php echo e(translate('phone')); ?></label>
                                <input class="form-control" type="text" name="company_phone"
                                    value="<?php echo e($business_setting['company_phone']); ?>"
                                    placeholder="New Business">
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label
                                    class="title-color d-flex"><?php echo e(translate('email')); ?></label>
                                <input class="form-control" type="text" name="company_email"
                                    value="<?php echo e($business_setting['company_email']); ?>"
                                    placeholder="New Business">
                            </div>
                        </div>

                        <?php ($cc=\App\Model\BusinessSetting::where('type','country_code')->first()); ?>
                        <?php ($cc=$cc?$cc->value:0); ?>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex"><?php echo e(translate('country')); ?> </label>
                                <select id="country" name="country" class="form-control  js-select2-custom">
                                    <option value="AF" <?php echo e($cc?($cc=='AF'?'selected':''):''); ?> >Afghanistan</option>
                                    <option value="AX" <?php echo e($cc?($cc=='AX'?'selected':''):''); ?> >Åland Islands</option>
                                    <option value="AL" <?php echo e($cc?($cc=='AL'?'selected':''):''); ?> >Albania</option>
                                    <option value="DZ" <?php echo e($cc?($cc=='DZ'?'selected':''):''); ?>>Algeria</option>
                                    <option value="AS" <?php echo e($cc?($cc=='AS'?'selected':''):''); ?>>American Samoa</option>
                                    <option value="AD" <?php echo e($cc?($cc=='AD'?'selected':''):''); ?>>Andorra</option>
                                    <option value="AO" <?php echo e($cc?($cc=='AO'?'selected':''):''); ?>>Angola</option>
                                    <option value="AI" <?php echo e($cc?($cc=='AI'?'selected':''):''); ?>>Anguilla</option>
                                    <option value="AQ" <?php echo e($cc?($cc=='AQ'?'selected':''):''); ?>>Antarctica</option>
                                    <option value="AG" <?php echo e($cc?($cc=='AG'?'selected':''):''); ?>>Antigua and Barbuda</option>
                                    <option value="AR" <?php echo e($cc?($cc=='AR'?'selected':''):''); ?>>Argentina</option>
                                    <option value="AM" <?php echo e($cc?($cc=='AM'?'selected':''):''); ?>>Armenia</option>
                                    <option value="AW" <?php echo e($cc?($cc=='AW'?'selected':''):''); ?>>Aruba</option>
                                    <option value="AU" <?php echo e($cc?($cc=='AU'?'selected':''):''); ?>>Australia</option>
                                    <option value="AT" <?php echo e($cc?($cc=='AT'?'selected':''):''); ?>>Austria</option>
                                    <option value="AZ" <?php echo e($cc?($cc=='AZ'?'selected':''):''); ?>>Azerbaijan</option>
                                    <option value="BS" <?php echo e($cc?($cc=='BS'?'selected':''):''); ?>>Bahamas</option>
                                    <option value="BH" <?php echo e($cc?($cc=='BH'?'selected':''):''); ?>>Bahrain</option>
                                    <option value="BD" <?php echo e($cc?($cc=='BD'?'selected':''):''); ?>>Bangladesh</option>
                                    <option value="BB" <?php echo e($cc?($cc=='BB'?'selected':''):''); ?>>Barbados</option>
                                    <option value="BY" <?php echo e($cc?($cc=='BY'?'selected':''):''); ?>>Belarus</option>
                                    <option value="BE" <?php echo e($cc?($cc=='BE'?'selected':''):''); ?>>Belgium</option>
                                    <option value="BZ" <?php echo e($cc?($cc=='BZ'?'selected':''):''); ?>>Belize</option>
                                    <option value="BJ" <?php echo e($cc?($cc=='BJ'?'selected':''):''); ?>>Benin</option>
                                    <option value="BM" <?php echo e($cc?($cc=='BM'?'selected':''):''); ?>>Bermuda</option>
                                    <option value="BT" <?php echo e($cc?($cc=='BT'?'selected':''):''); ?>>Bhutan</option>
                                    <option value="BO" <?php echo e($cc?($cc=='BO'?'selected':''):''); ?>>Bolivia, Plurinational State
                                        of
                                    </option>
                                    <option value="BQ" <?php echo e($cc?($cc=='BQ'?'selected':''):''); ?>>Bonaire, Sint Eustatius and
                                        Saba
                                    </option>
                                    <option value="BA" <?php echo e($cc?($cc=='BA'?'selected':''):''); ?>>Bosnia and Herzegovina
                                    </option>
                                    <option value="BW" <?php echo e($cc?($cc=='BW'?'selected':''):''); ?>>Botswana</option>
                                    <option value="BV" <?php echo e($cc?($cc=='BV'?'selected':''):''); ?>>Bouvet Island</option>
                                    <option value="BR" <?php echo e($cc?($cc=='BR'?'selected':''):''); ?>>Brazil</option>
                                    <option value="IO" <?php echo e($cc?($cc=='IO'?'selected':''):''); ?>>British Indian Ocean
                                        Territory
                                    </option>
                                    <option value="BN" <?php echo e($cc?($cc=='BN'?'selected':''):''); ?>>Brunei Darussalam</option>
                                    <option value="BG" <?php echo e($cc?($cc=='BG'?'selected':''):''); ?>>Bulgaria</option>
                                    <option value="BF" <?php echo e($cc?($cc=='BF'?'selected':''):''); ?>>Burkina Faso</option>
                                    <option value="BI" <?php echo e($cc?($cc=='BI'?'selected':''):''); ?>>Burundi</option>
                                    <option value="KH" <?php echo e($cc?($cc=='KH'?'selected':''):''); ?>>Cambodia</option>
                                    <option value="CM" <?php echo e($cc?($cc=='CM'?'selected':''):''); ?>>Cameroon</option>
                                    <option value="CA" <?php echo e($cc?($cc=='CA'?'selected':''):''); ?>>Canada</option>
                                    <option value="CV" <?php echo e($cc?($cc=='CV'?'selected':''):''); ?>>Cape Verde</option>
                                    <option value="KY" <?php echo e($cc?($cc=='KY'?'selected':''):''); ?>>Cayman Islands</option>
                                    <option value="CF" <?php echo e($cc?($cc=='CF'?'selected':''):''); ?>>Central African Republic
                                    </option>
                                    <option value="TD" <?php echo e($cc?($cc=='TD'?'selected':''):''); ?>>Chad</option>
                                    <option value="CL" <?php echo e($cc?($cc=='CL'?'selected':''):''); ?>>Chile</option>
                                    <option value="CN" <?php echo e($cc?($cc=='CN'?'selected':''):''); ?>>China</option>
                                    <option value="CX" <?php echo e($cc?($cc=='CX'?'selected':''):''); ?>>Christmas Island</option>
                                    <option value="CC" <?php echo e($cc?($cc=='CC'?'selected':''):''); ?>>Cocos (Keeling) Islands
                                    </option>
                                    <option value="CO" <?php echo e($cc?($cc=='CO'?'selected':''):''); ?>>Colombia</option>
                                    <option value="KM" <?php echo e($cc?($cc=='KM'?'selected':''):''); ?>>Comoros</option>
                                    <option value="CG" <?php echo e($cc?($cc=='CG'?'selected':''):''); ?>>Congo</option>
                                    <option value="CD" <?php echo e($cc?($cc=='CD'?'selected':''):''); ?>>Congo, the Democratic Republic
                                        of the
                                    </option>
                                    <option value="CK" <?php echo e($cc?($cc=='CK'?'selected':''):''); ?>>Cook Islands</option>
                                    <option value="CR" <?php echo e($cc?($cc=='CR'?'selected':''):''); ?>>Costa Rica</option>
                                    <option value="CI" <?php echo e($cc?($cc=='CI'?'selected':''):''); ?>>Côte d'Ivoire</option>
                                    <option value="HR" <?php echo e($cc?($cc=='HR'?'selected':''):''); ?>>Croatia</option>
                                    <option value="CU" <?php echo e($cc?($cc=='CU'?'selected':''):''); ?>>Cuba</option>
                                    <option value="CW" <?php echo e($cc?($cc=='CW'?'selected':''):''); ?>>Curaçao</option>
                                    <option value="CY" <?php echo e($cc?($cc=='CY'?'selected':''):''); ?>>Cyprus</option>
                                    <option value="CZ" <?php echo e($cc?($cc=='CZ'?'selected':''):''); ?>>Czech Republic</option>
                                    <option value="DK" <?php echo e($cc?($cc=='DK'?'selected':''):''); ?>>Denmark</option>
                                    <option value="DJ" <?php echo e($cc?($cc=='DJ'?'selected':''):''); ?>>Djibouti</option>
                                    <option value="DM" <?php echo e($cc?($cc=='DM'?'selected':''):''); ?>>Dominica</option>
                                    <option value="DO" <?php echo e($cc?($cc=='DO'?'selected':''):''); ?>>Dominican Republic</option>
                                    <option value="EC" <?php echo e($cc?($cc=='EC'?'selected':''):''); ?>>Ecuador</option>
                                    <option value="EG" <?php echo e($cc?($cc=='EG'?'selected':''):''); ?>>Egypt</option>
                                    <option value="SV" <?php echo e($cc?($cc=='SV'?'selected':''):''); ?>>El Salvador</option>
                                    <option value="GQ" <?php echo e($cc?($cc=='GQ'?'selected':''):''); ?>>Equatorial Guinea</option>
                                    <option value="ER" <?php echo e($cc?($cc=='ER'?'selected':''):''); ?>>Eritrea</option>
                                    <option value="EE" <?php echo e($cc?($cc=='EE'?'selected':''):''); ?>>Estonia</option>
                                    <option value="ET" <?php echo e($cc?($cc=='ET'?'selected':''):''); ?>>Ethiopia</option>
                                    <option value="FK" <?php echo e($cc?($cc=='FK'?'selected':''):''); ?>>Falkland Islands (Malvinas)
                                    </option>
                                    <option value="FO" <?php echo e($cc?($cc=='FO'?'selected':''):''); ?>>Faroe Islands</option>
                                    <option value="FJ" <?php echo e($cc?($cc=='FJ'?'selected':''):''); ?>>Fiji</option>
                                    <option value="FI" <?php echo e($cc?($cc=='FI'?'selected':''):''); ?>>Finland</option>
                                    <option value="FR" <?php echo e($cc?($cc=='FR'?'selected':''):''); ?>>France</option>
                                    <option value="GF" <?php echo e($cc?($cc=='GF'?'selected':''):''); ?>>French Guiana</option>
                                    <option value="PF" <?php echo e($cc?($cc=='PF'?'selected':''):''); ?>>French Polynesia</option>
                                    <option value="TF" <?php echo e($cc?($cc=='TF'?'selected':''):''); ?>>French Southern Territories
                                    </option>
                                    <option value="GA" <?php echo e($cc?($cc=='GA'?'selected':''):''); ?>>Gabon</option>
                                    <option value="GM" <?php echo e($cc?($cc=='GM'?'selected':''):''); ?>>Gambia</option>
                                    <option value="GE" <?php echo e($cc?($cc=='GE'?'selected':''):''); ?>>Georgia</option>
                                    <option value="DE" <?php echo e($cc?($cc=='DE'?'selected':''):''); ?>>Germany</option>
                                    <option value="GH" <?php echo e($cc?($cc=='GH'?'selected':''):''); ?>>Ghana</option>
                                    <option value="GI" <?php echo e($cc?($cc=='GI'?'selected':''):''); ?>>Gibraltar</option>
                                    <option value="GR" <?php echo e($cc?($cc=='GR'?'selected':''):''); ?>>Greece</option>
                                    <option value="GL" <?php echo e($cc?($cc=='GL'?'selected':''):''); ?>>Greenland</option>
                                    <option value="GD" <?php echo e($cc?($cc=='GD'?'selected':''):''); ?>>Grenada</option>
                                    <option value="GP" <?php echo e($cc?($cc=='GP'?'selected':''):''); ?>>Guadeloupe</option>
                                    <option value="GU" <?php echo e($cc?($cc=='GU'?'selected':''):''); ?>>Guam</option>
                                    <option value="GT" <?php echo e($cc?($cc=='GT'?'selected':''):''); ?>>Guatemala</option>
                                    <option value="GG" <?php echo e($cc?($cc=='GG'?'selected':''):''); ?>>Guernsey</option>
                                    <option value="GN" <?php echo e($cc?($cc=='GN'?'selected':''):''); ?>>Guinea</option>
                                    <option value="GW" <?php echo e($cc?($cc=='GW'?'selected':''):''); ?>>Guinea-Bissau</option>
                                    <option value="GY" <?php echo e($cc?($cc=='GY'?'selected':''):''); ?>>Guyana</option>
                                    <option value="HT" <?php echo e($cc?($cc=='HT'?'selected':''):''); ?>>Haiti</option>
                                    <option value="HM" <?php echo e($cc?($cc=='HM'?'selected':''):''); ?>>Heard Island and McDonald
                                        Islands
                                    </option>
                                    <option value="VA" <?php echo e($cc?($cc=='VA'?'selected':''):''); ?>>Holy See (Vatican City
                                        State)
                                    </option>
                                    <option value="HN" <?php echo e($cc?($cc=='HN'?'selected':''):''); ?>>Honduras</option>
                                    <option value="HK" <?php echo e($cc?($cc=='HK'?'selected':''):''); ?>>Hong Kong</option>
                                    <option value="HU" <?php echo e($cc?($cc=='HU'?'selected':''):''); ?>>Hungary</option>
                                    <option value="IS" <?php echo e($cc?($cc=='IS'?'selected':''):''); ?>>Iceland</option>
                                    <option value="IN" <?php echo e($cc?($cc=='IN'?'selected':''):''); ?>>India</option>
                                    <option value="ID" <?php echo e($cc?($cc=='ID'?'selected':''):''); ?>>Indonesia</option>
                                    <option value="IR" <?php echo e($cc?($cc=='IR'?'selected':''):''); ?>>Iran, Islamic Republic of
                                    </option>
                                    <option value="IQ" <?php echo e($cc?($cc=='IQ'?'selected':''):''); ?>>Iraq</option>
                                    <option value="IE" <?php echo e($cc?($cc=='IE'?'selected':''):''); ?>>Ireland</option>
                                    <option value="IM" <?php echo e($cc?($cc=='IM'?'selected':''):''); ?>>Isle of Man</option>
                                    <option value="IL" <?php echo e($cc?($cc=='IL'?'selected':''):''); ?>>Israel</option>
                                    <option value="IT" <?php echo e($cc?($cc=='IT'?'selected':''):''); ?>>Italy</option>
                                    <option value="JM" <?php echo e($cc?($cc=='JM'?'selected':''):''); ?>>Jamaica</option>
                                    <option value="JP" <?php echo e($cc?($cc=='JP'?'selected':''):''); ?>>Japan</option>
                                    <option value="JE" <?php echo e($cc?($cc=='JE'?'selected':''):''); ?>>Jersey</option>
                                    <option value="JO" <?php echo e($cc?($cc=='JO'?'selected':''):''); ?>>Jordan</option>
                                    <option value="KZ" <?php echo e($cc?($cc=='KZ'?'selected':''):''); ?>>Kazakhstan</option>
                                    <option value="KE" <?php echo e($cc?($cc=='KE'?'selected':''):''); ?>>Kenya</option>
                                    <option value="KI" <?php echo e($cc?($cc=='KI'?'selected':''):''); ?>>Kiribati</option>
                                    <option value="KP" <?php echo e($cc?($cc=='KP'?'selected':''):''); ?>>Korea, Democratic People's
                                        Republic of
                                    </option>
                                    <option value="KR" <?php echo e($cc?($cc=='KR'?'selected':''):''); ?>>Korea, Republic of</option>
                                    <option value="KW" <?php echo e($cc?($cc=='KW'?'selected':''):''); ?>>Kuwait</option>
                                    <option value="KG" <?php echo e($cc?($cc=='KG'?'selected':''):''); ?>>Kyrgyzstan</option>
                                    <option value="LA" <?php echo e($cc?($cc=='LA'?'selected':''):''); ?>>Lao People's Democratic
                                        Republic
                                    </option>
                                    <option value="LV" <?php echo e($cc?($cc=='LV'?'selected':''):''); ?>>Latvia</option>
                                    <option value="LB" <?php echo e($cc?($cc=='LB'?'selected':''):''); ?>>Lebanon</option>
                                    <option value="LS" <?php echo e($cc?($cc=='LS'?'selected':''):''); ?>>Lesotho</option>
                                    <option value="LR" <?php echo e($cc?($cc=='LR'?'selected':''):''); ?>>Liberia</option>
                                    <option value="LY" <?php echo e($cc?($cc=='LY'?'selected':''):''); ?>>Libya</option>
                                    <option value="LI" <?php echo e($cc?($cc=='LI'?'selected':''):''); ?>>Liechtenstein</option>
                                    <option value="LT" <?php echo e($cc?($cc=='LT'?'selected':''):''); ?>>Lithuania</option>
                                    <option value="LU" <?php echo e($cc?($cc=='LU'?'selected':''):''); ?>>Luxembourg</option>
                                    <option value="MO" <?php echo e($cc?($cc=='MO'?'selected':''):''); ?>>Macao</option>
                                    <option value="MK" <?php echo e($cc?($cc=='MK'?'selected':''):''); ?>>Macedonia, the former Yugoslav
                                        Republic of
                                    </option>
                                    <option value="MG" <?php echo e($cc?($cc=='MG'?'selected':''):''); ?>>Madagascar</option>
                                    <option value="MW" <?php echo e($cc?($cc=='MW'?'selected':''):''); ?>>Malawi</option>
                                    <option value="MY" <?php echo e($cc?($cc=='MY'?'selected':''):''); ?>>Malaysia</option>
                                    <option value="MV" <?php echo e($cc?($cc=='MV'?'selected':''):''); ?>>Maldives</option>
                                    <option value="ML" <?php echo e($cc?($cc=='ML'?'selected':''):''); ?>>Mali</option>
                                    <option value="MT" <?php echo e($cc?($cc=='MT'?'selected':''):''); ?>>Malta</option>
                                    <option value="MH" <?php echo e($cc?($cc=='MH'?'selected':''):''); ?>>Marshall Islands</option>
                                    <option value="MQ" <?php echo e($cc?($cc=='MQ'?'selected':''):''); ?>>Martinique</option>
                                    <option value="MR" <?php echo e($cc?($cc=='MR'?'selected':''):''); ?>>Mauritania</option>
                                    <option value="MU" <?php echo e($cc?($cc=='MU'?'selected':''):''); ?>>Mauritius</option>
                                    <option value="YT" <?php echo e($cc?($cc=='YT'?'selected':''):''); ?>>Mayotte</option>
                                    <option value="MX" <?php echo e($cc?($cc=='MX'?'selected':''):''); ?>>Mexico</option>
                                    <option value="FM" <?php echo e($cc?($cc=='FM'?'selected':''):''); ?>>Micronesia, Federated States
                                        of
                                    </option>
                                    <option value="MD" <?php echo e($cc?($cc=='MD'?'selected':''):''); ?>>Moldova, Republic of</option>
                                    <option value="MC" <?php echo e($cc?($cc=='MC'?'selected':''):''); ?>>Monaco</option>
                                    <option value="MN" <?php echo e($cc?($cc=='MN'?'selected':''):''); ?>>Mongolia</option>
                                    <option value="ME" <?php echo e($cc?($cc=='ME'?'selected':''):''); ?>>Montenegro</option>
                                    <option value="MS" <?php echo e($cc?($cc=='MS'?'selected':''):''); ?>>Montserrat</option>
                                    <option value="MA" <?php echo e($cc?($cc=='MA'?'selected':''):''); ?>>Morocco</option>
                                    <option value="MZ" <?php echo e($cc?($cc=='MZ'?'selected':''):''); ?>>Mozambique</option>
                                    <option value="MM" <?php echo e($cc?($cc=='MM'?'selected':''):''); ?>>Myanmar</option>
                                    <option value="NA" <?php echo e($cc?($cc=='NA'?'selected':''):''); ?>>Namibia</option>
                                    <option value="NR" <?php echo e($cc?($cc=='NR'?'selected':''):''); ?>>Nauru</option>
                                    <option value="NP" <?php echo e($cc?($cc=='NP'?'selected':''):''); ?>>Nepal</option>
                                    <option value="NL" <?php echo e($cc?($cc=='NL'?'selected':''):''); ?>>Netherlands</option>
                                    <option value="NC" <?php echo e($cc?($cc=='NC'?'selected':''):''); ?>>New Caledonia</option>
                                    <option value="NZ" <?php echo e($cc?($cc=='NZ'?'selected':''):''); ?>>New Zealand</option>
                                    <option value="NI" <?php echo e($cc?($cc=='NI'?'selected':''):''); ?>>Nicaragua</option>
                                    <option value="NE" <?php echo e($cc?($cc=='NE'?'selected':''):''); ?>>Niger</option>
                                    <option value="NG" <?php echo e($cc?($cc=='NG'?'selected':''):''); ?>>Nigeria</option>
                                    <option value="NU" <?php echo e($cc?($cc=='NU'?'selected':''):''); ?>>Niue</option>
                                    <option value="NF" <?php echo e($cc?($cc=='NF'?'selected':''):''); ?>>Norfolk Island</option>
                                    <option value="MP" <?php echo e($cc?($cc=='MP'?'selected':''):''); ?>>Northern Mariana Islands
                                    </option>
                                    <option value="NO" <?php echo e($cc?($cc=='NO'?'selected':''):''); ?>>Norway</option>
                                    <option value="OM" <?php echo e($cc?($cc=='OM'?'selected':''):''); ?>>Oman</option>
                                    <option value="PK" <?php echo e($cc?($cc=='PK'?'selected':''):''); ?>>Pakistan</option>
                                    <option value="PW" <?php echo e($cc?($cc=='PW'?'selected':''):''); ?>>Palau</option>
                                    <option value="PS" <?php echo e($cc?($cc=='PS'?'selected':''):''); ?>>Palestinian Territory,
                                        Occupied
                                    </option>
                                    <option value="PA" <?php echo e($cc?($cc=='PA'?'selected':''):''); ?>>Panama</option>
                                    <option value="PG" <?php echo e($cc?($cc=='PG'?'selected':''):''); ?>>Papua New Guinea</option>
                                    <option value="PY" <?php echo e($cc?($cc=='PY'?'selected':''):''); ?>>Paraguay</option>
                                    <option value="PE" <?php echo e($cc?($cc=='PE'?'selected':''):''); ?>>Peru</option>
                                    <option value="PH" <?php echo e($cc?($cc=='PH'?'selected':''):''); ?>>Philippines</option>
                                    <option value="PN" <?php echo e($cc?($cc=='PN'?'selected':''):''); ?>>Pitcairn</option>
                                    <option value="PL" <?php echo e($cc?($cc=='PL'?'selected':''):''); ?>>Poland</option>
                                    <option value="PT" <?php echo e($cc?($cc=='PT'?'selected':''):''); ?>>Portugal</option>
                                    <option value="PR" <?php echo e($cc?($cc=='PR'?'selected':''):''); ?>>Puerto Rico</option>
                                    <option value="QA" <?php echo e($cc?($cc=='QA'?'selected':''):''); ?>>Qatar</option>
                                    <option value="RE" <?php echo e($cc?($cc=='RE'?'selected':''):''); ?>>Réunion</option>
                                    <option value="RO" <?php echo e($cc?($cc=='RO'?'selected':''):''); ?>>Romania</option>
                                    <option value="RU" <?php echo e($cc?($cc=='RU'?'selected':''):''); ?>>Russian Federation</option>
                                    <option value="RW" <?php echo e($cc?($cc=='RW'?'selected':''):''); ?>>Rwanda</option>
                                    <option value="BL" <?php echo e($cc?($cc=='BL'?'selected':''):''); ?>>Saint Barthélemy</option>
                                    <option value="SH" <?php echo e($cc?($cc=='SH'?'selected':''):''); ?>>Saint Helena, Ascension and
                                        Tristan da Cunha
                                    </option>
                                    <option value="KN" <?php echo e($cc?($cc=='KN'?'selected':''):''); ?>>Saint Kitts and Nevis</option>
                                    <option value="LC" <?php echo e($cc?($cc=='LC'?'selected':''):''); ?>>Saint Lucia</option>
                                    <option value="MF" <?php echo e($cc?($cc=='MF'?'selected':''):''); ?>>Saint Martin (French part)
                                    </option>
                                    <option value="PM" <?php echo e($cc?($cc=='PM'?'selected':''):''); ?>>Saint Pierre and Miquelon
                                    </option>
                                    <option value="VC" <?php echo e($cc?($cc=='VC'?'selected':''):''); ?>>Saint Vincent and the
                                        Grenadines
                                    </option>
                                    <option value="WS" <?php echo e($cc?($cc=='WS'?'selected':''):''); ?>>Samoa</option>
                                    <option value="SM" <?php echo e($cc?($cc=='SM'?'selected':''):''); ?>>San Marino</option>
                                    <option value="ST" <?php echo e($cc?($cc=='ST'?'selected':''):''); ?>>Sao Tome and Principe</option>
                                    <option value="SA" <?php echo e($cc?($cc=='SA'?'selected':''):''); ?>>Saudi Arabia</option>
                                    <option value="SN" <?php echo e($cc?($cc=='SN'?'selected':''):''); ?>>Senegal</option>
                                    <option value="RS" <?php echo e($cc?($cc=='RS'?'selected':''):''); ?>>Serbia</option>
                                    <option value="SC" <?php echo e($cc?($cc=='SC'?'selected':''):''); ?>>Seychelles</option>
                                    <option value="SL" <?php echo e($cc?($cc=='SL'?'selected':''):''); ?>>Sierra Leone</option>
                                    <option value="SG" <?php echo e($cc?($cc=='SG'?'selected':''):''); ?>>Singapore</option>
                                    <option value="SX" <?php echo e($cc?($cc=='SX'?'selected':''):''); ?>>Sint Maarten (Dutch part)
                                    </option>
                                    <option value="SK" <?php echo e($cc?($cc=='SK'?'selected':''):''); ?>>Slovakia</option>
                                    <option value="SI" <?php echo e($cc?($cc=='SI'?'selected':''):''); ?>>Slovenia</option>
                                    <option value="SB" <?php echo e($cc?($cc=='SB'?'selected':''):''); ?>>Solomon Islands</option>
                                    <option value="SO" <?php echo e($cc?($cc=='SO'?'selected':''):''); ?>>Somalia</option>
                                    <option value="ZA" <?php echo e($cc?($cc=='ZA'?'selected':''):''); ?>>South Africa</option>
                                    <option value="GS" <?php echo e($cc?($cc=='GS'?'selected':''):''); ?>>South Georgia and the South
                                        Sandwich Islands
                                    </option>
                                    <option value="SS" <?php echo e($cc?($cc=='SS'?'selected':''):''); ?>>South Sudan</option>
                                    <option value="ES" <?php echo e($cc?($cc=='ES'?'selected':''):''); ?>>Spain</option>
                                    <option value="LK" <?php echo e($cc?($cc=='LK'?'selected':''):''); ?>>Sri Lanka</option>
                                    <option value="SD" <?php echo e($cc?($cc=='SD'?'selected':''):''); ?>>Sudan</option>
                                    <option value="SR" <?php echo e($cc?($cc=='SR'?'selected':''):''); ?>>Suriname</option>
                                    <option value="SJ" <?php echo e($cc?($cc=='SJ'?'selected':''):''); ?>>Svalbard and Jan Mayen
                                    </option>
                                    <option value="SZ" <?php echo e($cc?($cc=='SZ'?'selected':''):''); ?>>Swaziland</option>
                                    <option value="SE" <?php echo e($cc?($cc=='SE'?'selected':''):''); ?>>Sweden</option>
                                    <option value="CH" <?php echo e($cc?($cc=='CH'?'selected':''):''); ?>>Switzerland</option>
                                    <option value="SY" <?php echo e($cc?($cc=='SY'?'selected':''):''); ?>>Syrian Arab Republic</option>
                                    <option value="TW" <?php echo e($cc?($cc=='TW'?'selected':''):''); ?>>Taiwan, Province of China
                                    </option>
                                    <option value="TJ" <?php echo e($cc?($cc=='TJ'?'selected':''):''); ?>>Tajikistan</option>
                                    <option value="TZ" <?php echo e($cc?($cc=='TZ'?'selected':''):''); ?>>Tanzania, United Republic of
                                    </option>
                                    <option value="TH" <?php echo e($cc?($cc=='TH'?'selected':''):''); ?>>Thailand</option>
                                    <option value="TL" <?php echo e($cc?($cc=='TL'?'selected':''):''); ?>>Timor-Leste</option>
                                    <option value="TG" <?php echo e($cc?($cc=='TG'?'selected':''):''); ?>>Togo</option>
                                    <option value="TK" <?php echo e($cc?($cc=='TK'?'selected':''):''); ?>>Tokelau</option>
                                    <option value="TO" <?php echo e($cc?($cc=='TO'?'selected':''):''); ?>>Tonga</option>
                                    <option value="TT" <?php echo e($cc?($cc=='TT'?'selected':''):''); ?>>Trinidad and Tobago</option>
                                    <option value="TN" <?php echo e($cc?($cc=='TN'?'selected':''):''); ?>>Tunisia</option>
                                    <option value="TR" <?php echo e($cc?($cc=='TR'?'selected':''):''); ?>>Turkey</option>
                                    <option value="TM" <?php echo e($cc?($cc=='TM'?'selected':''):''); ?>>Turkmenistan</option>
                                    <option value="TC" <?php echo e($cc?($cc=='TC'?'selected':''):''); ?>>Turks and Caicos Islands
                                    </option>
                                    <option value="TV" <?php echo e($cc?($cc=='TV'?'selected':''):''); ?>>Tuvalu</option>
                                    <option value="UG" <?php echo e($cc?($cc=='UG'?'selected':''):''); ?>>Uganda</option>
                                    <option value="UA" <?php echo e($cc?($cc=='UA'?'selected':''):''); ?>>Ukraine</option>
                                    <option value="AE" <?php echo e($cc?($cc=='AE'?'selected':''):''); ?>>United Arab Emirates</option>
                                    <option value="GB" <?php echo e($cc?($cc=='GB'?'selected':''):''); ?>>United Kingdom</option>
                                    <option value="US" <?php echo e($cc?($cc=='US'?'selected':''):''); ?>>United States</option>
                                    <option value="UM" <?php echo e($cc?($cc=='UM'?'selected':''):''); ?>>United States Minor Outlying
                                        Islands
                                    </option>
                                    <option value="UY" <?php echo e($cc?($cc=='UY'?'selected':''):''); ?>>Uruguay</option>
                                    <option value="UZ" <?php echo e($cc?($cc=='UZ'?'selected':''):''); ?>>Uzbekistan</option>
                                    <option value="VU" <?php echo e($cc?($cc=='VU'?'selected':''):''); ?>>Vanuatu</option>
                                    <option value="VE" <?php echo e($cc?($cc=='VE'?'selected':''):''); ?>>Venezuela, Bolivarian Republic
                                        of
                                    </option>
                                    <option value="VN" <?php echo e($cc?($cc=='VN'?'selected':''):''); ?>>Viet Nam</option>
                                    <option value="VG" <?php echo e($cc?($cc=='VG'?'selected':''):''); ?>>Virgin Islands, British
                                    </option>
                                    <option value="VI" <?php echo e($cc?($cc=='VI'?'selected':''):''); ?>>Virgin Islands, U.S.</option>
                                    <option value="WF" <?php echo e($cc?($cc=='WF'?'selected':''):''); ?>>Wallis and Futuna</option>
                                    <option value="EH" <?php echo e($cc?($cc=='EH'?'selected':''):''); ?>>Western Sahara</option>
                                    <option value="YE" <?php echo e($cc?($cc=='YE'?'selected':''):''); ?>>Yemen</option>
                                    <option value="ZM" <?php echo e($cc?($cc=='ZM'?'selected':''):''); ?>>Zambia</option>
                                    <option value="ZW" <?php echo e($cc?($cc=='ZW'?'selected':''):''); ?>>Zimbabwe</option>
                                </select>
                            </div>
                        </div>
                        <?php ($tz=\App\Model\BusinessSetting::where('type','timezone')->first()); ?>
                        <?php ($tz=$tz?$tz->value:0); ?>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex"><?php echo e(translate('time_zone')); ?></label>
                                <select name="timezone" class="form-control js-select2-custom">
                                    <option value="UTC" <?php echo e($tz?($tz==''?'selected':''):''); ?>>UTC</option>
                                    <option value="Etc/GMT+12" <?php echo e($tz?($tz=='Etc/GMT+12'?'selected':''):''); ?>>(GMT-12:00)
                                        International Date Line West
                                    </option>
                                    <option value="Pacific/Midway" <?php echo e($tz?($tz=='Pacific/Midway'?'selected':''):''); ?>>
                                        (GMT-11:00)
                                        Midway Island, Samoa
                                    </option>
                                    <option value="Pacific/Honolulu" <?php echo e($tz?($tz=='Pacific/Honolulu'?'selected':''):''); ?>>
                                        (GMT-10:00)
                                        Hawaii
                                    </option>
                                    <option value="US/Alaska" <?php echo e($tz?($tz=='US/Alaska'?'selected':''):''); ?>>(GMT-09:00) Alaska
                                    </option>
                                    <option
                                        value="America/Los_Angeles" <?php echo e($tz?($tz=='America/Los_Angeles'?'selected':''):''); ?>>
                                        (GMT-08:00) Pacific Time (US & Canada)
                                    </option>
                                    <option value="America/Tijuana" <?php echo e($tz?($tz=='America/Tijuana'?'selected':''):''); ?>>
                                        (GMT-08:00)
                                        Tijuana, Baja California
                                    </option>
                                    <option value="US/Arizona" <?php echo e($tz?($tz=='US/Arizona'?'selected':''):''); ?>>(GMT-07:00)
                                        Arizona
                                    </option>
                                    <option value="America/Chihuahua" <?php echo e($tz?($tz=='America/Chihuahua'?'selected':''):''); ?>>
                                        (GMT-07:00) Chihuahua, La Paz, Mazatlan
                                    </option>
                                    <option value="US/Mountain" <?php echo e($tz?($tz=='US/Mountain'?'selected':''):''); ?>>(GMT-07:00)
                                        Mountain
                                        Time (US & Canada)
                                    </option>
                                    <option value="America/Managua" <?php echo e($tz?($tz=='America/Managua'?'selected':''):''); ?>>
                                        (GMT-06:00)
                                        Central America
                                    </option>
                                    <option value="US/Central" <?php echo e($tz?($tz=='US/Central'?'selected':''):''); ?>>(GMT-06:00)
                                        Central Time
                                        (US & Canada)
                                    </option>
                                    <option
                                        value="America/Mexico_City" <?php echo e($tz?($tz=='America/Mexico_City'?'selected':''):''); ?>>
                                        (GMT-06:00) Guadalajara, Mexico City, Monterrey
                                    </option>
                                    <option
                                        value="Canada/Saskatchewan" <?php echo e($tz?($tz=='Canada/Saskatchewan'?'selected':''):''); ?>>
                                        (GMT-06:00) Saskatchewan
                                    </option>
                                    <option value="America/Bogota" <?php echo e($tz?($tz=='America/Bogota'?'selected':''):''); ?>>
                                        (GMT-05:00)
                                        Bogota, Lima, Quito, Rio Branco
                                    </option>
                                    <option value="US/Eastern" <?php echo e($tz?($tz=='US/Eastern'?'selected':''):''); ?>>(GMT-05:00)
                                        Eastern Time
                                        (US & Canada)
                                    </option>
                                    <option value="US/East-Indiana" <?php echo e($tz?($tz=='US/East-Indiana'?'selected':''):''); ?>>
                                        (GMT-05:00)
                                        Indiana (East)
                                    </option>
                                    <option value="Canada/Atlantic" <?php echo e($tz?($tz=='Canada/Atlantic'?'selected':''):''); ?>>
                                        (GMT-04:00)
                                        Atlantic Time (Canada)
                                    </option>
                                    <option value="America/Caracas" <?php echo e($tz?($tz=='America/Caracas'?'selected':''):''); ?>>
                                        (GMT-04:00)
                                        Caracas, La Paz
                                    </option>
                                    <option value="America/Manaus" <?php echo e($tz?($tz=='America/Manaus'?'selected':''):''); ?>>
                                        (GMT-04:00)
                                        Manaus
                                    </option>
                                    <option value="America/Santiago" <?php echo e($tz?($tz=='America/Santiago'?'selected':''):''); ?>>
                                        (GMT-04:00)
                                        Santiago
                                    </option>
                                    <option
                                        value="Canada/Newfoundland" <?php echo e($tz?($tz=='Canada/Newfoundland'?'selected':''):''); ?>>
                                        (GMT-03:30) Newfoundland
                                    </option>
                                    <option value="America/Sao_Paulo" <?php echo e($tz?($tz=='America/Sao_Paulo'?'selected':''):''); ?>>
                                        (GMT-03:00) Brasilia
                                    </option>
                                    <option
                                        value="America/Argentina/Buenos_Aires" <?php echo e($tz?($tz=='America/Argentina/Buenos_Aires'?'selected':''):''); ?>>
                                        (GMT-03:00) Buenos Aires, Georgetown
                                    </option>
                                    <option value="America/Godthab" <?php echo e($tz?($tz=='America/Godthab'?'selected':''):''); ?>>
                                        (GMT-03:00)
                                        Greenland
                                    </option>
                                    <option value="America/Montevideo" <?php echo e($tz?($tz=='America/Montevideo'?'selected':''):''); ?>>
                                        (GMT-03:00) Montevideo
                                    </option>
                                    <option value="America/Noronha" <?php echo e($tz?($tz=='America/Noronha'?'selected':''):''); ?>>
                                        (GMT-02:00)
                                        Mid-Atlantic
                                    </option>
                                    <option
                                        value="Atlantic/Cape_Verde" <?php echo e($tz?($tz=='Atlantic/Cape_Verde'?'selected':''):''); ?>>
                                        (GMT-01:00) Cape Verde Is.
                                    </option>
                                    <option value="Atlantic/Azores" <?php echo e($tz?($tz=='Atlantic/Azores'?'selected':''):''); ?>>
                                        (GMT-01:00)
                                        Azores
                                    </option>
                                    <option value="Africa/Casablanca" <?php echo e($tz?($tz=='Africa/Casablanca'?'selected':''):''); ?>>
                                        (GMT+00:00) Casablanca, Monrovia, Reykjavik
                                    </option>
                                    <option value="Etc/Greenwich" <?php echo e($tz?($tz=='Etc/Greenwich'?'selected':''):''); ?>>
                                        (GMT+00:00)
                                        Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London
                                    </option>
                                    <option value="Europe/Amsterdam" <?php echo e($tz?($tz=='Europe/Amsterdam'?'selected':''):''); ?>>
                                        (GMT+01:00)
                                        Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna
                                    </option>
                                    <option value="Europe/Belgrade" <?php echo e($tz?($tz=='Europe/Belgrade'?'selected':''):''); ?>>
                                        (GMT+01:00)
                                        Belgrade, Bratislava, Budapest, Ljubljana, Prague
                                    </option>
                                    <option value="Europe/Brussels" <?php echo e($tz?($tz=='Europe/Brussels'?'selected':''):''); ?>>
                                        (GMT+01:00)
                                        Brussels, Copenhagen, Madrid, Paris
                                    </option>
                                    <option value="Europe/Sarajevo" <?php echo e($tz?($tz=='Europe/Sarajevo'?'selected':''):''); ?>>
                                        (GMT+01:00)
                                        Sarajevo, Skopje, Warsaw, Zagreb
                                    </option>
                                    <option value="Africa/Lagos" <?php echo e($tz?($tz=='Africa/Lagos'?'selected':''):''); ?>>(GMT+01:00)
                                        West
                                        Central Africa
                                    </option>
                                    <option value="Asia/Amman" <?php echo e($tz?($tz=='Asia/Amman'?'selected':''):''); ?>>(GMT+02:00)
                                        Amman
                                    </option>
                                    <option value="Europe/Athens" <?php echo e($tz?($tz=='Europe/Athens'?'selected':''):''); ?>>
                                        (GMT+02:00)
                                        Athens, Bucharest, Istanbul
                                    </option>
                                    <option value="Asia/Beirut" <?php echo e($tz?($tz=='Asia/Beirut'?'selected':''):''); ?>>(GMT+02:00)
                                        Beirut
                                    </option>
                                    <option value="Africa/Cairo" <?php echo e($tz?($tz=='Africa/Cairo'?'selected':''):''); ?>>(GMT+02:00)
                                        Cairo
                                    </option>
                                    <option value="Africa/Harare" <?php echo e($tz?($tz=='Africa/Harare'?'selected':''):''); ?>>
                                        (GMT+02:00)
                                        Harare, Pretoria
                                    </option>
                                    <option value="Europe/Helsinki" <?php echo e($tz?($tz=='Europe/Helsinki'?'selected':''):''); ?>>
                                        (GMT+02:00)
                                        Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius
                                    </option>
                                    <option value="Asia/Jerusalem" <?php echo e($tz?($tz=='Asia/Jerusalem'?'selected':''):''); ?>>
                                        (GMT+02:00)
                                        Jerusalem
                                    </option>
                                    <option value="Europe/Minsk" <?php echo e($tz?($tz=='Europe/Minsk'?'selected':''):''); ?>>(GMT+02:00)
                                        Minsk
                                    </option>
                                    <option value="Africa/Windhoek" <?php echo e($tz?($tz=='Africa/Windhoek'?'selected':''):''); ?>>
                                        (GMT+02:00)
                                        Windhoek
                                    </option>
                                    <option value="Asia/Kuwait" <?php echo e($tz?($tz=='Asia/Kuwait'?'selected':''):''); ?>>(GMT+03:00)
                                        Kuwait,
                                        Riyadh, Baghdad
                                    </option>
                                    <option value="Europe/Moscow" <?php echo e($tz?($tz=='Europe/Moscow'?'selected':''):''); ?>>
                                        (GMT+03:00)
                                        Moscow, St. Petersburg, Volgograd
                                    </option>
                                    <option value="Africa/Nairobi" <?php echo e($tz?($tz=='Africa/Nairobi'?'selected':''):''); ?>>
                                        (GMT+03:00)
                                        Nairobi
                                    </option>
                                    <option value="Asia/Tbilisi" <?php echo e($tz?($tz=='Asia/Tbilisi'?'selected':''):''); ?>>(GMT+03:00)
                                        Tbilisi
                                    </option>
                                    <option value="Asia/Tehran" <?php echo e($tz?($tz=='Asia/Tehran'?'selected':''):''); ?>>(GMT+03:30)
                                        Tehran
                                    </option>
                                    <option value="Asia/Muscat" <?php echo e($tz?($tz=='Asia/Muscat'?'selected':''):''); ?>>(GMT+04:00)
                                        Abu Dhabi,
                                        Muscat
                                    </option>
                                    <option value="Asia/Baku" <?php echo e($tz?($tz=='Asia/Baku'?'selected':''):''); ?>>(GMT+04:00) Baku
                                    </option>
                                    <option value="Asia/Yerevan" <?php echo e($tz?($tz=='Asia/Yerevan'?'selected':''):''); ?>>(GMT+04:00)
                                        Yerevan
                                    </option>
                                    <option value="Asia/Kabul" <?php echo e($tz?($tz=='Asia/Kabul'?'selected':''):''); ?>>(GMT+04:30)
                                        Kabul
                                    </option>
                                    <option value="Asia/Yekaterinburg" <?php echo e($tz?($tz=='Asia/Yekaterinburg'?'selected':''):''); ?>>
                                        (GMT+05:00) Yekaterinburg
                                    </option>
                                    <option value="Asia/Karachi" <?php echo e($tz?($tz=='Asia/Karachi'?'selected':''):''); ?>>(GMT+05:00)
                                        Islamabad, Karachi, Tashkent
                                    </option>
                                    <option value="Asia/Calcutta" <?php echo e($tz?($tz=='Asia/Calcutta'?'selected':''):''); ?>>
                                        (GMT+05:30)
                                        Chennai, Kolkata, Mumbai, New Delhi
                                    </option>
                                    <!-- <option value="Asia/Calcutta"  <?php echo e($tz?($tz=='Asia/Calcutta'?'selected':''):''); ?>>(GMT+05:30) Sri Jayawardenapura</option> -->
                                    <option value="Asia/Katmandu" <?php echo e($tz?($tz=='Asia/Katmandu'?'selected':''):''); ?>>
                                        (GMT+05:45)
                                        Kathmandu
                                    </option>
                                    <option value="Asia/Almaty" <?php echo e($tz?($tz=='Asia/Almaty'?'selected':''):''); ?>>(GMT+06:00)
                                        Almaty,
                                        Novosibirsk
                                    </option>
                                    <option value="Asia/Dhaka" <?php echo e($tz?($tz=='Asia/Dhaka'?'selected':''):''); ?>>(GMT+06:00)
                                        Astana,
                                        Dhaka
                                    </option>
                                    <option value="Asia/Rangoon" <?php echo e($tz?($tz=='Asia/Rangoon'?'selected':''):''); ?>>(GMT+06:30)
                                        Yangon
                                        (Rangoon)
                                    </option>
                                    <option value="Asia/Bangkok" <?php echo e($tz?($tz=='"Asia/Bangkok'?'selected':''):''); ?>>(GMT+07:00)
                                        Bangkok, Hanoi, Jakarta
                                    </option>
                                    <option value="Asia/Krasnoyarsk" <?php echo e($tz?($tz=='Asia/Krasnoyarsk'?'selected':''):''); ?>>
                                        (GMT+07:00)
                                        Krasnoyarsk
                                    </option>
                                    <option value="Asia/Hong_Kong" <?php echo e($tz?($tz=='Asia/Hong_Kong'?'selected':''):''); ?>>
                                        (GMT+08:00)
                                        Beijing, Chongqing, Hong Kong, Urumqi
                                    </option>
                                    <option value="Asia/Kuala_Lumpur" <?php echo e($tz?($tz=='Asia/Kuala_Lumpur'?'selected':''):''); ?>>
                                        (GMT+08:00) Kuala Lumpur, Singapore
                                    </option>
                                    <option value="Asia/Irkutsk" <?php echo e($tz?($tz=='Asia/Irkutsk'?'selected':''):''); ?>>(GMT+08:00)
                                        Irkutsk,
                                        Ulaan Bataar
                                    </option>
                                    <option value="Australia/Perth" <?php echo e($tz?($tz=='Australia/Perth'?'selected':''):''); ?>>
                                        (GMT+08:00)
                                        Perth
                                    </option>
                                    <option value="Asia/Taipei" <?php echo e($tz?($tz=='Asia/Taipei'?'selected':''):''); ?>>(GMT+08:00)
                                        Taipei
                                    </option>
                                    <option value="Asia/Tokyo" <?php echo e($tz?($tz=='Asia/Tokyo'?'selected':''):''); ?>>(GMT+09:00)
                                        Osaka,
                                        Sapporo, Tokyo
                                    </option>
                                    <option value="Asia/Seoul" <?php echo e($tz?($tz=='Asia/Seoul'?'selected':''):''); ?>>(GMT+09:00)
                                        Seoul
                                    </option>
                                    <option value="Asia/Yakutsk" <?php echo e($tz?($tz=='Asia/Yakutsk'?'selected':''):''); ?>>(GMT+09:00)
                                        Yakutsk
                                    </option>
                                    <option value="Australia/Adelaide" <?php echo e($tz?($tz=='Australia/Adelaide'?'selected':''):''); ?>>
                                        (GMT+09:30) Adelaide
                                    </option>
                                    <option value="Australia/Darwin" <?php echo e($tz?($tz=='Australia/Darwin'?'selected':''):''); ?>>
                                        (GMT+09:30)
                                        Darwin
                                    </option>
                                    <option value="Australia/Brisbane" <?php echo e($tz?($tz=='Australia/Brisbane'?'selected':''):''); ?>>
                                        (GMT+10:00) Brisbane
                                    </option>
                                    <option value="Australia/Canberra" <?php echo e($tz?($tz=='Australia/Canberra'?'selected':''):''); ?>>
                                        (GMT+10:00) Canberra, Melbourne, Sydney
                                    </option>
                                    <option value="Australia/Hobart" <?php echo e($tz?($tz=='Australia/Hobart'?'selected':''):''); ?>>
                                        (GMT+10:00)
                                        Hobart
                                    </option>
                                    <option value="Pacific/Guam" <?php echo e($tz?($tz=='Pacific/Guam'?'selected':''):''); ?>>(GMT+10:00)
                                        Guam,
                                        Port Moresby
                                    </option>
                                    <option value="Asia/Vladivostok" <?php echo e($tz?($tz=='Asia/Vladivostok'?'selected':''):''); ?>>
                                        (GMT+10:00)
                                        Vladivostok
                                    </option>
                                    <option value="Asia/Magadan" <?php echo e($tz?($tz=='Asia/Magadan'?'selected':''):''); ?>>(GMT+11:00)
                                        Magadan,
                                        Solomon Is., New Caledonia
                                    </option>
                                    <option value="Pacific/Auckland" <?php echo e($tz?($tz=='Pacific/Auckland'?'selected':''):''); ?>>
                                        (GMT+12:00)
                                        Auckland, Wellington
                                    </option>
                                    <option value="Pacific/Fiji" <?php echo e($tz?($tz=='Pacific/Fiji'?'selected':''):''); ?>>(GMT+12:00)
                                        Fiji,
                                        Kamchatka, Marshall Is.
                                    </option>
                                    <option value="Pacific/Tongatapu" <?php echo e($tz?($tz=='Pacific/Tongatapu'?'selected':''):''); ?>>
                                        (GMT+13:00) Nuku'alofa
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex" for="language"><?php echo e(translate('language')); ?></label>
                                <select name="language" class="form-control js-select2-custom">
                                    <?php if(isset($business_setting['language'])): ?>
                                    <?php $__currentLoopData = json_decode($business_setting['language']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->code); ?>" <?php echo e($item->default == 1?'selected':''); ?>><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex"><?php echo e(translate('company_address')); ?></label>
                                <input type="text" value="<?php echo e($business_setting['shop_address']); ?>"
                                    name="shop_address" class="form-control"
                                    placeholder="<?php echo e(translate('your_shop_address')); ?>"
                                    required>
                            </div>
                        </div>
                        <?php ($default_location=\App\CPU\Helpers::get_business_settings('default_location')); ?>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex">
                                    <?php echo e(translate('latitude')); ?>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right" title="<?php echo e(translate('copy_the_latitude_of_your_business_location_from_Google_Maps_and_paste_it_here')); ?>">
                                        <img width="16" src="<?php echo e(asset('/public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                    </span>
                                </label>
                                <input class="form-control" type="text" name="latitude"
                                    value="<?php echo e(isset($default_location)?$default_location['lat']:''); ?>"
                                    placeholder="<?php echo e(translate('latitude')); ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex">
                                    <?php echo e(translate('longitude')); ?>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right" title="<?php echo e(translate('copy_the_longitude_of_your_business_location_from_Google_Maps_and_paste_it_here')); ?>">
                                        <img width="16" src="<?php echo e(asset('/public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                    </span>
                                </label>
                                <input class="form-control" type="text" name="longitude"
                                    value="<?php echo e(isset($default_location)?$default_location['lng']:''); ?>"
                                    placeholder="<?php echo e(translate('longitude')); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Business Information -->
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0 text-capitalize d-flex gap-1">
                        <i class="tio-briefcase"></i>
                        <?php echo e(translate('business_Information')); ?>

                    </h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-end">
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex" for="currency"><?php echo e(translate('currency')); ?> </label>
                                <select name="currency_id" class="form-control js-select2-custom">
                                    <?php $__currentLoopData = $CurrencyList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $business_setting['system_default_currency'] ?'selected':''); ?>>
                                            <?php echo e($item->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <?php ($config=\App\CPU\Helpers::get_business_settings('currency_symbol_position')); ?>
                            <label class="title-color d-flex"><?php echo e(translate('currency_Position')); ?></label>
                            <div class="form-control form-group d-flex gap-2">
                                <!-- Custom Radio -->
                                <div class="custom-control custom-radio flex-grow-1">
                                    <input type="radio" class="custom-control-input" value="left" name="currency_symbol_position" id="currency_position_left" <?php echo e($business_setting['currency_symbol_position'] == 'left' ? 'checked':''); ?>>
                                    <label class="custom-control-label" for="currency_position_left">(<?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?>) <?php echo e(translate('left')); ?></label>
                                </div>
                                <!-- End Custom Radio -->

                                <!-- Custom Radio -->
                                <div class="custom-control custom-radio flex-grow-1">
                                    <input type="radio" class="custom-control-input" value="right" name="currency_symbol_position" id="currency_position_right" <?php echo e($business_setting['currency_symbol_position'] == 'right' ? 'checked':''); ?>>
                                    <label class="custom-control-label" for="currency_position_right"><?php echo e(translate('right')); ?> (<?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?>)</label>
                                </div>
                                <!-- End Custom Radio -->
                            </div>

                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <label class="title-color d-flex">
                                <?php echo e(translate('forgot_password_verification_by')); ?>

                                <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right" title="<?php echo e(translate('set_how_users_of_recover_their_forgotten_password')); ?>">
                                    <img width="16" src="<?php echo e(asset('/public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                </span>
                            </label>
                            <div class="form-control form-group d-flex gap-2">
                                <!-- Custom Radio -->
                                <div class="custom-control custom-radio flex-grow-1">
                                    <input type="radio" class="custom-control-input" value="email" name="forgot_password_verification" id="verification_by_email" <?php echo e($business_setting['forgot_password_verification'] == 'email' ? 'checked':''); ?>>
                                    <label class="custom-control-label" for="verification_by_email"><?php echo e(translate('email')); ?></label>
                                </div>
                                <!-- End Custom Radio -->

                                <!-- Custom Radio -->
                                <div class="custom-control custom-radio flex-grow-1">
                                    <input type="radio" class="custom-control-input" value="phone" name="forgot_password_verification" id="verification_by_phone" <?php echo e($business_setting['forgot_password_verification'] == 'phone' ? 'checked':''); ?>>
                                    <label class="custom-control-label" for="verification_by_phone"><?php echo e(translate('phone (OTP)')); ?></label>
                                </div>
                                <!-- End Custom Radio -->
                            </div>

                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <label class="title-color d-flex"><?php echo e(translate('business_model')); ?></label>
                            <div class="form-control form-group d-flex gap-2">
                                <!-- Custom Radio -->
                                <div class="custom-control custom-radio flex-grow-1">
                                    <input type="radio" class="custom-control-input" value="single" name="business_mode" id="single_vendor" <?php echo e($business_setting['business_mode'] == 'single' ? 'checked':''); ?>>
                                    <label class="custom-control-label" for="single_vendor"><?php echo e(translate('single_vendor')); ?></label>
                                </div>
                                <!-- End Custom Radio -->

                                <!-- Custom Radio -->
                                <div class="custom-control custom-radio flex-grow-1">
                                    <input type="radio" class="custom-control-input" value="multi" name="business_mode" id="multi_vendor" <?php echo e($business_setting['business_mode'] == 'multi' ? 'checked':''); ?>>
                                    <label class="custom-control-label" for="multi_vendor"><?php echo e(translate('multi_vendor')); ?></label>
                                </div>
                                <!-- End Custom Radio -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <div class="d-flex justify-content-between align-items-center gap-10 form-control">
                                    <span class="title-color">
                                        <?php echo e(translate('email_Verification')); ?>

                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right" title="<?php echo e(translate('if_enabled_users_can_receive_verification_codes_on_their_registered_email_addresses')); ?>">
                                            <img width="16" src="<?php echo e(asset('/public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                        </span>
                                    </span>

                                    <label class="switcher" for="email_verification"
                                    onclick="toogleModal(event,'email_verification','email-verification-off.png','email-verification-on.png','<?php echo e(translate('want_to_Turn_OFF_the_Email_Verification')); ?>','<?php echo e(translate('want_to_Turn_ON_the_Email_Verification')); ?>',`<p><?php echo e(translate('if_disabled_users_would_not_receive_verification_codes_on_their_registered_email_addresses')); ?></p>`,`<p><?php echo e(translate('if_enabled_users_will_receive_verification_codes_on_their_registered_email_addresses')); ?></p>`)">
                                        <input type="checkbox" class="switcher_input" name="email_verification" id="email_verification" value="1" <?php echo e($business_setting['email_verification'] == 1 ? 'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                            <?php ($phone_verification=\App\CPU\Helpers::get_business_settings('phone_verification')); ?>
                            <!-- phone verification is otp verification -->
                            <div class="form-group">
                                <div class="d-flex justify-content-between align-items-center gap-10 form-control">
                                    <span class="title-color">
                                        <?php echo e(translate('OTP_Verification')); ?>

                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right" title="<?php echo e(translate('if_enabled_users_can_receive_verification_codes_via_OTP_messages_on_their_registered_phone_numbers')); ?>">
                                            <img width="16" src="<?php echo e(asset('/public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                        </span>
                                    </span>

                                    <label class="switcher" for="otp_verification"onclick="toogleModal(event,'otp_verification','otp-verification-off.png','otp-verification-on.png','<?php echo e(translate('want_to_Turn_OFF_the_OTP_Verification')); ?>','<?php echo e(translate('want_to_Turn_ON_the_OTP_Verification')); ?>',`<p><?php echo e(translate('if_disabled_users_would_not_receive_verification_codes_on_their_registered_phone_numbers')); ?></p>`,`<p><?php echo e(translate('if_enabled_users_will_receive_verification_codes_on_their_registered_phone_numbers')); ?></p>`)">
                                        <input type="checkbox" class="switcher_input" name="phone_verification" id="otp_verification" value="1" <?php echo e($phone_verification == 1 ? 'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex">
                                    <?php echo e(translate('pagination')); ?>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right" title="<?php echo e(translate('this_number_indicates_how_much_data_will_be_shown_in_the_list_or_table')); ?>">
                                        <img width="16" src="<?php echo e(asset('/public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                    </span>
                                </label>
                                <input type="number" value="<?php echo e($business_setting['pagination_limit']); ?>"
                                    name="pagination_limit" class="form-control" placeholder="25">
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex"><?php echo e(translate('Company_Copyright_Text')); ?></label>
                                <input class="form-control" type="text" name="company_copyright_text"
                                    value="<?php echo e($business_setting['company_copyright_text']); ?>"
                                    placeholder="<?php echo e(translate('company_copyright_text')); ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label
                                    class="input-label text-capitalize"><?php echo e(translate('digit_after_decimal_point')); ?>( <?php echo e(translate('ex')); ?> : 0.00)</label>
                                <input type="number" value="<?php echo e($business_setting['decimal_point_settings']); ?>"
                                       name="decimal_point_settings" class="form-control" min="0" placeholder="<?php echo e(translate('4')); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- App Downlaod Info -->
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0 text-capitalize d-flex gap-2">
                        <i class="tio-briefcase"></i>
                        <?php echo e(translate('app_download_info')); ?>

                    </h5>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-lg-6">
                            <div class="d-flex gap-2 align-items-center text-capitalize mb-3">
                                <img width="22" src="<?php echo e(asset('/public/assets/back-end/img/apple.png')); ?>" alt="">
                                <?php echo e(translate('apple_store')); ?>:
                            </div>

                            <?php ($app_store_download = \App\CPU\Helpers::get_business_settings('download_app_apple_stroe')); ?>

                            <div class="bg-aliceblue p-3 rounded">
                                <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
                                    <span class="title-color text-capitalize">
                                        <?php echo e(translate('download_link')); ?>

                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right" title="<?php echo e(translate('if_enabled_the_download_button_from_the_App_Store_will_be_visible_in_the_Footer_section')); ?>">
                                            <img width="16" src="<?php echo e(asset('/public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                        </span>
                                    </span>

                                    <label class="switcher" for="app_store_download_status"
                                    onclick="toogleModal(event,'app_store_download_status','app-store-download-off.png','app-store-download-on.png','<?php echo e(translate('want_to_Turn_OFF_the_App_Store_button')); ?>','<?php echo e(translate('want_to_Turn_ON_the_App_Store_button')); ?>',`<p><?php echo e(translate('if_disabled_the_App_Store_button_will_be_hidden_from_the_website_footer')); ?></p>`,`<p><?php echo e(translate('if_enabled_everyone_can_see_the_App_Store_button_in_the_website_footer')); ?></p>`)">
                                        <input type="checkbox" value="1" class="switcher_input" name="app_store_download_status" id="app_store_download_status" <?php echo e($app_store_download['status'] == 1 ? 'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                                <input type="url" name="app_store_download_url" class="form-control" value="<?php echo e($app_store_download['link'] ?? ''); ?>" placeholder="<?php echo e(translate('Ex: https://www.apple.com/app-store/')); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex gap-2 align-items-center text-capitalize mb-3">
                                <img width="22" src="<?php echo e(asset('/public/assets/back-end/img/play_store.png')); ?>" alt="">
                                <?php echo e(translate('google_play_store')); ?>:
                            </div>

                            <?php ($play_store_download = \App\CPU\Helpers::get_business_settings('download_app_google_stroe')); ?>

                            <div class="bg-aliceblue p-3 rounded">
                                <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
                                    <span class="title-color text-capitalize">
                                        <?php echo e(translate('download_link')); ?>

                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right" title="<?php echo e(translate('if_enabled_the_Google_Play_Store_will_be_visible_in_the_website_footer_section')); ?>">
                                            <img width="16" src="<?php echo e(asset('/public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                        </span>
                                    </span>

                                    <label class="switcher" for="play_store_download_status"
                                        onclick="toogleModal(event,'play_store_download_status','play-store-download-off.png','app-store-download-on.png','<?php echo e(translate('want_to_Turn_OFF_the_Google_Play_Store_button')); ?>','<?php echo e(translate('want_to_Turn_ON_the_Google_Play_Store_button')); ?>',`<p><?php echo e(translate('if_disabled_the_Google_Play_Store_button_will_be_hidden_from_the_website_footer')); ?></p>`,`<p><?php echo e(translate('if_enabled_everyone_can_see_the_Google_Play_Store_button_in_the_website_footer')); ?></p>`)"
                                        >
                                        <input type="checkbox" value="1" class="switcher_input" name="play_store_download_status" id="play_store_download_status" <?php echo e($play_store_download['status'] == 1 ? 'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                                <input type="url" name="play_store_download_url" class="form-control" value="<?php echo e($play_store_download['link'] ?? ''); ?>" placeholder="<?php echo e(translate('Ex: https://play.google.com/store/apps')); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-0 d-flex align-items-center gap-2">
                                <img src="<?php echo e(asset('/public/assets/back-end/img/website-color.png')); ?>" alt="">
                                <?php echo e(translate('website_Color')); ?>

                            </h5>
                        </div>
                        <div class="card-body d-flex flex-wrap gap-4 justify-content-around">
                            <?php ($colors=\App\Model\BusinessSetting::where(['type'=>'colors'])->first()); ?>
                            <?php if(isset($colors)): ?>
                                <?php ($data=json_decode($colors['value'])); ?>
                            <?php else: ?>
                                <?php (\Illuminate\Support\Facades\DB::table('business_settings')->insert([
                                        'type'=>'colors',
                                        'value'=>json_encode(
                                            [
                                                'primary'=>null,
                                                'secondary'=>null,
                                            ])
                                    ])); ?>
                                <?php ($colors=\App\Model\BusinessSetting::where(['type'=>'colors'])->first()); ?>
                                <?php ($data=json_decode($colors['value'])); ?>
                            <?php endif; ?>
                            <div class="form-group">
                                <input type="color" name="primary" value="<?php echo e($business_setting['primary_color']); ?>"
                                class="form-control form-control_color">
                                <div class="text-center">
                                    <div class="title-color mb-4 mt-3"><?php echo e(strtoupper($business_setting['primary_color'])); ?></div>
                                    <label class="title-color text-capitalize"><?php echo e(translate('primary_Color')); ?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="color" name="secondary" value="<?php echo e($business_setting['secondary_color']); ?>"
                                class="form-control form-control_color">
                                <div class="text-center">
                                    <div class="title-color mb-4 mt-3"><?php echo e(strtoupper($business_setting['secondary_color'])); ?></div>
                                    <label class="title-color text-capitalize">
                                        <?php echo e(translate('secondary_Color')); ?>

                                    </label>
                                </div>
                            </div>

                            <?php if(theme_root_path() == 'theme_aster'): ?>
                            <div class="form-group">
                                <input type="color" name="primary_light" value="<?php echo e($business_setting['primary_color_light'] ?? '#CFDFFB'); ?>"
                                       class="form-control form-control_color">
                                <div class="text-center">
                                    <div class="title-color mb-4 mt-3"><?php echo e($business_setting['primary_color_light'] ?? '#CFDFFB'); ?></div>
                                    <label class="title-color text-capitalize"><?php echo e(translate('primary_Light_Color')); ?></label>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                                <img src="<?php echo e(asset('/public/assets/back-end/img/header-logo.png')); ?>" alt="">
                                <?php echo e(translate('website_Header_Logo')); ?>

                            </h5>
                            <span class="badge badge-soft-info"><?php echo e(THEME_RATIO[theme_root_path()]['Main website Logo']); ?></span>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-around">
                            <center>
                                <img height="60" id="viewerWL"
                                        onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                        src="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e(\App\Model\BusinessSetting::where(['type' => 'company_web_logo'])->pluck('value')[0]); ?>">
                            </center>
                            <div class="mt-4 position-relative">
                                <input type="file" name="company_web_logo" id="customFileUploadWL"
                                        class="custom-file-input"
                                        accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                <label class="custom-file-label"
                                        for="customFileUploadWL"><?php echo e(translate('choose_File')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                                <img src="<?php echo e(asset('/public/assets/back-end/img/footer-logo.png')); ?>" alt="">
                                <?php echo e(translate('website_Footer_Logo')); ?>

                            </h5>
                            <span class="badge badge-soft-info"><?php echo e(THEME_RATIO[theme_root_path()]['Main website Logo']); ?></span>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-around">
                            <center>
                                <img height="60" id="viewerWFL"
                                    onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                    src="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e(\App\Model\BusinessSetting::where(['type' => 'company_footer_logo'])->pluck('value')[0]); ?>">
                            </center>
                            <div class="position-relative mt-4">
                                <input type="file" name="company_footer_logo" id="customFileUploadWFL"
                                        class="custom-file-input"
                                        accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                <label class="custom-file-label"
                                        for="customFileUploadWFL"><?php echo e(translate('choose_File')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                                <img src="<?php echo e(asset('/public/assets/back-end/img/footer-logo.png')); ?>" alt="">
                                <?php echo e(translate('website_Favicon')); ?>

                            </h5>
                            <span class="badge badge-soft-info">( <?php echo e(translate('ratio')); ?> 1:1)</span>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-around">
                            <center>
                                <img height="60" id="viewerFI"
                                        onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                        src="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e(\App\Model\BusinessSetting::where(['type' => 'company_fav_icon'])->pluck('value')[0]); ?>">
                            </center>
                            <div class="position-relative mt-4">
                                <input type="file" name="company_fav_icon" id="customFileUploadFI"
                                        class="custom-file-input"
                                        accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                <label class="custom-file-label"
                                        for="customFileUploadFI"><?php echo e(translate('choose_File')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                                <img src="<?php echo e(asset('/public/assets/back-end/img/footer-logo.png')); ?>" alt="">
                                <?php echo e(translate('loading_Gif')); ?>

                            </h5>
                            <span class="badge badge-soft-info">( <?php echo e(translate('ratio')); ?> 1:1 )</span>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-around">
                            <center>
                                <img height="60" id="viewerLoader"
                                        onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                        src="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e(\App\CPU\Helpers::get_business_settings('loader_gif')); ?>">
                            </center>
                            <div class="position-relative mt-4">
                                <input type="file" name="loader_gif" id="customFileUploadLoader"
                                        class="custom-file-input"
                                        accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                <label class="custom-file-label"
                                        for="customFileUploadLoader"><?php echo e(translate('choose_File')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                                <img src="<?php echo e(asset('/public/assets/back-end/img/footer-logo.png')); ?>" alt="">
                                <?php echo e(translate('App_Logo')); ?>

                            </h5>
                            <span class="badge badge-soft-info">( 100X60 px )</span>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-around">
                            <center>
                                <img height="60" id="viewerML"
                                        onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                        src="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e(\App\Model\BusinessSetting::where(['type' => 'company_mobile_logo'])->pluck('value')[0]); ?>">
                            </center>
                            <div class="mt-4 position-relative">
                                <input type="file" name="company_mobile_logo" id="customFileUploadML"
                                        class="custom-file-input"
                                        accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                <label class="custom-file-label"
                                        for="customFileUploadML"><?php echo e(translate('choose_File')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn--primary text-capitalize px-4"><?php echo e(translate('save_information')); ?></button>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/tags-input.min.js"></script>
    <script src="<?php echo e(asset('public/assets/select2/js/select2.min.js')); ?>"></script>
    <script>

        $("#customFileUploadShop").change(function () {
            read_image(this, 'viewerShop');
        });

        $("#customFileUploadWL").change(function () {
            read_image(this, 'viewerWL');
        });

        $("#customFileUploadWFL").change(function () {
            read_image(this, 'viewerWFL');
        });

        $("#customFileUploadML").change(function () {
            read_image(this, 'viewerML');
        });

        $("#customFileUploadFI").change(function () {
            read_image(this, 'viewerFI');
        });

        $("#customFileUploadLoader").change(function () {
            read_image(this, 'viewerLoader');
        });

        function read_image(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#' + id).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });

    </script>
    <script>
        $(document).ready(function () {
            $('.color-var-select').select2({
                templateResult: colorCodeSelect,
                templateSelection: colorCodeSelect,
                escapeMarkup: function (m) {
                    return m;
                }
            });

            function colorCodeSelect(state) {
                var colorCode = $(state.element).val();
                if (!colorCode) return state.text;
                return "<span class='color-preview' style='background-color:" + colorCode + ";'></span>" + state.text;
            }
        });
    </script>

    <script>
        <?php ($language=\App\Model\BusinessSetting::where('type','pnc_language')->first()); ?>
        <?php ($language = $language->value ?? null); ?>
        let language = <?php echo e($language); ?>;
        $('#language').val(language);
    </script>

    <script>
        $('#maintenance_mode_form').on('submit', function(e){
            e.preventDefault();
            <?php if(env('APP_MODE')=='demo'): ?>
                call_demo();
                setTimeout(() => {
                    location.reload();
                }, 3000);
            <?php else: ?>
                $.get({
                    url: '<?php echo e(route('admin.maintenance-mode')); ?>',
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('#loading').fadeIn();
                    },
                    success: function (data) {
                        toastr.success(data.message);
                        location.reload();
                    },
                    complete: function () {
                        $('#loading').fadeOut();
                    },
                });
            <?php endif; ?>
        });

        function currency_symbol_position(route) {
            $.get({
                url: route,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#loading').fadeIn();
                },
                success: function (data) {
                    toastr.success(data.message);
                },
                complete: function () {
                    $('#loading').fadeOut();
                },
            });
        }
    </script>

    <script>
        $(document).ready(function () {
            $("#phone_verification_on").click(function () {
                <?php if(env('APP_MODE')!='demo'): ?>
                if ($('#email_verification_on').prop("checked") == true) {
                    $('#email_verification_off').prop("checked", true);
                    $('#email_verification_on').prop("checked", false);
                    const message = "<?php echo e(translate('both_Phone_&_Email_verification_can_not_be_active_at_a_time')); ?>";
                    toastr.info(message);
                }
                <?php else: ?>
                call_demo();
                <?php endif; ?>
            });
            $("#email_verification_on").click(function () {
                if ($('#phone_verification_on').prop("checked") == true) {
                    $('#phone_verification_off').prop("checked", true);
                    $('#phone_verification_on').prop("checked", false);
                    const message = "<?php echo e(translate('both_Phone_&_Email_verification_can_not_be_active_at_a_time')); ?>";
                    toastr.info(message);
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/buyandb/public_html/resources/views/admin-views/business-settings/website-info.blade.php ENDPATH**/ ?>