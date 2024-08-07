<?php

include "connection.php";

$pageno = 0;
$page = $_POST["p"];
//echo($page);

if ($page != 0) {
    $pageno = $page;
} else {
    $pageno = 1;
}
//echo($pageno);

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`  INNER JOIN `category` ON `category`.`cat_id` = `product`.`category_id` ORDER BY `stock`.`stock_id` ASC";
$rs = Database::search($q);
$num = $rs->num_rows;
//echo($num);

$result_per_page = 12;
$num_of_page = ceil($num / $result_per_page);

$page_results = ($pageno - 1) * $result_per_page;
//echo($page_results);
$q2 = $q . " LIMIT $result_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;
//echo($num2);

if ($num == 0) {
    //Not Available stock
    echo ("No Product Here...");
} else {
    //load stock
    ?>

    <div class="row gap-lg-0 mt-2 d-flex justify-content-center" id="loadShop">
        <?php
    for ($i = 0; $i < $num2; $i++) {
        $dta =  $rs2->fetch_assoc();
?>       
        <!-- //// -->
        <div class="pcard col-lg-4 col-10 rounded position-relative rounded-5 h-50 mb-3">
                <button class="btn btn-outline-danger ms-1  rounded position-absolute rounded-circle d-flex justify-content-center align-items-center mt-3" style="width: 40px;height: 40px; margin-left: -10px;">
                    <i class="fs-6 bi bi-heart"></i>
                </button>
                <button class="btn btn-outline-success ms-1 rounded position-absolute rounded-circle d-flex justify-content-center align-items-center " style="width: 40px;height: 40px; margin-left: -10px; margin-top: 60px;">
                    <i class="fs-6 bi bi-cart4"></i>
                </button>
    
                <a href="singleProductView.php?s=<?php echo $dta["stock_id"]; ?>"><img src="<?php echo $dta["path"] ?>" class="card-img-top" height="250" width="800"></a>
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
    <!-- pagination -->
    <div class="d-flex justify-content-center mt-3 mb-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" <?php
                                            if ($pageno <= 1) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="loadShop(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                }
                                                                                                    ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                for ($y = 1; $y <= $num_of_page; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active"><a class="page-link" onclick="loadShop(<?php echo $y ?>);"><?php echo ($y); ?></a></li>


                    <?php
                    } else {
                    ?>
                        <li class="page-item"><a class="page-link" onclick="loadShop(<?php echo $y ?>);"><?php echo ($y); ?></a></li>
                <?php
                    }
                }
                ?>

                <li class="page-item">
                    <a class="page-link" <?php
                                            if ($pageno >= $num_of_page) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="loadShop(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                }
                                                                                                    ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

<?php
}

?>