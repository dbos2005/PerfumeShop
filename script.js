function changeView() {
  var signInBox = document.getElementById("signInbox");
  var signUpBox = document.getElementById("signUpbox");

  signInBox.classList.toggle("d-none");
  signUpBox.classList.toggle("d-none");
}
function signUp() {
  var fname = document.getElementById("fn");
  var lname = document.getElementById("ln");
  var mobile = document.getElementById("mb");
  var email = document.getElementById("em");
  var username = document.getElementById("un");
  var password = document.getElementById("pw");

  var form = new FormData();
  form.append("fname", fname.value);
  form.append("lname", lname.value);
  form.append("mobile", mobile.value);
  form.append("email", email.value);
  form.append("un", username.value);
  form.append("pw", password.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var t = request.responseText;
      if (t == "success") {
        swal("Registation Successfully!", "Please Sign in Now", "success");
        setInterval(function () {
          location.reload();
        }, 2000);
      } else {
        document.getElementById("msg01").innerHTML = t;
        document.getElementById("msgDiv1").className = "d-block";
      }
      // alert(t);
    }
  };

  request.open("POST", "signUpProcess.php", true);
  request.send(form);
}

function signIn() {
  var username = document.getElementById("username");
  var password = document.getElementById("password");
  var rememberMe = document.getElementById("rm");

  var form = new FormData();
  form.append("username", username.value);
  form.append("password", password.value);
  form.append("remember", rememberMe.checked);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "index.php";
      } else {
        document.getElementById("msg2").innerHTML = t;
        document.getElementById("msgDiv2").className = "d-block";
      }
    }
  };
  r.open("POST", "signInProcess.php", true);
  r.send(form);
}

function adminLogin() {
  var email = document.getElementById("e");
  var password = document.getElementById("password");

  var f = new FormData();
  f.append("email", email.value);
  f.append("ps", password.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "Success") {
        window.location = "adminDashboard.php";
      } else {
        // swal("Warning!", t, "warning");
        document.getElementById("msg").innerHTML = t;
        document.getElementById("msgDiv").className = "d-block";
      }
    }
  };
  r.open("POST", "adminSignInProcess.php", true);
  r.send(f);
}

function brandReg() {
  var brand = document.getElementById("brand");

  var f = new FormData();
  f.append("b", brand.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var response = r.responseText;
      // alert(response);
      if (response == "Success") {
        document.getElementById("msg2").innerHTML =
          "Brand Registration Successfully";
        document.getElementById("msgDiv2").className = "d-block";
        brand.value = "";
      } else {
        document.getElementById("msg2").innerHTML = response;
        document.getElementById("msgDiv2").className = "d-block";
      }
    }
  };
  r.open("POST", "brandRegisterProcess.php", true);
  r.send(f);
}
function CategoryReg() {
  var category = document.getElementById("category");

  var f = new FormData();
  f.append("c", category.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var response = r.responseText;
      // alert(response);
      if (response == "Success") {
        document.getElementById("msg1").innerHTML =
          "Category Registration Successfully";
        document.getElementById("msgDiv1").className = "d-block";
      } else {
        document.getElementById("msg1").innerHTML = response;
        document.getElementById("msgDiv1").className = "d-block";
      }
    }
  };
  r.open("POST", "categoryRegistorProcess.php", true);
  r.send(f);
}
function sizeReg() {
  var size = document.getElementById("size");

  var f = new FormData();
  f.append("size", size.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var response = r.responseText;
      // alert(response);
      if (response == "Success") {
        document.getElementById("msg3").innerHTML =
          "Size Registration Successfully";
        document.getElementById("msgDiv3").className = "d-block";
        color.value = "";
      } else {
        document.getElementById("msg3").innerHTML = response;
        document.getElementById("msgDiv3").className = "d-block";
      }
    }
  };
  r.open("POST", "sizeRegistorProcess.php", true);
  r.send(f);
}

function checkUser() {
  var userId = document.getElementById("uId");

  var f = new FormData();
  f.append("userId", userId.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "Please enter user ID") {
        document.getElementById("msg").innerHTML = t;
        document.getElementById("msgDiv").className = "d-block col-3";
        // alert(t);
      } else if (t == "Invaild user ID") {
        document.getElementById("msg").innerHTML = t;
        document.getElementById("msgDiv").className = "d-block col-3";
      } else {
        document.getElementById("details_row").innerHTML = t;
      }
    }
  };
  r.open("POST", "checkUserProccess.php", true);
  r.send(f);
}

