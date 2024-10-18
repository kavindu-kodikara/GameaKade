<?php
require "connection.php";
session_start();

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mobile = $_POST["mobile"];
$province = $_POST["province"];
$address = $_POST["address"];
$district = $_POST["district"];
$city = $_POST["city"];

if($district == "7"){
    $address_rs = Database::search("SELECT * FROM `address` WHERE `user_email` = '".$_SESSION["u"]["email"]."'");

    if($address_rs->num_rows > 0){
        $default = 0;
    }else{
        $default = 1;
    }
    
    Database::iud("INSERT INTO `address` (`user_email`,`district_district_id`,`address`,`default`,`city_city_id`,
    `fname`,`lname`,`mobile`) VALUES ('".$_SESSION["u"]["email"]."','".$district."','".$address."','".$default."'
    ,'".$city."','".$fname."','".$lname."','".$mobile."')");
    
    echo("success");
}else{
    echo("We are still not available for your District");
}





?>