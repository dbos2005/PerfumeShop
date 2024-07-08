<?php
include "connection.php";
$category = $_POST["c"];
if (empty($category)) {
    echo ("Please enter You Category Name");
} else if (strlen($category) > 20) {
    echo ("You Category Name should less than 20 character");
} else {
    $rs = Database::search("SELECT * FROM `category` WHERE `cat_name` = '" . $category . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("You Category Name is Already Exists");
    } else {
        Database::search("INSERT INTO `category` (`cat_name`) VALUES('" . $category . "')");
        echo ("Success");
    }
}
