<?php
require "connection.php";

$title = $_POST["title"];
$ctg = $_POST["ctg"];
$qty = $_POST["minimumQty"];
$uniq = uniqid();
if ($ctg == 1 || $ctg == 2 || $ctg == 3 || $ctg == 4 || $ctg == 5) {
    $p_half = $_POST["p_half"];
    $p_full = $_POST["p_full"];

    if ($p_half > $p_full) {
        echo ("Half price must be less than Full price");
    } else if ($p_half < 0) {
        echo ("Price can not be Minus");
    } else if ($p_full < 0) {
        echo ("Price can not be Minus");
    } else {
        Database::iud("INSERT INTO `product` (`title`,`category_id`,`price`,`price_full`,`unoqId`,`minimam_qty`) VALUES ('" . $title . "','" . $ctg . "','" . $p_half . "','" . $p_full . "','" . $uniq . "','" . $qty . "')");
        $allowed_img_extentions = array("image/jpg", "image/png", "image/jpeg", "image/svg+xml");


        if (isset($_FILES["image"])) {

            $img_file = $_FILES["image"];
            $file_extention = $img_file["type"];

            if (in_array($file_extention, $allowed_img_extentions)) {

                $new_img_extention;

                if ($file_extention == "image/jpg") {
                    $new_img_extention = ".jpg";
                } else if ($file_extention == "image/jpeg") {
                    $new_img_extention = ".jpeg";
                } else if ($file_extention == "image/png") {
                    $new_img_extention = ".png";
                } else if ($file_extention == "image/svg+xml") {
                    $new_img_extention = ".svg";
                }

                $file_name = "resorces//product//" . $title . "_" . uniqid() . $new_img_extention;
                move_uploaded_file($img_file["tmp_name"], $file_name);

                $select_rs = Database::search("SELECT * FROM `product` WHERE `unoqId` = '" . $uniq . "'");
                $select = $select_rs->fetch_assoc();

                Database::iud("INSERT INTO `product_img` (`path`,`product_id`) VALUES ('" . $file_name . "','" . $select["id"] . "')");
            } else {
                echo ("Invalid Image type");
            }
        } else {
            echo ("empty Image ");
        }
    }
} else if ($ctg == 6 || $ctg == 7 || $ctg == 8) {
    $price = $_POST["price"];

    if ($price < 0) {
        echo ("Price can not be minus");
    } else {
        Database::iud("INSERT INTO `product` (`title`,`category_id`,`price`,`unoqId`,`minimam_qty`) VALUES ('" . $title . "','" . $ctg . "','" . $price . "','" . $uniq . "','" . $qty . "')");

        $allowed_img_extentions = array("image/jpg", "image/png", "image/jpeg", "image/svg+xml");


        if (isset($_FILES["image"])) {

            $img_file = $_FILES["image"];
            $file_extention = $img_file["type"];

            if (in_array($file_extention, $allowed_img_extentions)) {

                $new_img_extention;

                if ($file_extention == "image/jpg") {
                    $new_img_extention = ".jpg";
                } else if ($file_extention == "image/jpeg") {
                    $new_img_extention = ".jpeg";
                } else if ($file_extention == "image/png") {
                    $new_img_extention = ".png";
                } else if ($file_extention == "image/svg+xml") {
                    $new_img_extention = ".svg";
                }

                $file_name = "resorces//product//" . $title . "_" . uniqid() . $new_img_extention;
                move_uploaded_file($img_file["tmp_name"], $file_name);

                $select_rs = Database::search("SELECT * FROM `product` WHERE `unoqId` = '" . $uniq . "'");
                $select = $select_rs->fetch_assoc();

                Database::iud("INSERT INTO `product_img` (`path`,`product_id`) VALUES ('" . $file_name . "','" . $select["id"] . "')");
            } else {
                echo ("Invalid Image type");
            }
        } else {
            echo ("empty Image ");
        }
    }
}
