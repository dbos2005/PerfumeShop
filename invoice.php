<?php
include "connection.php";
session_start();
$user = $_SESSION["u"];
$orderId = $_GET["orderId"];
$rs = Database::search("SELECT * FROM `order_history` WHERE `ohid` = '" . $orderId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Invoice | Parfumerie Muse</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="icon" href="img/Parfumerie (3).png">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    </head>

    <body>
        <div class="container text-end mt-3">
            <a href="index.php"><button class="btn btn-dark btn-sm"><i class="bi bi-house"></i> Home</button></a>
            <button class="btn btn-danger"><i class="bi bi-printer" onclick="PrintReport()"></i> Print</button>
        </div>

        <div class="container p-5 border mt-5" id="printArea">
            <div class="d-flex justify-content-end mt-5">
                <div class="row">
                    <div class="p-2">
                        <div class="text-end">
                            <img src="img/Parfumerie (3).png" width="100" alt="">
                            <h3>Parfumerie Muse</h3>
                            <h5>No 12,Negambo Road,</h5>
                            <h5>Narammala.</h5>
                            <p>0778451252</p>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-10 offset-1 d-flex justify-content-lg-start">
                <div class="row">
                    <div class="mb-3">
                        <!-- <h3>Bill To:</h3> -->
                        <h4><?php echo $user["fname"] ?> <?php echo $user["lname"] ?></h4>
                        <h5><?php echo $user["mobile"] ?></h5>
                        <h5><?php echo $user["no"] ?>,<span class="fs-5"><?php echo $user["line_1"] ?></span></h5>
                        <h5><?php echo $user["line_2"] ?></h5>
                    </div>
                    <div class="col-12">
                        <h1>I N V O I C E</h1>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-6">
                                <h4>Order ID: #<span><?php echo $d["order_id"]; ?></span> </h4>
                            </div>
                            <div class="col-6">
                                <h4>Date: <span><?php echo $d["order_date"]; ?></span></h4>
                            </div>

                        </div>

                    </div>


                </div>

            </div>
            <div class="d-flex justify-content-center">
                <hr class="col-10">
            </div>
            <div class="col-10 offset-1 mb-2">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rs2 = Database::search("SELECT * FROM `order_item` INNER JOIN `stock` ON `order_item`.`stock_stock_id` = `stock`.`stock_id` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` 
INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id` INNER JOIN `category` ON `product`.`category_id` = `category`.`cat_id` INNER JOIN `size` ON `size`.`size_id` = `product`.`size_id`
 WHERE `order_item`.`order_history_ohid` = '" . $orderId . "'");
                        $num2 = $rs2->num_rows;
                        for ($a = 0; $a < $num2; $a++) {
                            $d2 = $rs2->fetch_assoc();
                        ?>
                            <tr>
                                <th scope="row"><?php echo $a + 1 ?></th>
                                <td><?php echo $d2["name"] ?></td>
                                <td><?php echo $d2["oi_qty"] ?></td>
                                <td>Rs.<?php echo $d2["price"] ?>.00</td>
                                <td>Rs.<?php echo ($d2["oi_qty"] * $d2["price"]); ?>.00</td>

                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mb-4">
                <hr class="col-10">
            </div>
            <div class="text-end  me-5">
                <h6>Number of Items : <span class="text-muted"><?php echo $num2 ?></span></h6>
                <h5>Delivary Fee : <span class="text-muted">500</span></h5>
                <h2>Total Amount : <span class="fs-2">Rs:<?php echo $d["amount"]; ?>.00</span></h2>
            </div>
        </div>
        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>
<?php
} else {
    header("location: index.php");
}

?>