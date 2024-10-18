<?php
require "connection.php";

$pid = $_POST["pid"];
$mid = $_POST["mid"];

if($pid > 0){
    $count = Database::search("SELECT * FROM `today_special` WHERE `meals_id` = '".$mid."'");

    if($count->num_rows <= 3){
        Database::iud("INSERT INTO `today_special` (`product_id`,`meals_id`) VALUES ('".$pid."','".$mid."')");
        echo("done");
    }
    
    
}
