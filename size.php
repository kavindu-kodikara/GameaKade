<?php

require "connection.php";

$pid = $_POST["id"];
$size = $_POST["size"];

$rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$pid."'");
$data = $rs->fetch_assoc();

if($size == "half"){
    $price = $data["price"];
}else if($size == "full"){
    $price = $data["price_full"];
}

echo($price);

?>