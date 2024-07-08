<?php
include "connection.php";
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$username = $_POST["un"];
$password = $_POST["pw"];

if (empty($fname)) {
    echo ("Please enter Your First Name");
} else if (strlen($fname) > 20) {
    echo ("First name should be less than under 20 characters");
} else if (empty($lname)) {
    echo ("Please enter Your Last Name");
} else if (strlen($lname) > 20) {
    echo ("Last name should be less than under 20 characters");
} else if (empty($mobile)) {
    echo ("Please enter Your Mobile Number");
} else if (strlen($mobile) != 10) {
    echo ("Your Mobile Number must contain 10 characters");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Invaild Mobile Number!");
} else if (empty($email)) {
    echo ("Please enter Your Email Address");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invaild Email Address!");
} else if (empty($username)) {
    echo ("Please enter Your username");
} else if (strlen($username) > 20 || strlen($username) < 5) {
    echo ("Username must contain 5 - 20 characters");
} else if (empty($password)) {
    echo ("Please enter Your Password");
} else if (strlen($password) < 8 || strlen($password) > 45) {
    echo ("Password must contain 8 - 45 characters");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `mobile` = '" . $mobile . "' 
    OR `email` = '" . $email . "' OR `username` = '" . $username . "' ");
    $num  = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Mobile , Email or Username already taken");
    } else {
        Database::search("INSERT INTO `user`(`fname`,`lname`,`email`,`password`,`mobile`,`username`,`user_type_id`)
        VALUES('" . $fname . "','" . $lname . "','" . $email . "','" . $password . "','" . $mobile . "','" . $username . "','2')");

        echo ("success");
    }
}
