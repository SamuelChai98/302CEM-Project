<?php
session_start();
include "connection.php";
$username = $_POST["username"];
$password = $_POST["password"];
$sql = "SELECT * FROM login WHERE userName = '".$username."' AND passWord = '".$password."'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = $result->fetch_assoc()) {
    if($row["status"] == "admin"){
      $_SESSION["name"] = $row["name"];
      $_SESSION["status"] = $row["status"];
      // echo "admin";
      header("location:../admin/home.php");
    }
    else if($row["status"] == "client"){
      $_SESSION["name"] = $row["name"];
      $_SESSION["status"] = $row["status"];
      $_SESSION["id"] = $row["client_ID"];
      // echo "client";
      header("location:../client/home.php");
    }
    else{
      // echo "error";
      header("location:".$_SERVER["HTTP_REFERER"]);
    }
  }
}
else{
  echo "error";
}
mysqli_close($conn);
?>
