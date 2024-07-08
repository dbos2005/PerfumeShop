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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/Parfumerie (2).png">
    <link rel="stylesheet" href="bootstrap.css">

</head>

<body>
    <div class="container mt-4">
        <a href="adminReport.php"><img src="img/icon/back-button.png" height="26px" alt=""></a>

    </div>
    <div class="container mt-3" id="printArea">
        <h2 class="text-center mb-5">Product Report</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Colour</th>
                    <!-- <th>Size</th> -->
                    <th>Description</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $rs = Database::search("SELECT * FROM `product` INNER JOIN `brand` ON `brand`.`brand_id` = `product`.`brand_id`
                INNER JOIN `category` ON `category`.`cat_id` = `product`.`category_id` INNER JOIN `size` ON `size`.`size_id` = `product`.`size_id` ORDER BY `product`.`id` ASC");

                $num = $rs->num_rows;
                for ($i = 0; $i < $num; $i++) {
                    $row = $rs->fetch_assoc();
                ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><img src="<?php echo $row["path"]; ?>" height="100px" alt=""></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["brand_name"]; ?></td>
                        <td><?php echo $row["cat_name"]; ?></td>
                        <td><?php echo $row["size_name"]; ?></td>
                        <td><?php echo $row["description"]; ?></td>


                    </tr>

                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end container">
        <button class="btn btn-danger col-2" onclick="PrintReport()">Print</button>
    </div>
    <script src="script.js"></script>
</body>

</html>
<?php
}else{
    header("location: adminSignIn.php");
}
?>