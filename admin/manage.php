<!DOCTYPE html>
<?php
include "../config.php";
include "../php/connection.php";
// $status = $_SESSION["status"];
// if($staus == ""){
//   header("location:../index.php");
// }
?>
<html>
<head>
  <title>Manage</title>
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
  <!-- END adminLTE -->
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="admin/home.php" class="nav-link">Home</a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="../dist/img/AdminLTELogo.png"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">USER</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="manage.php" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>
                  Manage
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>
                  Logout
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- /. Main Sidebar Container -->
    <!-- Modal -->
    <?php include "modal/client.html"; ?>
    <!-- /. Modal -->

    <div class="content-wrapper">
      <div class="content-header">
        <div class="col-12 col-sm-12">
          <h4>Manage</h4>
        </div>
      </div>
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <a class="nav-link" href="#Online" data-toggle="tab">Online</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active show" href="#Request" data-toggle="tab">Request</a>
                </li>
                <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#createClientModal">Create</button>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade" id="Online" role="tabpanel" aria-labelledby="pills-profile-tab">
                  <table class="table table-bordered table-striped" id="table_manage_online">
                    <thead>
                      <tr>
                        <th class="col-lg-3">Status</th>
                        <th class="col-lg-3">Name</th>
                        <th class="col-lg-2">Email</th>
                        <th class="col-lg-2">Contact</th>
                        <th class="col-lg-1">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM manage_client WHERE client_Status = 'online' or client_Status = 'offline' ORDER BY client_Register_Date DESC";
                      $res = mysqli_query($conn, $sql);
                      if (mysqli_num_rows($res) > 0) {
                        while($row = mysqli_fetch_assoc($res)){
                          $sql2 = "SELECT * FROM login WHERE client_ID = '".$row["client_ID"]."'";
                          $res2 = mysqli_query($conn, $sql2);
                          if (mysqli_num_rows($res2) > 0) {
                            while($row2 = mysqli_fetch_assoc($res2)){
                              echo "<tr>";
                              echo "<td>";
                              echo $row["client_Status"];
                              echo "</td>";
                              echo "<td>";
                              echo $row["client_Name"];
                              echo "</td>";
                              echo "<td>";
                              echo $row["client_Email"];
                              echo "</td>";
                              echo "<td>";
                              echo $row["client_Contact"];
                              echo "</td>";
                              echo "<td>";
                              echo "<div class='m-drop'>";
                              echo "<button class='btn btn-info btn-drop'>Action</button>";
                              echo "</div>";
                              echo "</td>";
                              echo "</tr>";
                            }
                          }
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade show active" id="Request" role="tabpanel" aria-labelledby="pills-home-tab">
                  <table class="table table-bordered table-striped" id="table_manage_request">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Reason</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <!-- PHP Select SQL with Edit and Delete-->
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM manage_client WHERE status = 'request' ORDER BY client_Register_Date DESC";
                      $res = mysqli_query($conn, $sql);
                      if (mysqli_num_rows($res) > 0) {
                        while($row = mysqli_fetch_assoc($res)){
                          echo "<tr>";
                          echo "<td>";
                          echo $row["client_Name"];
                          echo "</td>";
                          echo "<td>";
                          echo $row["client_Email"];
                          echo "</td>";
                          echo "<td>";
                          echo $row["client_Contact"];
                          echo "</td>";
                          echo "<td>";
                          echo $row["client_Register_Reason"];
                          echo "</td>";
                          echo "<td>";
                          echo "<div class='m-drop'>";
                          echo "<button class='btn btn-info btn-drop'>Action</button>";
                          echo "</div>";
                          echo "</td>";
                          echo "</tr>";
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- END JQUERY -->
  <!-- BOOTSTRAP -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <!-- END BOOTSTRAP -->
  <!-- ADMINLTE -->
  <script type="text/javascript" src="../dist/js/adminlte.min.js"></script>
  <!-- END ADMINLTE -->
  <!-- DATATABLE -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="../js/dtScript.js" charset="utf-8"></script>
  <!-- END DATATABLE -->
</body>
</html>
