<?php
include "connection.php";
$size = $_POST["size"];
if (empty($size)) {
    echo ("Please enter Size");
} else if (strlen($size) > 20) {
    echo ("You Size Name should less than 20 character");
} else {
    $rs = Database::search("SELECT * FROM `size` WHERE `size_name` = '" . $size . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("You Size Name is Already Exists");
    } else {
        Database::search("INSERT INTO `size` (`size_name`) VALUES('" . $size . "')");
        echo ("Success");
    }
}
