<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.2.0
Version: 3.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Lara</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('admin/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('admin/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('admin/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('admin/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css"/>
<!-- BEGIN PAGE STYLES -->

<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="{{ asset('admin/css/components.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('admin/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('admin/css/layout.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('admin/css/themes/default.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-boxed page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed-hide-logo">
  @include('admin/components/header')
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">

  @include('admin/components/sidebar')

  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content">
      @yield('content')
    </div>
  </div>
  <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
  <div class="page-footer-inner">
      2014 &copy; Metronic by keenthemes.
  </div>
  <div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
  </div>
</div>
<div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
<!-- END FOOTER -->

<script src="{{ asset('admin/plugins/jquery.min.js') }}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('admin/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{ asset('admin/scripts/demo.js')}}" type="text/javascript"></script>
<script src="{{ asset('admin/scripts/ui-toastr.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
  Metronic.init(); // init metronic core componets
  Layout.init(); // init layout
  Demo.init(); // init demo features 
  UIToastr.init();

  @if(Session::has('message'))
  var type = "{{ Session::get('alert-type', 'success') }}";
  switch(type){
    case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;
    case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;
    case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;
    case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
    default:
        toastr.success("{{ Session::get('message') }}");
        break;
  }
  @endif
});
</script>
<!-- END JAVASCRIPTS -->  
</body>
<!-- END BODY -->
</html>
