@extends('layouts.admin')
@section('header, Home')

@section('content')
<div class="row">
    <h3>Home</h3>
</div>
<div class="row">
    <!-- Small boxes (Stat box) -->

    <div class="col-lg-3 col-6">
    <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$total_book}}</h3>

                <p>Total Books</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
                <a href="{{ url('books')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$total_member}}<sup style="font-size: 20px">%</sup></h3>

                <p>Total Members</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
                <a href="{{ url('members')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$total_publisher}}</h3>

                <p>Total Publishers</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
                <a href="{{url('publishers')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$total_transaction}}</h3>

                <p>Total Transactions</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
                <a href="{{url('transactions')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- AREA CHART -->
                {{--<div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Area Chart</h3>
    
                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                    <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
                </div>--}}
                <!-- /.card -->
    
                <!-- DONUT CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Data Publisher</h3>
    
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
    
                <!-- PIE CHART -->
                <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Pie Chart</h3>
    
                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
    
            </div>
            <!-- /.col (LEFT) -->
            <div class="col-md-6">
                <!-- LINE CHART -->
                {{--<div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Line Chart</h3>
    
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                <!-- /.card-body -->
                </div>--}}
                <!-- /.card -->
    
                <!-- BAR CHART -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Data Transaction</h3>
    
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
    
                <!-- STACKED BAR CHART -->
                {{--<div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Stacked Bar Chart</h3>
    
                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                    <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
                </div>--}}
                <!-- /.card -->
    
            </div>
            <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>



@endsection

<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>

<script type="text/javascript">

        var label_donut = <?php echo json_encode($label_donut); ?>;
        var data_donut = <?php echo json_encode($data_donut); ?>;
        var data_bar = <?php echo json_encode($data_bar); ?>;
        var label_pie = <?php echo json_encode($label_pie); ?>;
        var data_pie = <?php echo json_encode($data_pie); ?>;

    $(function () {

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
    var donutData        = {
        labels:label_donut,//JSON.parse(label_donut)
        datasets: [
            {
                data:data_donut,//JSON.parse(data_donut)
                backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#56f0ef'],
            }
        ]
    }
    var donutOptions     = {
        maintainAspectRatio : false,
        responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var areaChartData = {
        labels :['January', 'February', 'March','April',
        'May', 'June', 'July', 'August','September',
        'October', 'November', 'December'],
        datasets : data_bar,
    }
    
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    //var temp0 = areaChartData.datasets[0]
    //var temp1 = areaChartData.datasets[1]
    //barChartData.datasets[0] = temp1
    //barChartData.datasets[1] = temp0

    var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
    }

    new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.

    var dataPie        ={
        labels:label_pie,
        datasets: [
            {
                data:data_pie,
                backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#56f0ef'],
            }
        ]
    }
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = dataPie;
    var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
    })

    
})
</script>