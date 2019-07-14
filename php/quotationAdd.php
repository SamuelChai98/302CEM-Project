<?php
session_start();
include "connection.php";
$dateNow = date("Y-m-d");
$input = $_POST["rowInput"];
// print_r($input);
foreach($input as $t){
  echo $t["pName"]."<br>";
}
// SELECT customer for ID
$sql1 = "SELECT * FROM client_customer WHERE customer_Name = '".$_POST["cust_name"]."' and client_ID = '".$_SESSION["id"]."'";
$res = mysqli_query($conn, $sql1);
if (mysqli_num_rows($res) > 0) {
  $row = mysqli_fetch_assoc($res);
  // INSERT into quotation
  $sq2 = "INSERT INTO client_quotation (quotation_ID, quotation_No, quotation_Date, customer_ID, client_ID, quotation_Start_Date, quotation_End_Date, quotation_Remark)
  VALUES (NULL, '".$_POST["qno"]."', '".$dateNow."', '".$row["customer_ID"]."', '".$_SESSION["id"]."', '".$_POST["dateStart"]."', '".$_POST["dateEnd"]."', '".$_POST["remark"]."')";
  if ($conn->query($sq2) === TRUE) {
    $qID = mysqli_insert_id($conn);
    // SELECT product for ID
    foreach($input as $p){
      $sql3 = "SELECT product_ID FROM client_product WHERE product_Name = '".$p["pName"]."' AND client_ID = '".$_SESSION["id"]."'";
      $res3 = mysqli_query($conn, $sql3);
      if (mysqli_num_rows($res3) > 0) {
        $row3 = mysqli_fetch_assoc($res3);
        // echo $row3["product_ID"];
        $sql4 = "INSERT INTO client_quotation_item(quotation_No, product_ID, client_ID, quantity, price, tax, amount)
        VALUES ('".$qID."', '".$row3["product_ID"]."', '".$_SESSION["id"]."', '".$p["pQuantity"]."', '".$p["pPrice"]."', '".$p["pTax"]."', '".$p["pTotalAmount"]."')";
        if (mysqli_query($conn, $sql4)) {
          // echo "item passed.";
          header("location:../client/quotation.php");
        }
      }
      else{
        // echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
        echo "<script>";
        echo "alert('product not found!');";
        echo "window.location.href = '".$_SERVER["HTTP_REFERER"]."';";
        echo "</script>";
      }
    }
    // echo "New record created successfully";
    // header("location:".$_SERVER["HTTP_REFERER"]);
  }
}
else{
  echo "<script>";
  echo "alert('customer not found!');";
  echo "window.location.href = '".$_SERVER["HTTP_REFERER"]."';";
  echo "</script>";
}
?>
