<?php
session_start();
?>
<nav class="navbar col-12  navbar-expand-lg fixed-top bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="img/Parfumerie (3).png" width="50" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse fs-6" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item mt-lg-3">
          <a class="nav-link active " aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown mt-3">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            FRAGRANCES
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="shop.php">FOR MEN</a></li>
            <li><a class="dropdown-item" href="shop.php">FOR FEMALE</a></li>
            <li><a class="dropdown-item" href="shop.php">FOR UNISEX</a></li>
          </ul>
        </li>
        <li class="nav-item mt-lg-3">
          <a class="nav-link" href="shop.php">SHOP</a>
        </li>
        <li class="nav-item mt-lg-3">
          <a class="nav-link" href="#">ABOUT</a>
        </li>
        <li class="nav-item mt-lg-3">
          <a class="nav-link" for="">CONTECT</a>
        </li>
      </ul>
      <span class="navbar-text col-lg-3">
        <div class="row gap-0">
          
          <a class="navbar-brand col-1 mt-1" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom"><i class="fs-5 bi bi-search"></i></a>
          <a class="navbar-brand col-1" href="cart.php"> <i class="fs-4 bi bi-cart4"></i></a>
          <a class="navbar-brand  col-1" href="profile.php"><i class="fs-4 bi bi-person"></i></a>
          <a class="navbar-brand  col-1" href="orderHistory.php"><i class="fs-4 bi bi-clock-history"></i></a>
          <a class="navbar-brand col-1" href="watchlist.php"><i class="fs-4 bi bi-heart"></i></a>
          <?php
          if(isset($_SESSION["u"])){
?>
          <a class="navbar-brand d-none d-lg-block col-lg-2" onclick="signOut()"><i class="fs-4 bi bi-box-arrow-right"></i></a>

<?php
          }else{
            ?>
<a href="signIn.php" class="btn btn-danger text-white text-decoration-none offset-1 col-10 col-lg-3 mt-2">Sign In </a>
            <?php
          }
          ?>


        </div>

      </span>
    </div>
  </div>
</nav>

<div class="offcanvas offcanvas-bottom " tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel" style="height: 90vh;">
  <div class="offcanvas-header">

    <div class="border border-2 border-end-0 border-start-0 col-10 offset-1">
      <input type="text" class="form-control border-0 fs-2 text-center " id="pt" onkeyup="searchProduct(0)" placeholder="Search Product">

    </div>
    <button type="button" class="fs-2 btn-close" data-bs-dismiss="offcanvas" aria-label="Close" onclick="window.location.reload()"></button>
  </div>
  <div class="offcanvas-body small">

    <div class="col-10 offset-1">
      <div class="row gap-1 gap-lg-3 justify-content-center" id="basicSearch">



      </div>
    </div>

  </div>
</div>