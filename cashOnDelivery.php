<?php
require "connection.php";
session_start();

$id = $_SESSION["uniq_id"];

Database::iud("UPDATE `invoice` SET `payment_method_id` = '1', `payment_status_payment_status_id` = '2'
WHERE `uniq_id` = '".$id."'");

$invoise_rs = Database::search("SELECT * FROM `invoice` WHERE `uniq_id` = '".$id."'");
$invoise = $invoise_rs->fetch_assoc();

echo($invoise["invoice_id"]);


?>