<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo e(app_config('AppTitle')); ?></title>
    <link rel="icon" type="image/x-icon" href="<?php echo asset(app_config('AppFav')); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>

    
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&ver=5.7.1' rel='stylesheet' type='text/css'>
    <?php echo Html::style("assets/libs/bootstrap/css/bootstrap.min.css"); ?>

    <?php echo Html::style("assets/libs/bootstrap-toggle/css/bootstrap-toggle.min.css"); ?>

    <?php echo Html::style("assets/libs/font-awesome/css/font-awesome.min.css"); ?>

    <?php echo Html::style("assets/libs/alertify/css/alertify.css"); ?>

    <?php echo Html::style("assets/libs/alertify/css/alertify-bootstrap-3.css"); ?>

    <?php echo Html::style("assets/libs/bootstrap-select/css/bootstrap-select.min.css"); ?>

    

    <?php echo $__env->yieldContent('style'); ?>

    
    <?php echo Html::style("assets/css/style.css"); ?>

    <?php echo Html::style("assets/css/admin.css"); ?>

    <?php echo Html::style("assets/css/responsive.css"); ?>


</head>


<body class="has-left-bar has-top-bar <?php if(Auth::user()->menu_open==1): ?> left-bar-open <?php endif; ?>">

<nav id="left-nav" class="left-nav-bar">
    <div class="nav-top-sec">
        <div class="app-logo">
            <img src="<?php echo asset(app_config('AppLogo')); ?>" alt="logo" class="bar-logo" width="145px"
                 height="35px">
        </div>

        <a href="#" id="bar-setting" class="bar-setting"><i class="fa fa-bars"></i></a>
    </div>
    <div class="nav-bottom-sec">
        <ul class="left-navigation" id="left-navigation">

            
            <li <?php if(Request::path()== 'admin/dashboard'): ?> class="active" <?php endif; ?>><a
                        href="<?php echo e(url('admin/dashboard')); ?>"><span class="menu-text"><?php echo e(language_data('Dashboard')); ?></span>
                    <span class="menu-thumb"><i class="fa fa-dashboard"></i></span></a></li>


                
                <!--<li class="has-sub <?php if(Request::path()== 'clients/all' OR Request::path()=='clients/add' OR Request::path()=='clients/view/'.view_id() OR Request::path()=='clients/export-n-import' OR Request::path()== 'clients/groups'): ?> sub-open init-sub-open <?php endif; ?>">-->
                <!--    <a href="#"><span class="menu-text">Users</span> <span-->
                <!--                class="arrow"></span><span class="menu-thumb"><i class="fa fa-user"></i></span></a>-->
                <!--    <ul class="sub">-->

                <!--        <li <?php if(Request::path()== 'clients/all' OR Request::path()=='clients/view/'.view_id()): ?> class="active" <?php endif; ?>>-->
                <!--            <a href=<?php echo e(url('clients/all')); ?>><span-->
                <!--                        class="menu-text">All Users</span> <span-->
                <!--                        class="menu-thumb"><i class="fa fa-user"></i></span></a></li>-->

                <!--        <li <?php if(Request::path()== 'clients/add'): ?> class="active" <?php endif; ?>><a-->
                <!--                    href=<?php echo e(url('clients/add')); ?>><span-->
                <!--                        class="menu-text">Add New User</span> <span-->
                <!--                        class="menu-thumb"><i class="fa fa-user-plus"></i></span></a></li>-->

                <!--        <li <?php if(Request::path()== 'clients/groups'): ?> class="active" <?php endif; ?>><a-->
                <!--                    href="<?php echo e(url('clients/groups')); ?>"><span-->
                <!--                        class="menu-text">Users Groups</span> <span-->
                <!--                        class="menu-thumb"><i class="fa fa-users"></i></span></a></li>-->

                <!--        <li <?php if(Request::path()== 'clients/export-n-import'): ?> class="active" <?php endif; ?>><a-->
                <!--                    href=<?php echo e(url('clients/export-n-import')); ?>><span-->
                <!--                        class="menu-text">Export and Import Users</span> <span-->
                <!--                        class="menu-thumb"><i class="fa fa-file-excel-o"></i></span></a></li>-->

                <!--    </ul>-->
                <!--</li>-->



                

            
            <li class="has-sub <?php if(Request::path()== 'keywords/all' OR Request::path()=='keywords/add' OR Request::path()=='keywords/view/'.view_id() OR Request::path()=='keywords/settings'): ?> sub-open init-sub-open <?php endif; ?>">
                <a href="#"><span class="menu-text"><?php echo e(language_data('Keywords')); ?></span> <span
                            class="arrow"></span><span class="menu-thumb"><i class="fa fa-keyboard-o"></i></span></a>
                <ul class="sub">

                    <li <?php if(Request::path()== 'keywords/all' OR Request::path()=='keywords/view/'.view_id()): ?> class="active" <?php endif; ?>>
                        <a href=<?php echo e(url('keywords/all')); ?>><span class="menu-text"><?php echo e(language_data('All Keywords')); ?></span>
                            <span class="menu-thumb"><i class="fa fa-list"></i></span></a></li>

                    <li <?php if(Request::path()== 'keywords/add'): ?> class="active" <?php endif; ?>><a
                                href=<?php echo e(url('keywords/add')); ?>><span
                                    class="menu-text"><?php echo e(language_data('Add New Keyword')); ?></span> <span
                                    class="menu-thumb"><i class="fa fa-plus"></i></span></a></li>


                    <li <?php if(Request::path()== 'keywords/settings'): ?> class="active" <?php endif; ?>><a
                                href=<?php echo e(url('keywords/settings')); ?>><span
                                    class="menu-text"><?php echo e(language_data('Keyword Settings')); ?></span> <span
                                    class="menu-thumb"><i class="fa fa-cog"></i></span></a></li>

                </ul>
            </li>



                
                <li class="has-sub <?php if(Request::path()== 'sms/phone-book' OR Request::path()== 'sms/import-contacts' OR Request::path()== 'sms/view-contact/'.view_id() OR Request::path()== 'sms/blacklist-contacts' OR Request::path()== 'sms/add-contact/'.view_id() OR Request::path()== 'sms/edit-contact/'.view_id() OR Request::path()== 'sms/spam-words'): ?> sub-open init-sub-open <?php endif; ?>">
                    <a href="#"><span class="menu-text"><?php echo e(language_data('Contacts')); ?></span> <span
                                class="arrow"></span><span class="menu-thumb"><i class="fa fa-book"></i></span></a>
                    <ul class="sub">

                        <li <?php if(Request::path()== 'sms/phone-book' OR Request::path()== 'sms/view-contact/'.view_id()  OR Request::path()== 'sms/add-contact/'.view_id() OR Request::path()== 'sms/edit-contact/'.view_id()): ?> class="active" <?php endif; ?>>
                            <a href=<?php echo e(url('sms/phone-book')); ?>><span
                                        class="menu-text"> <?php echo e(language_data('Phone Book')); ?></span> <span
                                        class="menu-thumb"><i class="fa fa-book"></i></span></a></li>

                        <li <?php if(Request::path()== 'sms/import-contacts'): ?> class="active" <?php endif; ?>><a
                                    href=<?php echo e(url('sms/import-contacts')); ?>><span
                                        class="menu-text"> <?php echo e(language_data('Import Contacts')); ?></span> <span
                                        class="menu-thumb"><i class="fa fa-plus"></i></spcan></a></li>

                        <li <?php if(Request::path()== 'sms/blacklist-contacts'): ?> class="active" <?php endif; ?>><a
                                    href=<?php echo e(url('sms/blacklist-contacts')); ?>><span
                                        class="menu-text"> <?php echo e(language_data('Blacklist Contacts')); ?></span> <span
                                        class="menu-thumb"><i class="fa fa-remove"></i></span></a></li>

                        <li <?php if(Request::path()== 'sms/spam-words'): ?> class="active" <?php endif; ?>><a
                                    href=<?php echo e(url('sms/spam-words')); ?>><span
                                        class="menu-text"> <?php echo e(language_data('Spam Words')); ?></span> <span
                                        class="menu-thumb"><i class="fa fa-stop"></i></span></a></li>

                    </ul>
                </li>





                



                
                <li class="has-sub <?php if(Request::path()== 'sms/quick-sms'OR Request::path()== 'sms/send-sms' OR Request::path()=='sms/send-sms-user' OR Request::path()=='sms/send-schedule-sms' OR Request::path()=='sms/send-schedule-sms-file' OR Request::path()== 'sms/update-schedule-sms' OR Request::path()=='sms/manage-update-schedule-sms/'.view_id() OR Request::path()== 'sms/campaign-reports' OR Request::path()=='sms/manage-campaign/'.view_id()): ?> sub-open init-sub-open <?php endif; ?>">
                    <a href="#"><span class="menu-text"><?php echo e(language_data('Bulk SMS')); ?></span> <span
                                class="arrow"></span><span class="menu-thumb"><i class="fa fa-mobile"></i></span></a>
                    <ul class="sub">


                        <li <?php if(Request::path()== 'sms/quick-sms'): ?> class="active" <?php endif; ?>><a
                                    href=<?php echo e(url('sms/quick-sms')); ?>><span
                                        class="menu-text"><?php echo e(language_data('Send Quick SMS')); ?></span> <span
                                        class="menu-thumb"><i class="fa fa-space-shuttle"></i></span></a></li>
                                        
                        <!--<li <?php if(Request::path()== 'sms/send-sms-user'): ?> class="active" <?php endif; ?>><a-->
                        <!--            href=<?php echo e(url('sms/send-sms-user')); ?>><span-->
                        <!--                class="menu-text"></span> Schedule SMS for User<span-->
                        <!--                class="menu-thumb"><i class="fa fa-file-text"></i></span></a></li>-->

                        <li <?php if(Request::path()== 'sms/send-sms'): ?> class="active" <?php endif; ?>><a
                                    href=<?php echo e(url('sms/send-sms')); ?>><span
                                        class="menu-text"><?php echo e(language_data('Send Bulk SMS')); ?></span> <span
                                        class="menu-thumb"><i class="fa fa-send"></i></span></a></li>

                        <li <?php if(Request::path()== 'sms/send-schedule-sms'): ?> class="active" <?php endif; ?>><a
                                    href=<?php echo e(url('sms/send-schedule-sms')); ?>><span
                                        class="menu-text"><?php echo e(language_data('Send')); ?> <?php echo e(language_data('Schedule SMS')); ?></span>
                                <span class="menu-thumb"><i class="fa fa-send-o"></i></span></a></li>

                        

                

                        <li <?php if(Request::path()== 'sms/campaign-reports' OR Request::path()=='sms/manage-campaign/'.view_id()  OR Request::path()=='sms/manage-update-schedule-sms/'.view_id() ): ?> class="active" <?php endif; ?>>
                            <a href=<?php echo e(url('sms/campaign-reports')); ?>><span
                                        class="menu-text"><?php echo e(language_data('Campaign Reports')); ?></span> <span
                                        class="menu-thumb"><i class="fa fa-line-chart"></i></span></a></li>


                    </ul>
                </li>




            <!--<li <?php if(Request::path()== 'sms/sender-id-management' OR Request::path()=='sms/add-sender-id' OR Request::path()=='sms/view-sender-id/'.view_id()): ?> class="active" <?php endif; ?>>-->
            <!--    <a href=<?php echo e(url('sms/sender-id-management')); ?>><span-->
            <!--                class="menu-text"><?php echo e(language_data('Sender ID Management')); ?></span> <span class="menu-thumb"><i-->
            <!--                    class="fa fa-user-secret"></i></span></a></li>-->


            <li <?php if(Request::path()=='sms/sms-templates' OR Request::path()=='sms/create-sms-template' OR Request::path()=='sms/manage-sms-template/'.view_id()): ?> class="active" <?php endif; ?>>
                <a href=<?php echo e(url('sms/sms-templates')); ?>><span class="menu-text"><?php echo e(language_data('SMS Templates')); ?></span>
                    <span class="menu-thumb"><i class="fa fa-file-code-o"></i></span></a></li>



            <li <?php if(Request::path()=='sms/chat-box'): ?> class="active" <?php endif; ?>><a href=<?php echo e(url('sms/chat-box')); ?>><span class="menu-text">Inbox</span>
                    <span class="menu-thumb"><i class="fa fa-comments"></i></span>
                </a>
            </li>


            
            <li class="has-sub <?php if(Request::path()=='sms/history' OR Request::path()=='sms/view-inbox/'.view_id() OR Request::path()=='sms/reports/download' OR Request::path()=='sms/reports/delete' OR Request::path()=='sms/block-message' OR Request::path()=='sms/view-block-message/'.view_id()): ?> sub-open init-sub-open <?php endif; ?>">
                <a href="#"><span class="menu-text"><?php echo e(language_data('Reports')); ?></span> <span class="arrow"></span><span
                            class="menu-thumb"><i class="fa fa-list"></i></span></a>
                <ul class="sub">

                    <li <?php if(Request::path()=='sms/history' OR Request::path()=='sms/view-inbox/'.view_id()): ?> class="active" <?php endif; ?>>
                        <a href=<?php echo e(url('sms/history')); ?>><span class="menu-text"><?php echo e(language_data('SMS History')); ?></span>
                            <span class="menu-thumb"><i class="fa fa-list"></i></span></a></li>


                    <li <?php if(Request::path()=='sms/block-message' OR Request::path()=='sms/view-block-message/'.view_id()): ?> class="active" <?php endif; ?>>
                        <a href=<?php echo e(url('sms/block-message')); ?>><span
                                    class="menu-text"><?php echo e(language_data('Block Message')); ?></span> <span
                                    class="menu-thumb"><i class="fa fa-remove"></i></span></a></li>

                </ul>
            </li>

        


            
            <li class="has-sub <?php if(Request::path()== 'administrators/all' OR Request::path()=='administrators/manage/'.view_id() OR Request::path()=='administrators/role' OR Request::path()=='administrators/set-role/'.view_id()): ?> sub-open init-sub-open <?php endif; ?>">
                <a href="#"><span class="menu-text"><?php echo e(language_data('Administrators')); ?></span> <span
                            class="arrow"></span><span class="menu-thumb"><i class="fa fa-user"></i></span></a>
                <ul class="sub">
                    <li <?php if(Request::path()== 'administrators/all'  OR Request::path()=='administrators/manage/'.view_id()): ?> class="active" <?php endif; ?>>
                        <a href=<?php echo e(url('administrators/all')); ?>><span
                                    class="menu-text"><?php echo e(language_data('Administrators')); ?></span> <span
                                    class="menu-thumb"><i class="fa fa-user"></i></span></a></li>

                    <li <?php if(Request::path()=='administrators/role' OR Request::path()=='administrators/set-role/'.view_id()): ?> class="active" <?php endif; ?>>
                        <a href=<?php echo e(url('administrators/role')); ?>><span
                                    class="menu-text"><?php echo e(language_data('Administrator Roles')); ?></span> <span
                                    class="menu-thumb"><i class="fa fa-user-secret"></i></span></a></li>

                </ul>
            </li>


            
            <li class="has-sub <?php if(Request::path()== 'settings/general' OR Request::path()=='settings/localization' OR Request::path()=='settings/language-settings' OR Request::path()=='settings/language-settings-translate/'.view_id() OR Request::path()=='settings/language-settings-manage/'.view_id()  OR Request::path()=='settings/payment-gateways' OR Request::path()=='settings/payment-gateway-manage/'.view_id() OR Request::path()=='settings/background-jobs' OR Request::path()=='settings/purchase-code'): ?> sub-open init-sub-open <?php endif; ?>">
                <a href="#"><span class="menu-text"><?php echo e(language_data('Settings')); ?></span> <span
                            class="arrow"></span><span class="menu-thumb"><i class="fa fa-cogs"></i></span></a>
                <ul class="sub">

                    <li <?php if(Request::path()== 'settings/general'): ?> class="active" <?php endif; ?>><a
                                href=<?php echo e(url('settings/general')); ?>><span
                                    class="menu-text"><?php echo e(language_data('System Settings')); ?></span> <span
                                    class="menu-thumb"><i class="fa fa-cog"></i></span></a></li>


                    <li <?php if(Request::path()== 'settings/localization'): ?> class="active" <?php endif; ?>><a
                                href=<?php echo e(url('settings/localization')); ?>><span
                                    class="menu-text"><?php echo e(language_data('Localization')); ?></span> <span class="menu-thumb"><i
                                        class="fa fa-globe"></i></span></a></li>


                    <li <?php if(Request::path()== 'settings/language-settings' OR Request::path()=='settings/language-settings-manage/'.view_id() OR Request::path()=='settings/language-settings-translate/'.view_id()): ?> class="active" <?php endif; ?>>
                        <a href=<?php echo e(url('settings/language-settings')); ?>><span
                                    class="menu-text"><?php echo e(language_data('Language Settings')); ?></span> <span
                                    class="menu-thumb"><i class="fa fa-language"></i></span></a></li>
                </ul>
            </li>

        

            
            <li <?php if(Request::path()== 'admin/logout'): ?> class="active" <?php endif; ?>><a href="<?php echo e(url('admin/logout')); ?>"><span
                            class="menu-text"><?php echo e(language_data('Logout')); ?></span> <span class="menu-thumb"><i
                                class="fa fa-power-off"></i></span></a></li>

        </ul>
    </div>
