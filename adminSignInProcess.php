<?php
include "connection.php";
session_start();
$email = $_POST["email"];
$password = $_POST["ps"];

if (empty($email)) {
    echo ("Please enter Your Email");
} else if (empty($password)) {
    echo ("Please enter Passowrd");
} else {
    $sql = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' AND `password` = '" . $password . "' AND `status` = '1'");
    $num = $sql->num_rows;
    $d = $sql->fetch_assoc();

    if ($num == 1) {
       
        if ($d["status"] == 1) {
            $_SESSION["a"] = $d;
            echo ("Success");
        }else {
            echo ("Inactive User");
        }
    } else {
        echo ("Invaild Username Or Password");
    }
}
