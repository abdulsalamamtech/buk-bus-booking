<?php
require_once("validate_input.php");
require_once("db_connection.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $id = $_SESSION["login"];
    // validatiing Input 
   $oldamount = validate_input($_POST["oldamount"]);
   $newamount = validate_input($_POST["newamount"]);
   $amount = (int)$oldamount + (int)$newamount;
   echo $amount;

    $sql = "UPDATE `wallet` SET  Amount = '$amount'  WHERE student_id = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION["msg"] = '<div class= "alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Wallet successful Credited</strong>
        </div>';
        header("location:../Wallet.php");
    }
    else{
        $_SESSION["msg"] = '<div class= "alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Ooops, Error occured </strong>
        </div>';
        header("location:../Wallet.php");

        }

}
?>

