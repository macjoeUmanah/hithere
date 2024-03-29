@extends('client')

{{--External Style Section--}}
@section('style')
    {!! Html::style("assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css") !!}

    <style>
        .progress-bar-indeterminate {
            background: url('../assets/img/progress-bar-complete.svg') no-repeat top left;
            width: 100%;
            height: 100%;
            background-size: cover;
        }
    </style>

@endsection


@section('content')

    <section class="wrapper-bottom-sec">
        <div class="p-30">
            <h2 class="page-title">{{language_data('Send',Auth::guard('client')->user()->lan_id)}} {{language_data('Recurring SMS',Auth::guard('client')->user()->lan_id)}}</h2>
        </div>
        <div class="p-30 p-t-none p-b-none">
            <div class="show_notification"></div>
            @include('notification.notify')
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{language_data('Send',Auth::guard('client')->user()->lan_id)}} {{language_data('Recurring SMS',Auth::guard('client')->user()->lan_id)}}</h3>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <div class="form-group">
                                    <a href="{{url('user/sms/download-sample-sms-file')}}" class="btn btn-complete"><i class="fa fa-download"></i> {{language_data('Download Sample File',Auth::guard('client')->user()->lan_id)}}
                                    </a>
                                </div>
                            </div>

                            <div id="send-sms-file-wrapper">
                                <form id="send-sms-file-form" class="" role="form" method="post" action="{{url('user/sms/post-recurring-sms-file')}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label>{{language_data('Import Numbers',Auth::guard('client')->user()->lan_id)}}</label>
                                        <div class="form-group input-group input-group-file">
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file">
                                                {{language_data('Browse',Auth::guard('client')->user()->lan_id)}} <input type="file" class="form-control" name="import_numbers" @change="handleImportNumbers">
                                            </span>
                                        </span>
                                            <input type="text" class="form-control" readonly="">
                                        </div>


                                        <div id='loadingmessage' style='display:none' class="form-group">
                                            <label>{{language_data('File Uploading.. Please wait',Auth::guard('client')->user()->lan_id)}}</label>
                                            <div class="progress">
                                                <div class="progress-bar-indeterminate"></div>
                                            </div>
                                        </div>


                                        <div class="coder-checkbox">
                                            <input type="checkbox" name="header_exist" :checked="form.header_exist"
                                                   v-model="form.header_exist">
                                            <span class="co-check-ui"></span>
                                            <label>{{language_data('First Row As Header',Auth::guard('client')->user()->lan_id)}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>{{language_data('Country Code',Auth::guard('client')->user()->lan_id)}}</label>
                                        <select class="selectpicker form-control" name="country_code" data-live-search="true">
                                            <option value="0" @if(app_config('send_sms_country_code') == 0) selected @endif >{{language_data('Exist on phone number',Auth::guard('client')->user()->lan_id)}}</option>
                                            @foreach($country_code as $code)
                                                <option value="{{$code->country_code}}" @if(app_config('send_sms_country_code') == $code->country_code) selected @endif >{{$code->country_name}} ({{$code->country_code}})</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group" v-show="number_columns.length > 0">
                                        <label>{{language_data('Phone Number',Auth::guard('client')->user()->lan_id)}} {{language_data('Column',Auth::guard('client')->user()->lan_id)}}</label>
                                        <select class="selectpicker form-control" ref="number_column"
                                                name="number_column" data-live-search="true" v-model="number_column">
                                            <option v-for="column in number_columns" :value="column.key"
                                                    v-text="column.value"></option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>{{language_data('SMS Gateway',Auth::guard('client')->user()->lan_id)}}</label>
                                        <select class="selectpicker form-control" name="sms_gateway" data-live-search="true">
                                            @foreach($sms_gateways as $sg)
                                                <option value="{{$sg->id}}">{{$sg->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>{{language_data('Sender ID',Auth::guard('client')->user()->lan_id)}}</label>
                                        <input type="text" class="form-control" name="sender_id" id="sender_id">
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
                                        <textarea class="form-control" name="message" rows="5" id="message" ref="message"></textarea>
                                        <span class="help text-uppercase" id="remaining">160 {{language_data('characters remaining',Auth::guard('client')->user()->lan_id)}}</span>
                                        <span class="help text-success" id="messages">1 {{language_data('message',Auth::guard('client')->user()->lan_id)}} (s)</span>
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

                                    <div class="row">

                                        <div class="col-sm-6" v-show="number_columns.length > 0">
                                            <div class="form-group">
                                                <label>{{language_data('Select Merge Field',Auth::guard('client')->user()->lan_id)}}</label>
                                                <select class="selectpicker form-control" ref="merge_field" data-live-search="true" v-model="number_column">
                                                    <option v-for="column in number_columns" :value="column.key" v-text="column.value"></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>{{language_data('SMS Templates',Auth::guard('client')->user()->lan_id)}}</label>
                                                <select class="selectpicker form-control" name="sms_template"
                                                        data-live-search="true" id="sms_template">
                                                    <option>{{language_data('Select Template',Auth::guard('client')->user()->lan_id)}}</option>
                                                    @foreach($sms_templates as $st)
                                                        <option value="{{$st->id}}">{{$st->template_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
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


                                    <div id='uploadContact' style='display:none' class="form-group">
                                        <label>{{language_data('Message adding in Queue.. Please wait',Auth::guard('client')->user()->lan_id)}}</label>
                                        <div class="progress">
                                            <div class="progress-bar-indeterminate"></div>
                                        </div>
                                    </div>

                                    <span class="text-uppercase text-complete help">{{language_data('After click on Send button, do not refresh your browser',Auth::guard('client')->user()->lan_id)}}</span>

                                    <button type="submit" id="submitContact" class="btn btn-success btn-sm pull-right"><i class="fa fa-send"></i> {{language_data('Send',Auth::guard('client')->user()->lan_id)}} </button>

                                </form>
                            </div>

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
    {!! Html::script("assets/js/vue.js") !!}
    {!! Html::script("assets/js/recurring_file_upload.js") !!}
    {!! Html::script("assets/js/form-elements-page.js")!!}

    <script>
      $(document).ready(function () {

        $('#submitContact').click(function(){
          $(this).hide();
          $('#uploadContact').show();
        });

        var $get_msg = $("#message"),
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

            $remaining.text(remainingChar + " {!! language_data('characters remaining',Auth::guard('client')->user()->lan_id) !!}");
            $messages.text(messages + " {!! language_data('message',Auth::guard('client')->user()->lan_id) !!}"+ '(s)');
        }

        $('.send-mms').hide();
        $('.message_type').on('change', function () {
          message_type = $(this).val()

          if (message_type == 'unicode') {
            maxCharInitial = 70
            maxChar = 67
            messages = 1
            $('.send-mms').hide();
            get_character()
          }

          if (message_type == 'plain' || message_type == 'voice') {
            maxCharInitial = 160
            maxChar = 160
            messages = 1
            $('.send-mms').hide();
            get_character()
          }

          if (message_type == 'mms'){
            $('.send-mms').show();
          }

        });


        $("#sms_template").change(function () {
          var id = $(this).val();
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

                $remaining.text(remainingChar + " {!! language_data('characters remaining',Auth::guard('client')->user()->lan_id) !!}");
                $messages.text(messages + " {!! language_data('message',Auth::guard('client')->user()->lan_id) !!}"+ '(s)');
            }
          });
        });

        $get_msg.keyup(get_character);

      });
    </script>
@endsection
