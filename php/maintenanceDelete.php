<?php
session_start();
include "connection.php";
if($_POST["btnMaintenance"] == "customer"){
  $del = "DELETE FROM client_customer WHERE customer_ID = '".$_POST["customer_ID"]."'";
  if (mysqli_query($conn, $del)) {
    // echo "delete customer";
    // echo '<script>';
    // echo 'alert("successfully Register Customer.");';
    // echo '</script>';
    header("location:".$_SERVER["HTTP_REFERER"]);
  }
  else{
    echo 'failed customer';
  }
}
else if($_POST["btnMaintenance"] == "product"){
  $del = "DELETE FROM client_product WHERE product_ID = '".$_POST["product_ID"]."'";
  if (mysqli_query($conn, $del)) {
    // echo "delete product";
    // echo '<script>';
    // echo 'alert("successfully Register Product.")';
    // echo '</script>';
    header("location:".$_SERVER["HTTP_REFERER"]);
  }
  else{
    echo 'fail product';
  }
}
else{
  echo "nothing";
}
mysqli_close($conn);
 ?>
