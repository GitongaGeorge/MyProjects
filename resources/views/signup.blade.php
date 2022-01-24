<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{URL::asset('logins/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{URL::asset('logins/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Smart Irrigation
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{URL::asset('logins/css/material-kit.css')}}" rel="stylesheet" />
  <link href="{{URL::asset('fontawesome/css/all.css')}}" rel="stylesheet">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{URL::asset('logins/demo/demo.css')}}" rel="stylesheet" />
</head>

<body class="logins-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="">
          Smart Irrigarion </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" style="background-image: url('logins/img/bg21.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="post" action="/saveuser">
              {{ csrf_field() }}
              <div class="card-header text-center">
                <h4 class="card-title">Sign up</h4>
              </div>
              <p class="description text-center">Enter your Credentials</p>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-smile-beam"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="fname" placeholder="First Name....">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="far fa-smile-beam"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="lname" placeholder="Last Name....">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input type="email" class="form-control" name="email" placeholder="Email....">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" class="form-control" name="password" placeholder="Password....">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" class="form-control" name="repeatpassword" placeholder="Repeat Password....">
                </div>
              </div>
              <div class="footer text-center">
                <input type="submit" class="btn btn-outline-primary" value="Sign Up">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  <script src="{{URL::asset('logins/js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('logins/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('logins/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
  <script src="{{URL::asset('logins/js/plugins/moment.min.js')}}"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{URL::asset('logins/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{URL::asset('logins/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{URL::asset('logins/js/material-kit.js')}}" type="text/javascript"></script>
</body>

</html>
