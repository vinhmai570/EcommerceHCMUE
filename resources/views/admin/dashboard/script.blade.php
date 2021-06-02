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
        monthly_chart();
        category_chart();

        var chart = new Morris.Line({
            element: 'myfirstchart',
            parseTime: false,
            lineColers: ['#819c79', '#819c79', '#819c79', '#819c79', '#819c79'],
            xkey: 'period',
            ykeys: ['order', 'sales', 'profit', 'quantity'],
            labels: ['order', 'sales', 'profit', 'quantity']
        });

        var category_chart = new Morris.Bar({
            element: 'category-quantity',
            parseTime: false,
            lineColers: ['#819c79', '#819c79', '#819c79', '#819c79', '#819c79'],
            xkey: 'name',
            ykeys: ['quantity'],
            labels: ['quantity']
        });

        function monthly_chart(){
            var _token = $('input[name = "_token"]').val();
            $.ajax({
                url : "{{route('admin.dashboard.monthly_chart')}}",
                method : "post",
                dataType: "JSON",
                data: {_token: _token},
                success: function(data){
                    chart.setData(data);
                }
            })
        };

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

        function category_chart(){
            var _token = $('input[name = "_token"]').val();
            $.ajax({
                url : "{{route('admin.dashboard.category_chart')}}",
                method : "post",
                dataType: "JSON",
                data: {_token: _token},
                success: function(data){
                    category_chart.setData(data);
                }
            })
        };

        var colorDanger = "#FF1744";
        Morris.Donut({
        element: 'Statistics_order',
        resize: true,
        colors: [
            '#E0F7FA',
            '#B2EBF2',
            '#80DEEA',
            '#4DD0E1',
            '#26C6DA',
            '#00BCD4',
            '#00ACC1',
            '#0097A7',
            '#00838F',
            '#006064'
        ],
        labelColor:"#cccccc", // text color
        data: [
            {label:"Processing", value:<?php echo $order_Processing  ?>, color:colorDanger},
            {label:"done", value:<?php echo $order_done  ?>},
        ]
        });

    });
</script>