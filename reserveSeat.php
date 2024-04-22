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
    <title>Researve Seat| Bus Booking System</title>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" 
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
     crossorigin="anonymous"/>
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
      
            <h3>Booking Infomation</h3>
        <form class="needs-validation m-4" novalidate action="./helper/payment_mode.php" method="post">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputMailForm"
                >From - To
                <span class="text-danger font-weight-bold">*</span></label
              >
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">from</span>
                </div>

                <select class="custom-select" id="from" required name="from">
                    <option selected disabled>Location</option>
                    <?php
                    $sql = "SELECT * FROM `location`";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <option value="<?php echo $row["terminalName"]; ?>"><?php echo $row["terminalName"]; ?></option>
                      <?php
                    }
                      ?>
                </select>
                <div class="input-group-prepend">
                  <span class="input-group-text">to</span>
                </div>

                <select class="custom-select" id="to" required name="to">
                    <option selected disabled>Location</option>
                    <?php
                    $sql = "SELECT * FROM `location`";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <option value="<?php echo $row["terminalName"]; ?>"><?php echo $row["terminalName"]; ?></option>
                      <?php
                    }
                      ?>
                </select>
                <div class="invalid-feedback">
                  Please fill the working experience from-to field
                </div>
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="inputMailForm"
                >Day 
                <span class="text-danger font-weight-bold">*</span></label
              >
              <input type="date" class="input-form" name="day"/>
              <!-- <select class="custom-select" id="day" required name="day">
                <option selected disabled>Day</option>
                <option value="Mon">Monday</option>
                <option value="Tues">Tuesday </option>
                <option value="Wed">Wednesday</option>
                <option value="Thur">Thursday </option>
                <option value="Fri">Friday</option>
                <option value="Satur">Saturday</option>
                <option value="sun"></option>
                
              </select> -->
              <div class="invalid-feedback">
                Please select the Day field
              </div>
            </div>

            <div class="form-group col-md-6">
                <label for="inputMailForm"
                  >Time
                  <span class="text-danger font-weight-bold">*</span></label
                >
                <input type="time" name="time"/>
                <!-- <select class="custom-select" id="time" required name="time">
                  <option selected disabled>Time</option>
                  <option value="7:00 am">7:00 am</option>
                  <option value="1:30 pm">1:30 pm</option>
                  
                </select> -->
                <div class="invalid-feedback">
                  Please fill the time  field
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="inputMailForm"
                  >Bus
                  <span class="text-danger font-weight-bold">*</span></label
                >
                <select class="custom-select"  name="bus"  id="busName" required>
                    <option selected disabled>Bus</option>
                    <?php
                        $sql = "SELECT * FROM `bus`";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                            <option value ="<?php echo $row["busName"]; ?>"><?php echo $row["busName"]; ?></option>
                          <?php
                        }
                        ?>
                  
                </select>
                <div class="invalid-feedback">
                  Please fill the time  field
                </div>
            </div>


            <div class="form-group col-md-6">
                <label for="availableSeat">
                Available Seat
                  </label>
              <select name="availableSeat" class="form-control" id="availableSeat"  readonly>

              </select>

            </div>
            <div class="form-group">
            <input type="radio" 
            name="payment_mode" 
            type="button"
            value="card_payment"
            class="btn btn-link"
            data-toggle="collapse"
            data-target="#cardpayment"
              aria-expanded="false"
            >
            <label for="cardpayment">
            Card Payment
            </label>
            <input type="radio" 
            name="payment_mode" 
            type="button"
            value="wallet_payment"
            class="btn btn-link"
            data-toggle="collapse"
            data-target="#walletpayment"
              aria-expanded="false"
            >
            <label for="walletpayment">
            Wallet Payment
            </label>
            </div>
          </div>
          <hr />
         <div class="collapse" id="cardpayment">
          <h3>Card Details</h3>
          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputMailForm"
                    >Card Number
                    <span class="text-danger font-weight-bold">*</span></label
                  >
                  <input
                    type="number"
                    name="cardnumber"
                    class="form-control"
                    placeholder="1234 5678 1234 5678"
                    
                  />
                  <div class="invalid-feedback">
                    Please fill card number field
                  </div>
                </div>

                <div class="form-group col-md-3">
                  <label for="inputMailForm"
                    >Expire
                    <span class="text-danger font-weight-bold">*</span></label
                  >
                  <input
                  name="expiredate"
                    type="password"
                    class="form-control"
                    placeholder="MM/YYYY"
                  />
                  <div class="invalid-feedback">
                    Please fill card expire field
                  </div>
                </div>

                <div class="form-group col-md-2">
                  <label for="inputMailForm"
                    >CVV
                    <span class="text-danger font-weight-bold">*</span></label
                  >
                  <input
                  name="cvv"
                    type="password"
                    class="form-control"
                    placeholder="CVV"
                  />
                  <div class="invalid-feedback">
                    Please fill card CVV field
                  </div>
                </div>

          </div>
          <div
            class="btn-toolbar justify-content-between"
            role="toolbar"
            aria-label="Toolbar with button groups"
          >
         
            <div class="btn-group" role="group" aria-label="First group">
                <p class="text-muted font-weight-bold mb-0">Fee:  ₦50.00 </p>
            </div>
            <div class="input-group">
              <button type="submit" class="btn btn-primary">
                Reserve Seat
              </button>
            </div>
          </div>
        </div>
        <div class="collapse" id="walletpayment">
          <h3>Amount would be deducted from your wallet</h3>
          <div
            class="btn-toolbar justify-content-between"
            role="toolbar"
            aria-label="Toolbar with button groups"
          >
            <div class="btn-group" role="group" aria-label="First group">
                <p class="text-muted font-weight-bold mb-0">Fee:  ₦50.00 </p>
            </div>
            <div class="input-group">
              <input type="submit" value="Reserve Seat" class="btn btn-primary" />
            </div>
          </div>
        </div>

        </form>
      </div>
    </div>

    <!-- Footer -->
    <?php
      include_once('./include/footer.php')
    ?>

    <script>
        $(document).ready(function(){
          $("#busName").change(function(){
            var id = $("#busName").val();
            $.ajax({
              url:'getSeat.php',
              method:'post',
              // data:'id='+id,
              data: {
                "id": id
              }
            }).done(function(seat){
              console.log(seat);
              seat =  JSON.parse(seat);
              $("#availableSeat").empty();
              $("#availableSeat").append('<option>' + (seat.busCap - seat.busAvailableSpace) + '</option>')
            })
          })
        })
    </script>
  </body>
</html>
