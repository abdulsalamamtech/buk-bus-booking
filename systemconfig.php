<?php include("helper/login.php");
include("helper/checklogin.php");
check_login();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>System Config | Bus Booking System</title>
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
            <h3>System Configuration</h3>
            <hr />
            <form class="needs-validation m-4" novalidate action="helper/busManage.php" method="post">
                <div class="form-row">
                    <div class="col-md-5">
                        <h6 class="card-subtitle mb-2 text-muted">Manage BUS</h6>
                        <div class="form-group col-md-12">
                            <label for="inputMailForm">BUS name
                  <span class="text-danger font-weight-bold">*</span></label
                >
                <?php
                if(isset($_GET["edit"])){
                  $id = $_GET["edit"];
                  $sql = "SELECT * FROM `bus` WHERE id = $id";
                }
                else{
                  $sql = "SELECT * FROM `bus`";
                } 
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                ?>
                <!-- for id handling -->

                <input
                  type="hidden"
                  class="form-control"
                  placeholder="Enter BUS name"
                  required
                  name="id"
                  value="<?php echo $row["id"]; ?>"

                />
                <!-- end -->
               
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter BUS name"
                  required
                  name="busName"
                  value="<?php echo $row["busName"]; ?>"

                />
                <div class="invalid-feedback">
                  Please fill the BUS name field
                </div>
              </div>

              <div class="form-group col-md-12">
                <label for="inputMailForm"
                  >BUS capacity
                  <span class="text-danger font-weight-bold">*</span></label
                >
                <input
                  type="number"
                  class="form-control"
                  placeholder="Enter BUS capacity"
                  required
                  name="busCap"
                  value="<?php echo $row["busCap"]; ?>"

                />
                <div class="invalid-feedback">
                  Please fill the BUS capacity field
                </div>
              </div>
              

              <div
                class="btn-toolbar justify-content-between"
                role="toolbar"
                aria-label="Toolbar with button groups"
              >
              <div class="input-group">
                <input
                  type="submit"
                  class="btn btn-info"
                  name="update"
                  value="Update"

                />
                  
                </div>
                <div class="btn-group" role="group" aria-label="First group">
                  
                </div>
                <div class="input-group">
                  <input
                  type="submit"
                  class="btn btn-primary px-5"
                  name="add"
                  value="Submit"

                />
                </div>
              </div>
            </div>
            

            <div class="col-md-7">
              <h6 class="card-subtitle mb-2 text-muted">List of BUSES</h6>
              <table class="table caption-top">
                <caption>
                  List of BUSES
                </caption>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Capacity</th>
                    <th scope="col"></th>
                  </tr>
                </thead>

                <tbody>
                <?php
              $sql = "SELECT * FROM `bus`";
              $result = mysqli_query($conn,$sql);
              $count = 1;
              while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <th scope="row"><?php  echo $count; ?></th>
                    <td><?php echo $row["busName"]; ?></td>
                    <td><?php echo $row["busCap"]; ?></td>
                    <td>
                      <a href="./systemconfig.php?edit=<?php echo $row['id'];?>" class="btn btn-sm btn-outline-primary">
                        Edit
                      </a>
                      <a href="helper/busManage.php?delete=<?php echo $row['id'];?>" class="btn btn-sm btn-outline-danger">
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
        </form>

        <hr />

        <form class="needs-validation m-4" novalidate action="helper/locationManage.php" method="post">
          <div class="form-row">
            <div class="col-md-5">
              <h6 class="card-subtitle mb-2 text-muted">Manage Location</h6>
              <div class="form-group col-md-12">
                <label for="inputMailForm"
                  >Terminal name
                  <span class="text-danger font-weight-bold">*</span></label
                >
                <?php
                $id = $_GET["editbus"];
                $sql = "SELECT * FROM `location` WHERE id = '$id'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                ?>
                <!-- id handling -->
                <input
                  type="hidden"
                  class="form-control"
                  name="id"
                  value="<?php echo $row["id"]; ?>"
                />
                <!-- end -->
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter terminal name"
                  required
                  name="terminalName"
                  value="<?php echo $row["terminalName"]; ?>"
                />
                <div class="invalid-feedback">
                  Please fill the terminal name field
                </div>
              </div>

              <div class="form-group col-md-12">
                <label for="inputMailForm">
                  Address
                  <span class="text-danger font-weight-bold">*</span></label
                >
                <input
                  type="text"
                  class="form-control"
                  placeholder="Enter address"
                  required
                  name="address"
                  value="<?php echo $row["address"]; ?>"
                />
                <div class="invalid-feedback">
                  Please fill the address field
                </div>
              </div>
              

              <div
                class="btn-toolbar justify-content-between"
                role="toolbar"
                aria-label="Toolbar with button groups"
              >
              <div class="input-group">
                <input
                  type="submit"
                  class="btn btn-info"
                  name="update"
                  value="Update"

                />
              </div>
              
                <div class="btn-group" role="group" aria-label="First group">
                  <!-- <a href="#" class="btn btn-light disabled">Back</a> -->
                </div>
                
                <div class="input-group">
                  <input
                  type="submit"
                  class="btn btn-primary px-5"
                  name="add"
                  value="Submit"

                />
                </div>
              </div>
            </div>

            <div class="col-md-7">
              <h6 class="card-subtitle mb-2 text-muted">List of Locations</h6>
              <table class="table caption-top">
                <caption>
                  List of Locations
                </caption>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <?php
              $sql = "SELECT * FROM `location`";
              $result = mysqli_query($conn,$sql);
              $count = 1;
              while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <th scope="row"><?php  echo $count; ?></th>
                    <td><?php echo $row["terminalName"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td>
                      <a href="./systemconfig.php?editbus=<?php echo $row['id'];?>" class="btn btn-sm btn-outline-primary">
                        Edit
                      </a>
                      <a href="helper/locationManage.php?delete=<?php echo $row['id'];?>" class="btn btn-sm btn-outline-danger">
                        Delete
                      </a>
                    </td>
                  </tr>
              <?php 
              $count++;             
                
              }
              ?>
                  
                  <!-- <tr>
                    <th scope="row">1</th>
                    <td>CASS</td>
                    <td>Sabon Tasha Branch</td>
                    <td>
                      <a href="#" class="btn btn-sm btn-outline-primary">
                        Edit
                      </a>
                      <a href="#" class="btn btn-sm btn-outline-danger">
                        Delete
                      </a>
                    </td>
                  </tr> -->
                </tbody>
              </table>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Footer -->
    <?php
      include_once('./include/footer.php')
    ?>
    
  </body>
</html>