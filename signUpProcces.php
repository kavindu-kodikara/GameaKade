<?php

require "connection.php";

$fname = $_POST["fn"];
$email = $_POST["e"];
$password = $_POST["p"];
$repassword = $_POST["rp"];

if(empty($fname)){
    echo("Please enter your first name");
}else if(strlen($fname) > 50){
    echo("First Name must have less than 50 characters");
}else if(empty($email)){
    echo("Please enter your email");
}else if(strlen($email) > 100){
    echo("Email must have less than 100 characters");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo("Invalid Email !!!");
}else if(empty($password)){
    echo("Please enter your password");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo("Passwort must be between 5 - 20 charactors");
}else if(empty($repassword)){
    echo("Please re-type your password");
}else if($password != $repassword){
    echo("Your re-typed password is wrong");
}else{
    
    $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."'");
    $user_num = $user_rs->num_rows;

    if($user_num > 0){
        echo("User with the same Email already exist.");
    }else{
        
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("y-m-d H:i:s");

        Database::iud("INSERT INTO `user` (`email`,`password`,`fname`,`joined_date`,`states`)
        VALUES ('".$email."','".$password."','".$fname."','".$date."','1')");
        

        echo("success");

    }

}

?>