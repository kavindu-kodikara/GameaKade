<?php
require "connection.php";
$cid = $_POST["cid"];

$cartAD_rs = Database::search("SELECT * FROM `cart_has_additional_food` WHERE `cart_id` = '" . $cid . "'");

if ($cartAD_rs->num_rows > 0) {
    $cartAD = $cartAD_rs->fetch_assoc();
    Database::iud("DELETE  FROM `cart_has_additional_food` WHERE `cart_id` = '" . $cid . "'");
}else{}

Database::iud("DELETE  FROM `cart` WHERE `id` = '" . $cid . "'");
echo ("success");

?>