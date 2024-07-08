<?php

include "connection.php";
$vcode = $_POST["vcode"];
$np = $_POST["np"];
$rp = $_POST["p"];
if(empty($np)){
echo("Please enter New password");
}else if (strlen($np) < 8 || strlen($np) > 45) {
    echo ("Password must contain 8 - 45 characters");
} else if(empty($rp)){
    echo("Please re-enter password");
}else{
    
if ($np == $rp) {
    $rs = Database::search("SELECT * FROM `user` WHERE `v_code` = '" . $vcode . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        $d = $rs->fetch_assoc();
        Database::iud("UPDATE `user` SET `password` = '" . $np . "' , `v_code` = NULL WHERE `id` = '" . $d["id"] . "' ");
        echo ("Success");
    } else {
        echo ("User Not Found!");
    }
} else {
    echo ("Password doesn't match");
}
}
