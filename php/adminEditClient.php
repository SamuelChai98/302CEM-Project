<?php
include "connection.php";
echo $id = $_POST["clientID"];
$name = $_POST["clientName"];
echo $contact = $_POST["clientContact"];
$email = $_POST["clientEmail"];
$username = $_POST["clientUsername"];
$password = $_POST["clientPassword"];

$sql = "UPDATE manage_client SET client_Name = '".$name."', client_Contact = '".$contact."', client_Email = '".$email."' WHERE client_ID = '".$id."'";
if (mysqli_query($conn, $sql)) {
  // Get value from manage client
  // echo $sql."1";
  $sql2 = "UPDATE login SET userName = '".$username."', passWord = '".$password."' WHERE client_ID = '".$id."'";
  if (mysqli_query($conn, $sql2)) {
    // echo "2";
    // echo '<script language="javascript">';
    // echo 'alert("successfully Edited.");';
    // echo '</script>';
    header("location:".$_SERVER["HTTP_REFERER"]);
  }
}
else{
  echo "error";
  // echo '<script language="javascript">';
  // echo 'alert("failed edit.");';
  // echo '</script>';
  header("location:".$_SERVER["HTTP_REFERER"]);
}
mysqli_close($conn);

 ?>
