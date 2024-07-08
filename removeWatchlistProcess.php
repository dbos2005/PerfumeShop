<?php
include "connection.php";
session_start();
$user = $_SESSION["u"];
$stockId = $_POST["stockId"];
if(empty($stockId)){
echo("Please Try again");
}else{
    Database :: iud("DELETE FROM `watchlist` WHERE `user_id` = '".$user["id"]."' AND `stock_stock_id` = '".$stockId."'");
    echo("Success");
}


?>