<?php
session_start();
if(isset($_SESSION["a"])){
?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User | Parfumerie Muse</title>
    <link rel="icon" href="img/Parfumerie (2).png">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include "connection.php";
    include "adminHeader.php";
    ?>

    <div class="col-10 d-flex w-100 justify-content-center align-items-center">
        <h1 class="text-center mt-2">User Management</h1>
    </div>

    <div class="col-10 mt-4">
        <div class="row">
            <div class="mt-4 col-lg-3 col-8 offset-1">
                <input type="text" id="uId" placeholder="Enter User ID" class="form-control">
            </div>
            <div class="mt-4 col-lg-1 col-3">
                <button class="btn btn-info" onclick="checkUser()">Check</button>
            </div>
            <div class="col-3 d-none" id="msgDiv">
            <div class="alert alert-secondary alert-dismissible fade show col-lg-12" role="alert">
                <label for="" id="msg"></label>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>

        </div>
    </div>
    <div class="col-10 mt-4 offset-1 justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Status</th>

                </tr>
            </thead>
            <tbody id="details_row">
                <?php
                $rs = Database::search("SELECT * FROM `user` WHERE `user_type_id` = '2'");
                $num = $rs->num_rows;
                for ($x = 0; $num > $x; $x++) {
                    $data = $rs->fetch_assoc();

                ?>
                    <tr>
                        <th><?php echo $data["id"]; ?></th>
                        <td ><?php echo $data["fname"]; ?></td>
                        <td><?php echo $data["lname"]; ?></td>
                        <td><?php echo $data["username"]; ?></td>
                        <td><?php echo $data["email"]; ?></td>
                        <td><?php echo $data["password"]; ?></td>
                        <td><?php echo $data["mobile"]; ?></td>
                        <td>
                            <?php
                            if ($data["status"] == 1) {
                            ?>
                                <button class="btn btn-danger" >Block</button>
                            <?php
                            } else if ($data["status"] == 2) {
                            ?>
                                <button class="btn btn-success">Unblock</button>
                            <?php
                            }

                            ?>
                        <td>

                    </tr>


                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
    <div class="fixed-bottom col-12">
<p class="text-center">&copy; 2024 Parfumerie Muse.lk || All Right Reserved</p>
</div>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>
<?php
}else{
echo("Your are not admin. Please Sign In");
}

?>

