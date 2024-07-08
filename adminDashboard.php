<?php
session_start();
if (isset($_SESSION["a"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="icon" href="img/Parfumerie (2).png">
        <link rel="stylesheet" href="style.css">
    </head>

    <body onload="loadChart();">
        <?php
        include "connection.php";
        include "adminHeader.php";
        ?>
        <div class="d-flex justify-content-center vh-100 align-items-center mt-5">

            <div class="row">
                <div class="text-center col-12 mt-5 mb-3">
                    <h1>Admin Dashboard</h1>
                </div>
                <!-- chart -->
                <div class="offset-lg-1 col-lg-5 offset-2 mt-5 col-5 d-grid">
                    <h2 class="text-center">Most Sold Product</h2>
                    <div style="width: 500px;" class="col-2">
                        <canvas id="mychart"></canvas>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-0 offset-2 col-6 mt-5">
                    <h2 class="text-center">Monthly Income</h2>
                    <div style="width: 500px;" class="">
                        <canvas id="mychart2"></canvas>
                    </div>

                </div>
                <!-- chart -->

                <!-- footer -->
                <div class="fixed-bottom col-12">
                    <p class="text-center">&copy; 2024 Parfumerie Muse.lk || All Right Reserved</p>
                </div>
                <!-- footer -->
            </div>

        </div>


        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </body>

    </html>
<?php
} else {
}

?>