<?php
require "connection.php";
session_start();

$check = $_POST["check"];

$a_rs = Database::search("SELECT * FROM `address` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
$a_num = $a_rs->num_rows;

if ($a_num > 0) {
    if ($check == 1) {

        Database::iud("UPDATE `cart` SET `select` = '1' WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
    } else {
        Database::iud("UPDATE `cart` SET `select` = '0' WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
    }


    echo ("success");
} else {
    echo ("address");
}
