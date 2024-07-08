<?php
session_start();
if (isset($_SESSION["a"])) {
    include "connection.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/Parfumerie (2).png">
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>

    <div class="container mt-4">
        <a href="adminReport.php"><img src="img/icon/back-button.png" height="26px" alt=""></a>

    </div>
    <div class="container mt-3" id="printArea">
        <h2 class="text-center mb-5">User Report</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>User Type</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $rs = Database::search("SELECT * FROM `user` INNER JOIN `user_type` ON `user_type`.`type_id` = `user`.`user_type_id` ORDER BY `user`.`id` ASC");
                $num = $rs->num_rows;
                for ($i = 0; $i < $num; $i++) {
                    $row = $rs->fetch_assoc();
                ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["fname"]; ?></td>
                        <td><?php echo $row["lname"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["mobile"]; ?></td>
                        <td><?php echo $row["type"]; ?></td>
                        <?php
if($row["status"] == 1){
    ?>
    <td><button class="btn btn-danger text-center  d-grid">Active</button></td>
    <?php
}else{
    ?>
    <td><button class="btn btn-success  d-grid">Deactive</button></td>
        <?php
}
                        ?>
                       
                    </tr>

                <?php
                }
                ?>
               
            </tbody>
        </table>
        
    </div>
    <div class="d-flex justify-content-end container">
            <button class="btn btn-danger col-2" onclick="PrintReport()">Print</button>
        </div>

    <script src="script.js"></script>
</body>
</html>
<?php
}else{
    header("location: adminSignIn.php");
}
?>