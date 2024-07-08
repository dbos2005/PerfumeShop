<?php

include "connection.php";

$rs = Database::search("SELECT `product`.`id`,`product`.`name`,SUM(`order_item`.oi_qty) AS `total_sold` FROM `order_item` 
INNER JOIN `stock` ON `order_item`.`stock_stock_id` = `stock`.`stock_id` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` GROUP BY `product`.`id`,`product`.`name`
ORDER BY `total_sold` DESC LIMIT 5");

$rs2 = Database::search("SELECT MONTH(order_date) AS month,  
SUM(order_history.amount) AS total_cost   
FROM `order_history` INNER JOIN `order_item` ON `order_item`.`order_history_ohid` = `order_history`.`ohid` 
INNER JOIN `stock` ON `stock`.`stock_id` = `order_item`.`stock_stock_id` 
GROUP BY MONTH(order_date) ORDER BY MONTH limit 6");

$num = $rs->num_rows;
$num2 = $rs2->num_rows;
$labels = array();
$data = array();
$month = array();
$profit = array();
for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();

    $labels[] = $d["name"];
    $data[] = $d["total_sold"];
}
$months_of_year = array(
    1 => "January", 2 => "February", 3 => "March", 4 => "April", 5 => "May", 6 => "June", 
    7 => "July", 8 => "August", 9 => "September", 10 => "October", 11 => "November", 12 => "December"
);
for ($x = 0; $x < $num2; $x++) {
    $d2 = $rs2->fetch_assoc(); 
     $month[] = $months_of_year[$d2["month"]];
    $profit[] = $d2["total_cost"];
}



$json = array();
$json["labels"] = $labels;
$json["data"] = $data;
$json["month"] = $month;
$json["profit"] = $profit;

echo json_encode($json);
