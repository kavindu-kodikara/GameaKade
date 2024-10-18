<?php
require "connection.php";
session_start();

$check = $_POST["check"];
$id = $_POST["id"];

if ($check == 1) {

    Database::iud("UPDATE `cart` SET `select` = '1' WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'
    AND `id` = '".$id."'");
} else {
    Database::iud("UPDATE `cart` SET `select` = '0' WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'
    AND `id` = '".$id."'");
}


echo ("success");
