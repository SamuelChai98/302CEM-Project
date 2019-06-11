<?php
include "connection.php";
echo $cid = $_POST["clientID"];

// Admin Manage Client DELETE
$sql = "DELETE FROM manage_client WHERE client_ID='".$cid."'";
if (mysqli_query($conn, $sql)) {
    $sql2 = "DELETE FROM login WHERE client_ID='".$cid."'";
    if(mysqli_query($conn, $sql2)){
      // echo "success";
      header("location:".$_SERVER["HTTP_REFERER"]);
    }
    else{
      // echo "fail";
      header("location:".$_SERVER["HTTP_REFERER"]);
    }
}
?>
