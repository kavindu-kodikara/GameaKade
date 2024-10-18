<?php
require "connection.php";
session_start();

$id = $_GET["id"];

$tdate = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$tdate->setTimezone($tz);
$date = ($tdate->format("Y-m-d H:i:s"));

$uniqId = uniqid();

$invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `invoice_id` = '" . $id . "'");
$invoice = $invoice_rs->fetch_assoc();

if ($invoice["order_ status_idorder_ status_id"] == 1) {

    Database::iud("INSERT INTO `recent` (`order_id`,`date`,`unic_id`,`user_email`) VALUES ('" . $invoice["invoice_id"] . "','" . $date . "','" . $uniqId . "','" . $_SESSION["u"]["email"] . "')");

    $recent_rs = Database::search("SELECT * FROM `recent` WHERE `unic_id` = '" . $uniqId . "'");
    $recent = $recent_rs->fetch_assoc();

    $invoiceProduct_rs = Database::search("SELECT * FROM `product_has_invoice` WHERE `invoice_invoice_id` = '" . $id . "'");

    for ($x = 0; $x < $invoiceProduct_rs->num_rows; $x++) {
        $invoiceProduct = $invoiceProduct_rs->fetch_assoc();

        Database::iud("INSERT INTO `product_has_recent` (`product_id`,`recent_recent_id`,`qty`)
         VALUES ('" . $invoiceProduct["product_id"] . "','" . $recent["recent_id"] . "','" . $invoiceProduct["qty"] . "')");
    }

    $phi_rs = Database::search("SELECT * FROM `product_has_invoice` WHERE `invoice_invoice_id` = '" . $id . "'");
    $phi = $phi_rs->fetch_assoc();

    $PhIhAD_rs = Database::search("SELECT * FROM `product_has_invoice_has_additional_food` WHERE `product_has_invoice_product_has_invoice_id` = '" . $phi["product_has_invoice_id"] . "'");


    if ($PhIhAD_rs->num_rows > 0) {
        Database::iud("DELETE FROM `product_has_invoice_has_additional_food` WHERE `product_has_invoice_product_has_invoice_id` = '" . $phi["product_has_invoice_id"] . "'");
    }

    Database::iud("DELETE FROM `product_has_invoice` WHERE `invoice_invoice_id` = '" . $id . "'");
    Database::iud("DELETE FROM `invoice` WHERE `invoice_id` = '" . $id . "'");

    echo ("success");
} else {
    echo ("your order is alredy conformed now you can not cancel the order");
}
