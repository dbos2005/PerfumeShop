
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Watchlist | Parfumerie Muse</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="icon" href="img/Parfumerie (3).png">

    </head>

    <body>
        <?php
        include "header.php";
        
$user = $_SESSION["u"];
include "connection.php";
if (isset($user)) {
        ?>
        <div class="container mt-5">
            <div class="row">
                <div class="mt-5 mb-5">
                    <h2>You Product Watchlist</h2>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="row col-12 ">
                        <div class="col-12">
                            <hr>
                            <div class="row">
                                <?php

                                $rs = Database::search("SELECT * FROM `watchlist` INNER JOIN `stock` ON `stock`.`stock_id` = `watchlist`.`stock_stock_id`
                                INNER JOIN `product` ON `product`.`id` = `stock`.`product_id` INNER JOIN `category` ON `category`.`cat_id` = `product`.`category_id`
                                 WHERE `user_id` = '" . $user["id"] . "'");
                                $num = $rs->num_rows;

                                if ($num > 0) {
                                    for ($i = 0; $i < $num; $i++) {
                                        $dta = $rs->fetch_assoc();
                                ?>
                                        <div class="pcard col-lg-3 col-10 rounded position-relative rounded-5  mb-3">
                                            <button class="btn btn-dark" onclick="removeWatchlist(<?php echo $dta['stock_stock_id']; ?>);"><i class="bi bi-x"></i> Remove</button>
                                            <button class="btn btn-outline-danger ms-1  rounded position-absolute rounded-circle d-flex justify-content-center align-items-center mt-3" style="width: 40px;height: 40px; margin-left: -10px;">
                                                <i class="fs-6 bi bi-heart"></i>
                                            </button>
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
                                } else {
                                    ?>
                                    <div class="col-12">
<div class="text-center"> 
    
     <div class="">
     <img src="img/icon/empty-cart-7359557-6024626.webp" alt="">
     <h2 class="text-muted">The Watchlist is empty!....</h2>
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location: signIn.php");
}
?>