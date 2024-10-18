<?php
require "connection.php";
session_start();

$id = $_POST["id"];
$txt = $_POST["txt"];
$file_count = $_POST["file_count"];

if (!empty($txt)) {

    $uniqId = uniqid();

    Database::iud("INSERT INTO `reviws` (`text`,`product_id`,`uniq_id`,`user_email`) VALUES ('" . $txt . "','" . $id . "','" . $uniqId . "','".$_SESSION["u"]["email"]."')");

    if ($file_count > 0) {

        $review_rs = Database::search("SELECT * FROM `reviws` WHERE `uniq_id` = '".$uniqId."'");
        $review = $review_rs->fetch_assoc();

        $allowed_img_extentions = array("image/jpg", "image/png", "image/jpeg", "image/svg+xml");

        for ($x = 0; $x < $file_count; $x++) {
            if (isset($_FILES["image" . $x])) {

                $img_file = $_FILES["image" . $x];
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

                    $file_name = "resorces//reviewImg//" . "_" . uniqid() . $new_img_extention;
                    move_uploaded_file($img_file["tmp_name"], $file_name);

                    Database::iud("INSERT INTO `review_img`(`path`,`reviws_reviws_id`) VALUES ('".$file_name."','".$review["reviws_id"]."')");

                } else {
                    echo ("Invalid Image type");
                }
            }
        }
        echo ("Review saved successfully");
    }else{
        echo("Review saved without Images");
    }
} else {
    echo ("Review is empty");
}
