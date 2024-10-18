<?php
require "connection.php";

$pid = $_POST["pid"];
$mid = $_POST["mid"];


 Database::iud("DELETE FROM `today_special` WHERE `meals_id` = '".$mid."' AND `product_id` = '".$pid."'");
 echo("done");

    
    

