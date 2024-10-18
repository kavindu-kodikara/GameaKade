<?php
require "connection.php";

$cid = $_POST["cid"];
$pid = $_POST["pid"];
$curruntId = $_POST["curruntId"];

if($curruntId != $cid){

    Database::iud("UPDATE `product` SET `category_id` = '".$cid."' WHERE `id` = '".$pid."'");

    echo("done");
    
}else{
    echo("same");
}

?>