<?php
require_once("validate_input.php");
require_once("db_connection.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    
    // validatiing Input 

   $email = validate_input($_POST["email"]);
   $phone = validate_input($_POST["phone"]);
   $id = $_SESSION["login"];

    $sql = "UPDATE `users` SET  email = '$email', phone = '$phone' WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        
        $_SESSION["msg"] = '<div class= "alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>profile updated successful</strong>
        </div>';
        header("location:../profile.php");
    }
    else{
        $_SESSION["msg"] = '<div class= "alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Ooops, Error occured </strong>
        </div>';
        header("location:../profile.php");

        }

}
?>

