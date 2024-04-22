<?php

require_once("validate_input.php");
require_once("db_connection.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){


    // validating the inputs
    $name = validate_input($_POST["name"]);
    $phone = validate_input($_POST["phone"]);
    $department = validate_input($_POST["department"]);
    $level = validate_input($_POST["level"]);
    $subject = validate_input($_POST["subject"]);
    $message = validate_input($_POST["message"]);

    $sql = "INSERT INTO `contacts`(`name`, `phone`, `department`, `level`, `messageSubject`, `message`) VALUES ('$name','$phone','$department','$level','$subject','$message')";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION["msg"] = '<div class= "alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Message deliverd Successful</strong> Thanks for contacting us
            </div>';
                header("location:../contact.php");
    }else{
        $_SESSION["msg"] = '<div class= "alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Ooops an error occur</strong>
            </div>';
                header("location:../contact.php");
    }


}