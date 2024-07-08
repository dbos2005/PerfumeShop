<?php
session_start();
if (isset($_SESSION["a"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Product | Parfumerie Muse</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="img/Parfumerie (2).png">
        <link rel="stylesheet" href="bootstrap.css">
    </head>


    <body>
        <?php
        include "connection.php";
        include "adminHeader.php"
        ?>
        <div class="col-10 mt-5 d-flex w-100 justify-content-center align-items-center">
            <h1 class="text-center mt-5">Product Management</h1>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="row p-3 col-10 ">
                <div class="col-lg-4 col-12 mb-3">
                    <h2>Category</h2>
                    <div class="row">
                        <div class="col-lg-8 col-10 d-grid">
                            <input class="form-control" id="category" type="text">
                        </div>
                        <div class="col-lg-4 col-2">
                            <button class="btn btn-dark" onclick="CategoryReg()">Add</button>
                        </div>

                        <div class="col-12 mt-2">
                        <div class="d-none" id="msgDiv1">
                                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                    <p id="msg1"></p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>

                        </div>
                        <div class="overflow-y-scroll overflow-x-hidden border rounded p-2" style="height:200px ;">
                            <?php
                            $rs = Database::search("SELECT * FROM `category`");
                            $num = $rs->num_rows;
                            for ($i = 0; $i < $num; $i++) {
                                $data = $rs->fetch_assoc();
                            ?>
                                <div class="row">
                                    <div class="col-5">
                                        <p><?php echo $data["cat_id"]; ?></p>
                                    </div>
                                    <div class="col-5">
                                        <p><?php echo $data["cat_name"]; ?></p>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>


                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-12 mb-2">
                    <h2>Brand</h2>
                    <div class="row">
                        <div class="col-lg-8 col-10 d-grid">
                            <input class="form-control" id="brand" type="text">
                        </div>
                        <div class="col-lg-4 col-2">
                            <button class="btn btn-dark" onclick="brandReg()">Add</button>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="d-none" id="msgDiv2">
                                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                    <p id="msg2"></p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-y-scroll overflow-x-hidden border rounded p-2" style="height:200px ;">
                            <?php
                            $rs = Database::search("SELECT * FROM `brand`");
                            $num = $rs->num_rows;
                            for ($x = 0; $num > $x; $x++) {
                                $data = $rs->fetch_assoc();
                            ?>
                                <div class="row">
                                    <div class="col-5">
                                        <p><?php echo $data["brand_id"]; ?></p>
                                    </div>
                                    <div class="col-5">
                                        <p><?php echo $data["brand_name"]; ?></p>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <h2>Size</h2>
                    <div class="row">
                        <div class="col-lg-8 col-10 d-grid">
                            <input class="form-control" id="size"  type="text">
                        </div>
                        <div class="col-lg-4 col-2">
                            <button class="btn btn-dark" onclick="sizeReg()">Add</button>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="d-none" id="msgDiv3">
                                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                    <p id="msg3"></p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-y-scroll overflow-x-hidden border rounded p-2" style="height:200px ;">
                            <?php
                            $rs = Database::search("SELECT * FROM `size`");
                            $num = $rs->num_rows;
                            for ($y = 0; $num > $y; $y++) {
                                $data = $rs->fetch_assoc();
                            ?>
                                <div class="row">
                                    <div class="col-5">
                                        <p><?php echo $data["size_id"]; ?></p>
                                    </div>
                                    <div class="col-5">
                                        <p><?php echo $data["size_name"]; ?></p>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        
 <!-- footer -->
 <div class="fixed-bottom col-12">
                    <p class="text-center">&copy; 2024 Parfumerie Muse.lk || All Right Reserved</p>
                </div>
                <!-- footer -->

    </body>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    </body>

    </html>
<?php
} else {
    header("location: adminSignIn.php");
}

?>