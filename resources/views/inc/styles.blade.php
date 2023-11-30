<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
<link href="{{asset('assets/vendor2/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendor2/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/plugins/snackbar.min.css')}}" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
<link href="{{asset('assets/vendor2/assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/vendor2/assets/css/widgets/modules-widgets.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/dash_3.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/new_styles.css')}}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

<!-- <script src="https://cdn.srv.whereby.com/embed/v1.js"></script> -->

@switch($page_name)
{{-- login --}}
@case('login')
@case('register')
<link href="{{asset('assets/vendor2/assets/css/authentication/form-2.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/switches.css')}}"/>
  @break
  
  {{-- chats --}}
  @case('chats')
  @case('chat')
  <link href="{{asset('assets/vendor2/assets/css/apps/mailing-chat.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('assets/css/new_styles.css')}}" rel="stylesheet" type="text/css" />
  @break

  {{-- profile --}}
  @case('profile')
  <link href="{{asset('assets/vendor2/assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{asset('assets/vendor2/plugins/dropify/dropify.min.css')}}" rel="stylesheet" type="text/css" />
  @break

  {{-- videochats --}}
  @case(videochats')
  <link href="{{asset('assets/vendor2/assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
  @break
@endswitch
  

