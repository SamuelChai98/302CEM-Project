<!DOCTYPE html>
<html>
<head>
  <title>Quotation - Create</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS  -->
  <link rel="stylesheet" type="text/css" href="../../css/temp.css">
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
  <link rel="stylesheet" type="text/css" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
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
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png"
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
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">USER</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="../quotation.php" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>
                Quotation
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
  <div class="content-wrapper">
    <div class="content-header">
      <!-- <div class="col-12 col-sm-12">
        <h4>Quotation</h4>
      </div> -->
    </div>
    <div class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h4 style="float:left;">No: 1</h4>
            <button type="submit" form="qForm" class="btn btn-success float-right">Create</button>
          </div>
          <div class="card-footer">
            <strong>Details</strong>
          </div>
          <form id="qForm" action="#" method="post"> <!-- form action to insert all -->
            <div class="card-body">
              <div class="form-group">
                <div class="row">
                  <!-- <input type="hidden" name="qno" value=""/> Get quotation number -->
                  <!-- <input type="hidden" name="totalAmount" value="" readonly/> Total amount of item -->
                  <div class="col">
                    <label>Customer Name</label>
                    <input type="text" list="customer_list" name="cust_name" class="form-control" placeholder="Enter Customer Name" id="cust_name">
                  </div>
                  <div class="col">
                    <label>Date Start</label>
                    <input type="date" name="dateStart" class="form-control">
                  </div>
                  <div class="col">
                    <label>Date End</label>
                    <input type="date" name="dateEnd" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <strong>Products</strong>
            </div>
            <div class="card-body">
              <div class="card-body table-resonsive">
                <table class="table table-bordered" id="table_quotation_product">
                  <thead>
                    <tr>
                      <!-- <th class="col-lg-1">#</th> -->
                      <th class="col-lg-6">Product Name</th>
                      <!-- <th class="col-lg-3">Description</th> -->
                      <th class="col-lg-1">Quantity</th>
                      <th class="col-lg-1">Price(each)</th>
                      <th class="col-lg-2">Tax</th>
                      <th class="col-lg-2" colspan="2">Amount</th>
                    </tr>
                    <tr class="form-group">
                      <th>
                        <input type="text" list="product_list" id="pname" name="pname" class="form-control" placeholder="Product name" required>
                      </th>
                      <th>
                        <input type="text" id="quantity" name="quantity" class="form-control" placeholder="Qty" required>
                      </th>
                      <th>
                        <input type="text" id="price" name="price" class="form-control" placeholder="Price" required>
                      </th>
                      <th>
                        <input type="text" id="tax" name="tax" class="form-control" placeholder="Tax description" required>
                      </th>
                      <th>
                        <input type="text" id="total_amount" name="amount" class="form-control" placeholder="Amount" required>
                      </th>
                      <th>
                        <input type="hidden" value="Delete">
                        <button type="button" name="add" id="btn_add" class="btn btn-warning">Add <i class="fas fa-level-down-alt"></i></button>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="6" class="bg-light">
                        <p><u>Item List</u></p>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <!-- Remark -->
                    <tr>
                      <td colspan="3">
                        <strong>Remark: </strong>
                        <input type="text" id="quotationRemark" class="form-control" value="<?php echo $_SESSION['remark'];?>" placeholder="Remark...">
                      </td>
                      <td colspan="4">
                        <label>Total:</label>
                        <!-- EITHER use <p> or <input> -->
                        <!-- <input type="text" name="tAmount" id="total_amount" value="" readonly> -->
                        <!-- <p></p> -->
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- BOOTSTRAP -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <!-- END BOOTSTRAP -->
  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- END JQUERY -->
  <!-- Script File -->
  <!-- <script type="text/javascript" src="//<?php //echo ABSPATH . 'js/mobile-detect.js'; ?>"></script> -->
  <!-- END Script File -->
  <!-- ADMINLTE -->
  <script type="text/javascript" src="../dist/js/adminlte.min.js"></script>
  <!-- END ADMINLTE -->
</body>
</html>
