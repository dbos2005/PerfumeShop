<?php
include "connection.php";


// echo("ok");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | Parfumerie Muse</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="img/Parfumerie (3).png">
</head>

<body onload="loadCart()">
    <?php
    include "header.php";
    if(isset($_SESSION["u"])){
    ?>

    <div class="container mt-5">
        <div class="row" id="cartBody">
            <!-- cart load here -->
           
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    
</body>

</html>
<?php
}else{
    header("location: signIn.php");
}

?>