<?php
require "connection.php";

$id = $_POST["id"];

Database::iud("UPDATE  `address` SET `status` = '0' WHERE `address_id` = '".$id."'");

echo("success");

?>