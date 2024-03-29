<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{app_config('AppTitle')}}</title>
    <link rel="icon" type="image/x-icon"  href="<?php echo asset(app_config('AppFav')); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{--Global StyleSheet Start--}}
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    {!! Html::style("assets/libs/bootstrap/css/bootstrap.min.css") !!}
    {!! Html::style("assets/libs/bootstrap-toggle/css/bootstrap-toggle.min.css") !!}
    {!! Html::style("assets/libs/font-awesome/css/font-awesome.min.css") !!}
    {!! Html::style("assets/libs/alertify/css/alertify.css") !!}
    {!! Html::style("assets/libs/alertify/css/alertify-bootstrap-3.css") !!}
    {!! Html::style("assets/libs/bootstrap-select/css/bootstrap-select.min.css") !!}

    {{--Custom StyleSheet Start--}}

    @yield('style')

    {{--Global StyleSheet End--}}

    {!! Html::style("assets/css/style.css") !!}
    {!! Html::style("assets/css/admin.css") !!}
    {!! Html::style("assets/css/responsive.css") !!}
    {!! Html::style("assets/libs/jQuery-Tags-Input-master/dist/jquery.tagsinput.min.css") !!}
    <style>
        div.tagsinput {
         border: 0px !important; 
        background: #FFF;
        padding: 5px;
         width: auto; 
        height: auto;
        overflow-y: auto;
        }
    </style>


</head>



<body class="has-left-bar has-top-bar @if(Auth::guard('client')->user()->menu_open==1) left-bar-open @endif">

