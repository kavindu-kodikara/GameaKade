<?php
require "connection.php";
session_start();

$vc = $_POST["vc"];
$name = $_POST["name"];
$password = $_POST["password"];

$user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $_SESSION["u"]["email"] . "'");
$user = $user_rs->fetch_assoc();

if($user["verification_code"] == $vc){

        Database::iud("UPDATE `user` SET `fname` = '".$name."',`password` = '".$password."'
        WHERE `email` = '".$_SESSION["u"]["email"]."'");
        echo("success");

    
    
} else {
    echo("verifyError");
}






