@extends('admin.template')
<style>
  .centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  }
  /* Add an italic font style to all quotes */
  q {font-style: italic;}
</style>
@section('content')
<?php
    use App\Http\Controllers\CustomerController;
      $etiqa = CustomerController::etiqa();
      $kurnia = CustomerController::kurnia();
      $liberity = CustomerController::liberity();
      $allianz = CustomerController::allianz();
      $semua = CustomerController::semua();
?>
@if(Session::get('adid'))
  <div class="container-fluid">
    <h1 class="m-0">Dashboard</h1>
      <!-- Row -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$liberity}}</h3>

              <p>Liberity Insurans</p>
            </div>
            <div class="icon">
              <i class="fab fa-laravel"></i>
            </div>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$allianz}}</h3>

              <p>Allianz General Insurans</p>
            </div>
            <div class="icon">
              <i class="fab fa-amilia"></i>
            </div>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$etiqa}}</h3>

              <p>eTiQa Insurans</p>
            </div>
            <div class="icon">
              <i class="fab fa-etsy"></i>
            </div>
          </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$kurnia}}</h3>

              <p>Kurnia Insurans</p>
            </div>
            <div class="icon">
              <i class="fab fa-kaggle"></i>
            </div>
          </div>
        </div><!-- ./col -->
      </div><!-- /.row -->
      Jumalah Pelanggan(Keseluruhan) : {{$semua}} <br><br>
      <!-- Main row -->
      <div class="row">
        <!--Right Col -->
        <!--Left Col -->
        <section class="col-lg-7 connectedSortable">
            <!-- BAR CHART -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Jumlah Pelanggan Bulanan Tahun 2023</h3>

                <!-- card tools -->
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div style="width: 600px; margin: auto"> 
                    <canvas id="chart"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section><!-- /.Left col -->
        <section class="col-lg-5 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Waktu
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <div style="text-align:center;padding:1em 0;"> 
                    <h3>
                      <a style="text-decoration:none;" href="https://www.zeitverschiebung.net/en/city/1736309">
                      <span style="color:gray;">
                          Waktu Semasa di
                      </span><br />Kuala Lumpur, Malaysia
                      </a>
                    </h3> 
                    <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=medium&timezone=Asia%2FKuala_Lumpur"
                    width="100%" height="115" frameborder="0" seamless></iframe> 
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
        </section><!-- /.Right col -->
      </div><!-- /.row (main row) -->     
  </div>
@endsection

@section('javascripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        });
    </script>
    <script>
        var ctx = document.getElementById('chart').getContext('2d');
        var userChart = new Chart (ctx,{
            type:'bar',
            data:{
                labels: {!! json_encode($labels) !!},
                datasets: {!! json_encode($datasets) !!}
            },
        });
    </script>

@else
        <div class="alert alert-danger">
            <p>{{ $message }}<button onclick="location.href='{{ route('index') }}'">Login</button></p>
        </div>
@endif  
@endsection