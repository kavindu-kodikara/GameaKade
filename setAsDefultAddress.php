<?php
require "connection.php";
session_start();

$id = $_POST["id"];

Database::iud("UPDATE `address` SET `default` = '0' WHERE `user_email` = '".$_SESSION["u"]["email"]."'");
Database::iud("UPDATE `address` SET `default` = '1' WHERE `user_email` = '".$_SESSION["u"]["email"]."'
AND `address_id` = '".$id."'");

echo("success");

?>