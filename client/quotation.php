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
  <title>Quotation</title>
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
    <!-- Modal -->
    <div class="modal fade" id="deleteQuotationModal" tabindex="-1" role="dialog" aria-labelledby="deleteQuotationModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteQuotationModalLabel">Delete Quotation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="../php/quotationDelete.php" method="post">
            <div class="modal-body">
              <div class="form-group">
                <input type="hidden" id="quotation_ID" name="quotationID">
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
          <h4>Quotation</h4>
        </div>
      </div>
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header text-right">
              <button class="btn btn-primary" type="button" onclick="location.href='quotationController.php?qStatus=create'">Create</button>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered" id="table_quotation">
                <thead>
                  <tr>
                    <th class="col-lg-2">Date</th>
                    <th class="col-lg-2">Quotation No</th>
                    <th class="col-lg-2">Customer Name</th>
                    <th class="col-lg-2">Amount</th>
                    <th class="col-lg-2">Remark</th>
                    <th class="col-lg-2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Details of customer from database -->
                  <?php
                  include "../php/connection.php";
                  $sql = "SELECT * FROM client_quotation WHERE client_ID = '".$_SESSION["id"]."'";
                  $res = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($res) > 0) {
                    while($row = mysqli_fetch_assoc($res)){
                      $sql2 = "SELECT * FROM client_customer WHERE customer_ID = '".$row["customer_ID"]."'";
                      $res2 = mysqli_query($conn, $sql2);
                      if (mysqli_num_rows($res2) > 0) {
                        while($row2 = mysqli_fetch_assoc($res2)){
                          $sql3 = "SELECT * FROM client_quotation_item WHERE quotation_No = '".$row["quotation_ID"]."'";
                          $res3 = mysqli_query($conn, $sql3);
                          if (mysqli_num_rows($res3) > 0) {
                            while($row3 = mysqli_fetch_assoc($res3)){
                              $tAmount += $row3["amount"];
                              if($row["quotation_Remark"] == ""){
                                $row["quotation_Remark"] = "No Remark";
                              }
                            }
                            echo "<tr>";
                            echo "<td>";
                            echo $row["quotation_Date"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["quotation_No"];
                            echo "</td>";
                            echo "<td>";
                            echo $row2["customer_Name"];
                            echo "</td>";
                            echo "<td>";
                            echo $tAmount;
                            echo "</td>";
                            echo "<td>";
                            echo $row["quotation_Remark"];
                            echo "</td>";
                            echo "<td>";
                            echo "<div class='m-drop'>";
                            echo "<button class='btn btn-info' onclick=location.href='quotationController.php?qStatus=edit&qNo=".$row["quotation_ID"]."'>Edit</button>";
                            echo "<button class='btn btn-danger ml-3' id='btnDeleteQuotation' data-toggle='modal' data-target='#deleteQuotationModal' data-id='".$row["quotation_ID"]."'>Delete</button>";
                            echo "</div>";
                            echo "</td>";
                            echo "</tr>";
                            $tAmount = 0;
                          }
                        }
                      }
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
