<?php
include "connection.php";
session_start();
// $image = $_FILES["i"];
  $user = $_SESSION["u"];
if (empty($_FILES["i"])) {
    echo ("Empty");
} else {
    //upload img
    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '".$user["id"]."'");
    $d = $rs->fetch_assoc();
    
    if (!empty($d["img_path"])) {
        unlink($d["img_path"]); //delete form the image
    }

    $path = "resources/userImg/" . uniqid() . ".png";
    move_uploaded_file($_FILES["i"]['tmp_name'], $path);
    Database::iud("UPDATE `user` SET `img_path` = '".$path."' WHERE `id` = '1'");
 echo($path);
}
