<?php
require_once("validate_input.php");
require_once("db_connection.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    
    // validatiing Input 

   $email = validate_input($_POST["email"]);
   $password = validate_input($_POST["password"]);

    $sql = "SELECT * FROM `users` WHERE password = '$password' AND email = '$email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if($row > 0){
        
        $_SESSION["msg"] = '<div class= "alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>LoggedIn Successful</strong>
        </div>';
        $_SESSION['login'] = $row["id"];
        header("location:../index.php");
    }
    else{
    

        $_SESSION["msg"] = '<div class= "alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Incorrect Email Or Password!!!</strong>
        </div>';
        header("location:../login.php");

        }

}



?>

