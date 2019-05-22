<?php
include "connection.php";
$status = "request";
$name = $_POST["cName"];
$email = $_POST["cEmail"];
$contact = $_POST["cContact"];
$company = $_POST["cCompanyName"];
$reason = $_POST["cReason"];
echo $sql = "INSERT INTO manage_client(client_Status, client_Name, client_Email, client_Contact, client_Company, client_Register_Reason)
VALUES ('".$status."', '".$name."', '".$email."', '".$contact."', '".$company."', '".$reason."')";
if ($conn->query($sql) === TRUE) {
  // echo "yes";
  header("location:../index.php");
}
else{
  echo "no";
  // header("location:../index.php");
}
 ?>
