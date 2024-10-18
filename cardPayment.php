<?php
require "connection.php";
session_start();

if(isset($_SESSION["u"])){

        $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `uniq_id` = '".$_SESSION["uniq_id"]."'");
        $invoice_data = $invoice_rs->fetch_assoc();

        $address_rs = Database::search("SELECT * FROM `address` INNER JOIN `district` ON `district`.`district_id` = `address`.`district_district_id`
        INNER JOIN `city` ON `city`.`city_id` = `address`.`city_city_id` INNER JOIN `province` ON `district`.`province_province_id` = `province`.`province_id` 
        WHERE `user_email` = '" . $_SESSION["u"]["email"] . "' AND `default` = '1'");
        $address_data = $address_rs->fetch_assoc();

        $order_id = $_SESSION["uniq_id"];
        // $item = $invoice_data["total"];
        $amount = $invoice_data["total"];

        $merchant_id = 1221102;
        $currency = "LKR";
        $merchant_secret = "MzMxMTYxNjcwOTQ5NzUyNzgwMDI0OTg0NDM4ODA2MjcyODE4NDg=";


        $hash = strtoupper(
            md5(
                $merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($merchant_secret))
            )
        );

        $fname = $address_data["fname"];
        $lname = $address_data["lname"];
        $mobile = $address_data["mobile"];
        $user_address = $address_data["address"];
        $city = $address_data["district_name"];

        $array["id"] = $order_id;
        $array["amount"] = $amount;
        $array["fname"] = $fname;
        $array["lname"] = $lname;
        $array["mobile"] = $mobile;
        $array["address"] = $user_address;
        $array["city"] = $city;
        $array["mail"] = $_SESSION["u"]["email"];
        $array["hash"] = $hash;
        $array["invoice_id"] = $invoice_data["invoice_id"];

        echo (json_encode($array));

}else{
    echo("login");
}
