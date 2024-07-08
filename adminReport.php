<?php
session_start();
if(isset($_SESSION["a"])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Report | Parfumerie Muse</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/Parfumerie (2).png">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
    <?php
    include "adminHeader.php";
    ?>

    <div class="col-10 offset-1 mt-5">
        <h2 class="text-center">Reports</h2>
        <div class="row mt-5">
            <div class="col-4 d-grid">
                <a href="adminReportStock.php" ><button class="col-12 btn btn-outline-info"><i class="fs-1 bi bi-bag-check-fill"></i> Stock Report</button></a>
            </div>
            <div class="col-4 d-grid">
                <a href="adminReportProduct.php"><button class="col-12 btn btn-outline-info"><i class="fs-1 bi bi-suitcase"></i> Product Report</button></a>
            </div>
            <div class="col-4 d-grid">
                <a href="adminReportUser.php"><button class=" col-12 btn btn-outline-info"><i class="fs-1 bi bi-person-circle"></i> User Report</button></a>
            </div>

        </div>
    </div>
 <!-- footer -->
 <div class="fixed-bottom col-12">
                    <p class="text-center">&copy; 2024 Parfumerie Muse.lk || All Right Reserved</p>
                </div>
                <!-- footer -->
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>
<?php
}else{
    header("location: adminSignIn.php");
}

?>