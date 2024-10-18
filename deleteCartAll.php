<?php
require "connection.php";
$email = $_POST["email"];

Database::iud("DELETE  FROM `cart` WHERE `user_email` = '".$email."'");
echo("success");

?>