function changeUserStatus(id) {
  var uid = document.getElementById("uid");

  var f = new FormData();
  f.append("id", id);
  f.append("uid", uid.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "success") {
        location.reload();
      }
    }
  };
  r.open("POST", "changeUserstatusProcess.php", true);
  r.send(f);
}
function addImage() {
  var image = document.getElementById("file");

  image.onchange = function () {
    var file = this.files[0];
    var url = window.URL.createObjectURL(file);

    document.getElementById("i").src = url;
  };
}

function ProductReg() {
  var pname = document.getElementById("pname");
  var brand = document.getElementById("brand");
  var category = document.getElementById("category");
  var size = document.getElementById("size");
  var desc = document.getElementById("dec");
  var file = document.getElementById("file");

  var f = new FormData();
  f.append("pname", pname.value);
  f.append("brand", brand.value);
  f.append("category", category.value);
  f.append("size", size.value);
  f.append("desc", desc.value);
  f.append("image", file.files[0]);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      // alert(t);
      if (t == "Success") {
        swal("Good job!", "Product Registration Succesfully", "success");
        setInterval(function () {
          location.reload();
        }, 2000);
      } else {
        swal("Warning!", t, "warning");
      }
    }
  };

  r.open("POST", "productRedProcess.php", true);
  r.send(f);
}
function stockUpdate() {
  var pname = document.getElementById("product");
  var qty = document.getElementById("qty");
  var price = document.getElementById("price");

  var f = new FormData();
  f.append("pname", pname.value);
  f.append("qty", qty.value);
  f.append("price", price.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      // alert(t);
      if (t == "Update Success") {
        swal(
          "Update Success",
          "The stock has been updated successfully.",
          "success"
        );
        setInterval(function () {
          location.reload();
        }, 2000);
      } else if (t == "Success") {
        swal("Good Job!", "The stock has been added successfully.", "success");
        setInterval(function () {
          location.reload();
        }, 2000);
      } else {
        swal("Warning!", t, "warning");
      }
    }
  };
  r.open("POST", "updateStockProcess.php", true);
  r.send(f);
}
function PrintReport() {
  var page = document.body.innerHTML;
  var PrintArea = document.getElementById("printArea").innerHTML;

  document.body.innerHTML = PrintArea;
  window.print();
  document.body.innerHTML = page;
}
function loadProduct(x) {
  var page = x;

  var f = new FormData();
  f.append("p", page);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      // alert(t);
      document.getElementById("product_card").innerHTML = t;
    }
  };
  r.open("POST", "loadProductProcess.php", true);
  r.send(f);
}
function searchProduct(x) {
  var page = x;
  var product = document.getElementById("pt");

  var f = new FormData();
  f.append("p", page);
  f.append("pt", product.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      document.getElementById("basicSearch").innerHTML = t;
    }
  };
  r.open("POST", "searchProductProcess.php", true);
  r.send(f);
}

function advanceSearch(x) {
  var txt = document.getElementById("t");
  var minPrice = document.getElementById("min_price");
  var maxPrice = document.getElementById("max_price");
  var brand = document.getElementById("brand");
  var category = document.getElementById("cat");
  var size = document.getElementById("size");

  var f = new FormData();
  f.append("keyword", txt.value);
  f.append("minPrice", minPrice.value);
  f.append("maxPrice", maxPrice.value);
  f.append("brand", brand.value);
  f.append("category", category.value);
  f.append("size", size.value);
  f.append("pg", x);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      document.getElementById("loadShop").innerHTML = t;
    }
  };
  r.open("POST", "advSearchProductProcess.php", true);
  r.send(f);
}

function loadShop(x) {
  var page = x;

  var f = new FormData();
  f.append("p", page);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      // alert(t);
      document.getElementById("loadShop").innerHTML = t;
    }
  };
  r.open("POST", "loadShopProcess.php", true);
  r.send(f);
}

function uploadImg() {
  var file = document.getElementById("imgUploader");

  var f = new FormData();
  f.append("i", file.files[0]);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "Empty") {
        // alert("Please select Your Profile image");
        swal("Warning!", "Please select Your Profile image", "warning");
      } else {
        document.getElementById("i").src = t;
        i.value = "";
      }
    }
  };
  r.open("POST", "ImgUploadProcess.php", true);
  r.send(f);
}
function updateData() {
  var fname = document.getElementById("fn");
  var lname = document.getElementById("ln");
  var email = document.getElementById("em");
  var mobile = document.getElementById("mb");
  var password = document.getElementById("ps");
  var no = document.getElementById("no");
  var line1 = document.getElementById("line1");
  var line2 = document.getElementById("line2");

  var f = new FormData();
  f.append("fn", fname.value);
  f.append("ln", lname.value);
  f.append("em", email.value);
  f.append("mb", mobile.value);
  f.append("ps", password.value);
  f.append("no", no.value);
  f.append("l1", line1.value);
  f.append("l2", line2.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "Update Successfully") {
        swal(
          "Success!",
          "The Profile has been updated successfully ",
          "success"
        );
      } else {
        swal("Warning!", t, "warning");
      }
    }
  };
  r.open("POST", "updateProfileprocess.php", true);
  r.send(f);
}
function signOut() {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      // alert(t);
      swal("Success", t, "success");
      setInterval(function () {
        location.reload();
      }, 2000);
    }
  };
  r.open("POST", "signOutProcess.php", true);
  r.send();
}

