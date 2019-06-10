<!DOCTYPE HTML>
<?php
include "../config.php";
?>
<html>
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS  -->
  <!-- <link rel="stylesheet" type="text/css" href="../css/temp.css"> -->
  <!-- END CSS -->
  <!-- Bootstrap 4.2.1 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <!-- END Bootstrap 4.2.1 -->
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- END IonIcons -->
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="../dist/js/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <!-- END Font Awesome -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- END Google Font -->
  <!-- adminLTE -->
  <link rel="stylesheet" type="text/css" href="../dist/css/adminlte.min.css">
  <!-- END adminLTE -->
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navigation -->
    <?php include "nav.php"; ?>
    <!-- Navigation -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="col-12 col-sm-12">
          <h4>Home</h4>
        </div>
      </div>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 col-sm-3">
              <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1">
                  <i class="fa fa-user"></i>
                </span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Client </span>
                  <span class="info-box-number">
                    <!-- PHP goes here -->
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- JQUERY -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <!-- END JQUERY -->
  <!-- BOOTSTRAP -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <!-- END BOOTSTRAP -->
  <!-- ADMINLTE -->
  <script type="text/javascript" src="../dist/js/adminlte.min.js"></script>
  <!-- END ADMINLTE -->
</body>
</html>
