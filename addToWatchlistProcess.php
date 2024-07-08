<?php
include "connection.php";
session_start();
$user = $_SESSION["u"];
$stockId = $_POST["stockId"];

$rs = Database :: search("SELECT * FROM `watchlist` WHERE `stock_stock_id` = '".$stockId."' AND `user_id` = '".$user["id"]."' ");
$num = $rs -> num_rows;

if($num == 0){
Database :: iud("INSERT INTO `watchlist`(`user_id`,`stock_stock_id`) VALUES ('".$user["id"]."','".$stockId."')");
echo("success");
}else{
echo("This item is already exisit");
}

?>