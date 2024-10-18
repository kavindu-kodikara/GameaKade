<?php
require "connection.php";
session_start();

$jsonReqTxt = $_POST["jsonReqTxt"];
$phpReqObj = json_decode($jsonReqTxt);
$phpRespObj = new stdClass;

if(empty($phpReqObj->email)){
    $phpRespObj->msg ="Please enter your Email";
}else if(strlen($phpReqObj->email) > 100){
    $phpRespObj->msg ="Email must have less than 100 characters";
}else if(!filter_var($phpReqObj->email,FILTER_VALIDATE_EMAIL)){
    $phpRespObj->msg ="Invalid Email";
}else if(empty($phpReqObj->password)){
    $phpRespObj->msg ="Please enter your Password";
}else if(strlen($phpReqObj->password) < 5 || strlen($phpReqObj->password) > 20){
    $phpRespObj->msg ="Password must have between 5-20 characters";
}else{

    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email` = '".$phpReqObj->email."' AND `password` = '".$phpReqObj->password."'");
    
    if($admin_rs->num_rows == 1){
        $admin = $admin_rs->fetch_assoc();
        $_SESSION["admin"] = $admin;
        $phpRespObj->msg ="done";

    }else{
        $phpRespObj->msg ="Please check your email or password";
        
    }

}



$jsonRespTxt = json_encode($phpRespObj);
echo($jsonRespTxt);
