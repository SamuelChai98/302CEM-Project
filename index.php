<!DOCTYPE HTML>
<?php
include "config.php";
$status = $_SESSION["status"];
if($staus == "admin"){
  header("location:admin/home.php");
}
else if($status == "client"){
  header("location:client/home.php");
}
 ?>
<html>
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS  -->
    <link rel="stylesheet" type="text/css" href="css/temp.css">
    <!-- END CSS -->
    <!-- Bootstrap 4.2.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- END Bootstrap 4.2.1 -->
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- END IonIcons -->
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" type="text/css" href="dist/js/plugins/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- END Font Awesome -->
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- END Google Font -->
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/datatables.min.css"/>
    <!-- END Datatable -->
    <!-- adminLTE -->
    <link rel="stylesheet" type="text/css" href="dist/css/adminlte.min.css">
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Invoice</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>

          <form action="php/login.php" method="post">
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-at"></i></span>
              </div>
              <input type="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="row">
              <div class="col-8">
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <p class="mb-1">
            <a href="#">I forgot my password</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- BOOTSTRAP -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!-- END BOOTSTRAP -->
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- END JQUERY -->
    <!-- Script File -->
    <script type="text/javascript" src="js/jscript.js"></script>
    <!-- END Script File -->
    <!-- ADMINLTE -->
    <script type="text/javascript" src="dist/js/adminlte.min.js'"></script>
    <!-- END ADMINLTE -->
  </body>
</html>
