
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
        <title>Stock Report</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="img/Parfumerie (2).png">
        <link rel="stylesheet" href="bootstrap.css">
    </head>
    
    <body>
        <div class="container mt-4">
            <a href="adminReport.php"><img src="img/icon/back-button.png" height="26px" alt=""></a>
    
        </div>
        <div class="container mt-3" id="printArea">
            <h2 class="text-center mb-5">Stock Report</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Stock ID</th>
                        <th>Product Name</th>
                        <th>Date time</th>
                        <th>Stock Qty</th>
                        <th>Unit Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `product`.`id` = `stock`.`product_id`");
                    $num = $rs->num_rows;
                    for ($i = 0; $i < $num; $i++) {
                        $row = $rs->fetch_assoc();
                    ?>
                        <tr>
                            <td><?php echo $row["stock_id"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["date_time"]; ?></td>
                            <td><?php echo $row["qty"]; ?></td>
                            <td><?php echo $row["price"]; ?></td>
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