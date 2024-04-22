<?php include("helper/login.php");
include("helper/checklogin.php");
check_login();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Receipt | Bus Booking System</title>
    <meta name="description" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/logo.jfif" type="image/gif" sizes="16x16" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
</head>

<body class="d-flex flex-column min-vh-100 bg-light">
    <!-- Nav-->
    <?php  require_once("include/header.php"); ?>

    <!-- content -->
    <div class="container flex-grow-1 flex-shrink-0 py-5">
        <?php
        session_start();
           if(isset($_SESSION["msg"])){
             echo $_SESSION["msg"];
           }
           unset($_SESSION["msg"]);

          ?>
        <div class="mb-5 p-4 bg-white shadow-sm">

            <h3>Receipt Details</h3>

            <div class="container">

                <!-- Receipt Container -->
                <div class="container" id="receipt">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-3 body-main">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4"> <img class="img" style="height: 120px" alt="Invoce Reciept"
                                            src="./img/QR.png" /> </div>
                                    <div class="col-md-8 text-right">
                                        <h4 style="color: #F81D2D;"><strong>Buk Booking System</strong></h4>
                                        <p>Gwardo Road, Kano State</p>
                                        <p>BUK new site <br> Gwarzo road, 800262, Kano</p>
                                        <p>bus@buk.edu.ng</p>
                                    </div>
                                </div> <br />
                <?php

                    $id = $_GET["receipt"];
                    $row;
                    
                    if($id){
                        $sql = "SELECT * FROM `schedule_list` WHERE id = '$id'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($result);
                    }else{
                        $id = $_SESSION["login"];

                        $sql = "SELECT * FROM `schedule_list` WHERE userID = '$id' ORDER BY id DESC LIMIT 1";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($result);

                    }


                    ?>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h2>Receipt</h2>
                                        <h5><?php  echo $row["orderID"]; ?></h5>
                                    </div>
                                </div> <br />
                                <div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <h5>Description</h5>
                                                </th>
                                                <th>
                                                    <h5>Details</h5>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="col-md-9">Name</td>
                                                <td class="col-md-3"> <?php  echo $row["std_name"]; ?> </td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">From - To </td>
                                                <td class="col-md-3"> <?php  echo $row["location_from"]; ?> -
                                                    <?php  echo $row["location_to"]; ?> </td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">Bus Name</td>
                                                <td class="col-md-3"> <?php  echo $row["bus_name"]; ?> </td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">Day</td>
                                                <td class="col-md-3"><?php  echo $row["day"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-9">Departure Time</td>
                                                <td class="col-md-3"><?php  echo $row["time"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">
                                                    <p> <strong>Fee:</strong> </p>
                                                </td>
                                                <td>
                                                    <p> <strong><i class="fas fa-naira-sign"
                                                                area-hidden="true"></i>₦50.00</strong> </p>
                                                </td>
                                            </tr>
                                            <tr style="color: #F81D2D;">
                                                <td class="text-right">
                                                    <h4><strong>Total Fee:</strong></h4>
                                                </td>
                                                <td class="text-left">
                                                    <h4><strong><i class="fas fa-naira-sign"
                                                                area-hidden="true"></i>₦50</strong></h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <div class="col-md-12">
                                        <p><b>Date :</b> <?php  echo $row["oderDate"]; ?></p> <br />
                                        <p><b>Signature</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center">
            <i class="fa fa-print fa-2x" onClick="printReceipt('receipt')" style="cursor:pointer"></i>
        </div>

    </div>

    <!-- Footer -->
    <?php
      include_once('./include/footer.php')
    ?>

    <!-- Print PDF Script -->
    <script>
    function printReceipt(data) {
        var restorePage = document.body.innerHTML;
        var printContent = document.getElementById(data).innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = restorePage;
    }
    </script>


</body>

</html>