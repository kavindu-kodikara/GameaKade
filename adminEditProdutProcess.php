<?php
require "connection.php";

$title = $_POST["title"];
$ctg = $_POST["ctg"];
$id = $_POST["id"];

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
        $query = "`price`='" . $p_half . "',`price_full` = '" . $p_full . "'";
        Database::iud("UPDATE `product` SET `title`='" . $title . "',`category_id`='" . $ctg . "'," . $query . " WHERE `id` = '" . $id . "'");

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

                Database::iud("UPDATE `product_img` SET `path` = '" . $file_name . "' WHERE `product_id` = '" . $id . "'");
            } else {
                echo ("Invalid Image type");
            }
        } else {
            echo ("product saved. Didnt update Image ");
        }
    }
} else if ($ctg == 6 || $ctg == 7 || $ctg == 8) {
    $price = $_POST["price"];
    if ($price < 0) {
        echo ("Price can not be minus");
    } else {
        $query = "`price`='" . $price . "'";

        Database::iud("UPDATE `product` SET `title`='" . $title . "',`category_id`='" . $ctg . "'," . $query . " WHERE `id` = '" . $id . "'");

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

                Database::iud("UPDATE `product_img` SET `path` = '" . $file_name . "' WHERE `product_id` = '" . $id . "'");
            } else {
                echo ("Invalid Image type");
            }
        } else {
            echo ("product saved. Didnt update Image ");
        }
        
    }

    
}