function addToCart(x) {
  var stock_id = x;
  var qty = document.getElementById("qty");
  // alert("Ok");

  if (qty.value > 0) {
    var f = new FormData();
    f.append("s", stock_id);
    f.append("q", qty.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if ((r.readyState == 4) & (r.status == 200)) {
        var t = r.responseText;
        // alert(t);
        if(t == "erorr"){
          swal("Warning !","Please Sign In..", "warning");
          setInterval(function () {
            window.location = "signIn.php";
          }, 2000);
        }else{
          swal("Good job!", t, "success");

          qty.value = "";
        }
       
      }
    };
    r.open("POST", "addToCardProcess.php", true);
    r.send(f);
  } else {
    swal("Warning!", "Please enter vaild quantity", "warning");
    
  }
}
function loadCart() {
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      // alert(t);
      document.getElementById("cartBody").innerHTML = t;
    }
  };
  r.open("POST", "loadCartProcess.php", true);
  r.send();
}
function incrementCartQty(x) {
  var cartId = x;
  var qty = document.getElementById("qty" + x);
  var newQty = parseInt(qty.value) + 1;
  // alert(newQty);

  var f = new FormData();
  f.append("c", cartId);
  f.append("q", newQty);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      // alert(t);
      if (t == "Success") {
        qty.value = parseInt(qty.value) + 1;
        loadCart();
      } else {
        swal("Warning!", t, "warning");
      }
    }
  };

  r.open("POST", "updateCartQtyProcess.php", true);
  r.send(f);
}
function decrementCartQty(x) {
  var cartId = x;
  var qty = document.getElementById("qty" + x);
  var newQty = parseInt(qty.value) - 1;
  // alert(newQty);

  var f = new FormData();
  f.append("c", cartId);
  f.append("q", newQty);

  if (newQty > 0) {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if ((r.readyState == 4) & (r.status == 200)) {
        var t = r.responseText;
        // alert(t);
        if (t == "Success") {
          qty.value = parseInt(qty.value) - 1;
          loadCart();
        } else {
          swal("Warning!", t, "warning");
        }
      }
    };

    r.open("POST", "updateCartQtyProcess.php", true);
    r.send(f);
  }
}

function removeCart(x) {
  
    var f = new FormData();
    f.append("c", x);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if ((r.readyState == 4) & (r.status == 200)) {
        var t = r.responseText;
        swal("Success!", t, "success");
        loadCart();
      }
    };

    r.open("POST", "removeCartProcess.php", true);
    r.send(f);
  }


function checkOut() {
  var f = new FormData();
  f.append("cart", true);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      //alert(t);
      var payment = JSON.parse(t);
      doCheckOut(payment, "checkoutProcess.php");
    }
  };

  r.open("POST", "paymentProcess.php", true);
  r.send(f);
}

function doCheckOut(payment, path) {
  // Payment completed. It can be a successful failure.
  payhere.onCompleted = function onCompleted(orderId) {
    console.log("Payment completed. OrderID:" + orderId);

    // Note: validate the payment and show success or failure page to the customer

    var f = new FormData();
    f.append("payment", JSON.stringify(payment));

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if ((r.readyState == 4) & (r.status == 200)) {
        var t = r.responseText;
        var order = JSON.parse(t);
        if (order.resp == "Success") {
          window.location = "invoice.php?orderId=" + order.order_id;
        } else {
          swal("Warning!", t, "warning");
        }
      }
    };
    r.open("POST", path, true);
    r.send(f);
  };

  // Payment window closed
  payhere.onDismissed = function onDismissed() {
    // Note: Prompt user to pay again or show an error page
    console.log("Payment dismissed");
  };

  // Error occurred
  payhere.onError = function onError(error) {
    // Note: show an error page
    console.log("Error:" + error);
  };

  // Show the payhere.js popup, when "PayHere Pay" is clicked
  // document.getElementById('payhere-payment').onclick = function (e) {
  payhere.startPayment(payment);
  // };
}

