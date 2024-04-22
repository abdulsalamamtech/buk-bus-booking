<?php 
include("helper/login.php");
include("helper/checklogin.php");
check_login();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Booked Seats| Bus Booking System</title>
    <meta
      name="description"
      content="Association of Point of Sales Users Membership Registation"
    />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="img/logo.jfif" type="image/gif" sizes="16x16" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
      integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
      crossorigin="anonymous"
    />
  </head>

  <body class="d-flex flex-column min-vh-100 bg-light">
    <!-- Nav-->
    <?php  require_once("include/header.php"); ?>
    <!-- content -->
    <div class="container flex-grow-1 flex-shrink-0 py-5">
      <div class="mb-5 p-4 bg-white shadow-sm">
        <h3>Booked Seats</h3>

        <div class="card-body">
          <table class="table caption-top">
                <caption>
                  List of Reservation
                </caption>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">BookID</th>
                    <th scope="col">From - To</th>
                    <th scope="col">Day - Time</th>
                    <th scope="col">Date</th>
                    <th scope="col">Receipt</th>
                  </tr>
                </thead>

                        <?php
                        // checking for admin or student
                        $sql = "SELECT * FROM `users` WHERE id = '$id'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_assoc($result);
                        $res;
                        if($row["status"] == 1){
                          $sq = "SELECT * FROM `schedule_list`";
                          $res = mysqli_query($conn,$sq);
                        }else{
                          $sq = "SELECT * FROM `schedule_list` WHERE userID = '$id'";
                          $res = mysqli_query($conn,$sq);
                        }
                        $count = 1;
                        while($details = mysqli_fetch_assoc($res)){
                            ?>
                            <tr>
                                <th scope="row"><?php  echo $count; ?></th>
                                <td><?php echo $details["orderID"]; ?></td>
                                <td><?php echo $details["location_from"]; ?> - <?php echo $details["location_to"]; ?></td>
                                <td><?php echo $details["day"]; ?> - <?php echo $details["time"]; ?></td>
                                <td><?php echo $details["oderDate"]; ?></td>
                                <td> <a href="receipt.php?receipt=<?php  echo $details["id"]; ?>"><i class="fa fa-print" title= "View receipt" style="color:#243c64;"></i></a></td>


                              </tr>
                          <?php 
                          $count++;             
                            
                          }
                      ?>
                <tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php
      include_once('./include/footer.php')
    ?>
  </body>
</html>
