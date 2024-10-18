<?php

require "connection.php";

$email = $_POST["e"];
$np = $_POST["np"];
$rp = $_POST["rp"];
$vc = $_POST["v"];

if(empty($np)){
    echo ("Please insert a New Password");
}else if(strlen($np)<5 || strlen($np)>20){
    echo ("Invalid Password");
}else if(empty($rp)){
    echo ("Please Re-type your New Password");
}else if($np != $rp){
    echo ("Password does not matched");
}else if(empty($vc)){
    echo ("Please enter your Verification Code");
}else{

    $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."' AND `verification_code` 
    = '".$vc."'");
    $user_num = $user_rs->num_rows;

    if($user_num == 1){

        Database::iud("UPDATE `user` SET `password` = '".$np."' WHERE `email`='".$email."'");
        echo("success");

    }else{
        echo ("Invalid Email or Verification Code");
    }
}

?>