<?php
require_once("validate_input.php");
require_once("db_connection.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    
    // validatiing Input 

   $oldPass = validate_input($_POST["oldPass"]);
   $newPass = validate_input($_POST["newPass"]);
   $id = $_SESSION["login"];

   $sql = "SELECT * FROM `users` WHERE id = '$id'";
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_assoc($result);

//    checking if old password matches with stored password

   if($row["password"]!= $oldPass){
    $_SESSION["msg"] = '<div class= "alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Old Password doesnt Match</strong>
    </div>';
    header("location:../admin_profile.php");
   }else{
    $sql = "UPDATE `users` SET  password = '$newPass' WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);

    $_SESSION["msg"] = '<div class= "alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>password updated successful </strong>
    </div>';
    header("location:../admin_profile.php");
    
   }

}


?>