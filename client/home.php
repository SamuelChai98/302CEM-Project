<!DOCTYPE html>
<?php
include "../config.php";
// $status = $_SESSION["status"];
// if($staus == ""){
//   header("location:../index.php");
// }
?>
<html>
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS  -->
  <link rel="stylesheet" type="text/css" href="../css/temp.css">
  <!-- END CSS -->
  <!-- Bootstrap 4.2.1 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <!-- END Bootstrap 4.2.1 -->
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- END IonIcons -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <!-- END Font Awesome -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- END Google Font -->
  <!-- Datatable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/datatables.min.css"/>
  <!-- END Datatable -->
  <!-- adminLTE -->
  <link rel="stylesheet" type="text/css" href="../dist/css/adminlte.min.css">
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
            <div class="col-12 col-sm-6 col-xl-3">
              <div class="info-box">
                <span class="info-box-icon bg-primary elevation-1">
                  <i class="fa fa-user"></i>
                </span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Customer</span>
                  <span class="info-box-number">
                    <!-- PHP goes here -->
                    <?php
                    include "../php/connection.php";
                    $sql = "SELECT COUNT(customer_ID) as cID FROM client_customer WHERE client_ID = '".$_SESSION["id"]."' AND customer_Verify = '1'";
                    $res = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($res) > 0){
                      $row = mysqli_fetch_assoc($res);
                      echo $row["cID"];
                    }
                    mysqli_close($conn);
                     ?>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1">
                  <i class="fa fa-file"></i>
                </span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Quotation</span>
                  <span class="info-box-number">
                    <!-- PHP goes here -->
                    <?php
                    include "../php/connection.php";
                    $sql = "SELECT COUNT(quotation_ID) as qID FROM client_quotation WHERE client_ID = '".$_SESSION["id"]."'";
                    $res = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($res) > 0){
                      $row = mysqli_fetch_assoc($res);
                      echo $row["qID"];
                    }
                    mysqli_close($conn);
                     ?>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
              <div class="info-box">
                <span class="info-box-icon bg-warning elevation-1">
                  <i class="fa fa-archive"></i>
                </span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Product</span>
                  <span class="info-box-number">
                    <!-- PHP goes here -->
                    <?php
                    include "../php/connection.php";
                    $sql = "SELECT COUNT(product_ID) as pID FROM client_product WHERE client_ID = '".$_SESSION["id"]."'";
                    $res = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($res) > 0){
                      $row = mysqli_fetch_assoc($res);
                      echo $row["pID"];
                    }
                     ?>
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
