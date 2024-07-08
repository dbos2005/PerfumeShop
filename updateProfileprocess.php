<?php
include "connection.php";
session_start();
$user = $_SESSION["u"];
$fname = $_POST["fn"];
$lname = $_POST["ln"];
$email = $_POST["em"];
$mobile = $_POST["mb"];
$ps = $_POST["ps"];
$no = $_POST["no"];
$line1 = $_POST["l1"];
$line2 = $_POST["l2"];

if (empty($fname)) {
    echo ("Please enter Your First Name");
} else if (strlen($fname) > 20) {
    echo ("First name should be less than under 20 characters");
} else if (empty($lname)) {
    echo ("Please enter Your Last Name");
} else if (strlen($lname) > 20) {
    echo ("Last name should be less than under 20 characters");
} else if (empty($email)) {
    echo ("Please enter Your Email Address");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invaild Email Address!");
} else if (empty($mobile)) {
    echo ("Please enter Your Mobile Number");
} else if (strlen($mobile) != 10) {
    echo ("Your Mobile Number must contain 10 characters");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Invaild Mobile Number!");
} else if (empty($ps)) {
    echo ("Please enter Your Password");
} else if (strlen($ps) < 8 || strlen($ps) > 45) {
    echo ("Password must contain 8 - 45 characters");
} else if(empty($no)){
    echo ("Please enter Your Address number");
}else if(strlen($no) > 10){
    echo ("Address No should be less than under 10 characters");
}else if(empty($line1)){
    echo ("Please enter Your Address line 01");
}else if(strlen($line1) > 50){
    echo ("Address line 01 should be less than under 10 characters");
}else if(empty($line2)){
    echo ("Please enter Your Address line 02");
}else if(strlen($line1) > 50){
    echo ("Address line 02 should be less than under 10 characters");
}else{
    Database :: search("UPDATE `user` SET `fname` = '".$fname."',`lname` = '".$lname."',`email` = '".$email."',`mobile` = '".$mobile."',`password` = '".$ps."' ,
    `no` = '".$no."' ,`line_1` = '".$line1."' , `line_2` = '".$line2."' WHERE `id` = '".$user["id"]."'");

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '".$user["id"]."'");
    $d = $rs ->  fetch_assoc();
    $_SESSION["u"] = $d;
    echo("Update Successfully");
}
?>