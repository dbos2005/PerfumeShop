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
        <title>Admin Stock Management | Parfumerie Muse</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="img/Parfumerie (2).png">
        <link rel="stylesheet" href="bootstrap.css">
    </head>

    <body>
        <?php
        include "adminHeader.php";
        ?>
        <div class="mt-5">
            <div class="container-fluid mt-5">
                <div class="row mt-5">
                    <div class="col-lg-5 offset-lg-1 mt-5">
                        <h2 class="text-center">Product Registration</h2>
                        <div class="mb-3 col-lg-10 col-12">
                            <label for="" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="pname">
                        </div>
                        <div class=" row">
                            <div class="mb-3 col-lg-5 col-6">
                                <label for="" class="form-label">Brand Name</label>
                                <select class="form-select" id="brand">
                                    <?php

                                    $rs = Database::search("SELECT * FROM `brand`");
                                    $num = $rs->num_rows;
                                    ?>
                                    <option value="0" selected>Select</option>
                                    <?php
                                    for ($x = 0; $num > $x; $x++) {
                                        $data = $rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($data["brand_id"]); ?>"><?php echo $data["brand_name"]; ?></option>
                                    <?php
                                    }

                                    ?>

                                </select>
                            </div>

                            <div class="mb-3 col-lg-5 col-6">
                                <label for="" class="form-label">Category Name</label>
                                <select class="form-select" id="category">

                                    <?php

                                    $rs1 = Database::search("SELECT * FROM `category`");
                                    $num1 = $rs1->num_rows;
                                    ?>
                                    <option value="0" selected>Select</option>
                                    <?php
                                    for ($y = 0; $num1 > $y; $y++) {
                                        $data1 = $rs1->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($data1["cat_id"]); ?>"><?php echo $data1["cat_name"]; ?></option>
                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="mb-3 col-lg-10 col-12">
                                <label for="" class="form-label">Size Name</label>
                                <select class="form-select" id="size">

                                    <?php

                                    $rs2 = Database::search("SELECT * FROM `size`");
                                    $num2 = $rs2->num_rows;
                                    ?>
                                    <option value="0" selected>Select</option>
                                    <?php
                                    for ($i = 0; $num2 > $i; $i++) {
                                        $data2 = $rs2->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($data2["size_id"]); ?>"><?php echo $data2["size_name"]; ?></option>
                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="mb-3 col-lg-10 col-12">
                                <label for="" class="form-label">Description</label>
                                <textarea name="" class="form-control" rows="5" id="dec"></textarea>
                            </div>
                            <div class="mb-3 col-10">
                                <label for="" class="col-12 form-label">Product Image</label>
                                <input type="file" id="file" class="form-control d-none">
                                <div class="d-flex justify-content-center">
                                    <img src="img/icon/empty_img.webp" id="i" class=" w-50" alt="">
                                </div>
                               
                            </div>
                            <div class="d-grid col-10 offset-1 offset-lg-0 mb-2 ">
                            <label for="file" class="col-12 mb-3 btn btn-outline-info" onclick="addImage()">Add Product Image</label>
                                <button class="btn btn-secondary" onclick="ProductReg()">Register Product</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-10 mx-3 mx-lg-0 mb-5 mt-5">
                        <h2 class="text-center ">Stock Update</h2>
                        <div class="mb-5">
                            <label for="" class="form-label">Product Name</label>
                            <select name="" class="form-select" id="product">
                                <?php

                                $rs3 = Database::search("SELECT * FROM `product`");
                                $num3 = $rs3->num_rows;
                                ?>
                                <option value="0" selected>Select</option>
                                <?php
                                for ($e = 0; $num3 > $e; $e++) {
                                    $data3 = $rs3->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($data3["id"]); ?>"><?php echo $data3["name"]; ?></option>
                                <?php
                                }

                                ?>

                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="" class="form-label">Qty</label>
                            <input type="text" id="qty" class="form-control">
                        </div>
                        <div class="input-group mb-5">
                            <label for="" class="form-label col-12">Unit Price</label>
                            <span class="input-group-text">Rs.</span>
                            <input type="text" id="price" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text">.00</span>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-secondary" onclick="stockUpdate()">Update Stock</button>
                        </div>
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>
<?php

} else {
    header("location: adminSignIn.php");
}
?>