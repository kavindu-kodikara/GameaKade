<?php
session_start();
$email = $_POST["e"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

if(empty($email)){
    echo("Please enter your email");
}else if(strlen($email) > 100){
    echo("Email must have less than 100 characters");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo("Invalid Email !!!");
}else if(empty($password)){
    echo("Please enter your password");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo("Passwort must be between 5 - 20 charactors");
}else{

    require "connection.php";

    $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."' 
    AND `password` = '".$password."'");
    $user_num = $user_rs->num_rows;

    if($user_num == 1){
        echo("success");
        $user_data = $user_rs->fetch_assoc();
        $_SESSION["u"] = $user_data;

        if($rememberme =="true"){
            setcookie("email",$email,time()+(60*60*24*365));
            setcookie("password",$password,time()+(60*60*24*365));
        }else{
            setcookie("email","",-1);
            setcookie("password","",-1);
        }
        

    }else{
        echo("Invalid Username or Password");
    }

}