</nav>

<main id="wrapper" class="wrapper">

    <div class="top-bar clearfix">
      

        <div class="navbar-right">

            <div class="clearfix">
                <div class="dropdown user-profile pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="user-info"><?php echo e(Auth::user()->fname); ?> <?php echo e(Auth::user()->lname); ?></span>

                        <?php if(Auth::user()->image!=''): ?>
                            <img class="user-image"
                                 src="<?php echo asset('assets/admin_pic/' . Auth::user()->image); ?>"
                                 alt="<?php echo e(Auth::user()->fname); ?> <?php echo e(Auth::user()->lname); ?>">
                        <?php else: ?>
                            <img class="user-image" src="<?php echo asset('assets/admin_pic/profile.jpg'); ?>"
                                 alt="<?php echo e(Auth::user()->fname); ?> <?php echo e(Auth::user()->lname); ?>">
                        <?php endif; ?>

                    </a>
                    <ul class="dropdown-menu arrow right-arrow" role="menu">
                        <li><a href="<?php echo e(url('admin/edit-profile')); ?>"><i
                                        class="fa fa-edit"></i> <?php echo e(language_data('Update Profile')); ?></a></li>
                        <li><a href="<?php echo e(url('admin/change-password')); ?>"><i
                                        class="fa fa-lock"></i> <?php echo e(language_data('Change Password')); ?></a></li>
                        <li class="bg-dark">
                            <a href="<?php echo e(url('admin/logout')); ?>" class="clearfix">
                                <span class="pull-left"><?php echo e(language_data('Logout')); ?></span>
                                <span class="pull-right"><i class="fa fa-power-off"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="top-info-bar m-r-10">

                    <div class="dropdown pull-right bar-notification">
                        <a href="#" class="dropdown-toggle text-success" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            <img src="<?php echo asset('assets/country_flag/' . \App\Language::find(app_config('Language'))->icon); ?>"
                                 alt="Language">
                        </a>
                        <ul class="dropdown-menu lang-dropdown arrow right-arrow" role="menu">
                            <?php $__currentLoopData = get_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(url('language/change/'.$lan->id)); ?>"
                                       <?php if($lan->id==app_config('Language')): ?> class="text-complete" <?php endif; ?>>
                                        <img class="user-thumb"
                                             src="<?php echo asset('assets/country_flag/' . $lan->icon); ?>"
                                             alt="user thumb">
                                        <div class="user-name"><?php echo e($lan->language); ?></div>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </div>

    

    <?php echo $__env->yieldContent('content'); ?>

    

    <input type="hidden" id="_url" value="<?php echo e(url('/')); ?>">
    <input type="hidden" id="_language_code" value="<?php echo e(get_language_code()); ?>">
    <input type="hidden" id="_sms_gateway_count" value="<?php echo e(active_sms_gateway()); ?>">
    <input type="hidden" id="_unsubscribe_message" value="<?php echo e(app_config('unsubscribe_message')); ?>">
