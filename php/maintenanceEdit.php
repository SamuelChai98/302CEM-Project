<?php
session_start();
include "connection.php";
if($_POST["btnMaintenance"] == "customer"){
  $upd = "UPDATE client_customer SET customer_Name = '".$_POST["cust_name"]."', customer_Email = '".$_POST["cust_email"]."', customer_Contact = '".$_POST["cust_contact"]."', customer_Address = '".$_POST["cust_address"]."' WHERE customer_ID = '".$_POST["customer_ID"]."'";
  if ($conn->query($upd) === TRUE) {
    // echo "Record updated successfully";
    header("location:".$_SERVER["HTTP_REFERER"]);
  }
}
else if($_POST["btnMaintenance"] == "product"){
  $upd = "UPDATE client_product SET product_Name = '".$_POST["product_name"]."', product_Price = '".$_POST["product_price"]."', product_Description = '".$_POST["product_description"]."' WHERE product_ID = '".$_POST["product_ID"]."'";
  if ($conn->query($upd) === TRUE) {
    // echo "Record updated successfully";
    header("location:".$_SERVER["HTTP_REFERER"]);
  }
}
else{
  echo "error";
}
?>
