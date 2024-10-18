<?php

session_start();
require "connection.php";

$id = $_POST["cid"];

$c_rs = Database::search("SELECT * FROM `category` WHERE `id` = '".$id."'");
$c_data = $c_rs->fetch_assoc();

$_SESSION["ctg"] = $c_data;

echo("success");

?>