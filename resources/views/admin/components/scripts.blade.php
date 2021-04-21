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
@yield('script')
<!-- END JAVASCRIPTS -->
