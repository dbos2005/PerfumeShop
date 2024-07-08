<?php
include "connection.php";
$brand = $_POST["b"];
if (empty($brand)) {
    echo ("Please enter Brand name");
} else if (strlen($brand) > 20) {
    echo ("Your Brand name should less than 20 Character");
} else {
    $rs = Database::search("SELECT * FROM `brand` WHERE `brand_name` = '" . $brand . "'");
    $num = $rs->num_rows;
    
    if ($num > 0) {
        echo ("Your Brand name is Already Exists");
    } else {
        Database::search("INSERT INTO `brand` (`brand_name`) VALUES('" . $brand . "')");
        echo ("Success");
    }
}
