<?php 
require_once("helper/db_connection.php");
include("helper/login.php");
include("helper/checklogin.php");
check_login();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Messages | Bus Booking System</title>
    <meta name="description" content="Association of Point of Sales Users Membership Registation" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/logo.jfif" type="image/gif" sizes="16x16" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
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
            <h3>Users Messages</h3>
            <hr/>
                <div class="form-row">
                  
            </div>
            <div class="col-md-12">
              <h6 class="card-subtitle mb-2 text-muted">Messages</h6>
              <table class="table caption-top">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Department</th>
                    <th scope="col">level</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
              $sql = "SELECT * FROM `contacts`";
              $result = mysqli_query($conn,$sql);
              $count = 1;
              while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <th scope="row"><?php  echo $count; ?></th>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
                    <td><?php echo $row["department"]; ?></td>
                    <td><?php echo $row["level"]; ?></td>
                    <td><?php echo $row["messageSubject"];?></td>
                    <td><?php echo $row["message"]; ?></td>
                    <td><?php echo $row["senddate"]; ?></td>
                    <td>
                      <a href="helper/delete_message.php?delete=<?php echo $row['id'];?>" class="btn btn-sm btn-outline-danger">
                        Delete
                      </a>
                    </td>
                  </tr>
              <?php 
              $count++;             
                
              }
              ?> 
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
    </div>
    
    <!-- Footer -->
    <?php
      include_once('./include/footer.php')
    ?>
  </body>
</html>