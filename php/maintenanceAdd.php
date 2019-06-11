<?php
session_start();
include "connection.php";
$dateNow = date("Y-m-d");

if($_POST["btnMaintenance"] == "customer"){
  $ins_c = "INSERT INTO client_customer (customer_ID, customer_Name, customer_Email, customer_Contact, customer_Address, customer_Register_Date, client_ID)
  VALUES (NULL, '".$_POST["cust_name"]."', '".$_POST["cust_email"]."', '".$_POST["cust_contact"]."', '".$_POST["cust_address"]."', '".$dateNow."', '".$_SESSION["id"]."')";
  if (mysqli_query($conn, $ins_c)) {
    // echo "success customer";
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
  echo $ins_p = "INSERT INTO client_product (product_ID, product_Name, product_Price, product_Description, client_ID)
  VALUES (NULL, '".$_POST["product_name"]."', '".$_POST["product_price"]."', '".$_POST["product_descp"]."', '".$_SESSION["id"]."')";
  if (mysqli_query($conn, $ins_p)) {
    // echo "success product";
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
