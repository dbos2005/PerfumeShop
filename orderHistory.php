<?php
include "connection.php";

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order History | Parfumerie Muse</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="img/Parfumerie (3).png">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    </head>

    <body>
        <?php
        include "header.php";
        
$user = $_SESSION["u"];
if (isset($_SESSION["u"])) {
        ?>
        <div class="container mt-5">
            <div class="row">
                <?php
                $rs = Database::search("SELECT * FROM `order_history` WHERE `user_id` = '" . $user["id"] . "'");
                $num = $rs->num_rows;

                if ($num > 0) {
                    // not empty
                ?>
                    <div class="mt-3 mb-5 mt-5">
                        <h3>Order History</h3>
                    </div>
                    <!-- order history card` -->
                    <?php
                    for ($x = 0; $x < $num; $x++) {
                        $d = $rs->fetch_assoc();

                    ?>
                        <div class="p-3 border border-3 rounded-3 bg-body-tertiary mb-4">
                            <div>
                                <h5>Order Id <span class="text-info">#<?php echo $d["order_id"]; ?></span></h5>
                                <p><?php echo $d["order_date"]; ?></p>
                            </div>
                            <div class="ps-5 pe-5">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Price</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rs2 = Database::search("SELECT * FROM `order_item`
                                         INNER JOIN `stock` ON `order_item`.`stock_stock_id` = `stock`.`stock_id`
                                         INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` WHERE `order_item`.`order_history_ohid` = '" . $d["ohid"] . "' ");
                                        $num2 = $rs2->num_rows;
                                        for ($i = 0; $i < $num2; $i++) {
                                            $d2 = $rs2->fetch_assoc();
                                        ?>
                                            <tr>

                                                <td><?php echo $d2["name"]; ?></td>
                                                <td><?php echo $d2["oi_qty"]; ?></td>
                                                <td>Rs.<?php echo ($d2["price"] * $d2["oi_qty"]) ?>.00</td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end pe-5">
                                    <div>
                                        <h6 class="text-muted">Delivary Fee: Rs.500.00</h6>
                                        <h4>Net Total: <span class="fs-4 text-success">RS.<?php echo $d["amount"] ?>.00</span></h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- order history card` -->
                    <?php
                    }
                } else {
                    // empty
                    ?>

                    <div class="col-12 text-center mt-5">
                        <h2>You have not Ordered anything yet!</h2>
                        <a href="index.php" class="btn btn-primary">Start Shoping</a>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </body>

    </html>
<?php
} else {
    header("Location: signIn.php");
}

?>