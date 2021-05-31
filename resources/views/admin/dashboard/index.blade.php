@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection

@section('content')
<h3 class="page-title">
    Dashboard <small>Attractive JavaScript plotting for jQuery</small>
</h3>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Admin</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                Actions <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu pull-right" role="menu">
                <li>
                    <a href="#">Action</a>
                </li>
            </ul>
        </div>
    </div>
</div>

@include('admin.dashboard.filter')
@include('admin.dashboard.card')
@include('admin.dashboard.chart')


@endsection
@section('script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    $(function() {
        $("#datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>

<script>
    $(function() {
        $("#datepicker2").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var chart = new Morris.Bar({
            element: 'myfirstchart',
            parseTime: false,
            lineColers: ['#819c79', '#819c79', '#819c79', '#819c79', '#819c79'],
            xkey: 'period',
            ykeys: ['order', 'sales', 'profit', 'quantity'],
            labels: ['order', 'sales', 'profit', 'quantity']
        });

        $('#btn-dashboard-filter').click(function() {
            var _token = $('input[name = "_token"]').val();
            var from_date = $('#datepicker').val();
            var to_date = $('#datepicker2').val();
            $.ajax({
                url: "{{route('admin.dashboard.filter_by_date')}}",
                method: "post",
                dataType: "JSON",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    _token
                },
                success: function(data) {
                    chart.setData(data);
                }
            })
        });
    });
</script>
@endsection
