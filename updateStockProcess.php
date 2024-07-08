<?php
include "connection.php";
$pname = $_POST["pname"];
$qty = $_POST["qty"];
$price = $_POST["price"];

if ($pname == "0") {
    echo ("Please select Product name");
} else if (empty($qty)) {
    echo ("Please enter Product Qty");
} else if (!is_numeric($qty)) {
    echo ("Only numbers can be entered for Qty");
} else if (strlen($qty) > 10) {
    echo ("Your Qty should be than 10 characters");
} else if (empty($price)) {
    echo ("Please enter Product Price");
} else if (!is_numeric($price)) {
    echo ("Only numbers can be entered for Price");
} else if (strlen($price) > 10) {
    echo ("Your Qty should be than 10 characters");
} else {
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $rs = Database::search("SELECT * FROM `stock` WHERE `product_id` = '" . $pname . "' AND `price` = '".$price."'");
    $num = $rs->num_rows;
    $data = $rs->fetch_assoc();

    if ($num == 1) {
        $new_qty = $data["qty"] + $qty;
        Database :: iud("UPDATE `stock` SET `qty` = '".$new_qty."' WHERE `product_id` = '".$data["product_id"]."'");
        echo("Update Success");
    }else{
        Database :: iud("INSERT INTO `stock`(`price`,`qty`,`product_id`,`date_time`)
        VALUES('".$price."','".$qty."','".$pname."','".$date."')");
        echo("Success");
    }
}
