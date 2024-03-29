@extends('client')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css") !!}
    <style>
        label.active.btn.btn-default {
            color: #ffffff !important;
            background-color: #7E57C2 !important;
            border-color: #7E57C2 !important;
        }
    </style>
@endsection


@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Send',Auth::guard('client')->user()->lan_id)}} {{language_data('Recurring SMS',Auth::guard('client')->user()->lan_id)}}</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
            @include('notification.notify')
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{language_data('Send',Auth::guard('client')->user()->lan_id)}} {{language_data('Recurring SMS',Auth::guard('client')->user()->lan_id)}}</h3>
                        </div>
                        <div class="panel-body">

                            <form class="" role="form" method="post" action="{{url('user/sms/post-recurring-sms')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}


                                <div class="form-group">
                                    <label>{{language_data('SMS Gateway',Auth::guard('client')->user()->lan_id)}}</label>
                                    <select class="selectpicker form-control" name="sms_gateway" data-live-search="true">
                                        @foreach($sms_gateways as $gateway)
                                            <option value="{{$gateway->id}}">{{$gateway->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{language_data('SMS Templates',Auth::guard('client')->user()->lan_id)}}</label>
                                    <select class="selectpicker form-control" name="sms_template"  data-live-search="true" id="sms_template">
                                        <option>{{language_data('Select Template',Auth::guard('client')->user()->lan_id)}}</option>
                                        @foreach($sms_templates as $st)
                                            <option value="{{$st->id}}">{{$st->template_name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                @if(app_config('sender_id_verification') == 1)
                                    @if($sender_ids)
                                        <div class="form-group">
                                            <label>{{language_data('Sender ID',Auth::guard('client')->user()->lan_id)}}</label>
                                            <select class="selectpicker form-control sender_id" name="sender_id" data-live-search="true">
                                                @foreach($sender_ids as $si)
                                                    <option value="{{$si}}">{{$si}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label>{{language_data('Sender ID',Auth::guard('client')->user()->lan_id)}}</label>
                                            <p><a href="{{url('user/sms/sender-id-management')}}" class="text-uppercase">{{language_data('Request New Sender ID',Auth::guard('client')->user()->lan_id)}}</a> </p>
                                        </div>
                                    @endif
                                @else
                                    <div class="form-group">
                                        <label>{{language_data('Sender ID',Auth::guard('client')->user()->lan_id)}}</label>
                                        <input type="text" class="form-control sender_id" name="sender_id">
                                    </div>
                                @endif


                                <div class="form-group">
                                    <label>{{language_data('Select Contact Type',Auth::guard('client')->user()->lan_id)}}</label>
                                    <select class="selectpicker form-control" name="contact_type"  id="contact_type">
                                        <option value="phone_book">{{language_data('Phone Book',Auth::guard('client')->user()->lan_id)}}</option>
                                        @if(Auth::guard('client')->user()->reseller=='Yes')
                                            <option value="client_group">{{language_data('Client Group',Auth::guard('client')->user()->lan_id)}}</option>
                                        @endif
                                    </select>
                                </div>

                                @if(Auth::guard('client')->user()->reseller=='Yes')
                                    <div class="form-group client-group-area">
                                        <label>{{language_data('Client Group',Auth::guard('client')->user()->lan_id)}}</label>
                                        <select class="selectpicker form-control select_client_group" name="client_group_id[]" multiple data-live-search="true">
                                            @foreach($client_group as $cg)
                                                <option value="{{$cg->id}}">{{$cg->group_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                <div class="form-group contact-list-area">
                                    <label>{{language_data('Contact List',Auth::guard('client')->user()->lan_id)}}</label>
                                    <select class="form-control selectpicker select_contact_group" name="contact_list_id[]" data-live-search="true" multiple>
                                        @foreach($phone_book as $pb)
                                            <option value="{{$pb->id}}">{{$pb->group_name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>{{language_data('Country Code',Auth::guard('client')->user()->lan_id)}}</label>
                                    <span class="help">({{language_data('Work only for Recipients number',Auth::guard('client')->user()->lan_id)}})</span>
                                    <select class="selectpicker form-control" name="country_code" data-live-search="true">
                                        <option value="0" @if(app_config('send_sms_country_code') == 0) selected @endif >{{language_data('Exist on phone number',Auth::guard('client')->user()->lan_id)}}</option>
                                        @foreach($country_code as $code)
                                            <option value="{{$code->country_code}}" @if(app_config('send_sms_country_code') == $code->country_code) selected @endif >{{$code->country_name}} ({{$code->country_code}})</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{language_data('Recipients',Auth::guard('client')->user()->lan_id)}}</label>
                                    <textarea class="form-control" rows="4" name="recipients" id="recipients"></textarea>
                                    <span class="help text-uppercase pull-right">{{language_data('Total Number Of Recipients',Auth::guard('client')->user()->lan_id)}}: <span class="number_of_recipients bold text-success m-r-5">0</span></span>
                                </div>

                                <div class="form-group">
                                    <label>{{language_data('Choose delimiter',Auth::guard('client')->user()->lan_id)}}: </label>
                                    <div class="btn-group btn-group-sm" data-toggle="buttons">

                                        <label class="btn btn-default active">
                                            <input type="radio" name="delimiter" value="automatic" checked="">{{language_data('Automatic',Auth::guard('client')->user()->lan_id)}}
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
                                            <input type="radio" name="delimiter" value="tab">{{language_data('Tab',Auth::guard('client')->user()->lan_id)}}
                                        </label>

                                        <label class="btn btn-default">
                                            <input type="radio" name="delimiter" value="new_line">{{language_data('New Line',Auth::guard('client')->user()->lan_id)}}
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>{{language_data('Remove Duplicate',Auth::guard('client')->user()->lan_id)}}</label>
                                    <select class="selectpicker form-control" name="remove_duplicate">
                                        <option value="yes">{{language_data('Yes',Auth::guard('client')->user()->lan_id)}}</option>
                                        <option value="no">{{language_data('No',Auth::guard('client')->user()->lan_id)}}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{language_data('Message Type',Auth::guard('client')->user()->lan_id)}}</label>
                                    <select class="selectpicker form-control message_type" name="message_type">
                                        <option value="plain">{{language_data('Plain',Auth::guard('client')->user()->lan_id)}}</option>
                                        <option value="unicode">{{language_data('Unicode',Auth::guard('client')->user()->lan_id)}}</option>
                                        <option value="voice">{{language_data('Voice',Auth::guard('client')->user()->lan_id)}}</option>
                                        <option value="mms">{{language_data('MMS',Auth::guard('client')->user()->lan_id)}}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{language_data('Message',Auth::guard('client')->user()->lan_id)}}</label>
                                    <textarea class="form-control" name="message" rows="5" id="message"></textarea>
                                    <span class="help text-uppercase" id="remaining">160 {{language_data('characters remaining',Auth::guard('client')->user()->lan_id)}}</span>
                                    <span class="help text-success" id="messages">1 {{language_data('message',Auth::guard('client')->user()->lan_id)}}(s)</span>
                                </div>


                                <div class="form-group send-mms">
                                    <label>{{language_data('Select File',Auth::guard('client')->user()->lan_id)}}</label>
                                    <div class="form-group input-group input-group-file">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                {{language_data('Browse',Auth::guard('client')->user()->lan_id)}} <input type="file" class="form-control" name="image" accept="audio/*,video/*,image/*">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" readonly="">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label>{{language_data('Recurring Period',Auth::guard('client')->user()->lan_id)}}</label>
                                    <select class="selectpicker form-control" id="period" name="period">
                                        <option value="day">{{language_data('Daily',Auth::guard('client')->user()->lan_id)}}</option>
                                        <option value="week1">{{language_data('Weekly',Auth::guard('client')->user()->lan_id)}}</option>
                                        <option value="weeks2">{{language_data('2 Weeks',Auth::guard('client')->user()->lan_id)}}</option>
                                        <option value="month1">{{language_data('Month',Auth::guard('client')->user()->lan_id)}}</option>
                                        <option value="months2">{{language_data('2 Months',Auth::guard('client')->user()->lan_id)}}</option>
                                        <option value="months3">{{language_data('3 Months',Auth::guard('client')->user()->lan_id)}}</option>
                                        <option value="months6">{{language_data('6 Months',Auth::guard('client')->user()->lan_id)}}</option>
                                        <option value="year1">{{language_data('Year',Auth::guard('client')->user()->lan_id)}}</option>
                                        <option value="years2">{{language_data('2 Years',Auth::guard('client')->user()->lan_id)}}</option>
                                        <option value="years3">{{language_data('3 Years',Auth::guard('client')->user()->lan_id)}}</option>
                                        <option value="0">{{language_data('Custom Date',Auth::guard('client')->user()->lan_id)}}</option>
                                    </select>
                                </div>

                                <div class="form-group recurring-time">
                                    <label>{{language_data('Recurring Time',Auth::guard('client')->user()->lan_id)}}</label>
                                    <input type="text" class="form-control timePicker" name="recurring_time">
                                </div>


                                <div class="schedule_time">
                                    <div class="form-group">
                                        <label>{{language_data('Schedule Time',Auth::guard('client')->user()->lan_id)}}</label>
                                        <input type="text" class="form-control dateTimePicker" name="schedule_time">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-sm" name="action" value="send_now"><i class="fa fa-send"></i> {{language_data('Send',Auth::guard('client')->user()->lan_id)}} </button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

@endsection

{{--External Style Section--}}
@section('script')
    {!! Html::script("assets/libs/handlebars/handlebars.runtime.min.js")!!}
    {!! Html::script("assets/libs/moment/moment.min.js")!!}
    {!! Html::script("assets/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js")!!}
    {!! Html::script("assets/js/dom-rules.js")!!}
    {!! Html::script("assets/js/form-elements-page.js")!!}

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
                _url = $("#_url").val();

            $('.schedule_time').hide();

            $('#period').on('change', function() {
                if (this.value == 0){
                    $('.schedule_time').show();
                    $('.recurring-time').hide();
                }else {
                    $('.schedule_time').hide();
                    $('.recurring-time').show();
                }
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

                $remaining.text(remainingChar + " {!! language_data('characters remaining') !!}");
                $messages.text(messages + " {!! language_data('message') !!}"+ '(s)');
            }

            $('.message_type').on('change', function () {
                message_type = $(this).val();

                if (message_type == 'unicode') {
                    maxCharInitial = 70;
                    maxChar = 67;
                    messages = 1;
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
                var _url = $("#_url").val();
                var dataString = 'st_id=' + id;
                $.ajax
                ({
                    type: "POST",
                    url: _url + '/user/sms/get-template-info',
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

                        $remaining.text(remainingChar + " {!! language_data('characters remaining') !!}");
                        $messages.text(messages + " {!! language_data('message') !!}"+ '(s)');
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
                        url: _url + '/user/sms/get-contact-list-ids',
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
                        url: _url + '/user/sms/get-contact-list-ids',
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
@endsection
