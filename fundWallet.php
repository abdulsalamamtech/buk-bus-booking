<?php 
include("helper/db_connection.php");
include("helper/login.php");
include("helper/checklogin.php");
check_login();
error_reporting(0);
$id = $_SESSION["login"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Fund Wallet | Bus Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/logo.jfif" type="image/gif" sizes="16x16" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
</head>

<body class="d-flex flex-column min-vh-100 bg-light">
    <!-- Nav-->
    <?php  require_once("include/header.php"); ?>
    <!-- content -->
    <?php
        session_start();
           if(isset($_SESSION["msg"])){
             echo $_SESSION["msg"];
           }
           if(isset($_SESSION["amount"])){
            $oldamount = $_SESSION["amount"];
           }
           unset($_SESSION["msg"]);
           unset($_SESSION["amount"]);

          ?>
    <form class="needs-validation m-4" novalidate action="./helper/fundWallet.php" method="post">
        <div class="container flex-grow-1 flex-shrink-0 py-5">
            <div class="mb-5 p-4 bg-white shadow-sm">
                <h3>Fund Wallet</h3>
                <div class="form-group col-md-6">
                    <label for="inputMailForm">Amount ₦
                        <span class="text-danger font-weight-bold">*</span></label>
                    <input name="newamount" type="number" class="form-control" placeholder="Enter amount" required />
                    <input name="oldamount" type="hidden" value="<?php  echo $oldamount ?>" />
                    <div class="invalid-feedback">
                        Please fill amount field
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputMailForm">Card Number
                        <span class="text-danger font-weight-bold">*</span></label>
                    <input type="number" class="form-control" placeholder="1234 5678 1234 5678" required />
                    <div class="invalid-feedback">
                        Please fill card number field
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputMailForm">Expire
                        <span class="text-danger font-weight-bold">*</span></label>
                    <input type="password" class="form-control" placeholder="MM/YYYY" required />
                    <div class="invalid-feedback">
                        Please fill card expire field
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputMailForm">CVV
                        <span class="text-danger font-weight-bold">*</span></label>
                    <input type="password" class="form-control" placeholder="CVV" required />
                    <div class="invalid-feedback">
                        Please fill card CVV field
                    </div>
                </div>

                <div class="input-group">
                    <button type="submit" class="btn btn-primary">
                        Make Payment
                    </button>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </form>

    <!-- Footer -->
    <?php
      include_once('./include/footer.php')
    ?>
</body>

</html>