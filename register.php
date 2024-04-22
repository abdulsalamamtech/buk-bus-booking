<?php
// error_reporting(0);
// session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register | Bus Booking System</title>
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
        <div class="mb-5 p-4 bg-white shadow-sm">
            <p>Already have an account? <a href="./login.php">Sign in</a></p>
            <hr />
           <?php
           session_start();
           if(isset($_SESSION["msg"])){
             echo $_SESSION["msg"];
           }
           unset($_SESSION["msg"]);



          ?>
            <h3>Create an account</h3>
            <form class="needs-validation m-4" novalidate action="./helper/register.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputMailForm">Full name
                <span class="text-danger font-weight-bold">*</span></label
              >
              <input
                id="inputMailForm"
                type="text"
                class="form-control"
                name="name"
                placeholder="Enter your full name"
                required
              />
              <div class="invalid-feedback">
                Please fill the full name field
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="inputMailForm"
                >Registation number
                <span class="text-danger font-weight-bold">*</span></label
              >
              <input
                id="inputMailForm"
                type="text"
                class="form-control"
                name="regNo"
                placeholder="Enter your registation number"
                required
              />
              <div class="invalid-feedback">
                Please fill the registation number field
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="inputMailForm"
                >Email address
                <span class="text-danger font-weight-bold">*</span></label
              >
              <input
                id="inputMailForm"
                type="email"
                class="form-control"
                name="email"
                placeholder="Enter email address"
                required
              />
              <div class="invalid-feedback">
                Please fill the email address field
              </div>
            </div>
            <div class="form-group col-md-6">
              <label for="inputMailForm"
                >Phone number
                <span class="text-danger font-weight-bold">*</span></label
              >
              <input
                id="inputMailForm"
                type="text"
                class="form-control"
                placeholder="Enter phone number"
                name="phone"
                maxlength="11"
                required
              />
              <div class="invalid-feedback">
                Please fill the phone number field
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="inputMailForm"
                >Level
                <span class="text-danger font-weight-bold">*</span></label
              >
              <input
                id="inputMailForm"
                type="number"
                class="form-control"
                placeholder="Enter Level"
                name="level"
                maxlength="11"
                required
              />
              <div class="invalid-feedback">
                Please enter Level
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="inputMailForm"
                >Department
                <span class="text-danger font-weight-bold">*</span></label
              >
              <input
                id="inputMailForm"
                type="text"
                class="form-control"
                placeholder="Enter department"
                name="department"
                required
              />
              <div class="invalid-feedback">
                Please fill the department field
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="inputPasswordForm"
                >Choose Password
                <span class="text-danger font-weight-bold">*</span></label
              >
              <input
                id="inputPasswordForm"
                type="password"
                class="form-control"
                placeholder="Password"
                name="password"
                required
              />
              <div class="invalid-feedback">Please fill the password field</div>
            </div>

            <div class="form-group col-md-6">
              <label for="inputMailForm"
                >Confirm Password
                <span class="text-danger font-weight-bold">*</span></label
              >
              <input
                id="inputMailForm"
                type="password"
                class="form-control"
                placeholder="Enter cofirm password"
                name="passwordConf"
                required
              />
              <div class="invalid-feedback">
                Please fill the cofirm password field
              </div>
            </div>
          </div>
          <button class="btn btn-primary" type="submit">Sign up</button>
        </form>
      </div>
    </div>

    <!-- Footer -->
    <?php
      include_once('./include/footer.php')
    ?>
    
  </body>
</html>