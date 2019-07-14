<?php
session_start();
include "../php/connection.php";
$slc = "SELECT * FROM client_invoice WHERE client_ID='".$_SESSION["id"]."'";
$res = mysqli_query($conn, $slc);
if (mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)){
    if($row["invoice_No"] == 0){
      $ino = $row["invoice_No"];
      ++$ino;
      // echo $ino;
    }
    else if($row["invoice_No"] != 0){
      $ino = $row["invoice_No"];
      ++$ino;
      // echo $ino;
    }
  }
}
else{
  ++$ino;
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Invoice - Create</title>
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
      <div class="content-wrapper">
        <div class="content-header">
          <div class="col-12 col-sm-12">
            <h3>Invoice - Create</h3>
          </div>
        </div>
        <div class="content"> <!-- EITHER EDIT OR REMOVE EXTRA CONTAINER JUST IN CASE -->
          <form action="../php/invoiceAdd.php" method="post">
            <!-- Left side section -->
            <div class="container-fluid">
              <div class="card">
                <div class="card-header">
                  <h4 style="float:left;">No:<?php echo $ino;?></h4>
                  <button type="submit" class="btn btn-primary mr-1" style="float:right;"><i class="fa fa-save"></i> Create</button>
                  <input type="hidden" name="totalAmount" value="<?php echo $t;?>" readonly>
                </div>
                <div class="card-footer">
                  <h5>Details</h5>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="ino" value="<?php echo $ino;?>">
                    <label>Customer Name</label>
                    <select class="custom-select mr-sm-2" id="customerName" name="cust_name" required>
                      <option >Customer Name</option>
                      <?php
                      include "../php/connection.php";
                      $slc2 = "SELECT * FROM client_customer WHERE client_ID='".$_SESSION["id"]."' AND customer_Verify = '1'";
                      $res2 = mysqli_query($conn, $slc2);
                      if (mysqli_num_rows($res2) > 0) {
                        while($row2 = mysqli_fetch_assoc($res2)){
                          echo "<option value='".$row2["customer_Name"]."'>".$row2["customer_Name"]."</option>";
                        }
                      }
                      mysqli_close($conn);
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Payment Due</label>
                    <input type="date" class="form-control" name="invoiceDue" placeholder="Invoice Date" required>
                  </div>
                </div>
                <div class="card-footer">
                  <h5>Product</h5>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-responsive" id="invoiceProductTable">
                      <thead>
                        <th class="col-lg-6" colspan="2">Product Name</th>
                        <th class="col-lg-1">Quantity</th>
                        <th class="col-lg-1">Price(each)</th>
                        <th class="col-lg-2">Tax</th>
                        <th class="col-lg-2" colspan="2">Amount</th>
                      </thead>
                      <tbody>
                        <tr>
                        <td colspan="2">
                          <select class="custom-select mr-sm-2" name="pname" id="iPName">
                            <?php
                            include "../php/connection.php";
                            $slc3 = "SELECT * FROM client_product WHERE client_ID='".$_SESSION["id"]."'";
                            $res3 = mysqli_query($conn, $slc3);
                            if (mysqli_num_rows($res3) > 0) {
                              while($row3 = mysqli_fetch_assoc($res3)){
                                echo "<option data-value='".$row3["product_ID"]."'>".$row3["product_Name"]."</option>";
                              }
                              $pid = $row3["product_ID"];
                            }
                            ?>
                          </select>
                        </td>
                        <td>
                          <input type="number" id="iPQuantity" min="0" onkeyup="productTotalPriceCount()" name="quantity" class="form-control" placeholder="Qty">
                        </td>
                        <td>
                          <input type="number" id="iPPrice" min="0" step="0.01" onkeyup="productTotalPriceCount()" name="price" class="form-control" placeholder="Price">
                        </td>
                        <td>
                          <input type="text" id="iPTax" name="tax" class="form-control" placeholder="Tax description" >
                        </td>
                        <td>
                          <input id="iPTotalAmount" name="amount" class="form-control-plaintext" placeholder="Amount" readonly>
                        </td>
                        <td>
                          <input type="hidden" value="Delete">
                          <button type="button" name="add" id="btn_add" onclick="invoiceAddItem()" class="btn btn-info col-lg-12"><i class="fas fa-level-down-alt"></i> Add</button>
                        </td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="4">
                        </td>
                        <td>
                          <label>Total:</label>
                        </td>
                        <td colspan="2">
                          <input class="form-control-plaintext" name="iFinalAmount" id="iFinalAmount" readonly>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </form>
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
    <!-- MODAL SCRIPT -->
    <script src="../js/modalScript.js" charset="utf-8"></script>
    <!-- END MODAL SCRIPT -->
    <!-- INVOICE SCRIPT -->
    <script src="../js/invoiceScript.js" charset="utf-8"></script>
    <!-- END INVOICE SCRIPT -->
  </body>
</html>
