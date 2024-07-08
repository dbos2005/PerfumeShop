<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop | Parfumerie Muse</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="img/Parfumerie (3).png">

</head>

<body onload="loadShop(0)">

    <?php

    include "header.php";
    include "connection.php";

    $rs = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`  INNER JOIN `category` ON `category`.`cat_id` = `product`.`category_id` INNER JOIN `brand` ON `brand`.`brand_id`
    = `product`.`brand_id` INNER JOIN `size` ON `size`.`size_id` = `product`.`size_id`";

    ?>
    <div class="container mt-5">
        <div class="col-12">
            <div class="row">
               <div class="col-12 mt-5 mb-4">
<h2 class="text-decoration-underline">Shop | Adavance Search</h2>
               </div>
                <div class="col-lg-4 col-12">
                    <h3>FILTER BY PRICE</h3>
                    <div class="row">
                        <div class="col-4 col-lg-10">
                            <input type="text" class="form-control mb-2" id="min_price" placeholder="From">
                        </div>
                        <div class="col-4 col-lg-10">
                            <input type="text" class="form-control mb-2" id="max_price" placeholder="To">
                        </div>
                        <div class="col-3 col-lg-10">
                            <button class="btn btn-info col-12 d-grid" onclick="advanceSearch(0)">Fillter</button>
                        </div>
                        <div class="col-10">
                            <hr>
                        </div>
                        <div class="col-4 col-lg-10">
                            <h5>Category</h5>
                            <?php
                            $rs1 = Database::search("SELECT * FROM `category`");
                            $num1 = $rs1->num_rows;
                            ?>
                            <select name="" id="cat" class="form-select">
                                <option value="0">Select</option>
                                <?php

                                for ($e = 0; $num1 > $e; $e++) {
                                    $data1 = $rs1->fetch_assoc();
                                ?>
                                    <option value="<?php echo $data1["cat_id"]; ?>"><?php echo $data1["cat_name"]; ?></option>
                                <?php
                                }

                                ?>

                            </select>
                        </div>
                        <div class="col-4 col-lg-10">
                            <h5>Brand</h5>
                            <?php
                            $rs4 = Database::search("SELECT * FROM `brand`");
                            $num4 = $rs4->num_rows;
                            ?>
                            <select name="" id="brand" class="form-select">
                                <option value="0">Select</option>
                                <?php

                                for ($y = 0; $num4 > $y; $y++) {
                                    $data = $rs4->fetch_assoc();
                                ?>
                                    <option value="<?php echo $data["brand_id"]; ?>"><?php echo $data["brand_name"]; ?></option>
                                <?php
                                }

                                ?>

                            </select>
                        </div>
                        <div class="col-4 col-lg-10">
                            <h5>Size</h5>
                            <?php
                            $size_rs = Database::search("SELECT * FROM `size`");
                            $s_num = $size_rs->num_rows;
                            ?>
                            <select name="" id="size" class="form-select">
                                <option value="0">Select</option>
                                <?php

                                for ($a = 0; $a < $s_num; $a++) {
                                    $size_data = $size_rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo $size_data["size_id"]; ?>"><?php echo $size_data["size_name"]; ?></option>
                                <?php
                                }

                                ?>


                            </select>
                        </div>
                    </div>


                </div>
                <div class="col-8">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-8 mt-3 mb-3">
                                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                                    </ol>
                                </nav>
                            </div>

                            <div class="col-lg-4 col-12">
                                <input type="text" id="t" onkeyup="advanceSearch(0)" placeholder="Type keyword to search..." class="form-control">
                            </div>
                            <div id="loadShop">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
           

        </div>
    </div>



    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>