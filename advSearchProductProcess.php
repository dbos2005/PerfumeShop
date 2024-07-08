<?php
include "connection.php";
$pageno = 0;
$page = $_POST["pg"];
$size = $_POST["size"];
$minPrice = $_POST["minPrice"];
$mxPrice = $_POST["maxPrice"];
$brand = $_POST["brand"];
$category = $_POST["category"];
$txt = $_POST["keyword"];
//  echo($txt);
$status = 0;

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `product`.`id` = `stock`.`product_id` INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id` INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id` INNER JOIN `category` ON `category`.`cat_id` = `product`.`category_id`";

if($status == 0 && !empty($txt)){
$status = 1;
$q .= " WHERE `product`.`name` LIKE '%$txt%' ";
}else if($status != 0 && !empty($txt)){
    $q .= " AND `product`.`name` LIKE '$txt'";
}

if ($status == 0 && $size != 0) {
    $status = 1;
    //1st search Where
    $q .= " WHERE `size`.`size_id` = '" . $size . "'";
} else if ($status != 0 && $size != 0) {
    //2nd search and
    $q .= " AND `size`.`size_id` = '" . $size . "'";
}
if ($status == 0 && $brand != 0) {
    $status = 1;
    //1st search Where
    $q .= " WHERE `brand`.`brand_id` = '" . $brand . "'";
} else if ($status != 0 && $brand != 0) {
    //2nd search and
    $q .= " AND `brand`.`brand_id` = '" . $brand . "'";
}
if ($status == 0 && $category != 0) {
    $status = 1;
    //1st search Where
    $q .= " WHERE `category`.`cat_id` = '" . $category . "'";
} else if ($status != 0 && $category != 0) {
    //2nd search and
    $q .= " AND `category`.`cat_id` = '" . $category . "'";
}
//search by min Price
if (!empty($minPrice) && empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` <= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` <= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
    }
}
//search vy max price
if (empty($minPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` >= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` >= '" . $minPrice . "' ORDER BY `stock`.`price` ASC";
    }
}
//search by price range

if (!empty($minPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC";
    }
}
$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 9;
$num_of_pages = ceil($num / $results_per_page);
$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;
if($num2 == 0){
?>

<div class="col-10 text-center">
    <h2 class="mt-5 text-danger position-absolute">No result yet</h2>
<img src="img/itemAds/bad-day-icon-with-calendar-emoji_116137-9364.avif" alt="">

</div>

<?php
}else{
    ?>

    <div class="row gap-5 mt-2 d-flex justify-content-center" id="loadShop">
        <?php
    
        for ($e = 0; $e < $num2; $e++) {
            $dta = $rs2->fetch_assoc();
        ?>
            <div class="pcard col-lg-3 col-8 rounded position-relative rounded-5 h-50 mb-3">
                <button class="btn btn-outline-danger ms-1  rounded position-absolute rounded-circle d-flex justify-content-center align-items-center mt-3" style="width: 40px;height: 40px; margin-left: -10px;">
                    <i class="fs-6 bi bi-heart"></i>
                </button>
                <button class="btn btn-outline-success ms-1 rounded position-absolute rounded-circle d-flex justify-content-center align-items-center " style="width: 40px;height: 40px; margin-left: -10px; margin-top: 60px;">
                    <i class="fs-6 bi bi-cart4"></i>
                </button>
    
                <a href="singleProductView.php?s=<?php echo $dta["stock_id"]; ?>"><img src="<?php echo $dta["path"] ?>" class="card-img-top" height="250" width="600"></a>
                <div class="card-body text-center">
                    <h5 class="card-title " style="margin-top: -20px;font-size: 15px;"><?php echo $dta["name"]; ?></h5>
                    <h6 class="text-black-50" style="font-size: 12px;">FOR <?php echo $dta["cat_name"] ?></h6>
                    <div class="text-center">
                        <p class="card-text text-decoration-line-through text-danger mb-0" style="font-size: 12px;">Rs.2500.00</p>
                        <p class="fw-bold" style="font-size: 17px;">Rs.<?php echo $dta["price"] ?>.00</p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <?php
}
