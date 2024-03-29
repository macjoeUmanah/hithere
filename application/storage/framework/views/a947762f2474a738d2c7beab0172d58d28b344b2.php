<?php $__env->startSection('style'); ?>
    <?php echo Html::style("assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"); ?>

    <style>
        label.active.btn.btn-default {
            color: #ffffff !important;
            background-color: #7E57C2 !important;
            border-color: #7E57C2 !important;
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title"><?php echo e(language_data('Send Bulk SMS')); ?></h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
            <?php echo $__env->make('notification.notify', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo e(language_data('Send Bulk SMS')); ?></h3>
                        </div>
                        <div class="panel-body">

                            <form class="" role="form" method="post" action="<?php echo e(url('sms/post-bulk-sms')); ?>" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>



                                <div class="form-group">
                                    <label><?php echo e(language_data('SMS Gateway')); ?></label>
                                    <select class="selectpicker form-control" name="sms_gateway"
                                            data-live-search="true">
                                        <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($sg->id); ?>"><?php echo e($sg->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(language_data('Campaign Keyword')); ?></label>
                                    <span class="help"><?php echo e(language_data('Only work with two way sms gateway provider')); ?></span>
                                    <select class="selectpicker form-control" name="keyword[]" data-live-search="true" multiple>
                                        <?php $__currentLoopData = $keyword; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($kw->keyword_name); ?>"><?php echo e($kw->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(language_data('SMS Templates')); ?></label>
                                    <select class="selectpicker form-control" name="sms_template"
                                            data-live-search="true" id="sms_template">
                                        <option><?php echo e(language_data('Select Template')); ?></option>
                                        <?php $__currentLoopData = $sms_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($st->id); ?>"><?php echo e($st->template_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label><?php echo e(language_data('Sender ID')); ?></label>
                                    <input type="text" class="form-control" name="sender_id" id="sender_id">
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(language_data('Select Contact Type')); ?></label>
                                    <select class="selectpicker form-control" name="contact_type" id="contact_type">
                                        <option value="phone_book"><?php echo e(language_data('Phone Book')); ?></option>
                                        <option value="client_group"><?php echo e(language_data('Client Group')); ?></option>
                                    </select>
                                </div>


                                <div class="form-group client-group-area">
                                    <label><?php echo e(language_data('Client Group')); ?></label>
                                    <select class="selectpicker form-control select_client_group"
                                            name="client_group_id[]" multiple data-live-search="true">
                                        <?php $__currentLoopData = $client_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cg->id); ?>"><?php echo e($cg->group_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>


                                <div class="form-group contact-list-area">
                                    <label><?php echo e(language_data('Contact List')); ?></label>
                                    <select class="form-control selectpicker select_contact_group"
                                            name="contact_list_id[]" data-live-search="true" multiple>
                                        <?php $__currentLoopData = $phone_book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($pb->id); ?>"><?php echo e($pb->group_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(language_data('Country Code')); ?></label>
                                    <span class="help">(<?php echo e(language_data('Work only for Recipients number')); ?>)</span>
                                    <select class="selectpicker form-control" name="country_code" data-live-search="true">
                                        <option value="0" <?php if(app_config('send_sms_country_code') == 0): ?> selected <?php endif; ?> ><?php echo e(language_data('Exist on phone number')); ?></option>
                                        <?php $__currentLoopData = $country_code; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($code->country_code); ?>" <?php if(app_config('send_sms_country_code') == $code->country_code): ?> selected <?php endif; ?> ><?php echo e($code->country_name); ?> (<?php echo e($code->country_code); ?>)</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(language_data('Recipients')); ?></label>
                                    <textarea class="form-control" rows="4" name="recipients" id="recipients"></textarea>
                                    <span class="help text-uppercase pull-right"><?php echo e(language_data('Total Number Of Recipients')); ?>

                                        : <span class="number_of_recipients bold text-success m-r-5">0</span></span>
                                </div>


                                <div class="form-group">
                                    <label><?php echo e(language_data('Choose delimiter')); ?>: </label>
                                    <div class="btn-group btn-group-sm" data-toggle="buttons">

                                        <label class="btn btn-default active">
                                            <input type="radio" name="delimiter" value="automatic" checked=""><?php echo e(language_data('Automatic')); ?>

                                        </label>

                                        <label class="btn btn-default">
                                            <input type="radio" name="delimiter" value=";">;
                                        </label>

                                        <label class="btn btn-default">
                                            <input type="radio" name="delimiter" value=",">,
                                        </label>

                                        <label class="btn btn-default">
                                            <input type="radio" name="delimiter" value="|">|
                                        </label>

                                        <label class="btn btn-default">
                                            <input type="radio" name="delimiter" value="tab"><?php echo e(language_data('Tab')); ?>

                                        </label>

                                        <label class="btn btn-default">
                                            <input type="radio" name="delimiter" value="new_line"><?php echo e(language_data('New Line')); ?>

                                        </label>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label><?php echo e(language_data('Remove Duplicate')); ?></label>
                                    <select class="selectpicker form-control" name="remove_duplicate">
                                        <option value="yes"><?php echo e(language_data('Yes')); ?></option>
                                        <option value="no"><?php echo e(language_data('No')); ?></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(language_data('Message Type')); ?></label>
                                    <select class="selectpicker form-control message_type" name="message_type">
                                        <option value="plain"><?php echo e(language_data('Plain')); ?></option>
                                        <option value="unicode"><?php echo e(language_data('Unicode')); ?></option>
                                        <option value="arabic"><?php echo e(language_data('Arabic')); ?></option>
                                        <option value="voice"><?php echo e(language_data('Voice')); ?></option>
                                        <option value="mms"><?php echo e(language_data('MMS')); ?></option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(language_data('Message')); ?></label>
                                    <textarea class="form-control" name="message" rows="5" id="message"></textarea>
                                    <span class="help text-uppercase" id="remaining">160 <?php echo e(language_data('characters remaining')); ?></span>
                                    <span class="help text-success" id="messages">1 <?php echo e(language_data('message')); ?> (s)</span>
                                </div>


                                <div class="form-group send-mms">
                                    <label><?php echo e(language_data('Select File')); ?></label>
                                    <div class="form-group input-group input-group-file">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                <?php echo e(language_data('Browse')); ?> <input type="file" class="form-control" name="image" accept="audio/*,video/*,image/*">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" readonly="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="coder-checkbox">
                                        <input type="checkbox" name="send_later" <?php if($schedule_sms): ?> checked <?php endif; ?> class="send_later" value="on">
                                        <span class="co-check-ui"></span>
                                        <label><?php echo e(language_data('Send Later')); ?></label>
                                    </div>
                                </div>


                                <div class="schedule_time">
                                    <div class="form-group">
                                        <label><?php echo e(language_data('Schedule Time')); ?></label>
                                        <input type="text" class="form-control dateTimePicker" name="schedule_time" value="<?php echo e(date('m/d/y H:i y', strtotime('2 minute'))); ?>">
                                    </div>
                                </div>

                                <input type="hidden" value="<?php echo e($schedule_sms); ?>" id="schedule_sms_status" name="schedule_sms_status">
                                <button type="submit" class="btn btn-success btn-sm" name="action" value="send_now"><i class="fa fa-send"></i> <?php echo e(language_data('Send')); ?> </button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <?php echo Html::script("assets/libs/handlebars/handlebars.runtime.min.js"); ?>

    <?php echo Html::script("assets/libs/moment/moment.min.js"); ?>

    <?php echo Html::script("assets/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"); ?>

    <?php echo Html::script("assets/js/dom-rules.js"); ?>

    <?php echo Html::script("assets/js/form-elements-page.js"); ?>


    <script>
        $(document).ready(function () {

            var number_of_recipients_ajax = 0,
                number_of_recipients_manual = 0,
                $get_recipients = $('#recipients'),
                $get_msg = $("#message"),
                $remaining = $('#remaining'),
                $messages = $remaining.next(),
                message_type = 'plain',
                maxCharInitial = 160,
                maxChar = 157,
                messages = 1,
                schedule_sms_status = $('#schedule_sms_status').val(),
                _url = $("#_url").val();

            if (schedule_sms_status) {
                $('.schedule_time').show();
            } else {
                $('.schedule_time').hide();
            }

            $('.send_later').change(function () {
                $('.schedule_time').fadeToggle();
            });


          function get_character() {
            var totalChar = $get_msg[0].value.length;
            var remainingChar = maxCharInitial;

            if ( totalChar <= maxCharInitial ) {
              remainingChar = maxCharInitial - totalChar;
              messages = 1;
            } else {
              totalChar = totalChar - maxCharInitial;
              messages = Math.ceil( totalChar / maxChar );
              remainingChar = messages * maxChar - totalChar;
              messages = messages + 1;
            }

              $remaining.text(remainingChar + " <?php echo language_data('characters remaining'); ?>");
              $messages.text(messages + " <?php echo language_data('message'); ?>"+ '(s)');
          }

            $('.message_type').on('change', function () {
                message_type = $(this).val();
                $get_msg.css('direction','ltr');

                if (message_type == 'unicode') {
                    maxCharInitial = 70;
                    maxChar = 67;
                    messages = 1;
                }

                if (message_type == 'arabic') {
                    maxCharInitial = 70;
                    maxChar = 67;
                    messages = 1;
                    $get_msg.css('direction','rtl');
                }

                if (message_type == 'plain' || message_type == 'voice') {
                    maxCharInitial = 160;
                    maxChar = 157;
                    messages = 1;
                }

                get_character();
            });


            $("#sms_template").change(function () {
                var id = $(this).val();
                var dataString = 'st_id=' + id;
                $.ajax
                ({
                    type: "POST",
                    url: _url + '/sms/get-template-info',
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        $("#sender_id").val(data.from);

                        var totalChar = $get_msg.val(data.message).val().length;
                        var remainingChar = maxCharInitial;

                        if (totalChar <= maxCharInitial) {
                            remainingChar = maxCharInitial - totalChar;
                            messages = 1;
                        } else {
                            totalChar = totalChar - maxCharInitial;
                            messages = Math.ceil(totalChar / maxChar);
                            remainingChar = messages * maxChar - totalChar;
                            messages = messages + 1;
                        }

                        $remaining.text(remainingChar + " <?php echo language_data('characters remaining'); ?>");
                        $messages.text(messages + " <?php echo language_data('message'); ?>"+ '(s)');
                    }
                });
            });


            function get_delimiter(){
                return $('input[name=delimiter]:checked').val();
            }

            function get_recipients_count(){

                var recipients_value = $get_recipients[0].value.trim();

                if (recipients_value) {
                    var delimiter = get_delimiter();

                    if (delimiter == 'automatic'){
                        number_of_recipients_manual = splitMulti(recipients_value,[',','\n',';','|']).length;
                    } else if (delimiter == ';'){
                        number_of_recipients_manual = recipients_value.split(';').length;
                    } else if (delimiter == ','){
                        number_of_recipients_manual = recipients_value.split(',').length;
                    } else if (delimiter == '|'){
                        number_of_recipients_manual = recipients_value.split('|').length;
                    } else if (delimiter == 'tab'){
                        number_of_recipients_manual = recipients_value.split(' ').length;
                    } else if (delimiter == 'new_line'){
                        number_of_recipients_manual = recipients_value.split('\n').length;
                    }else{
                        number_of_recipients_manual = 0;
                    }
                } else {
                    number_of_recipients_manual = 0;
                }
                var total = number_of_recipients_manual + Number(number_of_recipients_ajax);

                $('.number_of_recipients').text(total);
            }


            $get_msg.keyup(get_character);
            $get_recipients.keyup(get_recipients_count);

            $("input[name='delimiter']").change(function(){
                get_recipients_count();
            });


            var domRules = $.createDomRules({

                parentSelector: 'body',
                scopeSelector: 'form',
                showTargets: function (rule, $controller, condition, $targets, $scope) {
                    $targets.fadeIn();
                    $('.number_of_recipients').text(0);
                },
                hideTargets: function (rule, $controller, condition, $targets, $scope) {
                    $targets.fadeOut();
                    $('.number_of_recipients').text(0);
                },

                rules: [
                    {
                        controller: '#contact_type',
                        value: 'phone_book',
                        condition: '==',
                        targets: '.contact-list-area',
                    },
                    {
                        controller: '#contact_type',
                        value: 'client_group',
                        condition: '==',
                        targets: '.client-group-area',
                    },
                    {
                        controller: '.message_type',
                        value: 'mms',
                        condition: '==',
                        targets: '.send-mms',
                    }
                ]
            });


            $('.select_client_group').on('hide.bs.select', function (e) {

                var vals = [];

                $(this).find(':selected').each(function () {
                    vals.push($(this).val());
                });

                if (vals.length) {

                    vals = vals.map(function (val) {
                        return Number(val);
                    });

                    $.ajax({
                        url: _url + '/sms/get-contact-list-ids',
                        type: 'GET',
                        data: {
                            'client_group_ids': vals
                        }
                    })
                        .done(function (data, response) {

                            number_of_recipients_manual = Number(number_of_recipients_manual);

                            if (response == 'success' && data.status == 'success') {

                                number_of_recipients_ajax = Number(data.data);

                                var total = number_of_recipients_manual + number_of_recipients_ajax;

                                $('.number_of_recipients').text(total);

                                return;
                            }

                            $('.number_of_recipients').text(number_of_recipients_manual);

                        })
                        .fail(function () {

                            number_of_recipients_manual = Number(number_of_recipients_manual);

                            $('.number_of_recipients').text(number_of_recipients_manual);

                        })

                } else {

                    number_of_recipients_ajax = 0;

                    var total = Number(number_of_recipients_manual) + number_of_recipients_ajax;

                    $('.number_of_recipients').text(total);
                }

            });


            $('.select_contact_group').on('hide.bs.select', function (e) {

                var vals = [];

                $(this).find(':selected').each(function () {
                    vals.push($(this).val());
                });

                if (vals.length) {

                    vals = vals.map(function (val) {
                        return Number(val);
                    });

                    $.ajax({
                        url: _url + '/sms/get-contact-list-ids',
                        type: 'GET',
                        data: {
                            'contact_list_ids': vals
                        }
                    })
                        .done(function (data, response) {

                            number_of_recipients_manual = Number(number_of_recipients_manual);

                            if (response == 'success' && data.status == 'success') {

                                number_of_recipients_ajax = Number(data.data);

                                var total = number_of_recipients_manual + number_of_recipients_ajax;

                                $('.number_of_recipients').text(total);

                                return;
                            }

                            $('.number_of_recipients').text(number_of_recipients_manual);

                        })
                        .fail(function () {

                            number_of_recipients_manual = Number(number_of_recipients_manual);

                            $('.number_of_recipients').text(number_of_recipients_manual);

                        });

                } else {

                    number_of_recipients_ajax = 0;

                    var total = Number(number_of_recipients_manual) + number_of_recipients_ajax;

                    $('.number_of_recipients').text(total);
                }

            });


        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>