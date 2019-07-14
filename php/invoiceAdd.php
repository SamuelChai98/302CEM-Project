<?php
session_start();
include "connection.php";
$dateNow = date("Y-m-d");
$input = $_POST["rowInput"];
// SELECT customer for ID
$slc = "SELECT * FROM client_customer WHERE customer_Name = '".$_POST["cust_name"]."' AND client_ID = '".$_SESSION["id"]."'";
$res = mysqli_query($conn, $slc);
if (mysqli_num_rows($res) > 0) {
  $row = mysqli_fetch_assoc($res);
  // INSERT into invoice
  $sql = "INSERT INTO client_invoice (invoice_ID, invoice_No, invoice_Date, customer_ID, client_ID, invoice_Amount, payment_Due)
  VALUES (NULL, '".$_POST["ino"]."', '".$dateNow."', '".$row["customer_ID"]."', '".$_SESSION["id"]."', '".$_POST["iFinalAmount"]."', '".$_POST["invoiceDue"]."')";
  if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    $iID = mysqli_insert_id($conn);
    // SELECT invoice for ID
    foreach($input as $i){
      $slc2 = "SELECT * FROM client_product WHERE product_Name = '".$i["pName"]."' and client_ID = '".$_SESSION["id"]."'";
      $res2 = mysqli_query($conn, $slc2);
      if (mysqli_num_rows($res2) > 0) {
        $row2 = mysqli_fetch_assoc($res2);
        $sql2 = "INSERT INTO client_invoice_item(invoice_No, product_ID, client_ID, quantity, price, tax, amount)
        VALUES ('".$iID."', '".$row2["product_ID"]."', '".$_SESSION["id"]."', '".$i["pQuantity"]."', '".$i["pPrice"]."', '".$i["pTax"]."', '".$i["pTotalAmount"]."')";
        if (mysqli_query($conn, $sql2)) {
          // echo "item passed.";
          header("location:../client/invoice.php");
        }
      }
      else{
        echo "<script>";
        echo "alert('item not found!');";
        echo "window.location.href = '".$_SERVER["HTTP_REFERER"]."';";
        echo "</script>";
      }
    }
  }
  else{
    echo "fail";
  }
}
else{
  echo "<script>";
  // echo "window.location."
  echo "alert('customer not found!');";
  echo "window.location.href = '".$_SERVER["HTTP_REFERER"]."';";
  echo "</script>";
}
?>
