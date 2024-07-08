<?php

include("connection.php");
$product_name = $_POST["pname"];
$brand = $_POST["brand"];
$category = $_POST["category"];
$size = $_POST["size"];
$desc = $_POST["desc"];


if (empty($product_name)) {
    echo ("Please enter Product name");
} else if (strlen($product_name) > 45) {
    echo ("Product name is should less than Product name");
} else if ($brand == "0") {
    echo ("Please select Brand name");
} else if ($category == "0") {
    echo ("Please select Category name");
} else if ($size == "0") {
    echo ("Please select Colour name");
} else if (empty($desc)) {
    echo ("Please enter description");
} else {
    if (isset($_FILES["image"])) {
        $img = $_FILES["image"];

        $path = "resources/ProductImg/".uniqid() .".png";

        move_uploaded_file($img["tmp_name"], $path);

$rs = Database::search("SELECT * FROM `product` WHERE `name` = '".$product_name."'");
$num = $rs -> num_rows;
if ($num > 0) {
    echo("Product has been already registered!");
}else{
     Database :: iud("INSERT INTO `product` (`name`,`description`,`path`,`brand_id`,`category_id`,`size_id`)
     VALUES('".$product_name."','".$desc."','".$path."','".$brand."','".$category."','".$size."')");
echo("Success");
}
    } else {
        echo ("Please select a Product Image");
    }
}
