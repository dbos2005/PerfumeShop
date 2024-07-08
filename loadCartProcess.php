<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];
$newTotal = 0;

$rs = Database::search("SELECT * FROM `cart` INNER JOIN `stock` ON `cart`.`stock_stock_id` = `stock`.`stock_id` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
INNER JOIN `size` ON `size`.`size_id` = `product`.`size_id` INNER join `brand` ON `brand`.`brand_id` = `product`.`brand_id` WHERE `cart`.`user_id` = '" . $user["id"] . "'; ");
$num = $rs->num_rows;

if ($num > 0) {
      //load Cart

?>
    <div class="mb-3 mt-5 text-dark">
        <h3>Shopping Cart</h3>
    </div>
    <div class="col-lg-6 col-12 ">
        <?php
        for ($i = 0; $i < $num; $i++) {
            $d = $rs->fetch_assoc();
            $total = $d["price"] * $d["cart_qty"];
            $newTotal += $total;
        ?>
            <!-- cart item -->

            <div class="col-12 border rounded-5 mb-3 p-3">
                <div class="col-12 text-center">
                    <h4><?php echo $d["name"] ?></h4>
                </div>
                <div class="row">
                    <div class=" col-4">
                        <img src="<?php echo $d["path"]; ?>" class="rounded-4" width="100px" alt="">
                    </div>
                    <div class="col-lg-3 col-4  mt-3">
                        <p class="text-muted mb-0">Brand: <?php echo $d["brand_name"]; ?></p>
                        <p class="text-muted mb-0">Size: <?php echo $d["size_name"]; ?></p>
                        <p class="text-muted mb-0">Availbale Qty: <?php echo $d["qty"]; ?></p>
                    </div>
                    <div class="col-lg-4 offset-1 offset-lg-0 col-6  mt-4">
                        <button class="btn btn-dark btn-sm rounded-3" onclick="decrementCartQty(<?php echo $d['cart_id']; ?>);">-</button>
                        <input type="number" id="qty<?php echo $d["cart_id"]; ?>" class="form-control-sm border-0  text-center" value="<?php echo $d["cart_qty"]; ?>" disabled style="max-width: 100px;">
                        <button class="btn btn-dark btn-sm rounded-3" onclick="incrementCartQty(<?php echo $d['cart_id']; ?>);">+</button>

                    </div>
                    <div class="col-lg-1 col-5 mt-4">
                        <button class="btn btn-danger btn-sm" onclick="removeCart(<?php echo $d['cart_id']; ?>);"><i class="bi bi-x"></i></button>
                    </div>
                    <div class="col-12 d-flex justify-content-center mt-2">
                        <h4>Total: <span class="fs-4 text-warning">Rs:<?php echo $total ?>.00</span></h4>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
    </div>

         <!-- checkout -->
             <div class="col-lg-6 col-12 d-flex justify-content-center h-50">      
        <div class="col-lg-10 col-12 border border-primary rounded-5 p-lg-5 p-3">
            <h1 class="fw-bold text-center">CheckOut</h1>
            <div class="col-12">
                <hr>
            </div>
            <div class="m-5">
                <h4>Number of Items: <span class="fs-3 text-info"><?php echo $num ?> Items</span></h4>
                <h5>Delivary Fee: <span class="fs-5 text-muted"> Rs: 500</span></h5>
                <h3>Net Total: <span class="fs-3 text-danger">Rs.<?php echo ($newTotal + 500) ?>.00</span></h3>
                <button class="btn btn-primary col-10 mt-3 mb-4" onclick="checkOut();">Cheack Out</button>
            </div>
        </div>
        <!-- checkout -->
    </div>

<?php

} else {
    // echo("empty");
?>
    <div class="col-12 text-center mt-5">
        <h2 class="text-danger fw-bold">Your Card is Empty</h2>
        <img src="img/icon/empty-cart.gif" class="col-6" width="200" alt="">

    </div>
    <div class="d-flex justify-content-center">
        <a href="index.php" class="col-4 btn btn-primary">Start Shopping</a>

    </div>
<?php
}


?>