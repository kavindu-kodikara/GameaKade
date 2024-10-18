<?php
require "connection.php";

$invoice_id = $_POST["invoice_id"];
$status = $_POST["status_id"];

if($status == 1){
    $status_id = 2;
}elseif($status == 2){
    $status_id = 4;
}

Database::iud("UPDATE `invoice` SET `order_ status_idorder_ status_id` = '".$status_id."' WHERE `invoice_id` = '".$invoice_id."'");

?>