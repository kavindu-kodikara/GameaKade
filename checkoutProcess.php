<?php
require "connection.php";
session_start();

$invoice_id = uniqid();

$tdate = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$tdate->setTimezone($tz);
$date = ($tdate->format("Y-m-d H:i:s"));

$c_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "' AND `select` = '1'");
$c_num = $c_rs->num_rows;

$subTot = 0;

for ($x = 0; $x < $c_num; $x++) {
    $c_data = $c_rs->fetch_assoc();

    $pTot = $c_data["price"] * $c_data["qty"];
    $subTot = $subTot + $pTot;
}

$address_rs = Database::search("SELECT * FROM `address` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
$address_num = $address_rs->num_rows;

if ($address_num > 0) {

    $a_rs = Database::search("SELECT * FROM `address` INNER JOIN `district` ON `district`.`district_id` = `address`.`district_district_id`
INNER JOIN `city` ON `city`.`city_id` = `address`.`city_city_id` INNER JOIN `province` ON `district`.`province_province_id` = `province`.`province_id` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "' 
        AND `district_id` = '7' AND `default` = '1' AND `city_city_id` != '4'");
    $a_data = $a_rs->fetch_assoc();

    $df_rs = Database::search("SELECT * FROM `delever_fee` WHERE `city_city_id` = '" . $a_data["city_city_id"] . "'");
    $df_data = $df_rs->fetch_assoc();

    $deliver_fee = $df_data["price"];

    $tot = $subTot + $deliver_fee;

    Database::iud("INSERT INTO `invoice` (`uniq_id`,`date`,`total`,`user_email`,`payment_method_id`,`order_ status_idorder_ status_id`,`payment_status_payment_status_id`,`address_address_id`)
VALUES ('" . $invoice_id . "','" . $date . "','" . $tot . "','" . $_SESSION["u"]["email"] . "','1','1','1','" . $a_data["address_id"] . "')");

    $i_rs = Database::search("SELECT * FROM `invoice` WHERE `uniq_id` = '" . $invoice_id . "'");
    $i_data = $i_rs->fetch_assoc();

    $c_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "' AND `select` = '1'");
    $c_num = $c_rs->num_rows;

    for ($y = 0; $y < $c_num; $y++) {
        $c_data = $c_rs->fetch_assoc();

        Database::iud("INSERT INTO `product_has_invoice` (`product_id`,`qty`,`invoice_invoice_id`,`single_product_price`,`size`)
        VALUES ('" . $c_data["product_id"] . "','" . $c_data["qty"] . "','" . $i_data["invoice_id"] . "','" . $c_data["price"] . "','" . $c_data["size"] . "')");

        $adFodd_rs = Database::search("SELECT * FROM `cart_has_additional_food` WHERE `cart_id` = '" . $c_data["id"] . "' AND `product_id` = '" . $c_data["product_id"] . "'");
        for ($ad = 0; $ad < $adFodd_rs->num_rows; $ad++) {
            $adFodd = $adFodd_rs->fetch_assoc();

            $product_has_invoice_rs = Database::search("SELECT * FROM `product_has_invoice` WHERE `invoice_invoice_id` = '" . $i_data["invoice_id"] . "'");
            $product_has_invoice = $product_has_invoice_rs->fetch_assoc();

            Database::iud("INSERT INTO `product_has_invoice_has_additional_food` (`additional_food_id`,`product_has_invoice_product_has_invoice_id`)
        VALUES ('" . $adFodd["additional_food_id"] . "','" . $product_has_invoice["product_has_invoice_id"] . "')");
        }

        Database::iud("DELETE FROM `cart_has_additional_food` WHERE `cart_id` = '" . $c_data["id"] . "'");
    }




    $_SESSION["uniq_id"] = $invoice_id;

    Database::iud("DELETE FROM `cart` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "' AND `select` = '1'");

    echo ("success");
} else {
    echo ("address");
}
