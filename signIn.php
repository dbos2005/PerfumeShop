<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parfumerie Muse</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="img/Parfumerie (3).png">

</head>

<body class="d-flex justify-content-center vh-100 align-items-center main-img">
    <!-- sign In -->
    <div class=" w-50 rounded rounded-5 bg-light bg-opacity-50 row col-12">
        <div class="col-6">
            <img class="h-100 w-100 rounded-start-5 " src="img/Black Yellow Modern Playful Shoes Sale Poster.png" alt="">
        </div>
        <div class="d-flex justify-content-center flex-column col-6 border border-start-0 border-2 w-50 rounded rounded-end-5" id="signInbox">
            <div class="col-12 p-5">
                <h1 class="text-center fs-2 mb-4">Login <span class="text-warning fs-2">Your Account</span></h1>

                <?php

                $username = "";
                $password = "";

                if (isset($_COOKIE["username"])) {
                    $username = $_COOKIE["username"];
                }

                if (isset($_COOKIE["password"])) {
                    $password = $_COOKIE["password"];
                }
                ?>

                <div class="mb-2">
                    <label class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" value="<?php echo $username ?>">
                </div>
                <div>
                    <label class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" value="<?php echo $password ?>">
                </div>
                <div class="mt-2 mb-2">
                    <input type="checkbox" class="form-check-input" id="rm">
                    <label for="" class="form-label">Remember Me</label>
                </div>
                <div class="col-12 d-none" id="msgDiv2">
                    <div class="alert alert-danger" id="msg2"></div>
                </div>
                <div class="col-12 d-grid mt-2 mb-3">
                   <a href="forgetPassword.php" class="text-black">Forget Password?</a>
                </div>
                <div class="col-12 d-grid">
                    <button class="btn btn-warning rounded rounded-4" onclick="signIn()">Sign In</button>
                </div>
               
                <div class="col-12 d-grid mt-2 text-center">
                    <label onclick="changeView()">New to Parfumerie Muse ? <span class="text-secondary">Please Sign Up</span></label>
                    <!-- <button class="btn btn-outline-secondary" onclick="changeView()"><br> </button> -->
                </div>
                
            </div>

        </div>





        <!-- sign Up Box -->
        <div class="signUp-box d-none col-6 border border-start-0 border-2  rounded rounded-end-5"id="signUpbox">
            
                <h2 class="text-center text-bg-danger">Sign Up</h2>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label">first Name:</label>
                        <input type="text" placeholder="Ex:Sahan" class="form-control" id="fn">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Last Name:</label>
                        <input type="text" placeholder="Ex:perera" class="form-control" id="ln">
                    </div>
                </div>

                <div>
                    <label class="form-label">Mobile:</label>
                    <input type="text" placeholder="Ex:07********" class="form-control" id="mb">
                </div>
                <div>
                    <label class="form-label">Email:</label>
                    <input type="email" placeholder="Ex:Sahan@gmail.com"  class="form-control" id="em">
                </div>
                <div>
                    <label class="form-label">Username:</label>
                    <input type="text" placeholder="Ex:Sahan123" class="form-control" id="un">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password:</label>
                    <input type="password" placeholder="***********" class="form-control" id="pw">
                </div>

                <div class="col-12 d-none" id="msgDiv1">
                    <div class="alert alert-danger" id="msg01"></div>
                </div>

                <div class="col-12 d-grid">
                    <button class="btn btn-secondary" onclick="signUp()">Sign Up</button>
                </div>
                <div class="col-12 d-grid mt-2">
                    <button class="btn btn-outline-warning" onclick="changeView()">Have you a Account?<br> Please Sign In</button>
                </div>
                
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
</body>

</html>