<?php
session_start();
include "connection.php";
$del = "DELETE FROM client_quotation WHERE quotation_ID = '".$_POST["quotationID"]."'";
if ($conn->query($del) === TRUE) {
    // echo "deleted successfully";
    $del2 = "DELETE FROM client_quotation_item WHERE quotation_No = '".$_POST["quotationID"]."' AND client_ID = '".$_SESSION["id"]."'";
    if ($conn->query($del2) === TRUE) {
      // echo "delete successfully 2";
      header("location:".$_SERVER["HTTP_REFERER"]);
    }

}
else{
  echo "fail";
}
 ?>
