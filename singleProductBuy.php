<?php
require "connection.php";
session_start();

if (isset($_SESSION["u"])) {

    $pid = $_POST["pid"];
    $qty = $_POST["qty"];
    $size = $_POST["size"];
    $cid = $_POST["cid"];
    $myarray = $_POST["myarray"];
    $adCategoryCount = $_POST["adCategoryCount"];

    $adArray = json_decode($myarray);

    $a_rs = Database::search("SELECT * FROM `address` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
    $a_num = $a_rs->num_rows;

    if ($a_num > 0) {

        $address_rs = Database::search("SELECT * FROM `address` INNER JOIN `district` ON `district`.`district_id` = `address`.`district_district_id`
        INNER JOIN `city` ON `city`.`city_id` = `address`.`city_city_id` INNER JOIN `province` ON `district`.`province_province_id` = `province`.`province_id` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "' 
        AND `district_id` = '7' AND `default` = '1' AND `city_city_id` != '4'");

        $address_num = $address_rs->num_rows;

        if ($address_num > 0) {

            if (!empty($qty)) {

                $p_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pid . "'");
                $p_data = $p_rs->fetch_assoc();

                if ($size == 1) {
                    $price = $p_data["price"];
                } elseif ($size == 0) {
                    $price = $p_data["price"];
                } elseif ($size == 2) {
                    $price = $p_data["price_full"];
                }



                $invoice_id = uniqid();

                $tdate = new DateTime();
                $tz = new DateTimeZone("Asia/Colombo");
                $tdate->setTimezone($tz);
                $date = ($tdate->format("Y-m-d H:i:s"));

                $a_data = $a_rs->fetch_assoc();

                $df_rs = Database::search("SELECT * FROM `delever_fee` WHERE `city_city_id` = '" . $a_data["city_city_id"] . "'");
                $df_data = $df_rs->fetch_assoc();

                $deliver_fee = $df_data["price"];
                $subTot = $price * $qty;
                $tot = $subTot + $deliver_fee;

                Database::iud("INSERT INTO `invoice` (`uniq_id`,`date`,`total`,`user_email`,`payment_method_id`,`order_ status_idorder_ status_id`,`payment_status_payment_status_id`,`address_address_id`)
VALUES ('" . $invoice_id . "','" . $date . "','" . $tot . "','" . $_SESSION["u"]["email"] . "','1','1','2','" . $a_data["address_id"] . "')");

                $i_rs = Database::search("SELECT * FROM `invoice` WHERE `uniq_id` = '" . $invoice_id . "'");
                $i_data = $i_rs->fetch_assoc();

                Database::iud("INSERT INTO `product_has_invoice` (`product_id`,`qty`,`invoice_invoice_id`,`single_product_price`,`size`)
                VALUES ('" . $pid . "','" . $qty . "','" . $i_data["invoice_id"] . "','" . $price . "','" . $size . "')");

                $_SESSION["uniq_id"] = $invoice_id;

                if ($adCategoryCount > 0) {
                    $product_has_invoice_rs = Database::search("SELECT * FROM `product_has_invoice` WHERE `invoice_invoice_id` = '" . $i_data["invoice_id"] . "'");
                    $product_has_invoice = $product_has_invoice_rs->fetch_assoc();
                    // if ($adCategoryCount > 1) {
                    //     $adCategoryCount = $adCategoryCount + 2;
                    // }
                    for ($ad = 0; $ad < $adCategoryCount; $ad++) {
                        if ($adArray[$ad] > 0) {
                            Database::iud("INSERT INTO `product_has_invoice_has_additional_food` (`additional_food_id`,`product_has_invoice_product_has_invoice_id`) 
                            VALUES ('" . $adArray[$ad] . "','" . $product_has_invoice["product_has_invoice_id"] . "')");
                        }
                    }
                }

                echo ("success");
            } else {
                echo ("qty");
            }
        } else {
            echo ("notInArea");
        }
    } else {
        echo ("emptyAddress");
    }
} else {
    echo ("Sign");
}
