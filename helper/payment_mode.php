<?php
require_once("validate_input.php");
require_once("db_connection.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $payment_mode = validate_input($_POST["payment_mode"]);
    $from = validate_input($_POST["from"]);
    $to = validate_input($_POST["to"]);
    $day = validate_input($_POST["day"]);
    $time = validate_input($_POST["time"]);
    $bus = validate_input($_POST["bus"]);
    $cardnumber = validate_input($_POST["cardnumber"]);
    $expiredate = validate_input($_POST["expiredate"]);
    $cvv = validate_input($_POST["cvv"]);
    $orderID = strtoupper(uniqid());
    $id = $_SESSION["login"];
    $amount = 0;

    $sql = "SELECT * FROM `users` WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $std_name = $row["FullName"];
    
    if($payment_mode === "card_payment"){
       if(empty($cardnumber) || empty($expiredate) || empty($cvv)){
        $_SESSION["msg"] = '<div class= "alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Card fields are empty </strong>
        </div>';
        header("location:../reserveSeat.php");
       }
       else{
           include_once('seatReservation.php');
            
       }
    }
    if($payment_mode === "wallet_payment"){     
        $sql = "SELECT * FROM `wallet` WHERE student_id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $amount = (int)$row["Amount"];
        $amount = $amount - 50; 
        if($amount == 0 || $amount > 0){
            $sql = "UPDATE `wallet` SET  Amount = '$amount'  WHERE student_id = '$id'";
            $result = mysqli_query($conn,$sql);
            include_once('seatReservation.php');  
        }
        else{
            $_SESSION["msg"] = '<div class= "alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Please Check your wallet in the wallet menu</strong>
        </div>';
        header("location:../reserveSeat.php");
        }
      }
}