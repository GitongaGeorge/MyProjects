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
        <div class="sidebar">
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
                    <li>
                        <a href="/history">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="/dash">
                            <i class="far fa-clock"></i>
                            <p>Live</p>
                        </a>
                    </li>
                    <li class="active ">
                        <a href="#">
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
                        <a class="navbar-brand" href="javascript:void(0)">Task Management</a>
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
                    <div class="card">
                        <div class="card-header">
                            New Tasks
                        </div>
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Saved!</strong> {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="card-body">
                            <form method="post" action="/savetask">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Task Name</label>
                                    <input type="text" class="form-control" name="taskname" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Due date</label>
                                    <input type="date" class="form-control" name="duedate" placeholder="12/12/12">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Task Description</label>
                                    <textarea class="form-control"  name="description" rows="4"></textarea>
                                </div>
                                <input type="submit" class="btn modal-black btn-info" value="Save Task">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            To-Do
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @if ($data)
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Task Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Date Due</th>
                                                <th scope="col">Mark as Done</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($data as $row)
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->description}}</td>
                                                <td>{{$row->duedate}}</td>
                                                <td><a class="btn btn-info" href="taskdone/{{$row->id}}">✓</a></td>
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
                <div class="row">
                    <div class="card ">
                        <div class="card-header">
                            Completed Tasks
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @if ($data1)
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Task Name</th>
                                                <th scope="col">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($data1 as $row)
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
