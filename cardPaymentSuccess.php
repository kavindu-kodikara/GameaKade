<?php
require "connection.php";
session_start();

$id = $_POST["id"];

Database::iud("UPDATE `invoice` SET `payment_method_id` = '2', `payment_status_payment_status_id` = '1'
WHERE `uniq_id` = '".$id."'");

echo("success");


?>