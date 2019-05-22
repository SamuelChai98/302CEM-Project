<?php
/*

GET PAGE FOR QUOTATION

*/
session_start();
$q = $_GET["qStatus"];

if($q == "create"){
  include "quotation/quotationCreate.php";
}
// else if($q == "edit"){
//   require("quotation/quotationEdit.php");
// }

 ?>
