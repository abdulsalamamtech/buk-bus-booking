<?php
require_once("validate_input.php");
require_once("db_connection.php");
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST"){

    // validatiing Input 

   $name = validate_input($_POST["name"]);
   $regNo = validate_input($_POST["regNo"]);
   $email = validate_input($_POST["email"]);
   $phone = validate_input($_POST["phone"]);
   $level = validate_input($_POST["level"]);
   $department =validate_input($_POST["department"]);
   $password = validate_input($_POST["password"]);
   $passwordConf = validate_input($_POST["passwordConf"]);

   
//    checking if password is same as passwordCof
    if($password!= $passwordConf){
        $_SESSION["msg"] = '<div class= "alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Password doesnt Match</strong>
        </div>';
        header("location:../register.php");

    }
    else{

        $sql = "INSERT INTO `users`( `FullName`, `reg.No`, `email`, `phone`, `level`, `department`, `password`,`status`) VALUES ('$name','$regNo','$email','$phone','$level','$department','$password','0')";
        $result = mysqli_query($conn,$sql);
        if($result){

            $_SESSION["msg"] = '<div class= "alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Registration Successful</strong> <a href="login.php">Login</a>
        </div>';
        header("location:../login.php");

        }else{
            $_SESSION["msg"] = '<div class= "alert alert-info">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Something went wrong</strong>
        </div>';
        header("location:../register.php");

        }
        
    }
   
}
?>

