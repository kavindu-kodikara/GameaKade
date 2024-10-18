<?php
require "connection.php";

$email = $_POST["email"];

Database::iud("UPDATE `user` SET `states` = '1' WHERE `email` = '".$email."'");

echo("done");


?>