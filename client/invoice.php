<!DOCTYPE html>
<?php
include "../config.php";
include "../php/connection.php";
?>
<html>
<head>
  <title>Invoice</title>
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
  <link rel="stylesheet" type="text/css" href="../dist/js/plugins/font-awesome/css/font-awesome.min.css">
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
    <!-- Modal -->
    <div class="modal fade" id="deleteInvoiceModal" tabindex="-1" role="dialog" aria-labelledby="deleteInvoiceModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteInvoiceModalLabel">Delete Customer</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="../php/invoiceDelete.php" method="post">
            <div class="modal-body">
              <div class="form-group">
                <input type="hidden" id="invoice_ID" name="invoiceID">
                <label class="col-form-label">Are you sure to delete this.</label>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="customer_ID" id="customer-id">
              <button type="button" class="btn btn-danger mr-auto" data-dismiss="modal"><i class="fa fa-ban"></i> No</button>
              <button type="submit" value="customer" name="btnMaintenance" class="btn btn-primary"><i class="fa fa-trash"></i> Yes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- END Modal -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="col-12 col-sm-12">
          <h4>Invoice</h4>
        </div>
      </div>
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <!-- Tabs for Tables -->
            <div class="card-header d-flex p-0">
              <ul class="nav nav-pills ml-auto p-2">
                <button class="btn btn-warning" type="button" onclick="location.href='invoiceController.php?iStatus=create'">Create</button>
              </ul>
            </div>
            <!-- Table -->
            <div class="card-body">
              <table class="table table-striped table-bordered" id="table_invoice">
                <thead>
                  <tr>
                    <th class="col-lg-2">Date</th>
                    <th class="col-lg-2">Invoice No</th>
                    <th class="col-lg-2">Customer</th>
                    <th class="col-lg-1">Amount</th>
                    <th class="col-lg-2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $islc = "SELECT * FROM client_invoice WHERE client_ID = '".$_SESSION["id"]."'";
                  $ires = mysqli_query($conn, $islc);
                  if (mysqli_num_rows($ires) > 0) {
                    while($irow = mysqli_fetch_assoc($ires)){
                      $cslc = "SELECT * FROM client_customer WHERE customer_ID = '".$irow["customer_ID"]."'";
                      $cres = mysqli_query($conn, $cslc);
                      if (mysqli_num_rows($cres) > 0) {
                        while($crow = mysqli_fetch_assoc($cres)){
                          echo "<tr>";
                          echo "<td>";
                          echo "<p>".$irow["invoice_Date"]."</p>";
                          echo "</td>";
                          echo "<td>";
                          echo "<p>".$irow["invoice_No"]."</p>";
                          echo "</td>";
                          echo "<td>";
                          echo "<p>".$crow["customer_Name"]."</p>";
                          echo "</td>";
                          echo "<td>";
                          echo "<p>".$irow["invoice_Amount"]."</p>";
                          echo "</td>";
                          echo "<td>";
                          echo "<div class='i-drop'>";
                          echo "<button class='btn btn-info' onclick=location.href='invoiceController.php?iStatus=edit&iNo=".$irow["invoice_ID"]."'>Edit</button>";
                          echo "<button class='btn btn-danger ml-3' id='btnDeleteInvoice' data-toggle='modal' data-target='#deleteInvoiceModal' data-id='".$irow["invoice_ID"]."'>Delete</button>";
                          echo "</div>";
                          echo "</td>";
                          echo "</tr>";
                        }
                      }
                    }
                  }
                  mysqli_close($conn);
                  ?>
                </tbody>
              </table>

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
  <!-- DATATABLE -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="../js/dtScript.js" charset="utf-8"></script>
  <!-- END DATATABLE -->
  <!-- MODAL -->
  <script type="text/javascript" src="../js/modalScript.js" charset="utf-8"></script>
  <!-- END MODAL -->
</body>
</html>
