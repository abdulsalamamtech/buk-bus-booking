<?php

require_once("validate_input.php");
require_once("db_connection.php");
session_start();

if(isset($_POST["add"])){

    $terminalName = validate_input($_POST["terminalName"]);
    $address = validate_input($_POST["address"]);

    $sql = "INSERT INTO `location`(`terminalName`, `address`) VALUES ('$terminalName','$address')";
    $result = mysqli_query($conn,$sql);

    if($result){

        $_SESSION["msg"] = '<div class= "alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Location Added Successful</strong>
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
    $sql = "DELETE FROM `location` WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION["msg"] = '<div class= "alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Location Deleted Successful</strong>
    </div>';
    header("location:../systemconfig.php");


    }else{
        $_SESSION["msg"] = '<div class= "alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Ooops</strong>
    </div>';
    header("location:../systemconfig.php");

    }
}

if(isset($_POST["update"])){

    $id = validate_input($_POST["id"]);
    $terminalName = validate_input($_POST["terminalName"]);
    $address = validate_input($_POST["address"]);

    if(empty($id)){
        $_SESSION["msg"] = '<div class= "alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Ooops</strong>
    </div>';
    header("location:../systemconfig.php");

    }else{

        $sql = "UPDATE location SET terminalName= '$terminalName', address ='$address' WHERE id = '$id'";
        $result= mysqli_query($conn,$sql);
        if($result){

            $_SESSION["msg"] = '<div class= "alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Location Update Successful</strong>
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