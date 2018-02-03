<!-- This is the trainee dashboard -->

@extends('traineee.layout.app')

@section('main-content')

<style media="screen">

.card {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 0.25rem;
}

.card > hr {
  margin-right: 0;
  margin-left: 0;
}

.card > .list-group:first-child .list-group-item:first-child {
  border-top-left-radius: 0.25rem;
  border-top-right-radius: 0.25rem;
}

.card > .list-group:last-child .list-group-item:last-child {
  border-bottom-right-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
}

.card-header {
padding: 0.75rem 1.25rem;
margin-bottom: 0;
background-color: rgba(0, 0, 0, 0.03);
border-bottom: 1px solid rgba(0, 0, 0, 0.125);

}

.card-header:first-child {
border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}

.card-header + .list-group .list-group-item:first-child {
border-top: 0;
}

.card-body {
  -webkit-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  padding: 1.25rem;
}

.mb-3,
.my-3 {
  margin-bottom: 1rem !important;
}

</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 class="text-center">
            Your Statistics
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">



        <!-- <h2 class="page-header">Your Feed</h2> -->

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h4 class="text-center">{{$total_hours_for_today}} Hours {{$minutes_for_this_today}} Minutes</h3>

                                <p class="text-center">Hours Logged in Today</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h4 class="text-center">{{$total_hours_for_this_week}} Hours {{$minutes_for_this_week}} Minutes</h3>

                                <p class="text-center">Hours Logged in a Week's Time</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h4 class="text-center">{{$total_hours_for_this_month}} Hours {{$minutes_for_this_month}} Minutes</h3>

                                <p class="text-center">Hours Logged in a Month's Time</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h4 class="text-center">{{$total_hours_for_this_year}} Hours {{$minutes_for_this_year}} Minutes</h3>

                                <p class="text-center">Hours Logged in This Year</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
            <!-- /.col -->


            <!-- /.col -->
        </div>
        <div class="row">
            <!-- <div class="col-md-12 col-md-offset-1">
            <div id="curve_chart" style="width: 900px; height: 500px"></div>
        </div> -->

        <div class=" col-md-12">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-area-chart"></i> Your Improvement Graph For The Year - {{$present_year}}</div>
                <div class="card-body ">
                    <canvas id="myAreaChart" width="100%" height="30"></canvas>
                </div>
            </div>
        </div>

            <!-- /.box-body -->
        </div>


    </div>


</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection

@section('scripts')
<script type="text/javascript">

    var ctx = document.getElementById("myAreaChart");
    console.log(ctx);
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
          label: "Sessions",
          lineTension: 0.3,
          backgroundColor: "rgba(2,117,216,0.2)",
          borderColor: "rgba(2,117,216,1)",
          pointRadius: 5,
          pointBackgroundColor: "rgba(2,117,216,1)",
          pointBorderColor: "rgba(255,255,255,0.8)",
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(2,117,216,1)",
          pointHitRadius: 20,
          pointBorderWidth: 2,
          data: [2000, 30162, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984, 38451],
        }],
      },
      options: {
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              min: 0,
              max: 40000,
              maxTicksLimit: 5
            },
            gridLines: {
              color: "rgba(0, 0, 0, .125)",
            }
          }],
        },
        legend: {
          display: false
        }
      }
    });

</scripts>

@endsection
