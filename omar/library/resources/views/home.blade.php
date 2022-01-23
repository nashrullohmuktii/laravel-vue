@extends('layouts.admin')
@section('header')
    Home
@endsection

@section('content')
<div class="container">
    {{-- Card --}}
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $total_buku }}</h3>

                <p>Total Buku</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('books') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $total_member }}</h3>

                <p>Total Anggota</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('members') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $total_penerbit }}</h3>

                <p>Data Penerbit</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('publishers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $total_peminjaman }}</h3>

                <p>Data Peminjaman</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ url('transactions') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    <!-- ./col -->
    </div>

    {{-- Graph --}}
    <div class="container-fluid">
        <div class="row">
            {{-- Kiri --}}
            <div class="col-md-6">
                <!-- DONUT CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Grafik Penerbit</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            {{-- Kanan --}}
            <div class="col-md-6">
                <!-- BAR CHART -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Grafik Peminjaman</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
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
            </div>
        </div>
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Grafik Penulis</h3>

                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                </div>
            </div>
            <div class="card-body">
                <canvas id="donutChart_penulis" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection


@section('js')
<!-- ChartJS -->
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
<script>

    //Data
    var data_donut = '{!! json_encode($data_donut) !!}';
    var label_donut = '{!! json_encode($label_donut) !!}';
    var warna = '{!! json_encode($warna) !!}';
    var data_bar = '{!! json_encode($data_bar) !!}';
    var data_donut_penulis = '{!! json_encode($data_donut_penulis) !!}';
    var label_donut_penulis = '{!! json_encode($label_donut_penulis) !!}';
    var warna_penulis = '{!! json_encode($warna_penulis) !!}';

    //Donut Chart Penerbit

    $(function(){
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData        = {
        labels: JSON.parse(label_donut),
        datasets: [
            {
            data: JSON.parse(data_donut),
            backgroundColor : JSON.parse(warna),
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

    });

    //Bar Chart
    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      datasets: JSON.parse(data_bar)
    };


    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    // var temp0 = areaChartData.datasets[0]
    // var temp1 = areaChartData.datasets[1]
    // barChartData.datasets[0] = temp1
    // barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    });

    //Donut Chart PenePenulisrbit

    $(function(){
        var donutChartCanvas = $('#donutChart_penulis').get(0).getContext('2d')
        var donutData        = {
        labels: JSON.parse(label_donut_penulis),
        datasets: [
            {
            data: JSON.parse(data_donut_penulis),
            backgroundColor : JSON.parse(warna_penulis),
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

    });
    
</script>
    
@endsection