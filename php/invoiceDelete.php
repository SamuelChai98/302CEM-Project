<?php
session_start();
include "connection.php";
$del = "DELETE FROM client_invoice WHERE invoice_ID = '".$_POST["invoiceID"]."'";
if ($conn->query($del) === TRUE) {
    // echo "deleted successfully";
    $del2 = "DELETE FROM client_invoice_item WHERE invoice_No = '".$_POST["invoiceID"]."' AND client_ID = '".$_SESSION["id"]."'";
    if ($conn->query($del2) === TRUE) {
      // echo "delete successfully 2";
      header("location:".$_SERVER["HTTP_REFERER"]);
    }
}
else{
  echo"fail";
}
 ?>
