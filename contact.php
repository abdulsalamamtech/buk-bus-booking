<?php include("helper/login.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Contact | Bus Booking System</title>
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
    <?php
        session_start();
           if(isset($_SESSION["msg"])){
             echo $_SESSION["msg"];
           }
           unset($_SESSION["msg"]);

          ?>
      <div class="mb-5 p-4 bg-white shadow-sm">
        <h3>Contact Us Form</h3>

        <div class="card-body">
          <form class="needs-validation m-4" novalidate action="./helper/contact.php" method="post">
            <?php

            $id = $_SESSION["login"];
            $sql = "SELECT * FROM `users` WHERE id = '$id'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            ?>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputMailForm"
                          >Full name
                          <span class="text-danger font-weight-bold">*</span></label
                        >
                        <input
                          type="text"
                          class="form-control"
                          required
                          readonly
                          name="name"
                          value="<?php echo $row["FullName"]; ?>"
                        />
                        <div class="invalid-feedback">
                          Please fill the full name field
                        </div>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="inputMailForm"
                          >Phone
                          <span class="text-danger font-weight-bold">*</span></label
                        >
                        <input
                          type="text"
                          class="form-control"
                          required
                          readonly
                          name="phone"
                          value="<?php echo $row["phone"]; ?>"
                        />
                        <div class="invalid-feedback">
                          Please fill the full name field
                        </div>
                      </div>
                  </div>

                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputMailForm"
                          >Department
                          <span class="text-danger font-weight-bold">*</span></label
                        >
                        <input
                          type="text"
                          class="form-control"
                          required
                          readonly
                          name ="department"
                          value="<?php echo $row["department"]; ?>"
                        />
                        <div class="invalid-feedback">
                          Please fill the full name field
                        </div>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="inputMailForm"
                          >Level
                          <span class="text-danger font-weight-bold">*</span></label
                        >
                        <input
                          type="text"
                          class="form-control"
                          required
                          readonly
                          name = "level"
                          value="<?php echo $row["level"]; ?>"
                        />
                        <div class="invalid-feedback">
                          Please fill the full name field
                        </div>
                      </div>

                      <div class="form-group col-md-12">
                        <label for="inputMailForm"
                          >Message Subject
                          <span class="text-danger font-weight-bold">*</span></label
                        >
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Message Subject"
                          required
                          name ="subject"
                          
                        />
                        <div class="invalid-feedback">
                          Please fill the Message Subject field
                        </div>
                      </div>

                        <div class="form-group col-md-12">
                          <label for="exampleFormControlTextarea1">
                            Message
                            <span class="text-danger font-weight-bold">*</span>
                          </label>
                          <textarea class="form-control" placeholder="Messages...." rows="4" required name="message"></textarea>
                          <div class="invalid-feedback">
                               Please fill the Message  field
                           </div>
                        </div>
                    </div> 
                    <div
                      class="btn-toolbar justify-content-between"
                      role="toolbar"
                      aria-label="Toolbar with button groups"
                    >
                        <div class="btn-group" role="group" aria-label="First group">
                          <!-- <a href="#" class="btn btn-light disabled">Back</a> -->
                        </div>
                        <div class="input-group">
                          <button type="submit" class="btn btn-primary">
                            Send Message
                          </button>
                        </div>
                    </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php
      include_once('./include/footer.php')
    ?>
  </body>
</html>
