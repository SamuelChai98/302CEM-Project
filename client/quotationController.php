<?php
/*

GET PAGE FOR QUOTATION

*/
session_start();
$q = $_GET["qStatus"];
$qID = $_GET["qNo"];

if($q == "create"){
  include "quotation/quotationCreate.php";
}
else if($q == "edit"){
  include "quotation/quotationEdit.php";
}

 ?>
