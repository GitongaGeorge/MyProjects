<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('dashboard/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{URL::asset('dashboard/img/favicon.png')}}">
    <link href="{{URL::asset('fontawesome/css/all.css')}}" rel="stylesheet">
    <title>
        Smart Irrigation
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="{{URL::asset('dashboard/css/nucleo-icons.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{URL::asset('dashboard/css/black-dashboard.css')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{URL::asset('dashboard/demo/demo.css')}}" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper">
        <div class="sidebar" data-color="blue">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="javascript:void(0)" class="simple-text logo-mini">
                        <i class="tim-icons icon-world"></i>
                    </a>
                    <a href="javascript:void(0)" class="simple-text logo-normal">
                        Smart Irrigation
                    </a>
                </div>
                <ul class="nav">
                  <li class="active ">
                      <a href="#">
                          <i class="fas fa-tachometer-alt"></i>
                          <p>Dashboard</p>
                      </a>
                  </li>
                  <li>
                      <a href="/dash">
                          <i class="far fa-clock"></i>
                          <p>Live </p>
                      </a>
                  </li>
                  <li>
                      <a href="/task">
                          <i class="fas fa-hammer"></i>
                          <p>Task </p>
                      </a>
                  </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle d-inline">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto">
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <div class="photo">
                                        <img src="{{URL::asset('dashboard/img/anime3.png')}}" alt="Profile Photo">
                                    </div>
                                    <b class="caret d-none d-lg-block d-xl-block"></b>
                                    <p class="d-lg-none">
                                        Log out
                                    </p>
                                </a>
                                <ul class="dropdown-menu dropdown-navbar">
                                    <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">{{$username}}</a></li>
                                    <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li class="nav-link"><a href="/logout" class="nav-item dropdown-item">Log out</a></li>
                                </ul>
                            </li>
                            <li class="separator d-lg-none"></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-chart">
                            <div class="card-header ">
                                <div class="row">
                                    <div class="col-sm-6 text-left">
                                        <h5 class="card-category">Soil Humidity</h5>
                                        <h2 class="card-title"><i class="fas fa-hand-holding-water"> </i>{{ $data[2]->value }}%</h2>
                                    </div>
                                    <div class="col-sm-6">
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                      <a href="/reportpdf" class="btn btn-primary">Export </a>
                    </div>
                  </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="chartBig1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category">Temperature</h5>
                                <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i>{{$data1[5]->value}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart-area" >
                                    <canvas id="chartLinegreen"  style="height:150px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category">Humidity</h5>
                                <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i>{{$data3[5]->value}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="CountryChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h5 class="card-category">Sunlight</h5>
                                <h3 class="card-title"><i class="tim-icons icon-send text-success"></i>{{$data2[5]->value}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="chartLineBlue"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card card-tasks">
                            <div class="card-header ">
                                <h6 class="title d-inline">Tasks ({{count($data4)}})</h6>
                                <p class="card-category d-inline">today</p>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-link dropdown-toggle btn-icon" data-toggle="dropdown">
                                        <i class="tim-icons icon-settings-gear-63"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#pablo">Action</a>
                                        <a class="dropdown-item" href="#pablo">Another action</a>
                                        <a class="dropdown-item" href="#pablo">Something else</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-full-width table-responsive">
                                  @if ($data4)
                                  <table class="table table-striped">
                                      <thead>
                                          <tr>
                                              <th scope="col">Task Name</th>
                                              <th scope="col">Description</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              @foreach ($data4 as $row)
                                              <td>{{$row->name}}</td>
                                              <td>{{$row->description}}</td>
                                          </tr>
                                          @endforeach
                                      </tbody>
                                  </table>
                                  @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{URL::asset('dashboard/js/core/jquery.min.js')}}"></script>
    <script src="{{URL::asset('dashboard/js/core/popper.min.js')}}"></script>
    <script src="{{URL::asset('dashboard/js/core/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('dashboard/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{URL::asset('dashboard/js/plugins/chartjs.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{URL::asset('dashboard/js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{URL::asset('dashboard/js/black-dashboard.min.js')}}"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
    <script type="text/javascript">
        $(document).ready(function() {
            showGraph();
            drawbar();
            drawbar1();
            drawbar2();
        });
        var data = {!!json_encode($data) !!}
        var x=[];
        var y=[];
        var ctx2 = document.getElementById("chartLinegreen").getContext('2d');
        var ctx4 = document.getElementById("CountryChart").getContext('2d');
        var ctx5 = document.getElementById("chartLineBlue").getContext('2d');
        var myLineChart;
        var myBarChart;
        var myBarChart1;
        var myBarChart2;
        var myBarChart3;
        console.log(data[0].value);

        for (i = 0; i < data.length; i++) {
            x[i] = data[i].value;
            y[i] = data[i].created_at;
        }


        var ctx = document.getElementById("chartBig1").getContext('2d');
        var myLineChart;

        function showGraph() {
            gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);
            gradientStroke.addColorStop(1, 'rgba(72,72,176,0.1)');
            gradientStroke.addColorStop(0.4, 'rgba(72,72,176,0.0)');
            gradientStroke.addColorStop(0, 'rgba(119,52,169,0)');
            myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: y,
                    datasets: [{
                        data: x,
                        backgroundColor: gradientStroke,
                        borderColor: '#d346b1',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                drawOnChartArea: true
                            },
                            ticks: {
                                autoSkip: false,
                                min: 0

                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                drawOnChartArea: true
                            },
                            display: false,
                        }]
                    }
                }
            });
        }

        function drawbar() {
          var data = {!!json_encode($data1) !!}
          var p=[];
          var o=[];
          for (i = 0; i < data.length; i++) {
              p[i] = data[i].value;
              o[i] = data[i].created_at;
          }
          myBarChart = new Chart(ctx2, {
            type: 'line',
            data: {
              labels : o,
              datasets : [{
                data: p,
                borderColor: '#0ffc03',
                borderWidth: 2
              }]
            },
            options: {
              responsive: true,
              legend: {
                display: false
              },
              scales: {
                yAxes: [{
                  gridLines: {
                    drawOnChartArea: true
                  },
                  ticks: {
                    autoSkip: true,
                    min : 0

                  }
                }],
                xAxes: [{
                  gridLines: {
                    drawOnChartArea: false
                  },
                  ticks: {
                    maxTicksLimit: 8
                  },
                  display: false,
                }]
              }
            }
          });
        }

        function drawbar1() {

          var data = {!!json_encode($data3) !!}
          var p=[];
          var o=[];
          for (i = 0; i < data.length; i++) {
              p[i] = data[i].value;
              o[i] = data[i].created_at;
          }

          myBarChart1 = new Chart(ctx4, {
            type: 'bar',
            data: {
              labels : o,
              datasets : [{
                data: p,
                borderColor: '#03fcf0',
                borderWidth: 2
              }]
            },
            options: {
              responsive: true,
              legend: {
                display: false
              },
              scales: {
                yAxes: [{
                  gridLines: {
                    drawOnChartArea: false
                  },
                  ticks: {
                    autoSkip: true,
                    min : 0

                  }
                }],
                xAxes: [{
                  gridLines: {
                    drawOnChartArea: true
                  },
                  ticks: {
                    maxTicksLimit: 8
                  },
                  display: false,
                }]
              }
            }
          });
        }

        function drawbar2() {
          var data = {!!json_encode($data2) !!}
          var p=[];
          var o=[];
          for (i = 0; i < data.length; i++) {
              p[i] = data[i].value;
              o[i] = data[i].id;
          }
          myBarChart2 = new Chart(ctx5, {
            type: 'bar',
            data: {
              labels : o,
              datasets : [{
                data: p,
                borderColor: '#dbd64b',
                borderWidth: 2
              }]
            },
            options: {
              responsive: true,
              legend: {
                display: false
              },
              scales: {
                yAxes: [{
                  gridLines: {
                    drawOnChartArea: true
                  },
                  ticks: {
                    autoSkip: false,
                    min : 0

                  }
                }]
              }
            }
          });
        }
    </script>
</body>

</html>
