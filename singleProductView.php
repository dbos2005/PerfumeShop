<?php
include "connection.php";
$stock_id = $_GET["s"];
// echo($stock_id);
if (isset($stock_id)) {
    $q = "SELECT * FROM `stock` INNER JOIN `product` ON `product`.`id` = `stock`.`product_id` INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id` 
INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id`
 INNER JOIN `category` ON `category`.`cat_id` = `product`.`category_id`
 WHERE `stock`.`stock_id` = '" . $stock_id . "'";

    $rs = Database::search($q);
    $d = $rs->fetch_assoc();

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="icon" href="img/Parfumerie (3).png">

        <title>Product | <?php echo $d["name"]; ?></title>
    </head>

    <body id="a">
        <?php
        include "header.php";
        ?>

        <div class="col-12 d-flex justify-content-center">
            <div class="col-10 ">
                <div class="row mt-5">
                    <div class="col-lg-6 col-12 mt-5">
                        <img src="<?php echo $d["path"]; ?>" class="rounded-2 shadow-lg" width="300" alt="">
                    </div>
                    <div class="col-lg-6 col-12 mb-3">
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Shop</li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $d["cat_name"]; ?></li>
                                <li class="breadcrumb-item active fw-bold" aria-current="page"><?php echo $d["name"]; ?></li>
                            </ol>
                        </nav>
                        <label class="mt-3 fs-1"><?php echo $d["name"]; ?> (<?php echo $d["size_name"]; ?>)</label>
                        <input type="hidden" name="pn" id="pn" value="<?php echo $d["name"]; ?> (<?php echo $d["size_name"]; ?>)">
                        <h5 class="mt-3">Brand: <?php echo $d["brand_name"]; ?></h5>
                        <?php
                        $price = $d["price"];
                        $old_price = ($price * 10 / 100);
                        $n = $price + $old_price;

                        ?>
                        <div class="row">
                            <div class="col-lg-2 col-4">
                                <h4 class="mt-3 text-decoration-line-through text-danger">Rs.<?php echo $n; ?>.00</h4>
                            </div>
                            <div class="col-lg-5 col-8 mx-3">
                                <h3 class="mt-3 fw-bold">Rs.<?php echo $d["price"]; ?>.00
                                    <input type="hidden" name="price" value="<?php echo $d["price"]; ?>00">
                                    <span class="mx-2 badge text-bg-success rounded-5">10%</span>
                                </h3>
                            </div>
                        </div>

                      
                        <div class="row mt-3">
                            <div class="col-lg-2 col-6">
                                <input type="text" id="qty" name="qty" placeholder="qty" class="form-control">
                            </div>
                            <div class="col-6 mt-2">
                                <h6>Available Quantity : <?php echo $d["qty"] ?></h6>
                            </div>

                        </div>
                        <div class="mt-4 mb-4">
                         
                            <?php
                            if (isset($_SESSION["u"])) {
                            ?>
                            <h5 onclick="addToWatchlist(<?php echo $d['stock_id']; ?>);"><i class="btn rounded-circle btn-outline-danger bi bi-heart"></i> Add to Wishlist</h5>
                            <?php
                            } else {
                            ?>
<a href="signIn.php" class="text-decoration-none text-black"><h5 ><i class="btn rounded-circle btn-outline-danger bi bi-heart"></i> Add to Wishlist</h5></a>
                            <?php

                            }
                            ?>
                            
                        </div>
                        <div class="row gap-2 ">
                            <button class="btn btn-outline-danger rounded-5 col-5" onclick="addToCart(<?php echo $stock_id; ?>);"> <i class="fs-4 bi bi-cart4"></i> Add to card</button>
                            <button class="btn btn-outline-success rounded-5 col-5" onclick="buyNow(<?php echo $stock_id; ?>);"><i class="bi bi-bag"></i> Buy Now</button>
                        </div>
                    </div>
                    <div class="col-lg-8 col-12 mt-3 mb-3">
                        <h3>Description</h3>
                        <p>
                            <?php echo $d["description"]; ?>
                        </p>
                    </div>
                    <div class="col-12">
                        <h3 class="text-decoration-underline">Related Product</h3>
                        <div class="offset-lg-1 col-12 col-lg-10">
                            <div class="row">
                                <?php
                                $related_product_rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `product`.`id` = `stock`.`product_id`  INNER JOIN `category` ON `category`.`cat_id` = `product`.`category_id` WHERE `product`.`category_id` = '" . $d["cat_id"] . "' AND `stock`.`stock_id` != '" . $d["stock_id"] . "' LIMIT 4 OFFSET 1");
                                $rs_num = $related_product_rs->num_rows;
                                for ($i = 0; $i < $rs_num; $i++) {
                                    $dta = $related_product_rs->fetch_assoc();
                                ?>
                                    <div class="pcard col-lg-3 col-10 rounded position-relative rounded-5 h-50 mb-3">
                                        <?php
                                        if (isset($_SESSION["u"])) {
                                        ?>
                                            <button class="btn btn-outline-danger ms-1  rounded position-absolute rounded-circle d-flex justify-content-center align-items-center mt-3" onclick="addToWatchlist(<?php echo $dta['stock_id']; ?>);" style="width: 40px;height: 40px; margin-left: -10px;">
                                                <i class="fs-6 bi bi-heart"></i>
                                            </button>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="signIn.php" class="btn btn-outline-danger ms-1  rounded position-absolute rounded-circle d-flex justify-content-center align-items-center mt-3" style="width: 40px;height: 40px; margin-left: -10px;">
                                                <i class="fs-6 bi bi-heart"></i>
                                            </a>
                                        <?php
                                        }
                                        ?>
                                        <a href="singleProductView.php?s=<?php echo $dta["stock_id"]; ?>"><img src="<?php echo $dta["path"] ?>" class="card-img-top" height="250" width="600"></a>
                                        <div class="card-body text-center">
                                            <h5 class="card-title " style="margin-top: -20px;font-size: 15px;"><?php echo $dta["name"]; ?></h5>
                                            <h6 class="text-black-50" style="font-size: 12px;">For <?php echo $dta["cat_name"] ?></h6>
                                            <div class="text-center">
                                                <?php
                                                $price = $dta["price"];
                                                $old_price = ($price * 10 / 100);
                                                $n = $price + $old_price;

                                                ?>
                                                <p class="card-text text-decoration-line-through text-danger mb-0" style="font-size: 12px;">Rs.<?php echo $n ?>.00</p>
                                                <p class="fw-bold" style="font-size: 17px;">Rs.<?php echo $dta["price"] ?>.00</p>
                                            </div>
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
        </div>
        <div class="col-12">
            <?php
            include "footer.php"
            ?>
        </div>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </body>

    </html>


<?php
} else {
    header("location: index.php");
}
?>