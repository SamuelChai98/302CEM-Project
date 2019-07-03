<?php
session_start();
// DETECT QUOTATION NUMBER AND ADD BY 1
include "../php/connection.php";
$slc = "SELECT * FROM client_quotation WHERE client_ID='".$_SESSION["id"]."'";
$res = mysqli_query($conn, $slc);
if (mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)){
    if($row["quotation_No"] == 0){
      $qno = $row["quotation_No"];
      ++$qno;
      // echo $qno;
    }
    else if($row["quotation_No"] != 0){
      $qno = $row["quotation_No"];
      ++$qno;
      // echo $qno;
    }
  }
}
else{
  ++$qno;
}
$qi = "SELECT * FROM client_quotation_item WHERE quotation_No = $qno and client_ID = '".$_SESSION["id"]."'";
$rQi = mysqli_query($conn, $qi);
if (mysqli_num_rows($rQi) > 0) {
  while($rowQi = mysqli_fetch_assoc($rQi)){
    $amt = "SELECT * FROM client_product WHERE product_ID = '".$rowQi["product_ID"]."'";
    $rAmt = mysqli_query($conn, $amt);
    if (mysqli_num_rows($rAmt) > 0) {
      while($rowA = mysqli_fetch_assoc($rAmt)){
        $t += $rowQi["amount"];
      }
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Quotation - Edit</title>
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
          <h4>Quotation - Edit</h4>
        </div>
      </div>
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <h4 style="float:left;">No:<?php echo $qno;?></h4>
              <button type="submit" class="btn btn-success mr-auto" style="float:right;" onclick="location.href='client-quotation-view.php'">Create</button>
            </div>
            <form class="" action="index.html" method="post">
              <div class="card-footer">
                <h5 class="mb-0">Details</h5>
              </div>
              <div class="card-body row">
                <div class="form-group col-md-4">
                  <input type="hidden" name="qno" value="<?php echo $qno;?>"></input>
                  <label class="col-form-label">
                    Customer Name
                    <!-- <i class="fa fa-plus text-danger" data-toggle="modal" data-target="#customerModal"></i> -->
                  </label>
                  <input type="text" list="customer_list" name="cust_name" class="form-control" placeholder="Enter Customer Name" id="cust_name" autocomplete="off" required>
                  <datalist id="customer_list">
                    <?php
                    $slc2 = "SELECT * FROM client_customer WHERE client_ID='".$_SESSION["id"]."'";
                    $res2 = mysqli_query($conn, $slc2);
                    if (mysqli_num_rows($res2) > 0) {
                      while($row2 = mysqli_fetch_assoc($res2)){
                        echo "<option value='".$row2["customer_Name"]."'>";
                      }
                    }
                    // mysqli_close($conn);
                    ?>
                  </datalist>
                </div>
                <div class="form-group col-md-4">
                  <label class="col-form-label">Date Start</label>
                  <input type="date" name="dateStart" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                  <label class="col-form-label">Date End</label>
                  <input type="date" name="dateEnd" class="form-control" required>
                </div>
                <input type="hidden" name="totalAmount" value="<?php echo $t;?>" readonly>
              </div>
              <div class="card-footer">
                <h5 class="mb-0">Products</h5>
              </div>
              <div class="card-body">
                <div class="card-body col-lg-12">
                  <table class="table table-bordered table-responsive" id="quotationProductTable">
                    <thead>
                      <!-- <th class="col-lg-1">#</th> -->
                      <th class="col-lg-6" colspan="2">Product : Description</th>
                      <!-- <th class="col-lg-3">Description</th> -->
                      <th class="col-lg-1">Quantity</th>
                      <th class="col-lg-1">Price(each)</th>
                      <th class="col-lg-2">Tax</th>
                      <th class="col-lg-2" colspan="2">Amount</th>
                    </thead>
                    <tbody>
                      <tr>
                        <!-- <td>
                          <input type="hidden" value="0" id="rowNo">
                        </td> -->
                        <td colspan="2">
                          <input type="text" list="product_list" id="qPName" name="pname" class="form-control" placeholder="Product name">
                          <datalist id="product_list">
                            <?php
                            include "../php/connection.php";
                            $slc3 = "SELECT * FROM client_product WHERE client_ID='".$_SESSION["id"]."'";
                            $res3 = mysqli_query($conn, $slc3);
                            if (mysqli_num_rows($res3) > 0) {
                              while($row3 = mysqli_fetch_assoc($res3)){
                                echo "<option value='".$row3["product_Name"]."'>".$row3["product_Name"]."</option>";
                              }
                              $pid = $row3["product_ID"];
                            }
                            ?>
                          </datalist>
                        </td>
                        <!-- <td colspan="2">
                          <input type="text" id="desc" name="descript" class="q-input col-lg-12" placeholder="Description" required> -->
                        <!-- </td> -->
                        <td>
                          <input type="number" id="qPQuantity" min="0" onkeyup="productTotalPriceCount()" name="quantity" class="form-control" placeholder="Qty">
                        </td>
                        <td>
                          <input type="number" id="qPPrice" min="0" step="0.01" onkeyup="productTotalPriceCount()" name="price" class="form-control" placeholder="Price">
                        </td>
                        <td>
                          <input type="text" id="qPTax" name="tax" class="form-control" placeholder="Tax description">
                        </td>
                        <td>
                          <input id="qPTotalAmount" name="amount" class="form-control-plaintext" placeholder="Amount" readonly>
                        </td>
                        <td>
                          <input type="hidden" value="Delete">
                          <button type="button" name="add" id="btn_add" onclick="quotationAddItem()" class="btn btn-info col-lg-12" style="margin-left:2px;"><i class="fas fa-level-down-alt"></i> Add</button>
                        </td>
                      </tr>
                      <?php
                      //Get ID from quotation
                        // $slc4 = "SELECT * FROM client_quotation_item WHERE quotation_No = $qno and client_ID = '".$_SESSION["id"]."'";
                        // $res4 = mysqli_query($conn, $slc4);
                        // if (mysqli_num_rows($res4) > 0) {
                        //   while($row4 = mysqli_fetch_assoc($res4)){
                        //     // Get Name
                        //     $slc5 = "SELECT * FROM client_product WHERE product_ID = '".$row4["product_ID"]."'";
                        //     $res5 = mysqli_query($conn, $slc5);
                        //     if (mysqli_num_rows($res5) > 0) {
                        //       while($row5 = mysqli_fetch_assoc($res5)){
                        //         echo "<tr>";
                        //         echo "<td class='col-lg-2'>";
                        //         echo $row5["product_Name"];
                        //         echo "</td>";
                        //         echo "<td class='col-lg-4'>";
                        //         echo $row5["product_Description"];
                        //         echo "</td>";
                        //         echo "<td class='col-lg-1'>";
                        //         echo $row4["quantity"];
                        //         echo "</td>";
                        //         echo "<td class='col-lg-1'>";
                        //         echo $row4["price"];
                        //         echo "</td>";
                        //         echo "<td class='col-lg-2'>";
                        //         echo $row4["tax"];
                        //         echo "</td>";
                        //         echo "<td class='col-lg-1'>";
                        //         echo $row4["amount"];
                        //         echo "</td>";
                        //         echo "<td class='col-lg-1'>";
                        //         echo "<i id='delRow' class='fa fa-times btn-icon' style='color:red;padding:auto;cursor:pointer;' onclick=location.href='../php/quotation_delete_item.php?list_ID=".$row4["list_ID"]."'></i>";
                        //         echo "</td>";
                        //         echo "</tr>";
                        //         $total += $row4["amount"];
                        //       }
                        //     }
                        //   }
                        // }
                       ?>
                    </tbody>
                    <tfoot>
                      <!-- Remark -->
                      <tr>
                        <td colspan="4">
                          <label class="col-form-label">Remark:</label>
                          <input type="text" class="form-control" size="50" value="<?php echo $_SESSION['remark'];?>" placeholder="Remark">
                        </td>
                        <td>
                          <label>Total:</label>
                        </td>
                        <td colspan="2">
                          <input class="form-control-plaintext" name="qFinalAmount" id="qFinalAmount" readonly>
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
  <!-- QUOTATION SCRIPT -->
  <script src="../js/quotationScript.js" charset="utf-8"></script>
  <!-- END QUOTATION SCRIPT -->
</body>
</html>