</main>


<?php echo Html::script("assets/libs/jquery-1.10.2.min.js"); ?>

<?php echo Html::script("assets/libs/jquery.slimscroll.min.js"); ?>

<?php echo Html::script("assets/libs/bootstrap/js/bootstrap.min.js"); ?>

<?php echo Html::script("assets/libs/bootstrap-toggle/js/bootstrap-toggle.min.js"); ?>

<?php echo Html::script("assets/libs/alertify/js/alertify.js"); ?>

<?php echo Html::script("assets/libs/bootstrap-select/js/bootstrap-select.min.js"); ?>

<?php echo Html::script("assets/libs/bootstrap-select/js/i18n/".get_language_code()->language_code.".js"); ?>

<?php echo Html::script("assets/js/scripts.js"); ?>



<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('input[name="_token"]').val()
        }
    });

    var _url = $('#_url').val();

    var width = $(window).width();
    if (width <= 768) {
        $("body").removeClass('left-bar-open')
    } else {
        $('#bar-setting').click(function (e) {
            e.preventDefault();
            $.post(_url + '/admin/menu-open-status');
        });
    }

    var _active_gateway = $('#_sms_gateway_count').val();

    if (_active_gateway == 0) {
        alertify.log("<i class='fa fa-times-circle'></i> <span>There is no active sms gateway yet. <a href=" + _url + '/sms/http-sms-gateway' + "> Click </a>  to configure one.</span>", "warning", 0);
    }

</script>



<?php echo $__env->yieldContent('script'); ?>


</body>

</html>
