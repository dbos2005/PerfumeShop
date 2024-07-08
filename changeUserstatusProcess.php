<?php
include "connection.php";
$uid = $_POST["uid"];
$status = $_POST["id"];
//echo($status);

$rs = Database :: iud("UPDATE `user` SET `status` = '".$status."' WHERE `id` = '".$uid."'");

echo("success");
?>