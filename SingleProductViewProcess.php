<?php

session_start();
require "connection.php";

$pid = $_POST["id"];

$p_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pid . "'");
$p_num = $p_rs->num_rows;

if ($p_num == 1) {
    $p_data = $p_rs->fetch_assoc();
    $_SESSION["p"] = $p_data;
    echo ("success");
} else {
    echo ("Something went wrong");
}