<nav id="left-nav" class="left-nav-bar">
    <div class="nav-top-sec">
        <div class="app-logo">
            <img src="<?php echo asset(app_config('AppLogo')); ?>" alt="logo" class="bar-logo" width="145px" height="35px">
        </div>

        <a href="#" id="bar-setting" class="bar-setting"><i class="fa fa-bars"></i></a>
    </div>
    <div class="nav-bottom-sec">
        <ul class="left-navigation" id="left-navigation">

            {{--Dashboard--}}
            <li @if(Request::path()== 'dashboard') class="active" @endif><a href="{{url('dashboard')}}"><span class="menu-text">{{language_data('Dashboard',Auth::guard('client')->user()->lan_id)}}</span> <span class="menu-thumb"><i class="fa fa-dashboard"></i></span></a></li>



            <li @if(Request::path()=='user/sms/chat-box') class="active" @endif><a href={{url('user/sms/chat-box')}}><span class="menu-text">{{language_data('Chat SMS',Auth::guard('client')->user()->lan_id)}}</span>
                <span class="menu-thumb"><i class="fa fa-comments"></i></span>
            </a>
            </li>
            
            

           <li @if(Request::path()=='user/sms/campaign-reports') class="active" @endif><a href={{url('user/sms/campaign-reports')}}><span class="menu-text">Campaigns</span>
                <span class="menu-thumb"><i class="fa fa-chart"></i></span>
            </a>
            </li>

            <li class="has-sub @if(Request::path()== 'user/phone-book' OR Request::path()== 'user/sms/import-contacts' OR Request::path()== 'user/add-contact/'.view_id()  OR Request::path()== 'user/view-contact/'.view_id()  OR Request::path()== 'user/sms/blacklist-contacts' OR Request::path()== 'user/edit-contact/'.view_id()) sub-open init-sub-open @endif">
                <a href="#"><span class="menu-text">{{language_data('Contacts',Auth::guard('client')->user()->lan_id)}}</span> <span class="arrow"></span><span class="menu-thumb"><i class="fa fa-book"></i></span></a>
                <ul class="sub">

                    <li @if(Request::path()== 'user/phone-book' OR Request::path()== 'user/add-contact/'.view_id() OR Request::path()== 'user/view-contact/'.view_id() OR Request::path()== 'user/edit-contact/'.view_id()) class="active" @endif><a href={{url('user/phone-book')}}><span class="menu-text">{{language_data('Phone Book',Auth::guard('client')->user()->lan_id)}}</span> <span class="menu-thumb"><i class="fa fa-book"></i></span></a></li>

                    <li @if(Request::path()== 'user/sms/import-contacts') class="active" @endif><a href={{url('user/sms/import-contacts')}}><span class="menu-text"> {{language_data('Import Contacts',Auth::guard('client')->user()->lan_id)}}</span> <span class="menu-thumb"><i class="fa fa-plus"></i></span></a></li>

                    <li @if(Request::path()== 'user/sms/blacklist-contacts') class="active" @endif><a href={{url('user/sms/blacklist-contacts')}}><span class="menu-text"> {{language_data('Blacklist Contacts',Auth::guard('client')->user()->lan_id)}}</span> <span class="menu-thumb"><i class="fa fa-remove"></i></span></a></li>

                </ul>
            </li>

            

            

            {{--Bulk SMS--}}
            <li class="has-sub @if(Request::path()== 'user/sms/quick-sms' OR Request::path()== 'user/sms/send-sms' OR Request::path()=='user/sms/send-sms-file' OR Request::path()=='user/sms/send-schedule-sms' OR Request::path()=='user/sms/send-schedule-sms-file' OR Request::path()== 'user/sms/update-schedule-sms' OR Request::path()=='user/sms/manage-update-schedule-sms/'.view_id()) sub-open init-sub-open @endif">
                <a href="#"><span class="menu-text">{{language_data('Bulk SMS',Auth::guard('client')->user()->lan_id)}}</span> <span class="arrow"></span><span class="menu-thumb"><i class="fa fa-mobile"></i></span></a>
                <ul class="sub">

                    <li @if(Request::path()== 'user/sms/quick-sms') class="active" @endif><a href={{url('user/sms/quick-sms')}}><span class="menu-text">{{language_data('Send Quick SMS',Auth::guard('client')->user()->lan_id)}}</span> <span class="menu-thumb"><i class="fa fa-space-shuttle"></i></span></a></li>

                    <li @if(Request::path()== 'user/sms/send-sms') class="active" @endif><a href={{url('user/sms/send-sms')}}><span class="menu-text">{{language_data('Send Bulk SMS',Auth::guard('client')->user()->lan_id)}}</span> <span class="menu-thumb"><i class="fa fa-send"></i></span></a></li>

                    <li @if(Request::path()== 'user/sms/send-schedule-sms') class="active" @endif><a href={{url('user/sms/send-schedule-sms')}}><span class="menu-text">{{language_data('Send')}} {{language_data('Schedule SMS',Auth::guard('client')->user()->lan_id)}}</span> <span class="menu-thumb"><i class="fa fa-send-o"></i></span></a></li>


                    {{-- <li @if(Request::path()== 'user/sms/campaign-reports' OR Request::path()=='user/sms/manage-campaign/'.view_id() OR Request::path()=='user/sms/manage-update-schedule-sms/'.view_id()) class="active" @endif><a href={{url('user/sms/campaign-reports')}}><span class="menu-text">{{language_data('Campaign Reports',Auth::guard('client')->user()->lan_id)}}</span> <span class="menu-thumb"><i class="fa fa-line-chart"></i></span></a></li> --}}

                </ul>
            </li>



            <!--<li @if(Request::path()=='user/sms/sms-templates' OR Request::path()=='user/sms/create-sms-template' OR Request::path()=='user/sms/manage-sms-template/'.view_id()) class="active" @endif><a href={{url('user/sms/sms-templates')}}><span class="menu-text">{{language_data('SMS Templates',Auth::guard('client')->user()->lan_id)}}</span> <span class="menu-thumb"><i class="fa fa-file-code-o"></i></span></a></li>-->

            {{--Reports--}}

            <!--<li class="has-sub @if(Request::path()=='user/sms/history' OR Request::path()=='user/sms/view-inbox/'.view_id()) sub-open init-sub-open @endif">-->
            <!--    <a href="#"><span class="menu-text">{{language_data('Reports',Auth::guard('client')->user()->lan_id)}}</span> <span class="arrow"></span><span class="menu-thumb"><i class="fa fa-shopping-cart"></i></span></a>-->
            <!--    <ul class="sub">-->

            <!--        <li @if(Request::path()=='user/sms/history' OR Request::path()=='user/sms/view-inbox/'.view_id()) class="active" @endif><a href={{url('user/sms/history')}}><span class="menu-text">{{language_data('SMS History',Auth::guard('client')->user()->lan_id)}}</span> <span class="menu-thumb"><i class="fa fa-list"></i></span></a></li>-->

            <!--    </ul>-->
            <!--</li>-->



            @if(Auth::guard('client')->user()->api_access=='Yes')
                <!--<li @if(Request::path()== 'user/sms-api/info') class="active" @endif><a href={{url('user/sms-api/info')}}><span class="menu-text">{{language_data('SMS Api',Auth::guard('client')->user()->lan_id)}}</span> <span class="menu-thumb"><i class="fa fa-plug"></i></span></a></li>-->
            @endif

            @if(app_config('show_keyword_in_client') == 1)
                <li @if(Request::path()== 'user/keywords' OR Request::path()== 'user/keywords/purchase/'.view_id() OR Request::path()== 'user/keywords/view/'.view_id()) class="active" @endif><a href="{{url('user/keywords')}}"><span class="menu-text">{{language_data('Keywords',Auth::guard('client')->user()->lan_id)}}</span> <span class="menu-thumb"><i class="fa fa-keyboard-o"></i></span></a></li>
            @endif

            {{--Logout--}}
            <li @if(Request::path()== 'logout') class="active" @endif><a href="{{url('logout')}}"><span class="menu-text">{{language_data('Logout',Auth::guard('client')->user()->lan_id)}}</span> <span class="menu-thumb"><i class="fa fa-power-off"></i></span></a></li>

        </ul>
    </div>
</nav>

