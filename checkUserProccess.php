<?php
include "connection.php";
$uid = $_POST["userId"];
if (empty($uid)) {
    echo ("Please enter user ID");
} else if (!ctype_digit($uid)) {
    echo ("Invaild user ID");
} else {
    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $uid . "'");
    $num = $rs->num_rows;
    if ($num == 1) {

?>


        <tbody>
            <?php
            for ($y = 0; $num > $y; $y++) {
                $data = $rs->fetch_assoc();

            ?>

                <tr>
                    <th scope="row"><?php echo $data["id"]; ?></th>
                    <td><?php echo $data["fname"]; ?></td>
                    <td><?php echo $data["lname"]; ?></td>
                    <td><?php echo $data["username"]; ?></td>
                    <td><?php echo $data["email"]; ?></td>
                    <td><?php echo $data["password"]; ?></td>
                    <td><?php echo $data["mobile"]; ?></td>
                    <td>
                        <?php
                        if ($data["status"] == 1) {
                        ?>
                            <button class="btn btn-danger" id="uid" value="<?php echo $data["id"];  ?>"  onclick="changeUserStatus('2')">Block</button>
                        <?php
                        } else if ($data["status"] == 2) {
                        ?>
                            <button class="btn btn-success" id="uid" value="<?php echo $data["id"];  ?>"  onclick="changeUserStatus('1')">Unblock</button>
                        <?php
                        }

                        ?>
                    <td>

                </tr>


        <?php
            }
        } else {
            echo("No Results Found");
        
        }

        ?>
        </tbody>
    <?php

}



    ?>