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

<body class="bg-primary" >
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper" data-color="blue"
      >
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
            <i class="tim-icons icon-world"></i>
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
            Smart Irrigation
          </a>
        </div>
        <ul class="nav">
          <li>
              <a href="/history">
                  <i class="fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
              </a>
          </li>
          <li class="active ">
              <a href="#">
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
            <a class="navbar-brand" href="#">Live Data Monitoring</a>
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
                    {{$username}}
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
                    <h5 class="card-category">Soil Moisture</h5>
                    <h2 class="card-title" id="soilmoisture"><i class="fas fa-fill-drip"></i>0</h2>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartBig1" style="display: block; height: 130px; width: 532px;"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Temperature</h5>
                <h3 class="card-title" id="temper"><i class="fas fa-temperature-low"></i>0</h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartLinegreen"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Humidity</h5>
                <h3 class="card-title" id="humidity"><i class="fas fa-hand-holding-water"></i>0</h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartLineyellow"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="card card-chart">
                <div class="card-header">
                  <h5 class="card-category">Sun</h5>
                  <h3 class="card-title" id="sunlight"><i class="far fa-sun"></i>0</h3>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="CountryChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card card-chart">
                <div class="card-header">
                  <h5 class="card-category">Rain</h5>
                  <h3 class="card-title" id="rain"><i class="fas fa-cloud-rain"></i>0</h3>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="chartLineBlue"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <ul class="nav">
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                Creative Tim
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                About Us
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                Blog
              </a>
            </li>
          </ul>
        </div>
      </footer>
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
  <script src="{{URL::asset('dashboard/demo/demo.js')}}"></script>
  <script>
        $(document).ready(function () {
            //showGraph();
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            //getMessage();
            showGraph();
        });
        var ctx = document.getElementById("chartBig1").getContext('2d');
        var ctx2 = document.getElementById("chartLinegreen").getContext('2d');
        var ctx3 = document.getElementById("chartLineyellow").getContext('2d');
        var ctx4 = document.getElementById("CountryChart").getContext('2d');
        var ctx5 = document.getElementById("chartLineBlue").getContext('2d');
        var myLineChart;
        var myBarChart;
        var myBarChart1;
        var myBarChart2;
        var myBarChart3;
        var temperature;
        var humidity;
        var rain;
        var sun;
        var all;
        var x=0;

        function drawbar() {
          myBarChart = new Chart(ctx2, {
            type: 'line',
            data: {
              labels : [2],
              datasets : [{
                data: [temperature],
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
          myBarChart1 = new Chart(ctx3, {
            type: 'bar',
            data: {
              labels : [2],
              datasets : [{
                data: [humidity],
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
          myBarChart2 = new Chart(ctx4, {
            type: 'bar',
            data: {
              labels : [2],
              datasets : [{
                data: [sun],
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

        function drawbar3() {
          myBarChart3 = new Chart(ctx5, {
            type: 'line',
            data: {
              labels : [2],
              datasets : [{
                data: [rain],
                borderColor: '#2b34e3',
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

        setInterval(function(){
          $.post("/getsunlight",function (soil)
          {
            var temp=soil.msg;
            //all=temp;
            var d = new Date();
            var n = d.getHours();
            document.getElementById("sunlight").innerHTML = "<i class=\"far fa-sun\"></i>"+temp[0];
            document.getElementById("rain").innerHTML = "<i class=\"fas fa-cloud-rain\"></i>"+temp[1];
            document.getElementById("soilmoisture").innerHTML = "<i class=\"fas fa-fill-drip\"></i>"+temp[2];
            document.getElementById("humidity").innerHTML = "<i class=\"fas fa-hand-holding-water\"></i>"+temp[3];
            document.getElementById("temper").innerHTML = "<i class=\"fas fa-temperature-low\"></i>"+temp[4];
            if (x > 10)
            {
              moveChart(myLineChart,n,temp[2]);
              moveChart(myBarChart,n,temp[4]);
              moveChart(myBarChart1,n,temp[3]);
              moveChart(myBarChart2,n,temp[0]);
              moveChart(myBarChart3,n,temp[1]);
            }
            else {
              addData(myLineChart,n,temp[2]);
              addData(myBarChart,n,temp[4]);
              addData(myBarChart1,n,temp[3]);
              addData(myBarChart2,n,temp[0]);
              addData(myBarChart3,n,temp[1]);
              x=x+1;
            }
          });
        }, 1000);

        function addData(chart, label, data) {
          chart.data.labels.push(label);
          chart.data.datasets.forEach((dataset) => {
            dataset.data.push(data);
          });
          chart.update();
        }

        function moveChart(chart, label, newData) {
          chart.data.labels.splice(0, 1); // remove first label
          chart.data.datasets.forEach((dataset) => {
            dataset.data.splice(0, 1); // remove first data point
          });
          chart.update();
          chart.data.labels.push(label); // add new label at end
          chart.data.datasets.forEach((dataset, index) => {
            dataset.data.push(newData); // add new data at end
          });
          chart.update();
        }

        function showGraph()
        {
            {
                $.post("/getsunlight",
                function (data)
                {
                    console.log(data.msg);
                    var temp=data.msg;
                    temperature=temp[4];
                    humidity=temp[3];
                    sun=temp[0];
                    rain=temp[1];
                    var d = new Date();
                    var n = d.getHours();
                    gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);
                    gradientStroke.addColorStop(1, 'rgba(72,72,176,0.1)');
                    gradientStroke.addColorStop(0.4, 'rgba(72,72,176,0.0)');
                    gradientStroke.addColorStop(0, 'rgba(119,52,169,0)');
                    myLineChart = new Chart(ctx, {
                      type: 'line',
                      data: {
                        labels : [n],
                        datasets : [{
                          data: [temp[2]],
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
                });

            }
            drawbar();
            drawbar1();
            drawbar2();
            drawbar3();
        }
        </script>
</body>

</html>