<main id="wrapper" class="wrapper">

    <div class="top-bar clearfix">
        <ul class="top-info-bar">
           

            <li class="dropdown bar-notification @if(count(latest_five_tickets(Auth::guard('client')->user()->id))>0) active @endif">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-envelope"></i></a>
                <ul class="dropdown-menu arrow message-dropdown" role="menu">
                    <li class="title">{{language_data('Recent 5 Pending Tickets',Auth::guard('client')->user()->lan_id)}}</li>
                    @foreach(latest_five_tickets(Auth::guard('client')->user()->id) as $st)
                        <li>
                            <a href="{{url('user/tickets/view-ticket/'.$st->id)}}">
                                <div class="name">{{$st->name}} <span>{{$st->date}}</span></div>
                                <div class="message">{{$st->subject}}</div>
                            </a>
                        </li>
                    @endforeach

                    <li class="footer"><a href="{{url('user/tickets/all')}}">{{language_data('See All Tickets',Auth::guard('client')->user()->lan_id)}}</a></li>
                </ul>
            </li>
        </ul>



        <div class="navbar-right">
            <div class="clearfix">
                <div class="dropdown user-profile pull-right">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    

                        <span class="user-info">{{Auth::guard('client')->user()->fname}} {{Auth::guard('client')->user()->lname}}</span>

                        @if(Auth::guard('client')->user()->image!='')
                            <img class="user-image" src="<?php echo asset('assets/client_pic/'.Auth::guard('client')->user()->image); ?>" alt="{{Auth::guard('client')->user()->fname}} {{Auth::guard('client')->user()->lname}}">
                        @else
                            <img class="user-image" src="<?php echo asset('assets/client_pic/profile.jpg'); ?>" alt="{{Auth::guard('client')->user()->fname}} {{Auth::guard('client')->user()->lname}}">
                        @endif

                    </a>
                    <ul class=" dropdown-menu arrow right-arrow" role="menu">
                        <li><a href="{{url('user/edit-profile')}}"><i class="fa fa-edit"></i> {{language_data('Update Profile',Auth::guard('client')->user()->lan_id)}}</a></li>
                        <li><a href="{{url('user/change-password')}}"><i class="fa fa-lock"></i> {{language_data('Change Password',Auth::guard('client')->user()->lan_id)}}</a></li>
                        <li class="bg-dark">
                            <a href="{{url('logout')}}" class="clearfix">
                                <span class="pull-left">{{language_data('Logout',Auth::guard('client')->user()->lan_id)}}</span>
                                <span class="pull-right"><i class="fa fa-power-off"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="language-var user-info">
            <a href="#" class="dropdown-toggle text-success" data-toggle="dropdown" role="button" aria-expanded="false">
                <img src="<?php echo asset('assets/country_flag/'.\App\Language::find(Auth::guard('client')->user()->lan_id)->icon); ?>" alt="Language">
            </a>
            <ul class="dropdown-menu lang-dropdown arrow right-arrow" role="menu">
                @foreach(get_language() as $lan)
                    <li>
                        <a href="{{url('user/language/change/'.$lan->id)}}" @if($lan->id==app_config('Language')) class="text-complete" @endif>
                            <img class="user-thumb" src="<?php echo asset('assets/country_flag/'.$lan->icon); ?>" alt="user thumb">
                            <div class="user-name">{{$lan->language}}</div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>

    {{--Content File Start Here--}}

    @yield('content')

    {{--Content File End Here--}}

    <input type="hidden" id="_url" value="{{url('/')}}">
    <input type="hidden" id="_unsubscribe_message" value="{{ app_config('unsubscribe_message') }}">
</main>

{{--Global JavaScript Start--}}
{!! Html::script("assets/libs/jquery-1.10.2.min.js") !!}
{!! Html::script("assets/libs/jquery.slimscroll.min.js") !!}
{!! Html::script("assets/libs/bootstrap/js/bootstrap.min.js") !!}
{!! Html::script("assets/libs/bootstrap-toggle/js/bootstrap-toggle.min.js") !!}
{!! Html::script("assets/libs/alertify/js/alertify.js") !!}
{!! Html::script("assets/libs/bootstrap-select/js/bootstrap-select.min.js") !!}
{!! Html::script("assets/libs/bootstrap-select/js/i18n/".get_language_code(Auth::guard('client')->user()->lan_id)->language_code.".js") !!}
{!! Html::script("assets/js/scripts.js") !!}
{!! Html::script("assets/libs/jQuery-Tags-Input-master/dist/jquery.tagsinput.min.js")!!}
{{--Global JavaScript End--}}

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('input[name="_token"]').val()
        }
    });

    var _url=$('#_url').val();

    $('#bar-setting').click(function(e){
        e.preventDefault();
        $.post(_url+'/user/menu-open-status');
    });

    var width = $(window).width();
    if (width <= 768 ) {
      $("body").removeClass('left-bar-open')
    }

</script>

{{--Custom JavaScript Start--}}

@yield('script')

{{--Custom JavaScript End Here--}}
$('#tags').tagsInput();
</body>

</html>
