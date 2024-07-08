<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Sign In</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="img/Parfumerie (2).png">
</head>

<body class="adminBody" style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(78,9,121,1) 36%, rgba(84,17,117,1) 38%, rgba(252,252,141,1) 100%);">



    <div class="col-lg-5 col-10 bg-body bg-opacity-50 rounded rounded-5 h-auto">

        <div class="offset-lg-2 col-lg-8 offset-1 col-10 d-flex justify-content-center align-items-center">
            <div class="row m-2">

                <div class="text-center mb-5">
                    <img src="img/Parfumerie (2).png" height="100" alt=""><br>
                    <label class="form-label fs-3 mb-3 quicksand" for="">Welcome Admin Sign In</label>
                </div>

                <div class="col-12 mb-3">
                    <label class="col-12 fs-5 form-label" for="">Email</label>
                    <input class="col-6 fs-5 form-control" placeholder="Ex:Sahan@gmail.com" id="e" type="text">
                </div>
                <div class="col-12 mb-3">
                    <label class="col-12 fs-5" for="">Password</label>
                    <input class="col-6 fs-5 form-control" id="password" placeholder="*********" type="password">
                </div>
                <div class="d-none" id="msgDiv">
                    <div class="alert alert-secondary">
                        <p id="msg"></p>                        
                    </div>
                </div>


                <div class="col-12 mb-3">
                    <a class="text-decoration-none" onclick="adminforgetPassword()">Forgat Password</a>
                </div>
                <div class="col-12 mb-5 d-grid text-center">
                    <button class="btn text-white" style="background-color: blueviolet;" onclick="adminLogin()">Sign In</button>
                </div>

            </div>
        </div>

    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>