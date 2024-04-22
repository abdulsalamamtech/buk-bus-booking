<?php 
require_once("validate_input.php");
require_once("db_connection.php");
session_start();
$id = $_SESSION["login"]; 
$amount = 0;
$sql = "INSERT INTO `wallet`( `student_id`, `Amount`) VALUES('$id','$amount')";
$result = mysqli_query($conn,$sql);
if($result){
    $_SESSION["msg"] = '<div class= "alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Wallet Created successful</strong>
    </div>';
    header("location:../index.php");
}
else{
    $_SESSION["msg"] = '<div class= "alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Ooops, Error occured </strong>
    </div>';
    header("location:../index.php");

    }
?>