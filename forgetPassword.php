<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="img/Parfumerie (3).png">

</head>

<body class="d-flex justify-content-center vh-100 align-items-center main-img">
    <!-- Forget Password box -->
    <div class=" w-50 rounded rounded-5 bg-light bg-opacity-50 row col-12">
        <div class="col-6">
            <img class="h-100 w-100 rounded-start-5 " src="img/Black Yellow Modern Playful Shoes Sale Poster.png" alt="">
        </div>
        <div class="d-flex justify-content-center flex-column col-6 border border-start-0 border-2 w-50 rounded rounded-end-5" id="signInbox">
            <div class="col-12 p-5">
                <h1 class="text-center fs-2 mb-4">Forget Password</h1>
                <div class="mb-4 ">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" id="e">
                </div>
                <div class="col-12 d-none" id="msgDiv2">
                    <div class="alert alert-danger" id="msg2"></div>
                </div>
                <div class="col-12 d-grid">
                    <button class="btn btn-warning rounded rounded-4" onclick="forgetPassword();">Send Email</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Forget Password box -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>