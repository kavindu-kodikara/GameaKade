<?php
require "connection.php";

$email = $_POST["email"];

Database::iud("UPDATE `user` SET `states` = '0' WHERE `email` = '".$email."'");

echo("done");


?>