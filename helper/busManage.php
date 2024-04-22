<?php

require_once("validate_input.php");
require_once("db_connection.php");
session_start();


if(isset($_POST["add"])){

    $busName = validate_input($_POST["busName"]);
    $busCap = validate_input($_POST["busCap"]);

    $sql = "INSERT INTO `bus`(`busName`, `busCap`,`busAvailableSpace`) VALUES ('$busName','$busCap','0')";
    $result = mysqli_query($conn,$sql);

    if($result){

        $_SESSION["msg"] = '<div class= "alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Bus Added Successful</strong>
    </div>';
    header("location:../systemconfig.php");

    }else{
        $_SESSION["msg"] = '<div class= "alert alert-info">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Something went wrong</strong>
    </div>';
    header("location:../systemconfig.php");
    }
 
}

if(isset($_GET['delete'])){
    $id = $_GET["delete"];
    $sql = "DELETE FROM `bus` WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION["msg"] = '<div class= "alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Bus Deleted Successful</strong>
    </div>';
    header("location:../systemconfig.php");


    }else{
        $_SESSION["msg"] = '<div class= "alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Ooops</strong>
    </div>';
    header("location:../systemconfig.php");

    }
}

if(isset($_POST["update"])){

    $id = validate_input($_POST["id"]);
    $busName = validate_input($_POST["busName"]);
    $busCap = validate_input($_POST["busCap"]);

    if(empty($id)){
        $_SESSION["msg"] = '<div class= "alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Ooops</strong>
    </div>';
    header("location:../systemconfig.php");

    }else{

        $sql = "UPDATE bus SET busName= '$busName', busCap ='$busCap',busAvailableSpace ='0' WHERE id = '$id'";
        $result= mysqli_query($conn,$sql);
        if($result){

            $_SESSION["msg"] = '<div class= "alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Bus Update Successful</strong>
        </div>';
        header("location:../systemconfig.php");

        }else{

            $_SESSION["msg"] = '<div class= "alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Ooops</strong>
        </div>';
        header("location:../systemconfig.php");

        }
    }
    
   
}

?>