<?php
/*

GET PAGE FOR QUOTATION

*/
session_start();
$i = $_GET["iStatus"];
$iID = $_GET["iNo"];

if($i == "create"){
  include "invoice/invoiceCreate.php";
}
else if($i == "edit"){
  include "invoice/invoiceEdit.php";
}

 ?>
