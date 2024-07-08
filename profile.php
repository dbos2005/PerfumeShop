
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile | Parfumerie Muse</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="img/Parfumerie (3).png">

</head>

<body>
    <?php

    include "header.php";
    $user = $_SESSION["u"];

    if(isset($_SESSION["u"])){
    include "connection.php";
    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '".$user["id"]."'");
    $d = $rs->fetch_assoc();
    ?>

    <div class="adminBody ">
        <div class="row container bg-body-secondary bg-opacity-25 rounded-5 ">

            <div class="offset-lg-1 mt-5 col-12 col-lg-4  d-flex justify-content-center flex-column">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="row">
                        <label class="text-center fs-3 col-12" for="">Profile Image :</label>
                        <img id="i" <?php
                                    if (!empty($d["img_path"])) {
                                    ?> src="<?php echo $d["img_path"]; ?>" <?php
                                                                        } else {
                                                                            ?> src="img/profile_pic.png" width="200" alt="" <?php
                                                                                                                            }

                                                                                                                                ?>>

                        <div class="col-12 text-center mb-2">
                            <input type="file" class="form-control d-none" id="imgUploader">
                            <label class="btn btn-outline-secondary border-0 rounded-circle" for="imgUploader" style="margin-top: -40px;"><i class="fs-2 bi bi-plus-circle"></i></label>
                            <button class="btn btn-outline-warning col-12" onclick="uploadImg();">Upload Image</button>

                        </div>
                    </div>
                </div>
               
                
            </div>
            <div class="col-lg-6 col-12 mx-lg-5 m-lg-5">
                <h2 class="text-center">Profile Details</h2>
                <div class="row">
                    <div class="col-6 mt-3">
                        <label for="">First Name :</label>
                        <input type="text" class="form-control" id="fn" value="<?php echo $d["fname"]; ?>">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="">Last Name :</label>
                        <input type="text" class="form-control" id="ln" value="<?php echo $d["lname"]; ?>">
                    </div>
                    <div class="col-12 mt-3">
                        <label for="">Email :</label>
                        <input type="text" class="form-control" id="em" value="<?php echo $d["email"]; ?>">
                    </div>
                    <div class="col-12 mt-3">
                        <label for="">Mobile</label>
                        <input type="text" class="form-control" id="mb" value="<?php echo $d["mobile"]; ?>">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="">Username :</label>
                        <input type="text" class="form-control" disabled value="<?php echo $d["username"]; ?>">
                    </div>
                    <div class="col-6 mt-3">
                        <label for="">Password :</label>
                        <input type="password" class="form-control" id="ps" value="<?php echo $d["password"]; ?>">
                    </div>

                    <h5 class="mt-5">Shipping Address</h5>
                    <div class="row mt-3">
                        <div class="col-3">
                            <label for="">No :</label>
                            <input type="text" class="form-control" id="no" value="<?php echo $d["no"]; ?>">
                        </div>
                        <div class="col-9">
                            <label for="">Line 1 :</label>
                            <input type="text" class="form-control" id="line1" value="<?php echo $d["line_1"]; ?>">
                        </div>
                        <div class="col-12">
                            <label for="">Line 1 :</label>
                            <input type="text" class="form-control" id="line2" value="<?php echo $d["line_2"]; ?>">
                        </div>
                        <div class="mt-3 mb-2 col-12 d-grid">
                            <button class="btn btn-outline-dark" onclick="updateData()">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>

<?php
}else{
    header("location: SignIn.php");
}

?>