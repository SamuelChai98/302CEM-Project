<?php
session_start();
include "connection.php";
$name = $_POST["clientName"];
$contact = $_POST["clientContact"];
$email = $_POST["clientEmail"];
$username = $_POST["clientUsername"];
$password = $_POST["clientPassword"];
$status = "client";
$dateNow = date("Y-m-d");
// echo $dateNow;

// Insert Value into manage client
$sql1 = "INSERT INTO manage_client (client_Name, client_Contact, client_Email, client_Register_Date)
VALUES ('".$name."', '".$contact."', '".$email."', '".$dateNow."')";
if (mysqli_query($conn, $sql1)) {
  $id = mysqli_insert_id($conn);
  $sql2 = "INSERT INTO login (client_ID, userName, passWord, status)
  VALUES ('".$id."', '".$username."', '".$password."', '".$status."')";
  if (mysqli_query($conn, $sql2)) {
    echo '<script language="javascript">';
    echo 'alert("successfully Registered.");';
    echo '</script>';
    header("location:".$_SERVER["HTTP_REFERER"]);
  }
  else {
      echo "Error: " . $sql2 . "<br>" . $conn->error;
  }
}
// else{
//   echo '<script language="javascript">';
//   echo 'alert("failed Registered.");';
//   echo '</script>';
  header("location:".$_SERVER["HTTP_REFERER"]);
// }
else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}
mysqli_close($conn);
?>
