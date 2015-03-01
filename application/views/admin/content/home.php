<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Tổng quan</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row statistic">
            <div class="col-lg-3 col-sm-6">
                <div class="statistic-box">
                    <div class="box-header">
                        ĐƠN HÀNG MỚI
                    </div>
                    <div class="box-content">
                        <i class="fa fa-shopping-cart fa-3x"></i>
                        <span class="pull-right"><?= $new_order_number ?></span>
                    </div>
                    <div class="box-footer">
                        <a href="<?= BASE_URL ?>admin/order">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="statistic-box">
                    <div class="box-header">
                        TỔNG TIỀN <span class="pull-right">VNĐ</span>
                    </div>
                    <div class="box-content">
                        <i class="fa fa-credit-card fa-3x"></i>
                        <span class="pull-right"><?= $new_order_amount ?></span>
                    </div>
                    <div class="box-footer">
                        <a href="<?= BASE_URL ?>admin/order">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="statistic-box">
                    <div class="box-header">
                        BÌNH LUẬN TRONG NGÀY
                    </div>
                    <div class="box-content">
                        <i class="fa fa-comments fa-3x"></i>
                        <span class="pull-right"><?= $comment_number ?></span>
                    </div>
                    <div class="box-footer">
                        <a href="<?= BASE_URL ?>admin/comment">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="statistic-box">
                    <div class="box-header">
                        ĐANG TRUY CẬP
                    </div>
                    <div class="box-content">
                        <i class="fa fa-users fa-3x"></i>
                        <span class="pull-right"><?= $online_number ?></span>
                    </div>
                    <div class="box-footer">
                        <a href="#">Xem chi tiết <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Thống kê</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- chart -->
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Doanh số 7 ngày qua</h3>
                    </div>
                    <div class="panel-body">
                        <div id="column-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-align-left"></i> Thống kê mặt hàng bán chạy</h3>
                    </div>
                    <div class="panel-body">
                        <div id="bar-chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1.0', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
    google.setOnLoadCallback(drawXChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'VNĐ');
        data.addRows([
            <?php foreach ($seven_days as $item): ?>
            ['<?= $item['day'] ?>', <?= $item['sale'] ?>],
            <?php endforeach; ?>
        ]);

        // Set chart options
        var options = {};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('column-chart'));
        chart.draw(data, options);
    }

    function drawXChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'VNĐ');
        data.addRows([
            <?php foreach ($top_sale as $item): ?>
            ['<?= $item['product_name'] ?>', <?= $item['sum_total'] ?>],
            <?php endforeach; ?>
        ]);

        // Set chart options
        var options = {};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('bar-chart'));
        chart.draw(data, options);
    }
</script>

<style>
    #column-chart {
        width: 100%;
        height: 500px
    }
    #bar-chart {
        width: 100%;
        height: 500px
    }
</style>