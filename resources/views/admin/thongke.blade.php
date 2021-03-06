@extends('admin.template.master')
@section('title')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Thống kê</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Thống kê</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
            <h3>{{ $donHangMoi }}</h3>

          <p>Đơn hàng mới</p>
        </div>
        <div class="icon">
          <i class="fas fa-shopping-cart"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
            <h3>{{ number_format($tongDoanhThuThang) }}</h3>
          <p>Doanh thu tháng {{Carbon\Carbon::now()->month}}</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-gradient-success">
        <div class="inner">
          <h3>{{ $khachHang }}</h3>

          <p>Khách hàng tháng {{Carbon\Carbon::now()->month}}</p>
        </div>
        <div class="icon">
          <i class="fas fa-user-plus"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $donHangDaGiao }}</h3>
          <p>Đơn hàng đã giao</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
  </div>

  <div class="row">
    <div class="col-md-6">
         <!-- LINE CHART -->
        <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Biểu đồ đơn hàng theo tháng</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart">
            <canvas id="myLineChart"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <div class="col-md-6">
        <!-- LINE CHART -->
       <div class="card card-warning">
       <div class="card-header">
         <h3 class="card-title">Biểu đồ doanh thu theo tháng</h3>

         <div class="card-tools">
           <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
           </button>
           <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
         </div>
       </div>
       <div class="card-body">
         <div class="chart">
           <canvas id="myBarChart"></canvas>
         </div>
       </div>
       <!-- /.card-body -->
     </div>
     <!-- /.card -->
   </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script>
        // su dung linechart
        var lineChart = document.getElementById('myLineChart').getContext('2d');
        var myLineChart = new Chart(lineChart, {
            type: 'line',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8','Tháng 9','Tháng 10','Tháng 11', 'Tháng 12'],
                datasets: [
                    {
                        label: 'Đơn hàng',
                        backgroundColor: 'rgb(250, 128, 114)',
                        borderColor: 'rgb(255, 160, 122)',
                        data: [
                            @foreach($thongKeDonHang as $item)
                                {{ $item }}, //chu y phai co dau phay, vi mang nen ko can item tro toi
                            @endforeach
                        ]
                    },
                ]
            },
            options: {}
        });
        //id cua canvas
        // su dung barchar
        var barChart = document.getElementById('myBarChart').getContext('2d');
        var myBarChart = new Chart(barChart, {
            type: 'bar',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8','Tháng 9','Tháng 10','Tháng 11', 'Tháng 12'],
                datasets: [
                    {
                        label: 'Doanh thu',
                        backgroundColor: 'rgb(255, 255, 0)',
                        borderColor: 'rgb(255, 255, 0)',
                        data: [
                            @foreach($thongKeDoanhThu as $item)
                                {{ $item }}, //chu y phai co dau phay, vi mang nen ko can item tro toi
                            @endforeach
                        ]
                    },
                ]
            },
            options: {}
        });
</script>
@endsection