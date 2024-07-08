<?php

include "connection.php";

$pageno = 0;
$page = $_POST["p"];
$product = $_POST["pt"];
// echo($product);

if ($page != 0) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` WHERE `product`.`name` LIKE '%$product%' ";
$rs = Database::search($q);
$num = $rs->num_rows;
//$d = $rs->fetch_assoc();
// echo($num);
$result_per_page = 10;
$num_of_page = ceil($num / $result_per_page);
$page_results = ($pageno - 1) * $result_per_page;

$q2 = $q . " LIMIT $result_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

//echo ($num2);

if($num2 == 0){
?>

<div class="d-flex flex-column align-items-center mt-3 overflow-hidden" >
<h5 class="position-absolute mb-4">Search No Result</h5>
<p class="position-absolute mt-5">We are Sorry, We cannot find any matches for your search term...</p>
<img src="img/itemAds/bad-day-icon-with-calendar-emoji_116137-9364.avif" style="margin-top: -100px;" width="700" alt="">
</div>

<?php
}else{
//load product
for ($i = 0; $i < $num2; $i++) {
    $d =  $rs2->fetch_assoc();
?>

    <div class="card col-lg-2 col-10 col-5 rounded position-relative rounded-5 h-50 mb-3">
        <button class="btn btn-outline-danger ms-1  rounded position-absolute rounded-circle d-flex justify-content-center align-items-center mt-3" style="width: 40px;height: 40px; margin-left: -10px;">
            <i class="fs-6 bi bi-heart"></i>
        </button>
        <button class="btn btn-outline-success ms-1 rounded position-absolute rounded-circle d-flex justify-content-center align-items-center " style="width: 40px;height: 40px; margin-left: -10px; margin-top: 60px;">
            <i class="fs-6 bi bi-cart4"></i>
        </button>
        <a href="singleProductView.php?s=<?php echo $d["stock_id"]; ?>"><img src="<?php echo $d["path"]; ?>" class="card-img-top" height="250" width="600"></a>
        <div class="card-body text-center">
            <h5 class="card-title " style="margin-top: -20px;font-size: 25px;"></h5>
            <h6 class="" style="font-size: 12px;"><?php echo ($d["name"]); ?></h6>
            <p class="card-text">Rs.<?php echo ($d["price"]); ?>.00</p>

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
                                        ?> onclick="searchProduct(<?php echo ($pageno - 1) ?>);" <?php
                                                                                            }
                                                                                                ?> aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php
            for ($y = 1; $y <= $num_of_page; $y++) {
                if ($y == $pageno) {
            ?>
                    <li class="page-item active"><a class="page-link" onclick="searchProduct(<?php echo $y ?>);"><?php echo($y); ?></a></li>


                <?php
                } else {
                ?>
                    <li class="page-item"><a class="page-link" onclick="searchProduct(<?php echo $y ?>);"><?php echo($y); ?></a></li>
            <?php
                }
            }
            ?>

            <li class="page-item">
                <a class="page-link" <?php
                                        if ($pageno >= $num_of_page) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="searchProduct(<?php echo ($pageno + 1) ?>);" <?php
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