function buyNow(stockId) {
  // alert(stockId):
  var qty = document.getElementById("qty");
  if (qty.value > 0) {
    var f = new FormData();
    f.append("cart", false);
    f.append("stockId", stockId);
    f.append("qty", qty.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if ((r.readyState == 4) & (r.status == 200)) {
        var t = r.responseText;
        if (t == "2") {
          swal("Warning!", "Please enter your address details!", "warning");
        } else if(t == "1") {
         window.location = "signIn.php";
        }else{
          var payment = JSON.parse(t);
          payment.stock_id = stockId;
          payment.qty = qty.value;
          doCheckOut(payment, "buynowProcess.php");
        }
      }
    };

    r.open("POST", "paymentProcess.php", true);
    r.send(f);
  } else {
    swal("Warning!", "Please enter vaild Quantity", "warning");
  }
}
function addToWatchlist(stockId) {
  var f = new FormData();
  f.append("stockId", stockId);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "success") {
        swal("Success", "The Product has been added successfully", "success");
      } else {
        swal("Warning!", t, "warning");
      }
      // alert(t);
    }
  };

  r.open("POST", "addToWatchlistProcess.php", true);
  r.send(f);
}
function removeWatchlist(x) {
  var f = new FormData();
  f.append("stockId", x);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "Success") {
        location.reload();
      } else {
        swal("Warning!", t, "warning");
      }
    }
  };

  r.open("POST", "removeWatchlistProcess.php", true);
  r.send(f);
}

function forgetPassword() {
  var email = document.getElementById("e");
  if (email.value != "") {
    var f = new FormData();
    f.append("e", email.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if ((r.readyState == 4) & (r.status == 200)) {
        var t = r.responseText;
        if (t == "success") {
          document.getElementById("msg2").innerHTML =
            "Email sent! Please check your mail box";
          document.getElementById("msg2").className = "alert alert-success";
          document.getElementById("msgDiv2").className = "d-block";
        } else {
          document.getElementById("msg2").innerHTML = t;
          document.getElementById("msg2").className = "alert alert-danger";
          document.getElementById("msgDiv2").className = "d-block";
        }
      }
    };
    r.open("POST", "forgetPasswordProcess.php", true);
    r.send(f);
  } else {
    swal("Warning!", "Please enter your vaild Email", "warning");
  }
}

function resetPassword() {
  var vcode = document.getElementById("vcode");
  var np = document.getElementById("np");
  var rp = document.getElementById("p");

  var f = new FormData();
  f.append("vcode", vcode.value);
  f.append("np", np.value);
  f.append("p", rp.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "Success") {
        window.location = "signIn.php";
      } else {
        swal("Warning!", t, "warning");
      }
    }
  };
  r.open("POST", "resetPasswordProcess.php", true);
  r.send(f);
}
function loadChart() {
  var ctx = document.getElementById("mychart");
  var ctx2 = document.getElementById("mychart2");

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      // alert(t);
      var data = JSON.parse(t);
      new Chart(ctx, {
        type: "doughnut",
        data: {
          labels: data.labels,
          datasets: [
            {
              label: "# of Votes",
              data: data.data,
              borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });

      new Chart(ctx2, {
        type: "line",
        data: {
          labels: data.month,
          datasets: [
            {
              label: "# of Earn",
              data: data.profit,
              borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });
    }
  };
  r.open("POST", "loadChartProcess.php", true);
  r.send();
}
function adminforgetPassword() {
  var email = document.getElementById("e");
  if (email.value != "") {
    var f = new FormData();
    f.append("e", email.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
      if ((r.readyState == 4) & (r.status == 200)) {
        var t = r.responseText;
        if (t == "success") {
          document.getElementById("msg").innerHTML =
            "Email sent! Please check your mail box";
          document.getElementById("msg").className = "alert alert-success";
          document.getElementById("msgDiv").className = "d-block";
        } else {
          document.getElementById("msg").innerHTML = t;
          document.getElementById("msg").className = "alert alert-danger";
          document.getElementById("msgDiv").className = "d-block";
        }
      }
    };
    r.open("POST", "adminforgetPasswordProcess.php", true);
    r.send(f);
  } else {
  
    swal("Warning!","Please enter your vaild Email", "warning");

  }
}
function adResetPassword() {
  var vcode = document.getElementById("vcode");
  var np = document.getElementById("np");
  var rp = document.getElementById("p");

  var f = new FormData();
  f.append("vcode", vcode.value);
  f.append("np", np.value);
  f.append("p", rp.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var t = r.responseText;
      if (t == "Success") {
        window.location = "adminSignIn.php";
      } else {
        swal("Warning!", t, "warning");
      }
    }
  };
  r.open("POST", "adminresetPasswordProcess.php", true);
  r.send(f);
}
