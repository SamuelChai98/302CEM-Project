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
      $_SESSION["login"] = "";
      // echo "admin";
      header("location:../admin/home.php");
    }
    else if($row["status"] == "client"){
      $_SESSION["name"] = $row["name"];
      $_SESSION["status"] = $row["status"];
      $_SESSION["id"] = $row["client_ID"];
      $_SESSION["login"] = "";
      // echo "client";
      header("location:../client/home.php");
    }
    else{
      // $_SESSION["login"] = "error";
      // echo "error";
      echo "<script>";
      echo "alert('Username and Password Error');";
      echo "window.location.href = '".$_SERVER["HTTP_REFERER"]."'";
      echo "</script>";
      // header("location:".$_SERVER["HTTP_REFERER"]);
    }
  }
}
else{
  $_SESSION["login"] = "error";
  echo "<script>";
  echo "alert('Username and Password Error');";
  echo "window.location.href = '".$_SERVER["HTTP_REFERER"]."'";
  echo "</script>";
}
mysqli_close($conn);
?>
