<?php
session_start();
require "connection.php";

$rs = Database::search("SELECT * FROM `invoice` WHERE `uniq_id` = '".$_SESSION["uniq_id"]."'");
$data = $rs->fetch_assoc();

if (!empty($data["delever_time_id"])) {
    $tid = $data["delever_time_id"];
    $t_rs = Database::search("SELECT * FROM `delever_time` WHERE `id` = '" . $tid . "'");
    $t_data = $t_rs->fetch_assoc();

    date_default_timezone_set("Asia/Colombo");
    $current_time = date("H:i:s");

    if($current_time < $t_data["start_time"]){
        echo ("success");
    }else{
        echo ("none");
    }

    
} else {
    echo ("none");
}
