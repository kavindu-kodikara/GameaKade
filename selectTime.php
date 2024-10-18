<?php
require "connection.php";
session_start();

$tid = $_POST["tid"];

Database::iud("UPDATE `invoice` SET `delever_time_id` = '".$tid."' WHERE  `uniq_id` = '".$_SESSION["uniq_id"]."'");

echo("success");

?>